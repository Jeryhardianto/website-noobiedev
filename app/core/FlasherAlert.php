<?php

class FlasherAlert {

    public static function setFlashA($pesan, $aksi, $tipe){
        $_SESSION['flashA'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe,
        ];
    }

    //Method untuk menampilkan data
    public static function flashA(){
        //cek session
        if (isset ($_SESSION['flashA'])) {
            echo '
            <script>
                    Swal.fire(
                    "'.$_SESSION['flashA']['pesan'].'", 
                     "'.$_SESSION['flashA']['aksi'].'", 
                     "'.$_SESSION['flashA']['tipe'].'" 
                    )
            </script>';
            //Hapus Session
            unset($_SESSION['flashA']);

        }
    }


}