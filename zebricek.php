<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
	        background-color: gray;
        }
        #form {
            background-color: orange;
            border: 2px solid black;
            border-radius: 25px;
            padding: 20px;
            height: 75vh;
            width: 50vh;
            margin-top: 60px;
            left: 50%;
            position: fixed;
            transform: translate(-50%);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            font-size: 30px;
            text-align: center;
            overflow: auto;
        }
    </style>
</head>
<body>
    <form id = "form" action="profil.php">
        <br>
            <input type="submit" name="Zpet na profil" value="Zpet na profil">
        </br>
        <tr>
            <th>Username:</th>
            |
            <th>Score:</th>
        </tr>
        <?php 
            $connect = new mysqli("localhost","root","","weatesty");

            $sql = "SELECT * FROM users ORDER BY users.score DESC LIMIT 5;";

        $results = $connect->query($sql);
        if($results == true){
            
            while($row = $results->fetch_assoc()){
                $html = "<h3><tr><th>{$row['username']}</th> | <th>{$row['score']}</th></tr></h3>";

            echo $html;
            }
        }
        ?>
    </form>
</body>
</html>