<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
          <link rel="icon" href="./images/fsttt.png">

      <title>Dashboard Responsable du service pedagogique</title>
      <link rel="stylesheet" href="{{asset ('css/dashboards/etudiant.css')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-x2V8QV1NqN4aaI7qJ9emqAjFpdqjI2fs/Cy8Fk8ZiXTv2SZCmzEtlBbPTtGXdlrN" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
      <script>
          // Définir les chemins des routes comme variables JavaScript
          var afficherFormulaireRoute = "{{ route('afficher_formulaire') }}";
          var afficherFormulaireFiliereRoute = "{{ route('afficher_formulaire_filiere') }}";
          var afficherFormulaireModuleRoute = "{{ route('afficher_formulaire_module') }}";
          var afficherFormulaireModificationRoute = "{{ route('afficher_formulaire_modification') }}";
          var filiereModuleFormRoute = "{{ route('affiche_formulaire_ajoute') }}";
      </script>

      <script>
          function redirectToFormulaire() {
              var select = document.getElementById("responsibility_type");
              var selectedValue = select.options[select.selectedIndex].value;

              // Ajouter d'autres cas ici si nécessaire
              if (selectedValue === "department") {
                  window.location.href = afficherFormulaireRoute;
              } else if (selectedValue === "program") {
                  window.location.href = afficherFormulaireFiliereRoute;
              } else if (selectedValue === "module") {
                  window.location.href = afficherFormulaireModuleRoute;
              }
              // Ajouter d'autres redirections en fonction des valeurs sélectionnées
          }
      </script>

      <script>
          function redirectToFormulaire2() {
              var select = document.getElementById("modification_type");
              var selectedValue = select.options[select.selectedIndex].value;

              // Ajouter d'autres cas ici si nécessaire
              if (selectedValue === "modifie") {
                  window.location.href = afficherFormulaireModificationRoute;
              } else if (selectedValue === "ajoute") {
                  window.location.href = filiereModuleFormRoute;
              // Ajouter d'autres redirections en fonction des valeurs sélectionnées
              }
          }
      </script>

    </head>
    <body>
      <div class="container">
        <nav>
          <div class="navbar">
            <div class="logo">
              <h1><a href= "{{ url('/profile') }}">Responsable Pedagogique</h1></a>
            </div>
            <ul>
              <li><a href="#">
                <i class="fas fa-user"></i>
                <span class="nav-item" href="{{ url('/dashboard') }}">Dashboard</span>
              </a>
              </li>
              <li><a href="#">
                <i class="fa fa-calendar"></i>
                <span class="nav-item" onclick="toggleDiv('emploi')">Emploi Du Temps</span>
              </a>
              </li>
            
              <li><a href="#">
                <i class="fa fa-user"></i>
                <span class="nav-item"onclick="toggleDiv('liste')">Professeur responsable</span>
              </a>
              </li>
              <li><a href="{{ route('afficher_formulaire_salle') }}">
                <i class="fas fa-landmark"></i>
                <span class="nav-item">Affecter une salle à un département</span>
              </a>
              </li>
    
              <li><a href="#">
                <i class="fa fa-receipt"></i>
                <span class="nav-item"onclick="toggleDiv('filiere')">Ajouter et modifier le contenu d’une filière</span>
              </a>
              </li>
              <li><a href="{{ route('affiche_formulaire_classe') }}">
                <i class="fa fa-users"></i>

                <span class="nav-item">Inscrire une nouvelle classe</span>
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
            <p>Bienvenu,Responsable du service pedagogique </p>
          </div>

  
     
          <!-- --------------------------Emploi-du-temps--------------------------- -->

<!-- --------------------------formulaire--------------------------- --> 
<div id="liste"  style="display: none;">
  <label for="responsibility_type">Choisir le type de responsabilité :</label>
  <select name="responsibility_type" id="responsibility_type" onchange="redirectToFormulaire()">
          <option value =""></option>
    <option value="department">Département</option>
    <option value="program">Filière</option>
    <option value="module">Module</option>
  </select>
</div>
<!-- --------------------------filiere--------------------------- -->
<div id="filiere"  style="display: none;">
  <label for="modification_type">Choisir le type des modifications:</label>
  <select name="modification_type" id="modification_type" onchange="redirectToFormulaire2()">
  <option value =""></option>
    <option value="ajoute">Ajoute Filière</option>
    <option value="modifie"> Modifie Filière</option>
    
  </select>
</div> 
  <!-- --------------------------Emploi-du-temps--------------------------- -->
  <div id = "emploi" style="display: none">
<form action="{{ route('responsable-pedagogique.make-reservation') }}" method="post">
    @csrf

    <label for="ID_salle">Local :</label>
    <select name="ID_salle" id="ID_salle" required>
        <option value="" selected disabled hidden>Choisir Local</option>
        @foreach ($salles as $salle)
            <option value="{{ $salle->ID_salle }}">{{ $salle->Nom_salle }}</option>
        @endforeach
    </select>

    <label for="ID_prof">Nom de prof :</label>
    <select name="ID_prof" id="ID_prof" required>
        <option value="" selected disabled hidden>Choisir Professeur</option>
        @foreach ($professeurs as $professeur)
            <option value="{{ $professeur->id_utilisateur }}">{{ $professeur->nom }}{{ $professeur->prenom }}</option>
        @endforeach
    </select><br>

    <label for="ID_module">Module :</label>
    <select name="ID_module" id="ID_module" required>
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

    <label for="Jours">Choisir Jour :</label>
    <select name="Jours" id="Jours" required>
        <option value="" selected disabled hidden>Choisir Jour</option>
        <option value="Lundi">Lundi</option>
        <option value="Mardi">Mardi</option>
        <option value="Mercredi">Mercredi</option>
        <option value="Jeudi">Jeudi</option>
        <option value="Vendredi">Vendredi</option>
        <option value="Samedi">Samedi</option>
    </select>
    <label for ="raison">Raison :</label>
    <input id = "raison" name = "raison" required type = "text" placeholder = "Entrer raison"> 
    <button type="submit">ajouter</button><br>
</form>


  <!----------------------------------------------------CALENDER---------------------------------------------------->

</div><!-- hadi dial class emploi mat2adihachi-->
    <div class="main-body">
    <h1>Contenu des filières</h1>
</div>

@foreach ($filieres as $filiere)
    <div class="ann">
        <div class="ann_details">
            <div class="img">
                <i class="fa fa-book"></i>
            </div>
            <div class="text">
                <h2>{{ $filiere->nom }}:</h2>
                <table border="1">
                    @foreach ($filiere->modules as $module)
                        <tr>
                            <td>{{ $module->nom }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endforeach

    
          
    
          

          </div>
        </div>
        </section>
      </div>
      <script src="{{asset ('js/dashboards/annonces.js')}}"></script>

    </body>
    </html></span>