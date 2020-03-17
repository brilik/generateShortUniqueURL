<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Short Unique URL</title>
</head>
<body>
<div class="wrapper">


    <header class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
                <a class="navbar-brand" href="/">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                    </ul>
                </div>
                <span class="navbar-text">
                    <a href="/">Go to suit</a>
                </span>
            </nav>
        </div>
    </header>

    <div class="container mh-100">
        <?php if(is_user_logged_in()): ?>
            <div class="row heading justify-content-center p-4 text-dark font-weight-bold">Welcome, <?php is_user_logged_in(true); ?></div>
        <?php endif; ?>
        <main class="row">
            <section class="col-lg-12">
                <?php if (empty($args)): ?>
                    <p>You not have URL.</p>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($args as $item): ?>
                            <div class="col-xl-6">
                                <div class="d-flex flex-column">
                                <div class="bg-dark text-white m-2">
                                    <div class="p-2">ID: <?= $item['id']; ?></div>
                                    <div class="p-2">url: <?= $item['url']; ?></div>
                                    <div class="p-2">token: <?= $item['token']; ?></div>
                                    <div class="p-2 text-right">
                                        <button class="btn btn-primary">Go</button>
                                        <button class="btn btn-info">Edit</button>
                                        <button class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>
    <footer class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="copyright text-center p-3 text-uppercase">
                    <a class="text-white" href="mailto:megabrilik@gmail.com">Vitalii&nbsp;Bryl</a>&nbsp;&copy&nbsp;1993-<?=date('Y'); ?>
                </div>
            </div>
        </div>
    </footer>


</div>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/custom.css">
<script src="<?= get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>