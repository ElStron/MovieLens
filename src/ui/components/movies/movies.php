<?php
    include __DIR__ . '/../movieCard.php'
?>

<section id="movies" class="movies max">
    <h1>Películas</h1>
    <ul class="movies-list">
        <?php foreach ($movies as $movie): ?>
            <li class="movie-item">
                <?php echo renderMovieCard($movie); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<style>
    .movies-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .movie-card {
        width: 100%;
        min-height: 320px;
        background-size: cover;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        color: white;
        overflow: hidden;
        .movie-info {
            background: linear-gradient(360deg, hsl(200.66deg 71.51% 8.88%) 60%, hsl(200.63deg 69.57% 9.02% / 0%) 109%109%);
            padding: 12px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            .movie-link {
                    display: flex;
                    color: #061c27;
                    padding: 10px;
                    text-align: center;
                    width: 100%;
                    background: #fff8f8;
                    justify-content: center;
                    border-radius: 20px;
                    cursor: pointer;
            }
        }
        & .movie-description {
            color:rgb(207, 206, 206);
            font-size: 0.9em;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; 
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    }
</style>