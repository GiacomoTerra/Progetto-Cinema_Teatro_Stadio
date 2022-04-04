
<!DOCTYPE html>
<html>
    <head>
        <title>Cinema</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="Vue/vue.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar" style="background-color: #b40d0d; color: white;">
    <a href="../homepage.php" id="link2"class="h1"><h3>BookEvent</h3></a>
    </nav>
    <form action="bookingN.php" method="post">

        <div align="center" class="container-fluid" style="margin-top: 15px;">
                <div class="col col-lg-"> 
                    <div class=" well offset5">
                    <label id="first">Film</label>
                    <input list="film" id="lista" name="film"/ required>  
                            <datalist id="film" name="film" size="4" multiple>
                                <option value="Nomadland"></option>
                                <option value="Minari"></option>
                                <option value="Mank"></option>
                            </datalist>
                            <br>
                            <label id="first"> Giorno: </label>
                            <input type="date" class="form-control" placeholder="Date" name="date" required /><br></br>
                            <label id="first">Orario: </label>
                            <input list="time" id="lista" name="time"/ required>  
                            <datalist id="time" name="time" size="4" multiple>
                                <option value="08:30">08:30</option>
                                <option value="10:00">10:00</option>
                                <option value="12:45">12:45</option>
                                <option value="13:30">13:30</option>
                                <option value="15:30">15:30</option>
                                <option value="18:00">18:00</option>
                                <option value="19:30">19:30</option>
                                <option value="22:00">22:00</option>
                            </datalist>

                            <br></br>
                            <label id="first">Posti a Sedere: </label></br></br>
                            <input type="checkbox" name="seats[]" value="A1"> A1&nbsp;
                            <input type="checkbox" name="seats[]" value="A2"> A2&nbsp;
                            <input type="checkbox" name="seats[]" value="A3"> A3&nbsp;
                            <input type="checkbox" name="seats[]" value="A4"> A4&nbsp;
                            <input type="checkbox" name="seats[]" value="A5"> A5&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="seats[]" value="A6"> A6&nbsp;
                            <input type="checkbox" name="seats[]" value="A7"> A7&nbsp;
                            <input type="checkbox" name="seats[]" value="A8"> A8&nbsp;
                            <input type="checkbox" name="seats[]" value="A9"> A9&nbsp;
                            <input type="checkbox" name="seats[]" value="A10">&nbspA10</br></br>
                            
                            <input type="checkbox" name="seats[]" value="B1"> B1&nbsp;
                            <input type="checkbox" name="seats[]" value="B2"> B2&nbsp;
                            <input type="checkbox" name="seats[]" value="B3"> B3&nbsp;
                            <input type="checkbox" name="seats[]" value="B4"> B4&nbsp;
                            <input type="checkbox" name="seats[]" value="B5"> B5&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="seats[]" value="B6"> B6&nbsp;
                            <input type="checkbox" name="seats[]" value="B7"> B7&nbsp;
                            <input type="checkbox" name="seats[]" value="B8"> B8&nbsp;
                            <input type="checkbox" name="seats[]" value="B9"> B9&nbsp;
                            <input type="checkbox" name="seats[]" value="B10">&nbspB10</br></br>
                            
                            <input type="checkbox" name="seats[]" value="C1"> C1&nbsp;
                            <input type="checkbox" name="seats[]" value="C2"> C2&nbsp;
                            <input type="checkbox" name="seats[]" value="C3"> C3&nbsp;
                            <input type="checkbox" name="seats[]" value="C4"> C4&nbsp;
                            <input type="checkbox" name="seats[]" value="C5"> C5&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="seats[]" value="C6"> C6&nbsp;
                            <input type="checkbox" name="seats[]" value="C7"> C7&nbsp;
                            <input type="checkbox" name="seats[]" value="C8"> C8&nbsp;
                            <input type="checkbox" name="seats[]" value="C9"> C9&nbsp;
                            <input type="checkbox" name="seats[]" value="C10">&nbspC10</br></br>
                        
                            <input type="checkbox" name="seats[]" value="D1"> D1&nbsp;
                            <input type="checkbox" name="seats[]" value="D2"> D2&nbsp;
                            <input type="checkbox" name="seats[]" value="D3"> D3&nbsp;
                            <input type="checkbox" name="seats[]" value="D4"> D4&nbsp;
                            <input type="checkbox" name="seats[]" value="D5"> D5&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="seats[]" value="D6"> D6&nbsp;
                            <input type="checkbox" name="seats[]" value="D7"> D7&nbsp;
                            <input type="checkbox" name="seats[]" value="D8"> D8&nbsp;
                            <input type="checkbox" name="seats[]" value="D9"> D9&nbsp;
                            <input type="checkbox" name="seats[]" value="D10">&nbspD10</br></br>
                            
                            <input type="checkbox" name="seats[]" value="E1"> E1&nbsp;
                            <input type="checkbox" name="seats[]" value="E2"> E2&nbsp;
                            <input type="checkbox" name="seats[]" value="E3"> E3&nbsp;
                            <input type="checkbox" name="seats[]" value="E4"> E4&nbsp;
                            <input type="checkbox" name="seats[]" value="E5"> E5&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="seats[]" value="E7"> E6&nbsp;
                            <input type="checkbox" name="seats[]" value="E7"> E7&nbsp;
                            <input type="checkbox" name="seats[]" value="E8"> E8&nbsp;
                            <input type="checkbox" name="seats[]" value="E9"> E9&nbsp;
                            <input type="checkbox" name="seats[]" value="E10">&nbspE10</br></br> 
                                
                                <button type="submit" name="Submit10" id="bottone" >Prenota</button>
                    </div>
</div>
</div>
</form>
        </body>
</html>
