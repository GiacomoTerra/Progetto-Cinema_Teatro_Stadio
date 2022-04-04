<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BookEvent - Conferma prenotazione</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <script type="text/javascript" src="./posti.js"></script>
    <script type="text/javascript" src="Vue/vue.min.js"></script>
    <script type="text/javascript" src="./jquery/jquery-3.6.0.js"></script>
    <style>
        .h1, .h2, .h3, h1, h2, h3 {
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 7px;
    font-size: 24px;
    margin-left: 1px;
}
        </style>

</head>

<body class="booking">

    <nav class="navbar navbar-expand-lg navbar" style="background-color: #b40d0d; color: white;">
    <a href="../homepage.php" id="link2"><h3>BookEvent</h3></a>
    </nav>
    <h1 id="demo" align="center"></h1>
    <div align= "center">
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\Exception.php';
            require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\PHPMailer.php';
            require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\SMTP.php';

            if(isset(($_POST['email']))){
            $dbconn = pg_connect("host=localhost port=5432 dbname=stadio user=postgres password= ") or die("Could not connect".pg_last_error());
            
            $q1 = "select nome,cognome,email,telefono,vaccino,password from utente";
            $res = pg_query($q1) or die("Query failed".pg_last_error());
            
            $nome=isset($_POST['nome']) ? $_POST['nome']:null;
            $cognome=isset($_POST['cognome']) ? $_POST['cognome']:null;
            $email=isset($_POST['email']) ? $_POST['email']:null;
            $password=hash('sha512',$_POST['password']);
            $tel=isset($_POST['telefono']) ? $_POST['telefono']:null;
            $settore=isset($_POST['settore']) ? $_POST['settore']:null;
            $posto=isset($_POST['posto']) ? $_POST['posto']:null;
            $vax = false;
            $citta=isset($_POST['citta']) ? $_POST['citta']:null;
            $stato=isset($_POST['stato']) ? $_POST['stato']:null;
            $indirizzo=isset($_POST['indirizzo']) ? $_POST['indirizzo']:null;
            $cap=isset($_POST['cap']) ? $_POST['cap']:null;

            $email2=$_POST['email'];
            $q4="SELECT * FROM  utente where email =$1";
            $result4=pg_query_params($dbconn,$q4,array($email2));
            if($line2=pg_fetch_array($result4,null,PGSQL_ASSOC)){
                $jassi = '<script>document.getElementById("demo").innerHTML=
                "Sei già registrato " +"<a href=../login.php id=link3>Login</a>" </script>';
               echo $jassi;
           }
            else{
                    $q2="insert into utente (nome,cognome,email,telefono,vaccino,password,citta,stato,indirizzo,cap)
                    values ('$nome','$cognome','$email','$tel','false','$password','$citta','$stato','$indirizzo','$cap')";
                    $data=pg_query($q2);
                    $query8="SELECT idpersona FROM utente where email='$email'";
                    $result8=pg_query($query8) or die('query failed'.pg_last_error());
                    $myrow8 = pg_fetch_assoc($result8); 
                    $idpersona = $myrow8["idpersona"];
                    echo   "<div align= center>
                                <h1>Registrazione effettuata con successo</h1>
                                <br>
                                <a role= button href=../areautente.php align= center>
                                    <p class= h6 align= top></p>
                                    <img class= result src = ./img/success.png alt= Clicca qui per prenotare il tuo posto per altri eventi/>
                                </a>  
                            </div>";
                            $time_cookie=3600;
                            setcookie("session", $email, time()+$time_cookie,"/");
                            define('FPDF_FONTPATH','../font/');
                 
            }
        }
        else{
            header("location:../homepage.php");
        }

        //Upload documento vaccinazione
            
/*
        //Upload documento di identità
            if (!isset($_FILES['id']) || !is_uploaded_file($_FILES['id']['tmp_name'])) {
                echo 'File non inviato';
                exit;
            }

            //cartella upload
            $upload_id_dir = 'C:\Users\fede6\Desktop\Federico\Università\Linguaggi e Tecnologie Web\Stadio\db\id\.';
            $id_tmp = $_FILES['id']['tmp_name'];
            $id_name = $_FILES['id']['name'];
            
            if (move_uploaded_file($id_tmp, $upload_id_dir . $id_name)) {
                echo 'File inviato';
            } else {
                echo 'Caricamento invalido';
            }
       
        //Test per database:

            $res2 = pg_query($q1) or die("Query failed".pg_last_error());
            echo "<table>\n";
            while($line = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
                echo "\t<tr>\n";
                foreach ($line as $col_value) {
                    echo "\t\t<td><p>||     $col_value   ||</p></td>\n";
                }
                echo "\t</tr>\n";
            }
            echo "</table>\n";
*/

            pg_free_result($res);
            pg_close($dbconn);

        ?>
    </div>
</body>
</html>