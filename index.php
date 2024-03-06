<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('Location: login.php');
}

if (isset($_SESSION['user_login'])) {
    session_write_close();

    require_once('header.php');

    echo '<div id="intro-example"
         class="p-5 text-center bg-image"
         style="background-image: url(\'https://wallpaperswide.com/download/abstract_geometric_background-wallpaper-3840x2400.jpg\');">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Custodia dei Dati per Imprese Resilienti</h1>
                    <h5 class="mb-4">Proteggere i dati aziendali è la chiave per garantire la sicurezza, la fiducia e la resilienza.</h5>
                    <a data-mdb-ripple-init class="btn btn-outline-light btn-lg m-2"
                       href="#"
                       role="button" rel="nofollow" target="_blank">Chi siamo</a>
                    <a data-mdb-ripple-init class="btn btn-outline-light btn-lg m-2"
                       href="#" target="_blank" role="button">Scopri di più</a>
                </div>
            </div>
        </div>
    </div>
</header>

<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>
</body>
</html>';
}
?>