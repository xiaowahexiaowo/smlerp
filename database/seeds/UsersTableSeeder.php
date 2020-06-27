<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);



        // 生成数据集合
        $users = factory(User::class)
                        ->times(20)
                        ->make();

        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Admin';
        $user->email = '982726736@qq.com';
        $user->save();

         // 单独处理第2个用户的数据
        $user = User::find(2);
        $user->name = '王丽华';
        $user->email = 'wlh@qq.com';
        $user->save();

         // 单独处理第3个用户的数据
        $user = User::find(3);
        $user->name = '岳麟凤';
        $user->email = 'ylf@qq.com';
        $user->save();

          // 单独处理第4个用户的数据
        $user = User::find(4);
        $user->name = '殷爱军';
        $user->email = 'yaj@qq.com';
        $user->save();



         // 将 1 号用户指派为『管理员』
        $user = User::find(1);
        $user->assignRole('Maintainer');

// 分别设置3级审核权限
          $user = User::find(2);
        $user->assignRole('Checkman1');
$user->assignRole('Treasurer');

          $user = User::find(3);
        $user->assignRole('Checkman2');
$user->assignRole('Treasurer');

          $user = User::find(4);
        $user->assignRole('Checkman3');
        $user->assignRole('Maintainer');


    }
}
