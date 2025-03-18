<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-x2V8QV1NqN4aaI7qJ9emqAjFpdqjI2fs/Cy8Fk8ZiXTv2SZCmzEtlBbPTtGXdlrN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{asset ('css/dashboards/etudiant.css')}}" />
    <meta charset="UTF-8">
    <link rel="icon" href="./images/fsttt.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Filière et Modules</title>
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
              <li><a href="{{ url('/dashboard') }}" onclick="untoggleall()">
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
          <!-- --------------------------formulaire--------------------------- --> 
            <div id="liste"  style="display: none;">
              <label for="responsibility_type">Choisir le type de responsabilité :</label>
              <select name="responsibility_type" id="responsibility_type" onchange="redirectToFormulaire()">
                <option value="department">Département</option>
                <option value="program">Filière</option>
                <option value="module">Module</option>
              </select>
            </div>
            <!-- --------------------------filiere--------------------------- -->
            <div id="filiere"  style="display: none;">
              <label for="modification_type">Choisir le type des modifications:</label>
              <select name="modification_type" id="modification_type" onchange="redirectToFormulaire2()">
                <option value="ajoute">Ajoute Filière</option>
                <option value="modifie"> Modifie Filière</option>
                
              </select>
            </div> 
            <div class="main-body">
                <div id="annonces" class="annonces">
                    <h1>Modifier Filière </h1>

                    <form action="{{ route('modifier_filiere_modules') }}" method="post">
                        @csrf

                        <label for="id_filiere">Choisir la filière :</label>
                        <select name="id_filiere" id="id_filiere">
                            @foreach($filieres as $filiere)
                                <option value="{{ $filiere->id_filiere }}">{{ $filiere->nom }}</option>
                            @endforeach
                        </select>
                        
                        <label for="nouveau_nom">Nouveau Nom de la filière :</label>
                        <input type="text" name="nouveau_nom" id="nouveau_nom" required>

                        <label for="nouvelle_description">Nouvelle Description de la filière :</label>
                        <textarea name="nouvelle_description" id="nouvelle_description" rows="4" required></textarea>

                        <hr>

                       

                        <button type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="{{asset ('js/dashboards/annonces.js')}}"></script>
</body>
</html>

</body>
</html>
