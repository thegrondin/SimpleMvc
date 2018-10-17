<?php $colors = $viewBag['colors']; ?>

<section class="container-wrapper">
        <div class="container">
            <h1>Configuration</h1>
            <h4>Choississez votre couleur de fond</h4>
            <article id="configuration-article">
                <div id="color-list">
                    <div style="background-color : <?= $colors['red'] ?>;"><a href="/configuration/setGlobalColor?color=<?= $colors['red'] ?>"></a></div>
                    <div style="background-color : <?= $colors['blue'] ?>;"><a href="/configuration/setGlobalColor?color=<?= $colors['blue'] ?>"></a></div>
                    <div style="background-color : <?= $colors['orange'] ?>;"><a href="/configuration/setGlobalColor?color=<?= $colors['orange'] ?>"></a></div>
                    <div style="background-color : <?= $colors['yellow'] ?>;"><a href="/configuration/setGlobalColor?color=<?= $colors['yellow'] ?>"></a></div>
                </div>
            </article>
        </div>
    </section>