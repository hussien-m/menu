<?php
use App\Models\Admin;

if(!function_exists('isAdminActive'))
{
    function isAdminActive($email) : bool
    {
        $doctor = Admin::whereEmail($email)->isActive()->exists();

        return $doctor ? true : false;
    }
}

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
