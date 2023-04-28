<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        body {
            background-color: gray;
        }
    </style>
</head>
<body>
<form action="vysledky.php" method="post">
    <?php
    $cT = 0;
        if(isset($_POST["Test1"])){
            $cT = 1;
            $_SESSION['cT'] = $cT;
        }
        if(isset($_POST["Test2"])){
            $cT = 2;
            $_SESSION['cT'] = $cT;
        }   
        $connect = new mysqli("localhost","root","","weatesty");

        $sql = "SELECT * FROM otazky WHERE cisloTestu = $cT;";

        $results = $connect->query($sql);
        if($results == true){
            
            while($row = $results->fetch_assoc()){
                vypisOtazky($row);
            }
        }

        function vypisOtazky($row){
            $html = "<h3> {$row['otazka']} </h3>";

            $html .= "<input type='hidden' name='odpovedi[{$row['id']}]' value=''>";

                $moznosti =json_decode($row["odpovedi"]);
                for($i = 0; $i < count($moznosti);$i++){
                    $html .= "<input type='radio' name='odpovedi[{$row['id']}]' value='{$moznosti[$i]}'> <label>{$moznosti[$i]}</label> <br>";
                }

            echo $html;
        }
    ?>

    <input type="submit" value="odevzdat test">
    </form>
</body>
</html>