<section class="container-wrapper">
        <div class="container">
            <h1>Vos informations d'usager</h1>
            <article id="home-article">
                <p><span class="important">Prenom: </span><?= $viewBag['firstname'] ?></p>
                <p><span class="important">Nom de famille: </span><?= $viewBag['lastname'] ?></p>
                <p><span class="important">Courriel: </span><?= $viewBag['email'] ?></p>
            </article>
        </div>
    </section>