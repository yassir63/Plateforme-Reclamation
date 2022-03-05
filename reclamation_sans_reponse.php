<?php
    require("./includes/functions.php") ;
    check_login();
    $n_ade = $_SESSION ['nom'] ; 
    $p_ade = $_SESSION ['prenom'] ; 
    $query = "select s.ids,e.nom,e.prenom,s.sujet,s.rec from etudiants e , subjects s where e.ide=s.ide and reponse = 'pas encore'";
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
        <title>Reclamations Sans Réponses</title>
    </head>
    <body class="body2">
        <div class="sidenav">
            <ul class="list-unstyled components">
                <li class="mb-3"><button class="btn closebtn text-center">&equiv;</button></li>
                <li><h6 class="text-success text-center pb-3 display-4"><?= $n_ade.'<br>'. $p_ade ?></h6></li>
                <li><a href="logout.php"><button class="btn btn-danger">log-out</button></a></li>
                <li><a href="reclamation_sans_reponse.php"><button class="btn">repondre à une reclamation</button></a></li>
            </ul>
        </div>
        <div class="container2">
            <?php
                $i = 1 ;
                echo '<table id="recs" class="table table-dark table-bordered table-hover">
                        <tr>
                            <th>N</th>
                            <th onclick="sortby(0)" oncontextmenu="searchIn(0)">NOM</th>
                            <th onclick="sortby(1)" oncontextmenu="searchIn(1)">PRENOM</th>
                            <th onclick="sortby(2)" oncontextmenu="searchIn(2)">SUJET</th>
                            <th onclick="sortby(3)" oncontextmenu="searchIn(3)">RECLAMATION</th>
                        </tr>';
                while ( $row = mysqli_fetch_array ( $result ) )
                {
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    $subject = $row['sujet'];
                    $reclamation = substr($row['rec'],0,min(40,strlen($row['rec'])))."....";
                    $ids = $row['ids'];
                    echo "<tr onclick='clickablerow($ids)'>
                            <th>$i</th>
                            <td in='n'>$nom</td>
                            <td in='n'>$prenom</td>
                            <td in='n'>$subject</td>
                            <td in='n'>$reclamation</td>
                          </tr>" ;
                    $i++;
                }
                echo "</table>" ;
            ?>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="Accueil_adm.js"></script>
</html>