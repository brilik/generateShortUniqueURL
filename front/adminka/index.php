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
        <!-- start form login -->
        <!-- end form login -->
        <div class="row">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <?php if(is_user_logged_in()): ?>
            <div class="heading row">Welcome, <?php is_user_logged_in(true); ?></div>
        <?php endif; ?>
        <main class="row">
            <aside class="col-md-3">aside</aside>
            <section class="col-md-9">
                <?php if (empty($args)): ?>
                    <p>You not have URL.</p>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($args as $item): ?>
                            <div class="col-xl-4">
                                <div class="d-flex flex-column">
                                <div class="bg-dark text-white m-2">
                                    <div class="p-2">ID: <?= $item['id']; ?></div>
                                    <div class="p-2">token: <?= $item['token']; ?></div>
                                    <div class="p-2">url: <?= $item['url']; ?></div>
                                    <div class="p-2 text-center">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Remove</button>
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
    <footer class="container-fluid">footer</footer>


</div>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/custom.css">
<script src="<?= get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>