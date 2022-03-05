<?php
    $connected = mysqli_connect('localhost' , 'root', '' , 'reclamation') ;
    if ( !$connected )
    {
        echo 'Connection error ' . mysqli_connect_error();
        exit ;
    }
?>