<?php
    require("./includes/functions.php") ;
    check_login();
    if ( !isset($_GET['ids'] ) )
    {
        echo '<h1 style="text-align:center;">PAGE NOT FOUND</h1>';
        exit ;
    }
    $ids = $_GET['ids'];
    if ( isset($_POST['repondre']) )
    {
        $rep = $_POST['rep'];
        $query2 = "update subjects set reponse = '$rep' where ids = $ids";
        $result2 = mysqli_query ( $connected , $query2 ) ;
        header ("location: reply.php?ids=$ids");
        exit ;
    }
    $n_ade = $_SESSION ['nom'] ; 
    $p_ade = $_SESSION ['prenom'] ; 
    $query = "select rec,reponse from subjects where ids=$ids";
    $result = mysqli_query ( $connected , $query ) ;
    if ( $row = mysqli_fetch_array ( $result ) )
    {
        $reclamation = $row['rec'];
        $reponse = $row['reponse'];
    }
    else
    {
        echo '<h1 style="text-align:center;">PAGE NOT FOUND</h1>';
        exit ;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keyword" content="Reclamation 'ENSA de Tanger' ENSAT">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Reclamation : Réponse</title>
    </head>
    <?php 
        if ( $reponse != 'pas encore' )
        {
    ?>
        <div class="container2"><table class="table table-dark table-hover">
           <tr>
                    <td><?= $reclamation ?></td>
                </tr>
                <tr>
                    <td><?= $reponse ?></td>
                </tr>
                <tr>
                    <td> 
                        <a href= "Accueil_adm.php"><button class="btn btn-success float-right">Retourner</button></a>
                    </td>
                </tr>
         </table></div>
    <?php 
        }
        else 
        {
    ?>   
        <div class="container2">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?ids=$ids");?>" method="post">
                <table class="table table-dark">
                    <tr>
                        <td>
                            <label for="text"><?= $reclamation ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="rep" cols="160" rows="15" Required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right pb-2">
                            <button class="btn btn-success mx-4" name="repondre" type="submit">Répondre</button>
                            <a class="btn btn-success" onclick="f()">Retourner</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php
        }
    ?>
    <body class="bg-info">
        <div class="sidenav">
            <ul class="list-unstyled components">
                <li class="mb-3"><button class="btn closebtn text-center">&equiv;</button></li>
                <li><h6 class="text-success text-center pb-3 display-4"><?= $n_ade.'<br>'. $p_ade ?></h6></li>
                <li><a href="index.php"><button class="btn">Home</button></a></li>
                <li><a href="logout.php"><button class="btn">Log-out</button></a></li>
               
            </ul>
        </div>
    </body>
    <!--jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="Accueil_adm.js"></script>
</html>