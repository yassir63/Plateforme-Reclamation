<?php
    require("./includes/functions.php") ;
    check_login();
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    if ( isset($_POST['submit']) )
    {
        $ide = $_SESSION ['ide'] ;
        $sujet = mysqli_real_escape_string($connected, $_POST['sujet']);
        $rec = mysqli_real_escape_string($connected, $_POST['reclamtion']);
        $sql = "INSERT INTO subjects (sujet, rec, ide) 
                VALUES ('$sujet', '$rec', '$ide')" ;
        if ( mysqli_query($connected, $sql) ) 
        {
            header ( "location: reclamations.php" );
            exit;
        }
        else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($connected);
        }
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
        <title>Accueil</title>
    </head>
    <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                
                
    <body class="bg-info">
        <div id="wlcm" class="container MW4 bg-dark">
            
            <div class="row pl-4 pb-4">
               <h3 class="text-center display-4" style="color:green;">Welcome <?= $nom.' '.$prenom ?></h3>
                
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-danger">Nouvelle Reclamation</button>
            </div>
            <div class="row justify-content-center py-4">
                <button class="btn btn-light" style="width:173px;">Vérifier les anciennes réclamations</button>
            </div>
        </div>
        <div class="sidenav">
            <ul class="list-unstyled components">
                <li class="mb-3"><button class="btn closebtn text-center">&equiv;</button></li>
                <li><h6 class="text-success text-center pb-3 display-4"><?= $nom.'<br>'. $prenom ?></h6></li>
                <li><a href="logout.php"><button class="btn">Log-out</button></a></li>
                <li><a href="reclamations.php"><button class="btn">Check Old Reclamation</button></a></li>
                
            </ul>
        </div>
        <div id="recForm" class="container MW4 bg-white">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <table>
                    <tr>
                        <td class="text-center py-3"><label for="text">Sujet:</label></td>
                        <td><input type="text" name="sujet" Required><td>
                    </tr>
                    <tr>
                        <td><label for="text">Reclamation:</label></td>
                        <td><textarea name="reclamtion" cols="50" rows="10" maxlength="1000" Required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right pb-2"><button class="btn btn-primary" name="submit" type="submit">Envoyer</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <!--jQuery, Popper.js, and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <!-- our JS -->
        <script src="Accueil.js"></script>
    </body>
</html>