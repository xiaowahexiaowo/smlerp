<?php

use App\Models\Setting;

return [
    'title'   => '参数设置',
    'single'  => '参数设置',
    'model'   => Setting::class,



    'columns' => [

        'product_type' => [
            'title'    => '产品类型',
            'sortable' => false,
        ],
        'generating_unit_type' => [
            'title'    => '机组类型',
            'sortable' => false,
        ],
        'power' => [
            'title'  => '功率',
            'sortable' => false,
        ],
            'phases_number' => [
            'title'  => '相数',
            'sortable' => false,
        ],
            'unit' => [
            'title'  => '单位',
            'sortable' => false,
        ],
            'warehousing_price' => [
            'title'  => '单价',
            'sortable' => false,
        ],
          'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [

        'product_type' => [
            'title'    => '产品类型',
            'sortable' => false,
        ],
        'generating_unit_type' => [
            'title'    => '机组类型',
            'sortable' => false,
        ],
        'power' => [
            'title'  => '功率',
            'sortable' => false,
        ],
            'phases_number' => [
            'title'  => '相数',
            'sortable' => false,
        ],
            'unit' => [
            'title'  => '单位',
            'sortable' => false,
        ],
            'warehousing_price' => [
            'title'  => '单价',
            'sortable' => false,
        ],
    ],
    'filters' => [
        'generating_unit_type' => [
            'title' => '机组编号',
        ],
    ],
    'rules'   => [
        'name' => 'required|unique:generating_unit_type'
    ],
    'messages' => [
        'name.unique'   => '机组型号已存在',
        'name.required' => '不能为空',
    ],
];
