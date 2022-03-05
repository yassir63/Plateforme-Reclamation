<?php
    require("./includes/session.php") ;
    require("./includes/db.php") ;
    function check_login()
    {
        if ( !isset ($_SESSION[ 'ide' ] ) )
        {
            header ( "location: index.php" ) ;
            exit ;
        }
    }
    function redirect_login()
    {
        if ( isset ($_SESSION[ 'ide' ] ) && isset($_SESSION[ 'password' ] ))
        {
            if ( $_SESSION['nom'] == 'N_ADE' )
            {
                header ( "location: Accueil_adm.php" ) ;
                exit ;
            }
            header ( "location: Accueil.php" );
            exit ;
        }
    }
?>