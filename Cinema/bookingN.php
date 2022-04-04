
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BookEvent - Conferma prenotazione</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <script type="text/javascript" src="Vue/vue.min.js"></script>
    <script type="text/javascript" src="./jquery/jquery-3.6.0.js"></script>
</head>

<body class="booking">
<h1 id="demo" align="center"></h1>
    <?php

if(!isset($_COOKIE["session"]))
{
    $jassi = '<script>document.getElementById("demo").innerHTML=
    "Se non sei Registrato " +"<a href=../stadio/registrazione.html style=text-decoration:none;color:#b40d0d>Registrati</a> <br> Oppure effettua il <a href=../login.php style=text-decoration:none;color:#b40d0d>Login</a>" </script>';
   echo $jassi;
   return;
}
?>
    <div align= "center">
<?php
         use PHPMailer\PHPMailer\PHPMailer;
         use PHPMailer\PHPMailer\Exception;
         require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\Exception.php';
         require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\PHPMailer.php';
         require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\SMTP.php';
        $dbconn=pg_connect("host=localhost port=5432 dbname=stadio user=postgres password= ") or die('Could not connect'.pg_last_error());

        if((isset($_POST["date"])))
        {
            $posto=$_POST['seats'];
            $count=count($_POST['seats']);
            for($i=0;$i<$count;$i++){
            $q3 = "select * from posticinema where seats like '%$posto[$i]%' and date=$1 and time=$2 and film=$3";
            $date=$_POST['date'];
            $time=$_POST['time'];
            $film=$_POST['film'];
            $res3 = pg_query_params($dbconn,$q3,array($date,$time,$film)) or die("Query failed".pg_last_error());
            }
            if ($line=pg_fetch_array($res3,null,PGSQL_ASSOC)) {
                echo   "<div align = center>
                            <h1>Prenotazione fallita</h1>
                            <h2> Posti non disponibili<h2>
                            <br>
                            <a role= button href=./cinema.php align= center>
                                <img class= result src = ./img/failure.png alt= Clicca qui per tornare indietro/>
                            </a>  
                        </div>";
            } else{

       $email=$_COOKIE['session'];
       $dbconn = pg_connect("host=localhost port=5432 dbname=stadio user=postgres password= ") or die("Could not connect".pg_last_error());
       
       $q1="SELECT nome,cognome,idpersona FROM utente WHERE email='$email'";
       $res = pg_query($q1) or die("Query failed".pg_last_error());
       $myrow = pg_fetch_assoc($res); 
       $codpersona=$myrow["idpersona"];
       $nome = $myrow["nome"];
       $cognome = $myrow["cognome"];
            $film=isset($_POST['film']) ? $_POST['film']:null;
            $date=isset($_POST['date']) ? $_POST['date']:null;
            $time=isset($_POST['time']) ? $_POST['time']:null;

            if(isset($_POST['seats'])){
             $checkBox = implode(',',$_POST['seats']);
            }
            $sql = "insert into posticinema(date,time,seats,codpersona,film) values ($1,$2,$3,$codpersona,$4)";
            $data=pg_query_params($dbconn,$sql,array($date,$time,$checkBox,$film));
            echo   "<div align= center>
            <h1>Prenotazione effettuata con successo</h1>
            <br>    
            <a role= button href=../areautente.php align= center>
                <p class= h6 align= top></p>
                <img class= result src = ./img/success.png alt= Clicca qui per prenotare il tuo posto per altri eventi/>
            </a>  
        </div>";
        define('FPDF_FONTPATH','../font/');
        require('../fpdf.php');  // MAKE SURE YOU HAVE THIS LINE
$pdf = new FPDF();
for($i=0;$i<$count;$i++){
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(20,10,'Nome: '.$nome,0,0);
$pdf->Cell(20,10,'',0,1);
$pdf->Cell(20,10,'Cognome: '.$cognome,0,0);
$pdf->Cell(20,10,'',0,1);
$pdf->Cell(20,10,'Spettacolo: '.$film,0,1);
$pdf->Cell(20,10,'Posto: '.$posto[$i],0,1);
$pdf->Cell(20,10,'Ora: '.$time,0,1);
$pdf->Cell(20,10,'',0,1);
$image1 ="https://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=$date-$time-$posto[0]-$cognome-$codpersona";
$pdf->Image($image1,50,50,100,100,'png');
}
$pdf->Output("../$cognome-$date-$nome-biglietto.pdf",'F');
$pdf_file=$pdf->Output("S");

 
     
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "bookevent2021@gmail.com";
$mail->Password   = "bookevent6578";

$mail->IsHTML(true);
$mail->AddAddress("bookevent2021@gmail.com", "recipient-name");
$mail->SetFrom("from-email@gmail.com", "BookEvent");
$mail->Subject = "Prenotazione per il film $film";
$content = "<b>Gentile $nome $cognome ecco in allegato la sua prenotazione.</b>";
$mail->AddStringAttachment($pdf_file, 'prenotazione.pdf', 'base64', 'application/pdf');
$mail->MsgHTML($content); 
echo"<div style=display:none>";
$mail->Send();
echo"</div>";

        pg_free_result($res);
            }
                } else{
                    header("location:../homepage.php");
                }
                    
                    pg_close($dbconn);
    ?>

            </div>
            </body>
            </html>


