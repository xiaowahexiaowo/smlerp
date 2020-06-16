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

         // 将 1 号用户指派为『管理员』
        $user = User::find(1);
        $user->assignRole('Maintainer');

    }
}
