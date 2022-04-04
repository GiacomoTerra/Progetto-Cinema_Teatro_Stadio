<?php

if(!isset($_COOKIE["session"]))
{
 header("location:login.php");
}
?>
<html>
    <body>
    <head>
    <title>Area Utente</title>
    <link rel="icon" href="https://i.ibb.co/vJ8Hqvp/Webp-net-resizeimage.png"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <style>
   @media screen and (max-width: 660px) {
      #logou {
        left:330px;
      }
    }

      table { border-collapse: separate; }
tr:first-child td:first-child { border-top-left-radius: 10px; }
tr:first-child td:last-child { border-top-right-radius: 10px; }
tr:last-child td:first-child { border-bottom-left-radius: 10px; }
tr:last-child td:last-child { border-bottom-right-radius: 10px; }
       #delete {
        background-color:white;
        color: black;
        cursor: pointer;
        font-size: 18px;
         padding: 8px 25px; 
         margin: 0px -5px;
         border-radius: 30px;
         border: 1px ;
       }
       #delete:hover {
         background-color:#b40d0d;
         color: white;
       }
       
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  position: relative;
  top:-2px;
  font-size:18px;
}

#customers td, #customers th {
  padding: 5px;
}
#titolo{
  font-size:40px;
}
#customers td {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color:#4CAF50;
  color: white;
}
#customers2 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  position: relative;
  top:-2px;
  font-size:18px;
}

#customers2 td, #customers2 th {
  padding: 5px;
}

#customers2 td {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color:#005073;
  color: white;
}
#customers3 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  position: relative;
  top:-2px;
  font-size:18px;
}

#customers3 td, #customers3 th {
  padding: 5px;
}

#customers3 td {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color:#F63D07;
  color: white;
}
</style>
    <link href="homepage.css" rel="stylesheet"/>
    </head>
<div class="container6">
  <div class="pippo">
    <a href="homepage.php" id="link5">Home</a>
    <div class="dropdown">
      <button class="dropbtn">Prenota
      </button>
      <div class="dropdown-content">
        <a href="./Stadio&Teatro/stadioRec.php" id="link">Calcio</a>
        <a href="./Stadio&Teatro/teatroRec.php" id="link">Teatro</a>
        <a href="./Cinema/cinema.php" id="link">Cinema</a>
      </div>
    </div>
    <div id="logou">
    <a href="logout.php" id="link5">Logout</a>
    </div>
    
  </div>
  </div>
  <br>
    <div id="logo" align="center">
        <img src="./img/logo.png" width="200" height="200">  
