<!DOCTYPE html>
<html>



<head>
<link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up !</title>
</head>

<body>
    <?php
    include("./includes/db.php") ;
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sql = "INSERT into  etudiants(email,password,nom,prenom) VALUES ('$email', '$password','$nom','$prenom')";
        $result = mysqli_query($connected, $sql);
        if ($result) {
        header("Location: index.php");
        }
    } else {
    ?>
        <center>
        <br>
        <br>
            <br>
            <!-- <h1 style ="font-size:150px">Sign Up</h1> -->
            <img height="300" width="500" src="ensa tanger.png">
        </center>
        <br>
        <br>
        <br>
        <br>
        <div class="center">
            <div class="d-flex justify-content-center">
                    <form name="registration" method="post">
                        <center>
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nom</span>
                                <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Prénom</span>
                                <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="password" class="form-control" name="password" placeholder="Password" required><br>
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit" value="Register">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>