<?php
    require("./includes/functions.php") ;
    check_login();
    if ( !isset($_GET['ids'] ) || !is_numeric($_GET['ids']) )
    {
        echo '<h1 style="text-align:center;">PAGE NOT FOUND</h1>';
        exit ;
    }
    $ide = $_SESSION['ide'];
    $ids = $_GET['ids'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $query = "select rec,reponse from subjects where ids = $ids and ide = $ide" ;
    $result = mysqli_query ( $connected , $query ) ;
    $row_count = mysqli_num_rows($result);
    if ( $row_count == 0 )
    {
        echo '<h1 style="text-align:center;">PAGE NOT FOUND</h1>';
        exit ;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- our meta tags -->
        <meta name="keyword" content="Reclamation 'ENSA de Tanger' ENSAT">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- our css -->
        <link rel="stylesheet" href="style.css">
        <title>Mes reclamations</title>
    </head>
    <body class="body2">
        <div class="sidenav">
            <ul class="list-unstyled components">
                <li class="mb-3"><button class="btn closebtn text-center">&equiv;</button></li>
                <li><h6 class="text-success text-center pb-3 display-4"><?= $nom.'<br>'. $prenom ?></h6></li>
                <li><a href="logout.php"><button class="btn">log-out</button></a></li>
                <li><button class="btn">new reclamation</button></li>
                <li><button class="btn">check old reclamation</button></li>
            </ul>
        </div>
        <div class="container2">
            <?php
                echo '<table class="table table-dark table-bordered">';
                while ( $row = mysqli_fetch_array ( $result ) )
                {
                    $reclamation = $row['rec'];
                    $reponse = $row['reponse'];
                    echo "<tr>
                            <td title=\"votre reclamation\">
                                $reclamation
                            </td>
                          </tr>
                          <tr>
                            <td title=\"reponse de la part de l'administration\">
                                $reponse
                            </td>
                          </tr>" ;
                }
                echo '<tr><td>
                        <a href="reclamations.php"><button class="btn btn-success float-right">retourner</button></a>
                        </td></tr>' ;
                echo "</table>" ;
            ?>
        </div>
        <!--jQuery, Popper.js, and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <!-- our JS -->
        <script src="reclamations.js"></script>
    </body>
</html>