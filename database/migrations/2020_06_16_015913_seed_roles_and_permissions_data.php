<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionsData extends Migration
{
    public function up()
    {
        // 需清除缓存，否则会报错
        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // 先创建权限

        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);
        //增改查销售单
        Permission::create(['name' => 'c_orders']);
        Permission::create(['name' => 'r_orders']);
        Permission::create(['name' => 'u_orders']);
        Permission::create(['name' => 'd_orders']);
        //增删改成销售明细
         Permission::create(['name' => 'c_orderdetails']);
        Permission::create(['name' => 'r_orderdetails']);
        Permission::create(['name' => 'u_orderdetails']);
        Permission::create(['name' => 'd_orderdetails']);
        // 增删改查收款明细
        Permission::create(['name' => 'c_collecteds']);
        Permission::create(['name' => 'r_collecteds']);
        Permission::create(['name' => 'u_collecteds']);
        Permission::create(['name' => 'd_collecteds']);
        // r 应收账款查看
        Permission::create(['name' => 'r_receivables']);
        // 物品库存统计
        Permission::create(['name' => 'r_stocks']);
        // 入库单 crud
        Permission::create(['name' => 'c_instocks']);
        Permission::create(['name' => 'r_instocks']);
        Permission::create(['name' => 'u_instocks']);
        Permission::create(['name' => 'd_instocks']);
        // 入库单明细 crud
        Permission::create(['name' => 'c_instockdetails']);
        Permission::create(['name' => 'r_instockdetails']);
        Permission::create(['name' => 'u_instockdetails']);
        Permission::create(['name' => 'd_instockdetails']);
        // 出库单 crud
        Permission::create(['name' => 'c_outstocks']);
        Permission::create(['name' => 'r_outstocks']);
        Permission::create(['name' => 'u_outstocks']);
        Permission::create(['name' => 'd_outstocks']);
        // 出库单明细
        Permission::create(['name' => 'c_outstockdetails']);
        Permission::create(['name' => 'r_outstockdetails']);
        Permission::create(['name' => 'u_outstockdetails']);
        Permission::create(['name' => 'd_outstockdetails']);
        // 小黑板 crud
        Permission::create(['name' => 'c_blackboards']);
        Permission::create(['name' => 'r_blackboards']);
        Permission::create(['name' => 'u_blackboards']);
        Permission::create(['name' => 'd_blackboards']);
        // 排产单 crud
        Permission::create(['name' => 'c_schedules']);
        Permission::create(['name' => 'r_schedules']);
        Permission::create(['name' => 'u_schedules']);
        Permission::create(['name' => 'd_schedules']);
        // 3级审核权限
        Permission::create(['name' => '1_check']);
        Permission::create(['name' => '2_check']);
        Permission::create(['name' => '3_check']);

        // 创建管理员角色，并赋予权限
        $maintainer = Role::create(['name' => 'Maintainer']);
        $maintainer->givePermissionTo('manage_users');
        $maintainer->givePermissionTo('edit_settings');
        //创建菲律宾销售 再赋予权限
        $flb_saleman = Role::create(['name' => 'Flb_saleman']);
        $flb_saleman->givePermissionTo('c_orders');
        $flb_saleman->givePermissionTo('r_orders');
        $flb_saleman->givePermissionTo('u_orders');
        $flb_saleman->givePermissionTo('c_orderdetails');
        // $flb_saleman->givePermissionTo('r_orderdetails');
        $flb_saleman->givePermissionTo('u_orderdetails');
        $flb_saleman->givePermissionTo('r_receivables');
        $flb_saleman->givePermissionTo('r_collecteds');
        $flb_saleman->givePermissionTo('r_stocks');
        $flb_saleman->givePermissionTo('r_instocks');
        $flb_saleman->givePermissionTo('r_instockdetails');
        $flb_saleman->givePermissionTo('r_outstocks');
        $flb_saleman->givePermissionTo('r_outstockdetails');
        $flb_saleman->givePermissionTo('r_blackboards');
        $flb_saleman->givePermissionTo('r_schedules');


        // 创建仓库员
        $storekeeper = Role::create(['name' => 'Storekeeper']);
        $storekeeper->givePermissionTo('r_stocks');
        $storekeeper->givePermissionTo('c_instocks');
        $storekeeper->givePermissionTo('r_instocks');
        $storekeeper->givePermissionTo('u_instocks');
        $storekeeper->givePermissionTo('d_instocks');
        $storekeeper->givePermissionTo('c_instockdetails');
        $storekeeper->givePermissionTo('r_instockdetails');
        $storekeeper->givePermissionTo('u_instockdetails');
        $storekeeper->givePermissionTo('d_instockdetails');
        $storekeeper->givePermissionTo('c_outstocks');
        $storekeeper->givePermissionTo('r_outstocks');
        $storekeeper->givePermissionTo('u_outstocks');
        $storekeeper->givePermissionTo('d_outstocks');
        $storekeeper->givePermissionTo('c_outstockdetails');
        $storekeeper->givePermissionTo('r_outstockdetails');
        $storekeeper->givePermissionTo('u_outstockdetails');
        $storekeeper->givePermissionTo('d_outstockdetails');




        //创建财务
          $treasurer = Role::create(['name' => 'Treasurer']);
          $treasurer->givePermissionTo('r_orders');
          $treasurer->givePermissionTo('r_orderdetails');
          $treasurer->givePermissionTo('c_collecteds');
          $treasurer->givePermissionTo('r_collecteds');
          $treasurer->givePermissionTo('u_collecteds');
          $treasurer->givePermissionTo('d_collecteds');
          $treasurer->givePermissionTo('r_receivables');
          $treasurer->givePermissionTo('r_stocks');
          $treasurer->givePermissionTo('r_instocks');
          $treasurer->givePermissionTo('r_instockdetails');
          $treasurer->givePermissionTo('r_outstocks');
          $treasurer->givePermissionTo('r_orderdetails');
          $treasurer->givePermissionTo('r_blackboards');
          $treasurer->givePermissionTo('r_schedules');


          //小黑板员
           $blackboardman = Role::create(['name' => 'Blackboardman']);
           $blackboardman->givePermissionTo('r_stocks');
           $blackboardman->givePermissionTo('r_instocks');
           $blackboardman->givePermissionTo('r_instockdetails');
           $blackboardman->givePermissionTo('c_blackboards');
           $blackboardman->givePermissionTo('r_blackboards');
           $blackboardman->givePermissionTo('u_blackboards');
           $blackboardman->givePermissionTo('d_blackboards');
           $blackboardman->givePermissionTo('c_schedules');
           $blackboardman->givePermissionTo('r_schedules');
           $blackboardman->givePermissionTo('u_schedules');
           $blackboardman->givePermissionTo('d_schedules');

           // 审核员   直接把权限给对应的人  人事变动不方便
           $checkman1 = Role::create(['name' => 'Checkman1']);
           $checkman1->givePermissionTo('1_check');
           $checkman2 = Role::create(['name' => 'Checkman2']);
           $checkman2->givePermissionTo('2_check');
           $checkman3 = Role::create(['name' => 'Checkman3']);
           $checkman3->givePermissionTo('3_check');



    }

    public function down()
    {
        // 需清除缓存，否则会报错
        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // 清空所有数据表数据
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
