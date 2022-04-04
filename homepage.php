<html>
    <head>
      <style>
        [class*="col-"] {
        float: left;
        padding: 15px;
      }
      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
      
      @media only screen and (min-width: 600px) {
        /* For tablets: */
        .col-s-1 {width: 8.33%;}
        .col-s-2 {width: 16.66%;}
        .col-s-3 {width: 25%;}
        .col-s-4 {width: 33.33%;}
        .col-s-5 {width: 41.66%;}
        .col-s-6 {width: 50%;}
        .col-s-7 {width: 58.33%;}
        .col-s-8 {width: 66.66%;}
        .col-s-9 {width: 75%;}
        .col-s-10 {width: 83.33%;}
        .col-s-11 {width: 91.66%;}
        .col-s-12 {width: 100%;}
      }
      @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
      }
      </style>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BookEvent</title>
      <link rel="icon" href="https://i.ibb.co/vJ8Hqvp/Webp-net-resizeimage.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link href="./homepage.css" rel="stylesheet"/>
    </head>
<body id="sfondo">
<p id="user"><a href="login.php"><img src="https://svgshare.com/i/X1y.svg" width="40" height="40" title="Login"</a></p>
<div id="myDIV">
  <div class="dropdown2">
    <a href="login.php"><img src="https://svgshare.com/i/X1y.svg" class="dropbtn2"  width="40" height="40" title="Login"></a>
       <div class="dropdown2-content">
        <a href="areautente.php" id="link">Le tue prenotazioni</a>
        <a href="logout.php" id="link">Logout</a>
      </div>
  </div>
 </div>
    <?php
    if(isset($_COOKIE["session"]))
    {
     echo'<script>document.getElementById("myDIV").style.visibility = "visible"</script>';
     echo'<script>document.getElementById("user").style.visibility = "hidden"</script>';
    }
    else{
     echo'<script>document.getElementById("myDIV").style.visibility = "hidden"</script>';
     echo'<script>document.getElementById("user").style.visibility = "visible"</script>';
    }
    ?>  
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
  <br>
    <div id="logo" align="center">
        <img src="./img/logo.png" width="200" height="200"> 
</div>

<div class="col-lg">
  <div id="carouselExampleCaptions" align="center" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active"  id="zoom">
        <a href="Stadio&Teatro/teatro.html"><img src="https://i.ibb.co/BZ9rpfk/teatro.jpg" class="imgs2" width="600px" height="300px"></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Posti disponibili</h5>
          <p>Spettacoli teatrali dal 25 maggio 2021</p>
        </div>
      </div>
      <div class="carousel-item" id="zoom">
        <a href="./Cinema/cinema.php"><img src="https://i.ibb.co/551fJhV/cinema.jpg" class="imgs2" width="600px" height="300px"></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Prenota</h5>
          <p></p>
        </div>
      </div>
      <div class="carousel-item"  id="zoom">
        <a href="./Stadio&Teatro/stadio.html"><img src="https://i.ibb.co/sKw9vDF/stadio.jpg" class="imgs2" width="600px" height="300px"></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Biglietti disponibili</h5>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</div>
  <br>
  <br>
  <h2 style="color: indigo;margin-left:8px">Consigliati in sala</h2>
<div class="container">
  <br>
      <div id="nd">
         <div class="effettosinistra">
             <a href="#"><img src="https://i.ibb.co/0KKckbh/nl.jpg" width="300" height="168" id="imgs"></a>
              <div class="fadedbox">
                  <a href="#"></a>
                    <div class="title text"><a href="nomadland.php" id="link2" style="text-decoration:none">Nomadland </a></div>
              </div>
         </div>
      </div>
  
     <div id="min">
       <div class="effettosinistra">
         <a href="#"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.RN-8klYjIPNTSZxr49jTowHaEK%26pid%3DApi&f=1" width="300" height="168" id="imgs"></a>
           <div class="fadedbox">
               <div class="title text"><a href="minari.php" id="link2" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;Minari</a></div>
           </div>
        </div>
    </div>

           <div id="mk">
              <div class="effettosinistra">
                   <a href="#"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.reelviews.net%2Fresources%2Fimg%2Fmovies%2Fmank-2.jpeg&f=1&nofb=1" width="300" height="168" id="imgs"></a>
                      <div class="fadedbox">
                         <div class="title text"><a href="mank.php" id="link2" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;Mank</a> </div>
                       </div>
               </div>
            </div>
</div>
<div class="container2">
<h2 style="color: indigo;">Eventi Sportivi</h2>
    <br>
      <div id="euro2020">
         <div class="effettosinistra">
             <a href="#"><img src="https://www.giocatoridilanacaprina.it/wp-content/uploads/2021/05/italia-turchia.jpg" width="300" height="168" id="imgs"></a>
              <div class="fadedbox">
                  <a href="#"></a>
                    <div class="title text"><a href="./Stadio&Teatro/stadio.html" id="link2" style="text-decoration:none">&nbsp;Euro 2020</a></div>
              </div>
         </div>
      </div>
  
     <div id="coppaita">
       <div class="effettosinistra">
         <a href="#"><img src="https://www.calcioefinanza.it/wp-content/uploads/2020/06/Trofeo-Coppa-Italia-Coca-Cola.jpg" width="300" height="168" id="imgs"></a>
           <div class="fadedbox">
               <div class="title text"><a href="#" id="link2" style="text-decoration:none">Coppa Italia</a></div>
           </div>
        </div>
    </div>
</div>
<div class="container5">
<h2 style="color: indigo;">Spettacoli Teatrali</h2>
    <br>
      <div id="euro2020">
         <div class="effettosinistra">
             <a href="#"><img src="https://dangerofmusic.com/wp-content/uploads/2020/02/queen.jpg" width="300" height="168" id="imgs"></a>
              <div class="fadedbox">
                  <a href="#"></a>
                    <div class="title text"><a href="./Stadio&Teatro/teatro.html" id="link2" style="text-decoration:none">&nbsp;&nbsp;&nbsp;Queen</a></div>
              </div>
         </div>
      </div>
  </div>
      <div class="footer2">
        <table>
        <td><a href="#"><img src="./img/instagram.svg" height="40px" width="40px" id="social"></a></td>
        <td><a href="#"><img src="./img/fb2.svg" height="40px" width="40px" id="social"></a></td>
        <td><a href="#"><img src="./img/twitter.svg" height="40px" width="40px" id="social"></a></td>
        </tr>
        </table>
       </div>
</body>
</html>
