<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
/*
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">

<link rel="apple-touch-startup-image" href="/startup.png"> - startup image, replace last screen executed
<meta name="apple-mobile-web-app-capable" content="yes"> - hide Safari panels
<meta name="apple-mobile-web-app-status-bar-style" content="black"> - small size status bar
 */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="apple-touch-icon" href="/images/i60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/i76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/i120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/i152.png">


    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container" style="padding-top: 0;">
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; temocenter.ru</p>
            <p class="pull-right"><?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
