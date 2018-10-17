<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://<?= URL ?>/css/style.css">
    <title>Home</title>
</head>
<body style="background-color:<?php echo (isset($_SESSION['globalColor']) ? $_SESSION['globalColor'] : "rgb(221, 229, 236)") ?>;">

    <header>
        <div class="container-wrapper">
            <div class="container">
                <div id="banner">
                    <h2>Panel Administratif</h2>
                </div>
            </div>
        </div>
        <div class="container-wrapper">
            <div class="container">
                <div id="nav-section">
                    <nav>
                        <a href="/home">Accueil</a>
                        <a href="/gestion">Gestion</a>
                        <a href="/configuration">Configuration</a>
                    </nav>
                    <div>
                        <p><?php echo $viewBag['firstname'] . " " . $viewBag['lastname']; ?></p>
                        <a class="danger" href="/auth/logout">Deconnexion</a>
                    </div>
                </div>
            </div>    
        </div>
    </header>