<?php

namespace app\Framework\Classes;


class Auth
{
   public static function check(string $param)
   {
        if($param === 'auth' && !isset($_SESSION['logged'])) {
            return redirect('/login');
        }
   }
}