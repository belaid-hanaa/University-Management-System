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
          <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="./images/slide1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="./images/slide2.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="./images/slide3.jpg" style="width:100%">
  <div class="text"></div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>
<br>
            <section id="content3" class="hide" style="display: none;">
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
    <section id="content2" class="hide" style="display: none;">
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
            <div id="content"></div>
                <div class="cover">
                    <img src="./images/fstt.jpg" alt="">
                </div>
                <div class="main_details">
                    <div class="c_title">
                    <h2>Faculte Des sciences et techniques</h2>
                </div>
            </div>
            <div class="description">
            <h5>Description</h5>
            <div class="des_para">
            <p>Créée en 1995, la FST de Tanger est un des dix huit établissements de l’Université Abdelmalek Essaâdi. Elle regroupe actuellement une trentaine de programmes d'études repartis sur quatre cycles offerts par neuf départements : Sciences de la Vie, Sciences de la Terre, Génie Chimique, Physique, Mathématiques, Génie Informatique, Génie Electrique et Génie Mécanique et de Langues.</p>
            </div>
            </div>
            <br><br>
<!-- <--------------fst en chiffre-------------->
    <table id="fstt-table">
  <thead>
    <tr>
      <th>FSTT en chiffres</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <span class="text1">Étudiants</span>
        <span class="number">4200</span>
      </td>
      <td>
        <span class="text1">Personnels Administratifs</span>
        <span class="number">65</span>
      </td>
      <td>
        <span class="text1">Formations Initiales</span>
        <span class="number">37</span>
      </td>
      <td>
        <span class="text1">Nationalités</span>
        <span class="number">34</span>
      </td>
    </tr>
    
    <tr>
      <td>
        <span class="text1">Lauréats</span>
        <span class="number">1080</span>
      </td>
      <td>
        <span class="text1">Formations Continues</span>
        <span class="number">12</span>
      </td>
      <td>
        <span class="text1">Ingénieurs d'État Diplomés</span>
        <span class="number">1515</span>
      </td>
      <td>
        <span class="text1">Enseignants Chercheurs</span>
        <span class="number">200</span>
      </td>
    </tr>
    
      
    </tr>
  </tbody>
</table>
<br><br>
<div class="main-section about-us">
   <img src="./images/doyen.jpeg" >
   <div>
      <h2 class="heading">Mot du Doyen</h2>
      <p> Le monde d’aujourd’hui connait des évolutions majeures et complexes caractérisées par la globalisation des échanges et l’intensification de la concurrence. </p>
      <span id="points">...</span><span id="moreText" style="display: none;"> Le Maroc n’échappe pas à cette tendance. Il est confronté à des enjeux de développement et de croissance basés essentiellement sur le capital humain. D’où la nécessité, pour le Maroc, de se doter d’un système d’éducation et de formation performant productif de savoir et innovateur afin de produire des compétences et des profils qualifiés, une jeunesse en mesure de répondre au besoin du marché et de prendre en charge tant les entreprises des divers secteurs de l’économie que les organismes investis de missions de service public, de même que les chercheurs et les intellectuels indispensables au développement d’une société du savoir et d’économie.
        </span>
        <button onclick="toggleText()" id="textButton">plus</button>
   </div>
</div>
        </div>
        
   
        <!-- Sidebar Reviews Section Actualite -->
        <div class="sidebar">
            <div class="row">
                <h2>Actualites</h2>
            </div>
            @foreach($homePageAnnouncements as $announcement)
    <div class="review">
        <div class="details">
            <div class="logo">
                <img src="./images/fsttt.png" alt="">
            </div>
            <div class="title">
                <h2>{{ $announcement->titre}}</h2>
                <span></span>
            </div>
        </div>
        <div class="review_post">
            <p>{{ $announcement->Contenu }}</p>
        </div>
    </div>
@endforeach
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
          
      <a class="footer__btn" href="mailto:administration.fstt@uae.ac.ma">Email Us</a>
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

    