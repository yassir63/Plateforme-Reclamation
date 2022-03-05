<?php
    require("./includes/functions.php") ;
    redirect_login();
    if ( isset ( $_POST [ 'submit' ] ) )
    {

        $query = "select * from etudiants where email = '".$_POST ['email']."'" ;
   
        $result = mysqli_query ( $connected , $query ) ;
    
        $row = mysqli_fetch_array ( $result ) ;
        if ( $row && md5($_POST['password']) == $row['password'] )
        {
            $_SESSION [ 'ide' ] = $row [ 'ide' ] ;
            $_SESSION ['nom']= $row [ 'nom' ] ;
            $_SESSION ['prenom'] = $row [ 'prenom' ] ;
            $_SESSION ['password'] = $row [ 'password' ] ;
            $_SESSION ['etat'] = $row [ 'etat' ] ;
            if ( $_SESSION['etat'] == 1)
            {
                header ( "location: Accueil_adm.php" ) ;
                exit ;
            }
            header ( "location: Accueil.php" ) ;
            exit ;
        }
        
    }
?>
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="keyword" content="Reclamation ENSAT">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">
        <title>Reclamation</title>
    </head>
    <body class="body1">
    <br>
                <br>
                <br>
                <br>
                <br>
        <div class="container bg-white pb-5">
            
            <div class ="row">
                <div class="col-sm-5 border-right">
                <br>
            <br>
            <br>
            <br>
            <br>
            
                    <em><h2 class="text-center py-3 text-dark" style="font-size:50px">S'authentifier !</h2></em>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group">
                            <label for="text">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Mot de passe:</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-check text-right">
                        <center><button type="submit" name="submit" class="btn btn-dark">Login</button>
                        <a href="signup.php"<button type="submit" name="signup" class="btn btn-dark">Sign Up</button></a></center>
                        </div>
                       
                    </form>
                    
                 
                </div>
                <div class="col-sm-7">
                <center><img height="300" width="500" src="ensa tanger.png"></center>
                    <h2 class="text-center pt-3 pb-5">Platforme de reclamation</h2>
                    <p class="text-center">Cette platforme est dédiée aux étudiants de l'ENSA de Tanger qui veulent reclamer un problème à la Direction <br>
                        
                </div>
            </div>
        </div>
        <!--jQuery, Popper.js, and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="index.js" ></script>
    </body>
</html>