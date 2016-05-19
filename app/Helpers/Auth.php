<?php
namespace App\Helpers;
use Auth as LaravelAuth;;

class Auth
{
    public static function oauthLogin($username, $password)
    {
        return self::oauthCommonLogin($username, $password, 'api');
    }

    public static function oauthWebLogin($username, $password)
    {
        return self::oauthCommonLogin($username, $password, 'web');
    }

    protected static function oauthCommonLogin($username, $password, $type)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if($type == 'api'){
            $auth = LaravelAuth::once($credentials);
        }elseif($type == 'web'){
            $auth = LaravelAuth::attempt($credentials);
        }

        if($auth){
            return LaravelAuth::user()->id;
        }else{
            return false;
        }
    }
}