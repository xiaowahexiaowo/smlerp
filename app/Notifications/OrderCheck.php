<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Order;

class OrderCheck extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;

    public function __construct(Order $order)
    {
        // 注入回复实体，方便 toDatabase 方法中的使用
        $this->order = $order;
    }

    public function via($notifiable)
    {
        // 开启通知的频道
        return ['database','mail'];
    }

    public function toDatabase($notifiable)
    {
        $order=$this->order;
        // 不在order里写link
        $url=url("/orders").'/'.$order->id;
        // $link =  $topic->link(['#reply' . $this->reply->id]);

        // 存入数据库里的数据
        return [

            'user_name' => $order->user->name,
            'order_id' => $order->order_id,
            'order_link' => $url,

        ];
    }

       public function toMail($notifiable)
    {
        $url=url("/orders").'/'.$this->order->id;

        return (new MailMessage)
                    ->line('有新的销售单,单号：'.$this->order->order_id.'需要被审核')
                    ->action('查看销售单', $url);
    }
}
