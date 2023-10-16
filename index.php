<?php

    if (isset($_GET['controller'])){
        echo'quieres realizar una accion sobre '.$_GET['controller'];
        if(isset($_GET['action'])){
            echo'quieres realizar una accion sobre '.$_GET['action'];
        }
    }else{
        echo'No me has pasado controller';
    }

?>