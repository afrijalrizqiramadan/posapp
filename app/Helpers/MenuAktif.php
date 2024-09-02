<?php

function expand($route = '')
{
    $route = explode("|",$route);
    $status = '';
    foreach ($route as $value) {
        if (request()->is($value)) {
            $status = 'true show';
            return $status;
        } else {
            $status = 'gagal';
        }
    }
    return $status;
}

function menuAktif($url)
{
    if (str_contains(url()->current(), $url)) {
    // if (url()->current() == $url) {
        $status = 'active';
    } else {
        $status = $url;
    }

    return $status;
}


function expandDropdownGroup($Listroute = [])
{

    $status = [];
    foreach ($Listroute as $key => $route) {
        $route = explode("|",$route);
        foreach ($route as $value) {
            if (request()->is($value)) {
                $status[] = 'Ada';
            } else {
                $status[] = 'Tidak Ada';
            }
        }
    }

    $statusResult='gagal';
    if(in_array("Ada", $status)){
        $statusResult =  'true show';
    }
    return $statusResult;
}