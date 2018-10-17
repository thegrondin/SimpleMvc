
<?php $user = $viewBag['user']; ?>
<section class="container-wrapper">
    <div class="container">
        <h1>Ajout d'un utilisateur</h1>
        <article id="ajout-article">
            <form method="post" action="/gestion/applyChanges">
                <input type="hidden" value="<?= $user->id ?>" />
                <label for="firstname">Prenom: </label><input type="text" name="firstname" value="<?= $user->firstname ?>" /><br />
                <label for="lastname">Nom de famille: </label><input type="text" name="lastname" value="<?= $user->lastname ?>" /><br />
                <label for="email">Courriel: </label><input type="text" name="email" value="<?= $user->email ?>" /><br />
                <label for="username">Nom d'utilisateur: </label><input type="text" name="username" value="<?= $user->username ?>" /><br />
                <label for="password">Mot de passe: </label><input type="text" name="password" value="<?= $user->password ?>" /><br />

                <input type="submit" value="Modifier" />
            </form>
        </article>
    </div>
</section>