<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard Proffesseur</title>
  <link rel="stylesheet" href="{{asset ('css/dashboards/etudiant.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="icon" href="./images/fsttt.png">


</head>
<body>
  <div class="container">
    <nav>
      <div class="navbar">
        <div class="logo">
          <h1><a href= "{{ url('/profile') }}">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h1></a>
        </div>
        <ul>
          <li><a href="#">
            <i class="fas fa-user"></i>
            <span class="nav-item" onclick="untoggleall()">Dashboard</span>
          </a>
          </li>
          <li><a href="#">
              <i class="fa fa-calendar"></i>
              <span class="nav-item" onclick="toggleDiv('emploi')">Emploi Du Temps</span>
            </a>
          </li>
          <li><a href="#">
            <i class="fas fa-tasks"></i>
            <span class="nav-item"onclick="toggleDiv('demandes')">Demandes</span>
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
      <p>Bienvenu, Proffesseur! </p>
    </div>
<!--------------------------------------Emploi----------------------------------------------------->
<div id="emploi" class="emploi" style="display: none">
    <h1>Emploi:</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Jour</th>
                <th>Crenaux Horaire</th>
                <th>Module</th>
                <th>Salle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->Jours }}</td>
                    <td>{{ $reservation->Crenaux }}</td>
                    <td>{{ $reservation->module->nom}}</td>
                    <td>{{ $reservation->salle->Nom_salle ?? 'N/A'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <!-- ----------------------------------Anonces---------------------------------- -->
<div id="annonces" class="annonces" style="display: none">
<form action="{{ route('professor.addAnnouncement') }}" method="POST">
@csrf
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" placeholder="Entrez le titre">
    <label for="message">Votre Annonce :</label>
    <textarea id="message" name="message" placeholder="Entrez votre annonce" rows="4"></textarea>
    <label for="typeRencontre">Type  :</label>
    <input type="text" id="type" name="type" placeholder="Entrez le type">
    <button type="submit">Envoyer</button>
</form>
</div>

    <div class="main-body">
    <!-- ------------------------------------DEMANDES ------------------------------>
    <div id="demandes" class="demandes">
    <h1>Demandes!</h1>
    <div class="row">
        <p>Vous avez <span>{{ count($demandes) }}</span> demandes.</p>
    </div>

    @foreach($demandes as $demande)
        <div class="ann">
            <div class="ann_details">
                <div class="text">
                   <h2>{{ $demande->user->nom }} {{ $demande->user->prenom }}</h2>
                    <h3>{{ $demande->contenu }}</h3>
                    <span>{{ $demande->filiere->nom }}</span>
                </div>
            </div>
            <div class="ann_maker">
                <h4>{{ $demande->status }}</h4>
                <span>{{ $demande->type === 'professeur' ? 'Professeur' : 'Responsable Filière' }}</span>
            </div>
            <form action="{{ route('update-demande-status', $demande->id_demande) }}" method="post">
            @csrf
            @method('put')
            <label for="status">Changer Status:</label>
            <select name="status" id="status">
                <option value="non_vue" {{ $demande->status === 'non_vue' ? 'selected' : '' }}>Non Vue</option>
                <option value="en_cours" {{ $demande->status === 'en_cours' ? 'selected' : '' }}>En Cours</option>
                <option value="traite" {{ $demande->status === 'traite' ? 'selected' : '' }}>Traite</option>
            </select>
            <button type="submit">Mise a jour</button>
        </form>
        </div>
    @endforeach
</div>

      <h1>Classes!</h1>
<div class="row">
    <p>Vous enseignez <span>{{ $modules->count() }}</span> modules.</p>
</div>

    @foreach($modules as $module)
    <div class="ann">
        <div class="ann_details">
            <div class="text">
                <h2>{{ $module->nom }}</h2>
            </div>
        </div>
    </div>
    @endforeach


<div class="row">
    <p>Vous êtes associé à <span>{{ $filieres->count() }}</span> filières.</p>
</div>

@foreach($filieres as $filiere)
<div class="ann">
    <div class="ann_details">
        <div class="text">
            <h2>{{ $filiere->nom }}</h2>
        </div>
    </div>
</div>
@endforeach
      
<script src="{{asset ('js/dashboards/annonces.js')}}"></script>
</body>
</html></span>
