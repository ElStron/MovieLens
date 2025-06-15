<?php
function renderMovieCard($movie) {
    ob_start();
    ?>
    <article class='movie-card' style="background-image: url('<?= $movie['poster_movie_2'] ?? '' ?>')">
        <div class='movie-info'>
            <h2 class='movie-title'><?= htmlspecialchars($movie['titulo_movie'] ?? '') ?></h2>
            <p class='movie-description'><?= htmlspecialchars($movie['sinopsis_movie'] ?? '') ?></p>
            <a href='/pelicula/<?= htmlspecialchars($movie['slug_movie'] ?? '') ?>' class='movie-link'>Ver detalles</a>
        </div>
    </article>
    <?php
    return ob_get_clean();
}
