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
    
    <div align= "center">
        <?php
              use PHPMailer\PHPMailer\PHPMailer;
              use PHPMailer\PHPMailer\Exception;
              require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\Exception.php';
              require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\PHPMailer.php';
              require 'C:\Users\loren\vendor\phpmailer\phpmailer\src\SMTP.php';
             if((isset($_COOKIE["session"])))
             {
            $email=$_COOKIE['session'];
            $dbconn = pg_connect("host=localhost port=5432 dbname=stadio user=postgres password= ") or die("Could not connect".pg_last_error());
            
            $q1="SELECT nome,cognome,idpersona FROM utente WHERE email='$email'";
            $res = pg_query($q1) or die("Query failed".pg_last_error());
            $myrow = pg_fetch_assoc($res); 
            $codpersona=$myrow["idpersona"];
            $nome=$myrow["nome"];
            $cognome=$myrow["cognome"];
            $q3 = "select * from posti where settore =$1 and posto = $2";
            $posto= $_POST['posto'];
            $settore= $_POST['settore'];
            $res3 = pg_query_params($dbconn, $q3, array($settore, $posto)) or die("Query failed".pg_last_error());
            if ($line=pg_fetch_array($res3,null,PGSQL_ASSOC)) {
                echo   "<div align = center>
                            <h1>Prenotazione fallita</h1>
                            <h2> Posti non disponibili<h2>
                            <br>
                            <a role= button href=./stadioRec.php align= center>
                                <img class= result src = ./img/failure.png alt= Clicca qui per tornare indietro/>
                            </a>  
                        </div>";
            } else {
                //cartella upload
                $upload_vax_dir ='C:\Users\loren\OneDrive\Desktop\UNI\Linguaggi e Tecnologie\progetto\stadio\db\vax\.';
                $vax_tmp = $_FILES['vax']['tmp_name'];
                $vax_name = $_FILES['vax']['name'];
                $filename = "$nome _ $cognome _ $settore _ $posto _ $vax_name";
                if(move_uploaded_file($vax_tmp,$upload_vax_dir.$filename)) {
                $query8="SELECT nome,cognome,idpersona FROM utente where email='$email'";
                $posto= $_POST['posto'];
                $settore= $_POST['settore'];
                $result8=pg_query($query8) or die('query failed'.pg_last_error());
                $myrow8 = pg_fetch_assoc($result8); 
                $codpersona = $myrow8["idpersona"];
                $q2="insert into posti (settore,posto,codpersona) values ('$settore','$posto','$codpersona')";
                $data=pg_query($q2);
                $q3="update utente set vaccino=true where idpersona='$codpersona'";
                pg_query($q3);
                 $nome = $myrow8["nome"];
                 $cognome = $myrow8["cognome"];
                
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
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(20,10,'Nome: '.$nome,0,0);
    $pdf->Cell(20,10,'',0,1);
    $pdf->Cell(20,10,'Cognome: '.$cognome,0,0);
    $pdf->Cell(20,10,'',0,1);
    $pdf->Cell(20,10,'Posto: '.$posto,0,1);
    $pdf->Cell(20,10,'Settore: '.$settore,0,1);
    $pdf->Cell(20,10,'',0,1);
    $image1 ="https://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=$posto-$settore-$cognome-$codpersona";
    $pdf->Image($image1,50,50,100,100,'png');
    $pdf->Output("../$cognome-$posto-$settore-biglietto.pdf",'F');
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
    $mail->Subject = "Prenotazione per l'evento Euro 2020";
    $content = "<b>Gentile $nome $cognome ecco in allegato la sua prenotazione.</b>";
    $mail->AddStringAttachment($pdf_file, 'prenotazione.pdf', 'base64', 'application/pdf');
    $mail->MsgHTML($content); 
    echo"<div style=display:none>";
    $mail->Send();
    echo"</div>";
                }
                else {
                    echo   'Caricamento attestato vaccinazione invalido';
                    echo   "<div align = center>
                                <h1>Prenotazione fallita</h1>
                                <br>
                                <a role= button href=./stadio.html align= center>
                                    <img class= result src = ./img/failure.png alt= Clicca qui per tornare indietro/>
                                </a>  
                            </div>";
                }
                }
            }
        else{
            header("location:../homepage.php");
        }
            pg_free_result($res);
            pg_close($dbconn);

        ?>
    </div>
</body>
</html>