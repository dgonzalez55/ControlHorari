<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <title><?=APP_TITLE?></title>
        <link rel="stylesheet" type="text/css" href="<?=APP_BASE_URL?>/assets/css/main.css" />
        <link rel="icon" href="<?=APP_BASE_URL?>/assets/img/icon.jpg" />
    </head>
    <body>
        <div id="pagewrapper">
            <h1><?=APP_TITLE?></h1>
            <?=$this->content()?>
        </div>
    </body>
</html>