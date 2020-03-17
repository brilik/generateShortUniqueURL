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
        <!-- start form login -->
        <!-- end form login -->
        <div class="row">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li>
                        <?php if(is_user_logged_in()):  ?>
                        <a href="/admin">Dashboard</a>
                        <?php else: ?>
                        <a href="/signin">Login\Registration</a>
                        <?php endif; ?>
                    </li>
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
                <!-- start form get unique url -->
                <div class="unique-url__generate">
                    <form action="/" method="post" id="generate">
                        <input type="url" name="url" placeholder="Enter URL...">
                        <input type="submit" value="Get unique URL">
                    </form>
                </div>
                <!-- end form get unique url -->
            </section>
        </main>
    </div>
    <footer class="container-fluid">footer</footer>


</div>
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/bootstrap-grid.min.css">
<!--<link rel="stylesheet" href="--><?//= get_template_directory_uri(); ?><!--/assets/css/custom.css">-->
<script src="<?= get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>