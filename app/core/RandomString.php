<?php

class RandomString
{
    public static function random($digit, $kode = null)
    {
        //Generate Random String => untuk PIN
        $n = $digit; //jumlah digit random
        $k = 1; //jumlah string random
        $hasil = array();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($j = 0; $j < $k; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            $hasil[$j] = $randomString;
            $randomString = '';
        }
        $result     = $kode.$hasil[0];
        return $result;
    }
}