<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://<?= URL ?>/css/style.css">
    <title>Identification</title>
</head>
<body id="login-body">
    <div id="login-container">
        <h1>Identification</h1>
        <form id="login-form-box" action="/auth/authenticate" method="post">
            <div>
                <input type="text" placeholder="Votre Nom" name="username"/>
                <input type="password" placeholder="Votre mot de passe" name="password"/>
            </div>
            <div id="send-section">
                <div id="tries">(<?= $viewBag['tries'] ?> ieme tentative)</div>
                <input type="submit" value="Connexion" />
            </div>
        </form>
    </div>
</body>
</html>