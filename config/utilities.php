<?php

class CustomUtilities
{
    static public function randomCustomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 4; $i++) {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }
}