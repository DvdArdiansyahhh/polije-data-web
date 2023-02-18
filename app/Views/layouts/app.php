<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <style>
        #content-wrapper {
            min-height: 75vh;
        }
    </style>

    <?= $this->renderSection('style') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a href="" class="navbar-brand">
                <img src="https://polije.ac.id/wp-content/uploads/2021/03/LOGO-POLITEKNIK-NEGERI-JEMBER.png" alt="Logo" width="40">
                <span class="ms-2">Polije Data</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="content-wrapper">
        <?= $this->renderSection('content'); ?>
    </div>

    <footer id="footer-page" class="d-flex justify-content-between p-3 pb-2">
        <small>Made by <a href="https://github.com/irsyadulibad/">irsyadulibad</a></small>
        <small>v2.0</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <?= $this->renderSection('script') ?>
    <script>
        feather.replace();
    </script>
</body>

</html>
