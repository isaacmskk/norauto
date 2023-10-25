<?php

    class db{
        public static function connect($host='127.0.0.1',$user='root',$pwd='',$db='bbdd_norauto'){
            $con = new mysqli($host,$user,$pwd,$db);
            if ($con == false){
                die('ERROR DATABASE');

            }else{
            return $con;
            }
        }
    }
?>