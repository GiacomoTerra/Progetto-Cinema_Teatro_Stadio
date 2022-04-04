<html>
<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <link rel="icon" href="https://i.ibb.co/vJ8Hqvp/Webp-net-resizeimage.png"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link href="homepage.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" lang="javascript" src="../js/bootstrap.min.js">
    </script>
    <script type="text/javascript" lang="javascript" src="./loginScript.js">
    </script>
    </head>
<body>
<div class="container4">
<div class="pippo">
    <a href="homepage.php" id="link5">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Biglietti 
      </button>
      <div class="dropdown-content">
      <a href="./Stadio&Teatro/stadio.html" id="link">Calcio</a>
        <a href="Stadio&Teatro/teatro.html" id="link">Teatro</a>
        <a href="./Cinema/cinema.php" id="link">Cinema</a>
      </div>
    </div>
    <a href="./stadio/registrazione.html" id="link5">Registrati</a>
  </div>
  </div>
</div>
<br>
<br>
<form action="login.php" class="form-signin"
         method="POST" name="myForm" >
        <div align="center" id="logologin">
                <img src="./img/logo.png" width="200" height="200">
</div>
         <table border="0" align="center">
         <tr>
         <td><input type="email" name="inputEmail" class="form-control" placeholder="Email" required autofocus/></td>
</tr>
<tr>
         <td><input type="password" id="password" name="inputPassword" class="form-control" placeholder="Password" required/></td>
         <td><a href="#" onclick="javascript:showPwd()"><img id="eye" src="./img/eye.png" width="25" height="25"></a></td>
</tr>
<tr>
         <td><input type="checkbox" id="check" name="check"/>
         <label class="form-check-label" id="check"> Ricordami</label></td>
</tr>
<td><br></td> 
            <tr>
           <td><a href="Welcome.php"><button id="button" class="btn btn-lg btn-primary btn-block" name="loginButton" type="submit">Login</button></a></td>
           </tr>
           <tr> 
               <td><p id="demo2"></p></td>
           </tr>
           </table>
<script>
      function showPwd() {
        var input = document.getElementById('password');
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      }
</script>
        </form>

<?php
 $dbconn=pg_connect("host=localhost port=5432
 dbname=stadio user=postgres password= ")
 or die('Could not connect'.pg_last_error());

 if(isset($_COOKIE["session"]))
{
 header("location:areautente.php");
}
 if((isset($_POST['loginButton']))){
    

    $email=$_POST['inputEmail'];
    $q1="select * from utente where email =$1";
    $result=pg_query_params($dbconn,$q1,array($email));

    echo "<script>controllo_cookie()</script>";
     
    if(!($line=pg_fetch_array($result,null,PGSQL_ASSOC))){
        $jassi = '<script>document.getElementById("demo2").innerHTML=
         "Non sei registrato " +"<a href=./stadio/registrazione.html style=text-decoration:none>Registrati</a>" </script>';
        echo $jassi;
    }
   else{
    $password=hash('sha512',$_POST['inputPassword']);
    $q2="select * from utente where email=$1 and password=$2 ";
    $result=pg_query_params($dbconn,$q2,array($email,$password));
    if(!($line=pg_fetch_array($result,null,PGSQL_ASSOC))){
        $jassi = "<script>document.getElementById('demo2').innerHTML='Password  sbagliata';</script>";
        echo $jassi;
       
        
    }
    else{
      if(isset($_POST["check"]))
      {
        $time_cookie=3600*24*7;
        setcookie("session",$email,time()+$time_cookie);
      }
      else{
        $time_cookie=3600;
        setcookie("session",$email, time()+$time_cookie);
      }
        header("location:/areautente.php");

        
    }

   }

 }
?>
</body>
</html>