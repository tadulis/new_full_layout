<!doctype html>
<html lang="en">
<head>
    <title><?= $data['header'] . " | " . CONFIG['site_title']; ?></title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/<?= CONFIG['site_path']; ?>/assets/favicon.bmp" type="image/x-icon">
    <link rel="icon" href="/<?= CONFIG['site_path']; ?>/assets/favicon.bmp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/<?= CONFIG['site_path']; ?>/assets/css/style.css">
</head>
<body>
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-3"><?= CONFIG['site_title']; ?></h1>
                <p class="lead">A good place to start with PHP MVC</i>
                </p>
                <div class="btn-group"><?php
                        foreach($data['menu'] as $item) {
                            echo '<a class="btn btn-outline-light" href="/' . CONFIG['site_path'] . $item['link'] . '">'. $item['name'] .'</a> ';
                        }
                ?></div>
            </div>
        </div>
    </div>
</div>
<script src="/<?= CONFIG['site_path']; ?>/assets/js/script.js"></script>
</body>
</html>