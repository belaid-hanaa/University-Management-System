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
            <section id="content3" class="hide" >
                <h>Formation Initiale </h>
        <div class="flex-container">
            <div>DEUST</div>
            <div>LST</div>
            <div>MST</div>
            <div>DI</div>
        </div>
    <p>
    La FST de Tanger a pour mission de dispenser l’enseignement supérieur en formation initiale et en formation continue et de mener tous les travaux de recherche dans les champs disciplinaires relevant notamment des Sciences et Techniques et des sciences de l’ingénieur.
    </p>
    <p> Dans le cadre de  la réforme pédagogique, la FST de Tanger a adopté l’architecture du système  LMD : Licence / Master / Doctorat. Elle prépare et délivre les diplômes:</p>
    <p>
        <span>DEUST</span> Diplôme d’Etudes Universitaire en Sciences et Technique <br> <br>
        <span>LST</span> Licence sciences et Techniques <br> <br>
        <span>MST</span> Master  Sciences et Techniques <br> <br>
        <span>DI</span> Diplôme d’Ingénieurs d’État<br> <br>
        Doctorat en Sciences et Techniques
        En parallèle à ces diplômes la FST est également habilitée à délivrer :
        DUT : Diplôme Universitaire de Technologie
    </p>
    <h>Formation Continue </h>
        <div class="flex-container">
            <div>D.C.E.S.S</div>
            <div>D.C.A</div>
        </div>
    <p>
        <span>D.C.E.S.S</span> Diplôme du Cycle d’Approfondissement (DCA): (Bac+3) : S’adresse aux techniciens spécialisés d’entreprises et aux titulaires d’un DEUG, d’un DUT, d’un BTS ou d’un diplôme reconnu équivalent (Bac+2). Cette formation permet aux sortants de s’intégrer rapidement dans le monde professionnel ou de s’adapter à de nouvelles fonctions au sein de l’entreprise.Le DCA se prépare en une année. <br><br>
        <span>D.C.A</span> Diplôme du Cycle des Etudes Supérieures Spécialisées (DCESS) : (Bac+5) : S’adresse aux diplômés de (Bac+3) en situation d’activité ou non. Le dispositif mis en place a pour objectif   la création des conditions d’insertion, d’une réinsertion ou une adaptation à de nouvelles fonctions dans l’entreprise. Ce diplôme se prépare en quatre semestres (2 années).
    </p>
    </section>
    </div>
</div>
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

    