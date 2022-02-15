<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{base_url()}/assets/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="{base_url('favicon.ico')}>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>{block name="title"}{/block}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{site_url('/Homepage/')}">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Liste des supers heros</a>
                </li>
                    {if isset( $smarty.session.IsLoggedIn)}
                <li class="nav-item">
                    <a class="nav-link">Bonjour {$smarty.session.UserName}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{site_url('/LogIn/LogOut')}">Se déconnecter</a>
                </li>
                    {else}
                <li class="nav-item">
                        <a class="nav-link" href="{site_url('/LogIn/SignIn')}">S'inscrire</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{site_url('/LogIn/SignUp')}">Se Connecter</a>
                </li>
                    {/if}

            </ul>
        </div>
    </div>
</nav>

