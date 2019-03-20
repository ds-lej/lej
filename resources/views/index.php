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

    <link href="<?= asset('assets/extjs/css/theme-classic-all.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/app.css') ?>" rel="stylesheet">

    <script src="<?= asset('assets/extjs/js/ext-all.js') ?>"></script>
    <script src="<?= asset('assets/extjs/js/theme/theme-classic.js') ?>"></script>
    <script src="<?= asset('assets/js/app.js') ?>"></script>
</head>
<body>
<script>
Ext.application({
    name: 'HelloExt',
    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: [{
                title: 'Приложение на Ext JS 6.2',
                html : '<h3>Добро пожаловать в мир Ext JS 6.2!</h3>'
            }]
        });
    }
});
</script>
</body>
</html>
