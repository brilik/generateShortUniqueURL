<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Short Unique URL</title>
    <style>
        *, body { padding: 0; margin: 0;}
        body {background-color: #9fcdff}
        .wrapper {background-color: antiquewhite}
        header, footer {background-color: black; color: white;}
        nav { background-color: #0b2e13}
        .heading {background-color: #0f6674}
        main {background-color: #0069d9}
        aside {background-color: #6f42c1}
        section {background-color: #34ce57}
    </style>
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
        <div class="heading row">heading</div>
        <main class="row">
            <aside class="col-md-3">aside</aside>
            <section class="col-md-9">
                <!-- start form get unique url -->
                <div class="unique-url__generate">
                    <form action="/" method="post" id="generate">
                        <input type="url" name="url">
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
<script src="<?= get_template_directory_uri(); ?>/assets/js/custom.js"></script>
</body>
</html>