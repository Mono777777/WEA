<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
  <style>
    #formus {
      background-color: orange;
      border: 2px solid black;
      border-radius: 25px;
      padding: 20px;
      height: 20vh;
      width: 80vh;
      margin-top: 50px;
      left: 50%;
      position: fixed;
      transform: translate(-50%);
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      font-size: 22px;
    }
    #table {
      background-color: orange;
      border: 2px solid black;
      border-radius: 25px;
      padding: 20px;
      height: 50vh;
      margin-top: 100px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      font-size: 22px;
    }
    body {
	    background-color: gray;
    }
    </style>
</head>
<body>
  <form>
    <table style="width:100%" id = "table">
      <tr>
        <th>Firstname:</th>
        <th>Lastname:</th> 
        <th>Username:</th>
        <th>Bio:</th>
        <th>Celkový počet spravných odpovědí:</th>
        <th>Úspěšnost 1.Testu:</th>
        <th>Úspěšnost 2.Testu:</th>
      </tr>
      <?php
        session_start();

        $connect = new mysqli("localhost","root","","weatesty");
      
        if(isset($_POST["register"])){
          $firstname = $_POST["firstname"];
          $lastname = $_POST["lastname"];
          $username = $_POST["username"];
          $email = $_POST["email"];
          $password = $_POST["password"];
          $bio = $_POST["bio"];
          $score = 0;
          $vysledek1 = 0;
          $vysledek2 = 0;

          $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
          $result = $connect->query($sql);

          if ($result->num_rows > 0) {
            header('Location: registrace.php?error=usernameOrEmailTaken');
          } else {

            $sql = "INSERT INTO users(firstname, lastname, username, email, password, bio, score, vysledek1, vysledek2) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$bio', '$score', '$vysledek1', '$vysledek1')";
            $connect->query($sql);

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
          }
        }

        if(isset($_POST["login1"])){
          $email = $_POST["email"];
          $password = $_POST["password"];

          $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
          $result = $connect->query($sql);

          if ($result->num_rows < 1) {
            header('Location: login.php?error=NoProfile');
          } else {

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
          }
        }
      
        if(isset($_POST["logout"])) {
          session_destroy();
          header('location: registrace.php');
        }
      
        if(isset($_POST["login"])){
          header('location: login.php');
        }

        if (isset($_SESSION['email'])) {
          $email = $_SESSION['email'];
          $password = $_SESSION['password'];
        }

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $results = $connect->query($sql);
        if($results == true){     
            while($row = $results->fetch_assoc()){
              $html = "<tr><th>{$row['firstname']}</th><th>{$row['lastname']}</th><th>{$row['username']}</th><th>{$row['bio']}</th><th>{$row['score']}</th><th>{$row['vysledek1']}</th><th>{$row['vysledek2']}</th></tr>";

            echo $html;
          }
        }
      ?>
    </table>
  </form>
    <table id = "formus">
      <tr>
        <th>
          <form action="profil.php" method="post">
            <input type="submit" name="logout" value="logout">
          </form>
        </th>
        <th>
          <form action="zebricek.php">
            <input type="submit" name="Zebricek" value="Zebricek">
          </form>
        </th>
      </tr>
      <tr>
        <th>
          <form action="testy.php" method="post">
        
            <input type="submit" name="Test1" value="Test1">
          </form>
        </th>
        <th>
          <form action="testy.php" method="post">
            <input type="submit" name="Test2" value="Test2">
          </form>
        </th>
      </tr>
    </table>
</body>
</html>