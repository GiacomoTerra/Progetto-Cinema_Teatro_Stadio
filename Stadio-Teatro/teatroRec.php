<?php
if(!(isset($_COOKIE["session"])))
{
 header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BookEvent - Prenotazione</title>
    <meta name="viewport" content="width=device-width">   
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" /> 
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <script type="text/javascript" src="./posti.js"></script>
    <script type="text/javascript" src="./jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="Vue/vue.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleTeatro.css" />
    <style>
        .h1, .h2, .h3, h1, h2, h3 {
  font-family: Arial, Helvetica, sans-serif;
  margin-top: 7px;
  font-size: 24px;
  margin-left: 1px;
}
  </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar" style="background-color: #b40d0d; color: white;">
    <h3><a href="../homepage.php" id="link">BookEvent</a></h3>
    </nav>

    <div class="container-fluid">
        <div class= "rounded-9 shadow-lg" role= "dialog" align= "center">
            <hr>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" id="p">
                    <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                </svg>
                <p>La prenotazione è abilitata per un singolo posto alla volta per garantire la corretta affiliazione tra attestato di avvenuta vaccinazione e detentore del posto prenotato</p>
            <hr>
        </div>

        <div class="container-fluid rounded-3">
            <div class="row justify-content-md-center">
                <div class="col col-lg-12 container-fluid rounded-3 shadow-lg">
                    <div class="container-fluid" style="border-radius: 5px;"> 
                        <div class="row row justify-content-md-center">                       
                            <div id="app" style="padding: 15px;">   
                                <h1 class="text-center">{{product}}</h1>
                                <hr>
                                <p>{{description}}</p>
                                <img v-bind:src= "image" class="img-thumbnail" style="width: 200px;" alt="locandina"/>
                                <hr>
                                <p><b>Prezzo biglietto: </b>€{{price}}</p>
                                <p><b>Data: </b>{{data}}</p>
                                <p><b>Orario: </b>{{time}}</p>
                                <hr>
                                <script type="text/javascript" src="teatro.js"></script>
                            </div>
                        </div>                    
                    </div> 
                
                    <div class=" well offset5">
                        <form action="bookTeatro2.php" method="post">
                            
                            <div class="col-12">
                                <label class="form-label">Posto</label>
                                <input name="posto" id="sit" type="text" class="form-control" readonly value="" required>
                            </div>
    
                            
                            <div id= "zonaDinamica2" class="col-12 container-fluid" style="position: relative; overflow-x:auto;">
                            <div class="col-12" id="posti"> </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                        aria-describedby="invalidCheckFeedback" required>
                                    <label class="form-check-label" for="invalidCheck3">
                                        Accetto i tutti i termini e le condizioni
                                    </label>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <button name = "btn" class="btn"  id="bottone" type="submit">Prenota</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        <br>
    </div>

</body>

</html>