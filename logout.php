<?php
    require("./includes/functions.php") ;
    check_login();
    session_destroy();
    header ( "location: index.php" ) ;
    exit ;
?>