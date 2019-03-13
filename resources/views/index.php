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
    <link href="<?= asset('assets/css/app.css') ?>" rel="stylesheet">
    <script src="<?= asset('assets/js/app.js') ?>" defer></script>
</head>
<body>

Hello!!!

</body>
</html>
