<section id="hero" class="hero" style="--hero-image: url('<?= $movie ? $movie->coverImage : ''; ?>');">
    <div class="hero__content max">
        <picture class="poster__image">
            <img src="<?= $movie ? $movie->posterImage : ''; ?>" alt="Hero Image" />
        </picture>
        <article class="hero__text">
            <h1 class="hero__title"><?= $movie ? $movie->title : ''; ?></h1>
            <p class="hero__subtitle">Descubre las últimas películas y series de tu plataforma favorita.</p>
        </article>
    </div>
</section>

<style>
    #hero {
        width: 100%;
        display: flex;
        align-items: center;
        padding: 2rem;
        max-height: 600px;
        position: relative;
        &::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--hero-image);
            background-size: cover;
            background-position: top center;
            opacity: 0.5;
            z-index: -1;
        }
    }

    .hero__content {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 2rem;
        width: 100%;
    }

    .hero__title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .hero__subtitle {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .hero__image img {
        max-width: 100%;
        height: auto;
    }
</style>