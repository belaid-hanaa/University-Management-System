<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard chefDep</title>
  <link rel="stylesheet" href="{{asset ('css/dashboards/etudiant.css')}}" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="icon" href="./images/fsttt.png">

</head>
<body>
  <div class="container">
    <nav>
      <div class="navbar">
        <div class="logo">
          <h1><a href="{{ url('/profile') }}">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h1></a>
            <span></span></h1>
        </div>
        <ul>
          <li><a href="#">
            <i class="fas fa-user"></i>
            <span class="nav-item" onclick="untoggleall()">Dashboard</span>
          </a>
          </li>
          <li><a href="#">
            <i class="fa fa-calendar"></i>
            <span class="nav-item" onclick="toggleDiv('emploi')">Emploi</span>
          </a>
          </li>
          <li><a href="#">
            <i class="fa fa-bullhorn"></i>
            <span class="nav-item" onclick="toggleDiv('annonces')">Cree Annonce</span>
          </a>
          </li>
          
          <li><a href="{{ url('/') }}" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Logout</span>
          </a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="main">
      <div class="main-top">
        
        <p>Bienvenu, Chef Departement</p>
      </div>
<div class="main-body">
<!-- Annonces-->
<div id="annonces" class="annonces" style="display: none;">
<form action="{{ route('chef-departement.addAnnouncement') }}" method="POST">
@csrf
<label for="titre">Titre :</label>
  <input type="text" id="titre" name="titre" placeholder="Entrez le titre de l'annonce...">
  <label for="message">Votre Annonce :</label>

  <textarea id="message" name="message" placeholder="Entrez votre annonce..." rows="4"></textarea>
  <label for="typeRencontre">Emplacemenet annonce :</label>
  <div class="type-rencontre">
<label for="homepage">Page d'accueil</label>
  <input type="radio" id="homepage" name="type" value="Homepage" checked>
  <label for="StudentDashboard">Etudiants</label>
  <input type="radio" id="StudentDashboard" name="type" value="StudentDashboard" >

  </div>
  <button type="submit">Envoyer</button>
</form>
</div>

<!-- --------------------------Emploi-du-temps--------------------------- -->
<form method="POST" action="{{ route('chef-departement.make-reservation') }}">
@csrf
<div id="emploi" style="display: none;">
    <label>Local :</label>
    <select name="ID_salle" required>
        <option value="" selected disabled hidden>Choisir Local</option>
        @foreach ($salles as $salle)
            <option value="{{ $salle->ID_salle }}">{{ $salle->Nom_salle }}</option>
        @endforeach
    </select>
    
    <label>Nom de prof :</label>
    <select name="ID_prof" required>
        <option value="" selected disabled hidden>Choisir Prof</option>
        @foreach ($professeurs as $professeur)
            <option value="{{ $professeur->id_utilisateur }}">{{ $professeur->nom }} {{ $professeur->prenom }}</option>
        @endforeach
    </select><br>

    <label>Module :</label>
    <select name="ID_module" required>
        <option value="" selected disabled hidden>Choisir Module</option>
        @foreach ($modules as $module)
            <option value="{{ $module->id_module }}">{{ $module->nom }}</option>
        @endforeach
    </select>

    <label for="Crenaux">Choisir Heure :</label>
    <select name="Crenaux" id="Crenaux" required>
        <option value="" selected disabled hidden>Choisir Heure</option>
        <option value="9:00">9h-10h45</option>
        <option value="11:00">11h-12h45</option>
        <option value="13:00">13h-14h45</option>
        <option value="15:00">15h-16h45</option>
        <option value="17:00">17h-18h45</option>
    </select>

    <label>Jour :</label>
    <select name="Jours" required>
        <option value="" selected disabled hidden>Choisir Jour</option>
        <option value="Lundi">Lundi</option>
        <option value="Mardi">Mardi</option>
        <option value="Mercredi">Mercredi</option>
        <option value="Jeudi">Jeudi</option>
        <option value="Vendredi">Vendredi</option>
        <option value="Samedi">Samedi</option>
    </select>

    <label>Raison :</label>
    <input type="text" name="raison" placeholder="Entrer raison">
    
    <button type="submit">ajouter</button><br>
</div>
</form>
  <!-- ----------------------------------------------------- -->
  <h1>Departements:</h1>
<div class="row">
    <p>Vous êtes associé à <span>{{ $departements->count() }}</span> departements.</p>
</div>
<div class="ann">
@foreach($departements as $dep)
    <div class="ann_details">
        <div class="text">
            <h2>{{ $dep->Nom_departement }}</h2>
        </div>
    </div>
@endforeach
</div>

</body>
<script src="{{asset ('js/dashboards/annonces.js')}}"></script>
</html></span>