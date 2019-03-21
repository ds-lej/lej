<!DOCTYPE html>
<html lang="<?= str_replace('_', '-', app()->getLocale()) ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= csrf_token() ?>">

    <title><?= config('app.name') ?></title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="<?= asset('css/app.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/theme-classic.css') ?>" rel="stylesheet">

    <script src="<?= asset('js/ext-all.js') ?>"></script>
    <script src="<?= asset('js/theme-classic.js') ?>"></script>
    <script src="<?= asset('js/app.js') ?>"></script>
</head>
<body></body>
</html>
