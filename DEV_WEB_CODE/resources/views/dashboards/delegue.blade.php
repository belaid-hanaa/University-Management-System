<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard Delegue</title>
<link rel="stylesheet" href="{{ asset('css/dashboards/etudiant.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<link rel="icon" href="./images/fsttt.png">

</head>
<body>
<div class="container">
  <nav>
    <div class="navbar">
      <div class="logo">
        <h1><a href="{{ url('/profile') }}">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h1></a>
      </div>
      <ul>
        <li><a href="#">
          <i class="fas fa-user"></i>
          <span class="nav-item" onclick= "untoggleall()">Dashboard</span>
        </a>
        </li>
        <li><a href="#">
          <i class="fa fa-calendar"></i>
          <span class="nav-item" onclick = "toggleDiv('emploi')">Emploi du temps</span>
        </a>
        </li>
        <li><a href="#">
          <i class="fas fa-tasks"></i>
          <span class="nav-item" onclick="toggleDiv('demandes')">Demandes</span>
        </a>

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
      <p>Bienvenu, Delegue!</p>
    </div>
<!--------------------------------------Emploi----------------------------------------------------->
<div id="emploi" class="emploi"style="display: none" >
    <h1>Votre emploi:</h1>

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

<!--------------------------------------Demandes---------------------------------------------------->
    <div id="demandes" class="demandes" style="display: none">
    <form action="{{ route('etudiant.addDemande') }}" method="POST">
        @csrf
        <label for="id_module">Module:</label>
        <select id="id_module" name="id_module">
            @foreach($modules as $module)
                <option value="{{ $module->id_module }}">{{ $module->nom }}</option>
            @endforeach
        </select>

        <label for="id_filiere">Filière:</label>
        <select id="id_filiere" name="id_filiere">
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id_filiere }}">{{ $filiere->nom }}</option>
            @endforeach
        </select>

        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu" placeholder="Entrez le contenu" rows="4"></textarea>

        <label for="type">Type :</label>
        <select id="type" name="type">
            <option value="professeur">Professeur</option>
            <option value="responsable_filiere">Responsable Filière</option>
            <option value="delegue">Signaler probleme</option>

        </select>

        <button type="submit">Envoyer</button>
    </form>
</div>

<h1>Annonces!</h1>
    <div class="main-body">
  @foreach ($announcements as $announcement)
    <div class="ann">
        <div class="ann_details">
            <div class="img">
                <i class="fa fa-bell"></i>
            </div>
            <div class="text">
                <h2>{{ $announcement->titre }}</h2>
                <h3>{{ $announcement->Contenu }}</h3>
                <span>{{ $announcement->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <div class="ann_maker">
            <h4>{{ $announcement->user->nom }} {{ $announcement->user->prenom }}</h4>
            <span>
            @if ($announcement->module)
                <span>{{ $announcement->module->nom }}</span>
            @elseif ($announcement->filiere)
                <span>{{ $announcement->filiere->nom }}</span>
            @elseif ($announcement->departement)
                <span>{{ $announcement->departement->Nom_departement }}</span>
            @endif
            <p>{{ $announcement->created_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
@endforeach

</div>
  </div>
  </section>
</div>

</body>
<script src="{{asset ('js/dashboards/annonces.js')}}"></script>

</html></span>