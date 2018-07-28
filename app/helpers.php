<?php

if (!function_exists('on_page')) {
    function on_page($path)
    {
        return request()->is($path);
    }
}
if (!function_exists('return_if')) {
    function return_if($cond, $val)
    {
        if ($cond) {
            return $val;
        }
    }
}

if (!function_exists('active_if_on')) {
    function active_if_on($path)
    {
        return request()->is($path)? ' active': '';
    }
}