<!-- 
<table>
    <tr>
        <td>
        <div id="app">
            <div class="product-info" >
                <h1>Film in Programmazione: {{product}}</h1>
            </div>
            'film del 2020 scritto, diretto, co-prodotto e montato da Chloé Zhao, 
            Adattamento cinematografico del libro della giornalista Jessica Bruder Nomadland, il film, 
            con protagonista Frances McDormand, ha vinto il Golden Globe per il miglior film drammatico e per la miglior regista, 
            oltre a tre Premi Oscar, rispettivamente per il miglior film, la miglior regia e la migliore attrice protagonista.',
            <div class="product-image">
                <img v-bind:src="image"/>
            </div>
        </div>
        </td>
    </tr>
    <td>
        <div class="form-group col-xs-5 col-sm-5 col-md-5col-md-5 col-lg-5  col-sm-offset-5 well offset5" >
        <form action="booking.php" method="post"> 
        <label id="first"> Giorno: </label>
        <input type="date" class="form-control" placeholder="Date" name="date"><br></br>
        <label id="first">Orario: </label>
        <input list="time" name="time">  
        <datalist id="time" size="4" multiple>
            <option value="08:30">08:30</option>
            <option value="10:00">10:00</option>
            <option value="12:45">12:45</option>
            <option value="13:30">01:30</option>
            <option value="15:30">03:30</option>
            <option value="18:00">06:00</option>
            <option value="19:30">07:30</option>
            <option value="22:00">10:00</option>
        </datalist>
        <br></br>
    <label id="first">Posti a Sedere: </label></br></br>
    <input type="checkbox" name="seats[]" value="A1"> A1
    <input type="checkbox" name="seats[]" value="A2"> A2
    <input type="checkbox" name="seats[]" value="A3"> A3
    <input type="checkbox" name="seats[]" value="A4"> A4
    <input type="checkbox" name="seats[]" value="A5"> A5
    <input type="checkbox" name="seats[]" value="A6"> A6
    <input type="checkbox" name="seats[]" value="A7"> A7
    <input type="checkbox" name="seats[]" value="A8"> A8
    <input type="checkbox" name="seats[]" value="A9"> A9
    <input type="checkbox" name="seats[]" value="A10">A10</br></br>
    
    <input type="checkbox" name="seats[]" value="B1"> B1
    <input type="checkbox" name="seats[]" value="B2"> B2
    <input type="checkbox" name="seats[]" value="B3"> B3
    <input type="checkbox" name="seats[]" value="B4"> B4
    <input type="checkbox" name="seats[]" value="B5"> B5
    <input type="checkbox" name="seats[]" value="B6"> B6
    <input type="checkbox" name="seats[]" value="B7"> B7
    <input type="checkbox" name="seats[]" value="B8"> B8
    <input type="checkbox" name="seats[]" value="B9"> B9
    <input type="checkbox" name="seats[]" value="B10">B10</br></br>
    
    <input type="checkbox" name="seats[]" value="C1"> C1
    <input type="checkbox" name="seats[]" value="C2"> C2
    <input type="checkbox" name="seats[]" value="C3"> C3
    <input type="checkbox" name="seats[]" value="C4"> C4
    <input type="checkbox" name="seats[]" value="C5"> C5
    <input type="checkbox" name="seats[]" value="C6"> C6
    <input type="checkbox" name="seats[]" value="C7"> C7
    <input type="checkbox" name="seats[]" value="C8"> C8
    <input type="checkbox" name="seats[]" value="C9"> C9
    <input type="checkbox" name="seats[]" value="C10">C10</br></br>

    <input type="checkbox" name="seats[]" value="D1"> D1
    <input type="checkbox" name="seats[]" value="D2"> D2
    <input type="checkbox" name="seats[]" value="D3"> D3
    <input type="checkbox" name="seats[]" value="D4"> D4
    <input type="checkbox" name="seats[]" value="D5"> D5
    <input type="checkbox" name="seats[]" value="D6"> D6
    <input type="checkbox" name="seats[]" value="D7"> D7
    <input type="checkbox" name="seats[]" value="D8"> D8
    <input type="checkbox" name="seats[]" value="D9"> D9
    <input type="checkbox" name="seats[]" value="D10">D10</br></br>
    
    <input type="checkbox" name="seats[]" value="E1"> E1
    <input type="checkbox" name="seats[]" value="E2"> E2
    <input type="checkbox" name="seats[]" value="E3"> E3
    <input type="checkbox" name="seats[]" value="E4"> E4
    <input type="checkbox" name="seats[]" value="E5"> E5
    <input type="checkbox" name="seats[]" value="E7"> E7
    <input type="checkbox" name="seats[]" value="E8"> E8
    <input type="checkbox" name="seats[]" value="E9"> E9
    <input type="checkbox" name="seats[]" value="E10">E10</br></br> 
        
   <button type="submit" name="Submit10" class="btn btn-danger" >Prenota Ora</button>
    </div>
    </td>

    
    
    

    </form>
    <script type="text/javascript" src="nomadland.js"></script>
    <form action="Movies.php">
        <input type="submit" value="Indietro" class="button3"/>
    </form> -->