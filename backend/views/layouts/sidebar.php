 <?php
use yii\helpers\Url;
 ?>
 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= Yii::$app->user->identity->username ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><?= Yii::t('main','MAIN NAVIGATION') ?></li>
            <li class="<?= $this->title=='Menus'?'active':'' ?>">
              <a href="<?= Url::to(['/menu/index'])?>">
                <i class="fa fa-bars"></i> <span><?= Yii::t('main','Menu')?></span>
              </a>
            </li>
            <li class="<?= $this->title=='Pages'?'active':'' ?>">
              <a href="<?= Url::to(['/page/index'])?>">
                <i class="fa fa-files-o"></i>
                <span><?= Yii::t('main','Pages')?></span>
              </a>
            </li>
            
          
            <li class="<?php echo $this->title=='Categories'?'active':''; echo $this->title=='Posts'?'active':''; ?> treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span><?= Yii::t('main','Posts')?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?= $this->title=='Categories'?'active':'' ?>">
                <a href="<?= Url::to(['/category/index'])?>">
                  <i class="fa fa-tags"></i> <span><?= Yii::t('main','Categroy')?></span>
                </a>
                </li>
                <li class="<?= $this->title=='Posts'?'active':'' ?>">
                <a href="<?= Url::to(['/post/index'])?>">
                  <i class="fa fa-list-alt"></i> <span><?= Yii::t('main','Posts')?></span>
                </a>
                </li>
              </ul>
            </li>
            <li class="<?php echo $this->title == 'Galleries'?'active':'';
                            echo $this->title == 'Gallery Subs'?'active':'';
                           echo $this->title == 'Videos'?'active':'';
                           echo $this->title == 'Video Subs'?'active':''; 
             ?> treeview">
              <a href="#">
                <i class="fa fa-play"></i> <span><?= Yii::t('mian','Media') ?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?= $this->title=='Galleries'?'active':'' ?>" >
                <a href="<?= Url::to(['/gallery/index'])?>">
                  <i class="fa fa-camera"></i> <span><?= Yii::t('main','Gallery')?></span>
                </a>
                </li>
                <li class="<?= $this->title=='Gallery Subs'?'active':'' ?>">
                <a href="<?= Url::to(['/gallery-sub/index'])?>">
                  <i class="fa fa-picture-o"></i> <span><?= Yii::t('main','GallerySub')?></span>
                </a>
                </li>
                <li class="<?= $this->title=='Videos'?'active':'' ?>">
                <a href="<?= Url::to(['/video/index'])?>">
                  <i class="fa fa-video-camera""></i> <span><?= Yii::t('main','Video')?></span>
                </a>
                </li>
                <li class="<?= $this->title=='Video Subs'?'active':'' ?>">
                <a href="<?= Url::to(['/video-sub/index'])?>">
                  <i class="fa fa-file-video-o"></i> <span><?= Yii::t('main','VideoSub')?></span>
                </a>
                </li>
              </ul>
            </li>
            <li class="<?php echo $this->title=='Libraries'?'active':''; echo $this->title=='Library Subs'?'active':''; ?> treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span><?= Yii::t('main','Books')?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?= $this->title=='Libraries'?'active':'' ?>">
                <a href="<?= Url::to(['/library/index'])?>">
                  <i class="fa fa-bookmark"></i> <span><?= Yii::t('main','Library')?></span>
                </a>
                </li>
                <li class="<?= $this->title=='Library Subs'?'active':'' ?>" >
                <a href="<?= Url::to(['/library-sub/index'])?>">
                  <i class="fa fa-bookmark-o"></i> <span><?= Yii::t('main','LibrarSub')?></span>
                </a>
                </li>
              </ul>
            </li>
            <li class="<?= $this->title=='Quotes'?'active':'' ?>">
              <a href="<?= Url::to(['/quote/index'])?>">
                <i class="fa fa-bars"></i> <span><?= Yii::t('main','Quotes')?></span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span><?= Yii::t('main','Settings')?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="">
                <a href="<?= Url::to(['/lang/index'])?>">
                  <i class="fa fa-bookmark"></i> <span><?= Yii::t('main','Language')?></span>
                </a>
                </li>
                <li class="" >
                <a href="<?= Url::to(['/users/index'])?>">
                  <i class="fa fa-users"></i> <span><?= Yii::t('main','Users')?></span>
                </a>
                </li>
                <li class="" >
                <a href="<?= Url::to(['/message/index'])?>">
                  <i class="fa fa-commenting"></i> <span><?= Yii::t('main','Message')?></span>
                </a>
                </li>
                <li class="" >
                <a href="<?= Url::to(['/source-message/index'])?>">
                  <i class="fa fa-comment"></i> <span><?= Yii::t('main','SourceMessage')?></span>
                </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>