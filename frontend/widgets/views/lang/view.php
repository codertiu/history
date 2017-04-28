<?php
use yii\helpers\Html;
?>
<div id="top-bar" class="top-color">

                <div class="container clearfix">

                    <div class="col_half nobottommargin">

                        <!-- Top Links
                        ============================================= -->
                        <div class="top-links">
                            <ul>
                                <li><a href=""><?= $current->url;?></a></li>
                                <?php foreach ($langs as $lang):?>
                                <li>
                                    <?= Html::a($lang->url, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- .top-links end -->

                    </div>

                    <div class="col_half fright col_last nobottommargin">

                        <!-- Top Social
                        ============================================= -->
                        <div id="top-social">
                            <ul>
                                <li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                                <li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                                <li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                                <li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
                                <li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@canvas.com</span></a></li>
                            </ul>
                        </div><!-- #top-social end -->

                    </div>

                </div>

            </div>