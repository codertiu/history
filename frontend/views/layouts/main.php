<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\FooterAsset;
use frontend\assets\FrontAsset;
use frontend\assets\ltAsset;
use common\widgets\Alert;
use frontend\widgets\WMenu;
use frontend\widgets\WLang;
use frontend\models\SearchForm;
use yii\widgets\ActiveForm;
$model = new SearchForm();
FooterAsset::register($this);
FrontAsset::register($this);
ltAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="full-wrapper" class="bg-pattern3">
                    

    <!-- Document Wrapper
    ============================================= -->
        <div id="wrapper" class="clearfix">

            <!-- Top Bar
            ============================================= -->
            <?= WLang::widget() ?>
            <!-- #top-bar end -->

            <!-- Header
            ============================================= -->
            <header id="header" class="sticky-style-2">

                <div class="container clearfix">

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="<?= Yii::$app->homeUrl ?>" class="standard-logo" data-dark-logo="/images/logonew.png"><img src="/images/logonew.png" alt="MirArab"></a>
                        <a href="<?= Yii::$app->homeUrl ?>" class="retina-logo" data-dark-logo="/images/logonew.png"><img src="/images/logonew.png" alt="MirArab"></a>
                    </div><!-- #logo end -->

                    <div class="top-advert">
                        <img src="/images/121.jpg" alt="Ad">
                    </div>

                </div>

                <div id="header-wrap">

                    <!-- Primary Navigation
                    ============================================= -->
                    <?= WMenu::widget() ?>
                    <!-- #primary-menu end -->

                </div>

            </header><!-- #header end -->
            <div class="clearfix">
            </div>
            <?= Alert::widget() ?>
            <?= $content ?>

            <?php require_once('footer.php'); ?>

        </div><!-- #wrapper end -->

    </div>  
    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <div id="page-preloader" class="css3-spinner">
        <div class="css3-spinner-bounce1"></div>
        <div class="css3-spinner-bounce2"></div>
        <div class="css3-spinner-bounce3"></div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
