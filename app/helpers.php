<?php
// 主要是用来样式订制
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
