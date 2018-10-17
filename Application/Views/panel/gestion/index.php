<section class="container-wrapper">
    <div class="container">
        <h1>Gestion des utilisateurs</h1>
        <article id="gestion-article">
            <table id="utilisateurs-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Courriel</th>
                        <th>Nom d'utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($viewBag['users'] as $user) { ?>
                    <tr>
                        <td><a href="/gestion/edit?id=<?= $user->id ?>" ><?php echo $user->firstname . " " . $user->lastname ?></a></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->username ?></td>
                        <?php echo ($user->username != $viewBag['connectedUserUsername'] && $user->isAdmin != 1) ? "<td><a href='/gestion/remove?id=$user->id'>Supprimer</a></td>" : "" ?>
                    </tr>
                    <?php } ?>
                </tbody>
                
            </table>

            <a href="/gestion/add">Ajouter un utilisateur</a>
        </article>
    </div>
</section>