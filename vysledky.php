<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vysledky</title>
    <style>
        body {
            background-color: gray;
        }
        .spravne{
            color:green;
        }
        .spatne{
            color:crimson;
        }
        .results{
            color:pink;
        }
    </style>
</head>
<body>
<form action="profil.php">
    <?php
        session_start();

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }  
        $connect = new mysqli("localhost","root","","weatesty");
        
        $odpovedi = $_POST["odpovedi"];
        $dobraOdpoved = 0;
        foreach($odpovedi as $id => $odpoved){
            $sql = "SELECT * FROM otazky WHERE id = $id";

            $result = $connect->query($sql);
            if($result == TRUE){
                $otazkaZDB = $result->fetch_assoc();
                $otazkaHTML = "<div><h3> {$otazkaZDB["otazka"]} </h3>";

                $moznosti = json_decode($otazkaZDB["odpovedi"]);

                    foreach($moznosti as $moznost){
                    if($moznost == $otazkaZDB["spravna_odpoved"]){
                        if($odpoved == $moznost){
                            $otazkaHTML .= "<p class = 'results'>Odpověděli jste správně: {$odpoved}</p>";
                            $otazkaHTML.= "<input type='radio' disabled checked><label class='spravne'>$moznost</label><br>";
                            $dobraOdpoved++;
                        }else{
                            $otazkaHTML.= "<input type='radio' disabled><label class='spravne'>$moznost</label><br>";
                        }
                    }else{
                        if($odpoved == $moznost){
                            $otazkaHTML .= "<p class = 'results'>Vaše odpověď: {$odpoved}</p>";
                            $otazkaHTML .= "<p class = 'results'>Správná odpověď: {$otazkaZDB["spravna_odpoved"]}</p>";
                            $otazkaHTML.= "<input type='radio' disabled checked><label class='spatne'>$moznost</label><br>";
                        }else{
                            $otazkaHTML.= "<input type='radio' disabled><label >$moznost</label><br>";
                        }
                    }
                }  
                
                $otazkaHTML.= "</div>";

                echo $otazkaHTML;
            }
        }
        echo "<br>Počet správných odpovědí: ". $dobraOdpoved. "<br>Procentuální úspěšnost ".(($dobraOdpoved/count($odpovedi)) * 100)."%";

        $sql = "UPDATE users SET score = score + $dobraOdpoved WHERE email = '$email'";
        $connect->query($sql);
    ?>
    <input type="submit" value="Zbět na profil">
</form>
</body>
</html>