<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="title">
    <meta name="description">
    <title>Get Short Unique URL</title>
</head>
<body>
<div class="wrapper">
    <header class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
                <span class="navbar-text">
                    <?php if(is_user_logged_in()):  ?>
                        <a href="/admin">Dashboard</a>
                    <?php else: ?>
                        <a href="/signin">Login\Registration</a>
                    <?php endif; ?>
                </span>
            </nav>
        </div>
    </header>
    <div class="container  vh-100">
        <?php if(is_user_logged_in()): ?>
            <div class="row heading justify-content-center welcome-text">Welcome, <?php is_user_logged_in(true); ?></div>
        <?php endif; ?>
        <main class="row">
<!--        <aside class="col-md-3">aside</aside>-->
            <section class="col-lg-12 unique-url__generate mt-5">
                <!-- start form get unique url -->
                    <form class="" action="/" method="post" id="generate">
                        <input class="form-control" type="url" name="url" placeholder="Enter URL...">
                        <input class="btn btn-outline-success" type="submit" value="Get unique URL">
                        <input type="hidden" name="action" value="generate">
                    </form>
                <!-- end form get unique url -->
            </section>
        </main>
    </div>
    <footer class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="copyright text-center p-3 text-uppercase">
                    <a class="text-white" href="mailto:megabrilik@gmail.com">Vitalii Bryl</a>
                    &copy 1993-<?=date('Y'); ?></div>
            </div>
        </div>
    </footer>


</div>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/custom.css">
<script src="<?= get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>