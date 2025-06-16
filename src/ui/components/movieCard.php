<?php
function renderMovieCard($movie) {
    ob_start();
    ?>
    <article class='movie-card' style="background-image: url('<?= $movie->posterImage ?? '' ?>')">
        <div class='movie-info'>
            <h2 class='movie-title'><?= htmlspecialchars($movie->title ?? '') ?></h2>
            <p class='movie-description'><?= htmlspecialchars($movie->synopsis ?? '') ?></p>
            <a href='/pelicula/<?= htmlspecialchars($movie->slug ?? '') ?>' class='movie-link'>Ver detalles</a>
        </div>
    </article>
    <?php
    return ob_get_clean();
}
