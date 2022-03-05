<?php
    require("./includes/functions.php") ;
    check_login();
    $ide = $_SESSION['ide'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $query = "select ids,sujet,rec,reponse from subjects s , etudiants e where e.ide = s.ide and e.ide = $ide order by (reponse = 'pas encore') desc";
    $result = mysqli_query ( $connected , $query ) ;
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
                <li><a href="logout.php"><button class="btn">Log-out</button></a></li>
                <li><a href="Accueil.php"><button class="btn">Home</button></a></li>
                <li><button id="nv_nr" class="btn">new reclamation</button></li>
              
            </ul>
        </div>
        <div class="container2">
            <?php
                $i = 1 ;
                echo '<table class="table table-dark table-bordered table-hover">
                <tr><th>N</th><th>SUJET</th><th>RECLAMATION</th><th>REPONSE</th></tr>';
                while ( $row = mysqli_fetch_array ($result) )
                {
                    $subject = $row['sujet'];
                    $reclamation = substr($row['rec'],0,min(40,strlen($row['rec'])))."....";
                    $rep = $row['reponse'];
                    $ids = $row['ids'];
                    echo "<tr onclick = 'clickablerow($ids)' >
                            <th>$i</th>
                            <td>$subject</td>
                            <td>$reclamation</td>
                            <td>$rep</td>
                          </tr>" ;
                    $i++;
                }
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