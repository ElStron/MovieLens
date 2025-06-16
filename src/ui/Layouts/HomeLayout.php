<!DOCTYPE html>
<html>
<head>
    <?php
    include(__DIR__ . '/../components/BaseHead.php');
    ?>
    <style> 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0a0d18;
            min-height: 100dvh;
            display: grid;
            grid-template-rows:auto 1fr auto;
            grid-template-columns: 100%;
            overflow-x: hidden;
            color: #ffffff;
        }

        /* 1. Use a more-intuitive box-sizing model */
        *, *::before, *::after {
        box-sizing: border-box;
        }
        li, ul {
        list-style: none;
        }

        /* 2. Remove default margin */
        * {
        margin: 0;
        padding: 0;
        }

        /* 3. Enable keyword animations */
        @media (prefers-reduced-motion: no-preference) {
        html {
            interpolate-size: allow-keywords;
        }
        }

        body {
        /* 4. Add accessible line-height */
        line-height: 1.5;
        /* 5. Improve text rendering */
        -webkit-font-smoothing: antialiased;
        }

        /* 6. Improve media defaults */
        img, picture, video, canvas, svg {
        display: block;
        max-width: 100%;
        }

        /* 7. Inherit fonts for form controls */
        input, button, textarea, select {
        font: inherit;
        }

        /* 8. Avoid text overflows */
        p, h1, h2, h3, h4, h5, h6 {
        overflow-wrap: break-word;
        }

        /* 9. Improve line wrapping */
        p {
        text-wrap: pretty;
        }
        h1, h2, h3, h4, h5, h6 {
        text-wrap: balance;
        }

        /*
        10. Create a root stacking context
        */
        #root, #__next {
        isolation: isolate;
        }

        main {
            padding: 20px;
            max-width: 1280px;
            margin: 0 auto;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include(__DIR__ . '/../components/Navigation.php'); ?>
    <main>
        <?php
        // Aquí es donde "inyectarías" el contenido del "child"
        if (isset($mainContent) && is_callable($mainContent)) {
            $mainContent(); // Ejecuta el callback que contiene el HTML del "child"
        } elseif (isset($mainContent)) {
            echo $mainContent; // Si es una cadena, la imprime directamente
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2025 Mi PHP App</p>
    </footer>
</body>
</html>