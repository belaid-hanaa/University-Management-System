<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{asset ('css/profile.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="./images/fsttt.png">

</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
                <a href="{{ url ('/dashboard')}}">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
    </div>

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="./images/mourad.png" alt="" width="100" height="100">

            <div class="name">
            {{ auth()->user()->nom }} {{ auth()->user()->prenom }}
            </div>

        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>Informations</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Nom Complet</td>
                            <td>:</td>
                            <td>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>:</td>
                            <td>{{ auth()->user()->role }}</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>{{ auth()->user()->id_utilisateur }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- End -->
</body>
</html>