</div>
<?php
error_reporting(0);
$email=$_COOKIE['session'];
$dbconn=pg_connect("host=localhost port=5432
dbname=stadio user=postgres password= ")
or die('Could not connect'.pg_last_error());
$query2="SELECT nome,cognome,idpersona FROM utente where email='$email'";
$result1=pg_query($query2) or die('query failed'.pg_last_error());
$myrow = pg_fetch_assoc($result1); 
$codpersona=$myrow["idpersona"];
$query="SELECT settore,posto,idposti FROM posti WHERE codpersona='$codpersona'";
$result=pg_query($query) or die('query failed'.pg_last_error());

$i = 0;
echo "<table id=customers>\n";
echo "<h2 style=color:#b40d0d> Calcio</h2>";
echo"<tr class=border_bottom>";
while ($i < pg_num_fields($result)-1)
{
	$fieldName = pg_field_name($result, $i);
	echo '<td>' . strtoupper($fieldName) . '</td>';
	$i = $i + 1;
}
echo"<td>BIGLIETTO</td>";
echo '<td>CANCELLA</td>';
echo '</tr>';



$nome = $myrow["nome"];
$cognome = $myrow["cognome"];


while($row=pg_fetch_assoc($result))
{
  
  echo"<form method=post>";
 
    echo "<tr>";
    echo"<td>$row[settore]</td>";
    echo"<td>$row[posto]</td>";
    echo"<td><a href=../$cognome-$row[posto]-$row[settore]-biglietto.pdf id=link3>Biglietto</a></td>";
    echo "<td><button type=submit name=cancella id=delete value=$row[idposti]>Elimina</button></td>";
    echo "</tr>";
    
}
echo "</table>";
echo "</form>";
if(isset($_POST['cancella']))
    {
            $delete_id = $_POST[cancella];
            $id = count(array($delete_id ));
            if (count(array($id)) > 0)
             {
                foreach (array($delete_id) as $id_d)
                {
                   $sql ="DELETE FROM posti WHERE idposti='$id_d'";
                   $delete = pg_query($sql);
               }
           }
           header('Location:'.$_SERVER['REQUEST_URI']);
     } 
echo"<br>";
echo"<br>";
//seconda tabella
$query="SELECT seats,cinemaid,date,time FROM posticinema WHERE codpersona='$codpersona'";
$result=pg_query($query) or die('query failed'.pg_last_error());
$myrow9 = pg_fetch_assoc($result);
$i = 0;
echo "<table id=customers2>\n";
echo "<h2 style=color:#b40d0d>Cinema</h2>";
echo"<tr class=border_bottom>";

echo"<td>POSTO</td>";
echo"<td>BIGLIETTO</td>";
echo '<td>CANCELLA</td>';
echo '</tr>';



$nome = $myrow["nome"];
$cognome = $myrow["cognome"];
$cinemaid=$myrow9["cinemaid"];
while($row=pg_fetch_assoc($result))
{
  echo"<form method=post>";
  $posti=array($row['seats']);
    echo "<tr>";
    echo"<td>$row[seats]</td>";
    echo"<td><a href=../$cognome-$row[date]-$nome-biglietto.pdf id=link3>Biglietto</a></td>";
    echo "<td><button type=submit name=cancella id=delete value=$row[cinemaid]>Elimina</button></td>";
    echo "</tr>";
    
}
echo "</table>";
echo "</form>";
if(isset($_POST['cancella']))
    {
            $delete_id = $_POST[cancella];
            $id = count(array($delete_id ));
            if (count(array($id)) > 0)
             {
                foreach (array($delete_id) as $id_d)
                {
                   $sql ="DELETE FROM posticinema WHERE cinemaid='$id_d'";
                   $delete = pg_query($sql);
               }
           }
           header('Location:'.$_SERVER['REQUEST_URI']);
     } 
     echo"<br>";
     echo"<br>";
     //terza tabella
     $query="SELECT posto,idpostit FROM postit WHERE codpersona='$codpersona'";
     $result=pg_query($query) or die('query failed'.pg_last_error());
     
     $i = 0;
     echo "<table id=customers3>\n";
     echo "<h2 style=color:#b40d0d>Teatro</h2>";
     echo"<tr class=border_bottom>";
     
     echo"<td>POSTO</td>";
     echo"<td>BIGLIETTO</td>";
     echo '<td>CANCELLA</td>';
     echo '</tr>';
     
     
     
     $nome = $myrow["nome"];
     $cognome = $myrow["cognome"];
     
     
     while($row=pg_fetch_assoc($result))
     {
       echo"<form method=post>";
      
         echo "<tr>";
         echo"<td>$row[posto]</td>";
         echo"<td><a href=../$cognome-$row[posto]-biglietto.pdf id=link3>Biglietto</a></td>";
         echo "<td><button type=submit name=cancella id=delete value=$row[idpostit]>Elimina</button></td>";
         echo "</tr>";
         
     }
     echo "</table>";
     echo "</form>";
     if(isset($_POST['cancella']))
         {
                 $delete_id = $_POST[cancella];
                 $id = count(array($delete_id ));
                 if (count(array($id)) > 0)
                  {
                     foreach (array($delete_id) as $id_d)
                     {
                        $sql ="DELETE FROM postit WHERE idpostit='$id_d'";
                        $delete = pg_query($sql);
                    }
                }
                header('Location:'.$_SERVER['REQUEST_URI']);
          } 
pg_free_result($result);
pg_close($dbconn);
?>
<br>
</body>
</html>
