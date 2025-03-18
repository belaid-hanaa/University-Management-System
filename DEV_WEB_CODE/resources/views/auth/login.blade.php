<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="./images/fsttt.png">
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="post" action="{{ url('/login') }}">
                @csrf
                <h1>S'authentifier</h1>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <button type="submit">Se connecter</button>
                <button formnovalidate><a href="{{ url('/') }}">Retour</a></button>
            </form>
        </div>
        <div class="form-container sign-up">
        <form method="post" action="{{route('authen.support')}}">
            @csrf
            @method('post')
                <h1>Contacter Support</h1>
                <input name="nom" type="text" placeholder="nom.prenom">
                <input name="CNE" type="text" placeholder="CNE">
                <textarea name="demande" placeholder="Expliquer votre demande" rows="5" required></textarea>
                <button>Soumettre</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
            <div class="toggle-panel toggle-left">
                    <h1>Besoin du support?</h1>
                    <p>Veuillez remplir le formulaire ci-dessous en fournissant votre adresse e-mail, CNE et le message de support.Nous nous reviendrons vers vous dans les plus brefs délais.</p>
                    <button class="hidden" id="login">Retour</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bonjour !</h1>
                    <p>Veuillez entrer vos informations d'identification pour accéder à votre compte.</p>
                    <button class="hidden" id="support">Besoin du support ?</button>
                </div>
            </div>
        </div>


    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>

