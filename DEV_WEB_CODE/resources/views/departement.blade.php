<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FSTT</title>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="icon" href="./images/fsttt.png">

        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>
    <body>
        <header class="header">
            <div class="header_logo">
            <a href="{{ url('/') }}" onclick="untoggleall()">
                <img class="header_logo" src="./images/fsttlogo.png" alt="">
            </a>            </div>
            <div class="menu_list">
            <a href="{{ url('/formation') }}" onclick="toggleDiv('content3')">Formation</a>
                <a href="{{ url('/departement') }}" onclick="toggleDiv('content2')">Departement</a>
            </div>
            <div class="header_profile">
                <div class="profile">
                    <a href="{{ url('/login') }}">Login</a>
                </div>
            </div>
    </header>
    
    <!-- Main Body Section -->
    <div class="main_body">
        <div class="container">
            
    <section id="content2" class="hide" ">
        <div class="titre">
            <h1>Departement</h1>
        </div>
        <div class="grid">
            <div class="card">
                <h2>GÉNIE INFORMATIQUE</h2>
                <p>Chef : Pr.BOUHORMA MOHAMMED <br>Email : mbouhorma@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>GÉNIE CHIMIQUE</h2>
                <p>Chef : Pr.CHOUAIBI NOUR EDDINE <br>Email : n.chouaibi@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>SCIENCES DE LA TERRE</h2>
                <p>Chef : Pr.ABDELHAMID ROSSI<br>
                    Email : arossi@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>GÉNIE MÉCANIQUE</h2>
                <p>Chef : Pr.EL FELSOUFI ZOUBIR <br>
                    Email : zelfelsoufi@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>SCIENCES DE LA VIE</h2>
                <p>Chef : Pr. BENNANI MECHITA MOHCINE <br>
                    Email : mbennani@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>GÉNIE ELECTRIQUE</h2>
                <p>Chef : Pr.AZMANI MONIR <br>
                    Email : m.azmani@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>TEC</h2>
                <p>Chef : Pr.OUCHEN MOHAMED<br> Email : mouchen@uae.ac.ma</p>
            </div>
            <div class="card">
                <h2>PHYSIQUE</h2>
                <p>Chef : Pr.EL METOUI MUSTAPHA<br> Email : melmetoui@uae.ac.ma
                </p>
            </div>
            <div class="card">
                <h2>MATHÉMATIQUES
                </h2>
                <p>Chef : Pr.BEL HADJ HASSAN <br>
                    Email : hbelhadj@uae.ac.ma</p>
            </div>
        </div>
    </section>
            
            </div>
<!-- <--------------fst en chiffre--------------> 
   
        </div>
        
   
        <!-- Sidebar Reviews Section Actualite -->
        
    <script src="{{ asset('js/home.js')}}"></script>
    </body>
    <!-- <------------------footer------------------->
    <footer class="footer">
  <div class="footer__addr">
    <h1 class="footer__logo">Facute des Sciences et Techniques</h1>
        
    <h2>Contact</h2>
    
    <address>
    + 212 (0) 5 39 39 39 54 / 55<br>
          
      <a class="footer__btn" href="administration.fstt@uae.ac.ma">Email Us</a>
    </address>
  </div>
  
  <ul class="footer__nav">
    <li class="nav__item">
      <h2 class="nav__title">Media</h2>

      <ul class="nav__ul">
        <li>
          <a href="https://www.facebook.com/fstt.ac.ma?mibextid=LQQJ4d">Facebook</a>
        </li>

        <li>
          <a href="https://www.linkedin.com/school/fsttanger/">LinkedIn</a>
        </li>
            
        <li>
          <a href="https://www.instagram.com/fsttanger?igshid=Mzc1MmZhNjY%3D">Instagram</a>
        </li>
      </ul>
    </li>
    
    <li class="nav__item nav__item--extra">
      <h2 class="nav__title">Localisation</h2>

      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3238.6033039744243!2d-5.896169462233175!3d35.73597354075241!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b87d71f995045%3A0xc35a87c33b565280!2sFaculty%20of%20Sciences%20and%20Technologies%20Tangier!5e0!3m2!1sen!2sma!4v1706022193406!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </li>
    
    <li class="nav__item">
      <h2 class="nav__title">Liens Utiles</h2>
      
      <ul class="nav__ul">
        <li>
          <a href="https://www.uae.ma/website/">Site de l'Université</a>
        </li>
        
        <li>
          <a href="https://www.enssup.gov.ma/en">Enseignement Superieur</a>
        </li>
        
        <li>
          <a href="https://jamiati.ma/fr">Portail des Universités marocaines</a>
        </li>
      </ul>
    </li>
  </ul>
  
  <!-- <div class="legal">
    <p>&copy; 2019 Something. All rights reserved.</p>
    
    <div class="legal__links">
      <span>Made with <span class="heart">♥</span> remotely from Anywhere</span>
    </div> -->
  </div>
</footer>
</html>

    