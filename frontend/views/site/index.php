<!-- Content
            ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
                        <div>
                            <div class="container clearfix">
                                <span class="label label-danger bnews-title"><?= Yii::t('main','Kun hikmati:')?></span>

                                <div class="fslider bnews-slider nobottommargin" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <?php $slide = \common\models\Quote::find()->where(['category'=>1,'status'=>1])->orderBy('Rand()')->limit(5)->all();
                                            foreach ($slide as $one){
                                            ?>
                                            <div class="slide"><a href="#"><strong><?= $one->getLang('content') ?> </strong></a></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container clearfix">

                        <div class="row">

                            <div class="col-md-8 bottommargin">

                                <div class="col_full bottommargin-lg">
                                    <div class="fslider flex-thumb-grid grid-6" data-animation="fade" data-arrows="true" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                            <?php $slider = \common\models\Post::find()->where(['status'=>1,'ban'=>1])->limit(6)->all(); 
                                            foreach($slider as $one){
                                            ?>    
                                                <div class="slide" data-thumb="/img/post/main/<?= $one->main_img ?>">
                                                    <a href="#">
                                                        <img src="/img/post/main/<?= $one->main_img ?>" alt="">
                                                        <div class="overlay">
                                                            <div class="text-overlay">
                                                                <div class="text-overlay-title">
                                                                    <h3><?= $one->getLang('title') ?></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php } ?>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>

                                <div class="col_full bottommargin-lg clearfix">

                                    <div class="fancy-title title-border">
                                        <h3><?= Yii::t('main','Yangiliklar') ?></h3>
                                    </div>

                                    <div class="ipost clearfix">
                                        <div class="col_half bottommargin-sm">
                                            <div class="entry-image">
                                                <a href="#"><img class="image_fade" src="/images/aaa/001.jpg" alt="Image"></a>
                                            </div>
                                        </div>
                                        <div class="col_half bottommargin-sm col_last">
                                            <div class="entry-title">
                                                <h3><a href="blog-single.html">Toyotas next minivan will let you shout at your kids without turning around</a></h3>
                                            </div>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> 10th Feb 2014</li>
                                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 21</a></li>
                                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                            </ul>
                                            <div class="entry-content">
                                                <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, repudiandae.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_half nobottommargin">

                                        <div class="spost clearfix">
                                            <div class="entry-image">
                                                <a href="#"><img src="/images/aaa/002.jpg" alt=""></a>
                                            </div>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="#">UK government weighs Tesla's Model S for its ??5 million electric vehicle fleet</a></h4>
                                                </div>
                                                <ul class="entry-meta">
                                                    <li><i class="icon-calendar3"></i> 1st Aug 2014</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 32</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="spost clearfix">
                                            <div class="entry-image">
                                                <a href="#"><img src="/images/aaa/003.jpg" alt=""></a>
                                            </div>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="#">MIT's new robot glove can give you extra fingers</a></h4>
                                                </div>
                                                <ul class="entry-meta">
                                                    <li><i class="icon-calendar3"></i> 13th Sep 2014</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 11</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col_half nobottommargin col_last">

                                        <div class="spost clearfix">
                                            <div class="entry-image">
                                                <a href="#"><img src="/images/aaa/004.jpg" alt=""></a>
                                            </div>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="#">You can now listen to headphones through your hoodie</a></h4>
                                                </div>
                                                <ul class="entry-meta">
                                                    <li><i class="icon-calendar3"></i> 31st Jan 2014</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 7</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="spost clearfix">
                                            <div class="entry-image">
                                                <a href="#"><img src="/images/magazine/small/4.jpg" alt=""></a>
                                            </div>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="#">How would you change Kobo's Aura HD e-reader?</a></h4>
                                                </div>
                                                <ul class="entry-meta">
                                                    <li><i class="icon-calendar3"></i> 27th July 2014</li>
                                                    <li><a href="#"><i class="icon-comments"></i> 13</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="bottommargin-lg">
                                    <img src="/images/123.jpg" alt="Ad" class="aligncenter notopmargin nobottommargin">
                                </div>

                                <div class="fancy-title title-border">
                                    <h3><?= Yii::t('main','Gallery')?></h3>
                                </div>

                                <div class="col_full masonry-thumbs col-6 bottommargin-lg clearfix" data-big="5" data-lightbox="gallery">
                                <?php
                                    $photo = \common\models\GallerySub::find()->where(['status'=>1])->orderBy('rand()')->limit(15)->all();
                                    foreach ($photo as $one) {
                                ?>
                                    <a href="/img/gallery/sub/<?= $one->img ?>" data-lightbox="gallery-item"><img class="image_fade" src="/img/gallery/sub/<?= $one->img ?>" alt="<?= $one->getLang('name') ?>"></a>
                                <?php } ?>    
                                </div>

                                <div class="col_full nobottommargin clearfix">

                                    <div class="fancy-title title-border">
                                        <h3><?= Yii::t('main','Boshqa yangiliklar')?></h3>
                                    </div>
                                <?php $posts = \common\models\Post::find()->where(['status'=>1])->orderBy('created_date')->limit(6)->all();
                                $i = 1;
                                foreach($posts as $post){
                                 ?>    
                                    <div class="col_one_third  <?php if($i%3==0) echo 'col_last'?>">
                                        <div class="ipost clearfix">
                                            <div class="entry-image">
                                                <a href="#">
                                                <?php if(!empty($model->second_img)){ ?>
                                                <img class="image_fade" src="/img/sub/<?= $post->second_img ?>" alt="<?= $post->getLang('title')?>">
                                                </a>
                                                <?php } else{ ?>
                                                <img class="image_fade" src="/images/blog/small/1.jpg" alt="<?= $post->getLang('title')?>">
                                                </a>
                                                <?php }?>
                                            </div>
                                            <div class="entry-title">
                                                <h3><a href="blog-single.html"><?= $post->getLang('title') ?></a></h3>
                                            </div>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> <?= date('d/m/y',strtotime($post->created_date)) ?></li>
                                            </ul>
                                            <div class="entry-content">
                                                <?= substr($post->getLang('content'),0,200)?>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; } ?>    
                                </div>



                            </div>

                            <?= \frontend\widgets\WSideBarMain::widget() ?>

                        </div>

                    </div>
                    
                    <div class="container clearfix">
                        <div class="clear"></div>

                        <div class="fancy-title title-center title-dotted-border topmargin">
                            <h3><?= Yii::t('main','Kitob olami')?></h3>
                        </div>

                        <div id="oc-portfolio" class="owl-carousel portfolio-carousel">

                        <?php 
                        $library = \common\models\LibrarySub::find()->where(['status'=>1])->orderBy('Rand()')->limit(8)->all();
                        foreach($library as $one ){
                        ?>    
                            <div class="oc-item">
                                <div class="iportfolio">
                                    <div class="portfolio-image">
                                        <a href="#">
                                            <img src="/img/library/sub/<?= $one->img ?>" alt="Open Imagination">
                                        </a>
                                        <div class="portfolio-overlay">
                                            <a href="/img/library/sub/<?= $one->img ?>" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                                            <a href="<?= \yii\helpers\Url::to()?>" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                    </div>
                                    <div class="portfolio-desc">
                                        <h3><a href="<?= \yii\helpers\Url::to()?>">
                                        <?= $one->getLang('name') ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>    
                        </div>

                        <script type="text/javascript">

                            jQuery(document).ready(function($) {

                                var ocPortfolio = $("#oc-portfolio");

                                ocPortfolio.owlCarousel({
                                    margin: 20,
                                    nav: true,
                                    navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                                    autoplay: true,
                                    autoplayHoverPause: true,
                                    dots: false,
                                    responsive:{
                                        0:{ items:1 },
                                        600:{ items:2 },
                                        1000:{ items:3 },
                                        1200:{ items:4 }
                                    }
                                });

                            });

                        </script>

                    </div>
                </div>

            </section><!-- #content end -->