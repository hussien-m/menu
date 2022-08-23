<?php
use App\Models\Admin;

if(!function_exists('toast'))
{
    function toast($message,$type)
    {
        $msg = "message";
        $tp  = "type";
        session()->flash($msg,$message);
        session()->flash($tp,$type);
    }
}
