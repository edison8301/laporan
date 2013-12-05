<?php $this->beginContent('//layouts/admin/main'); ?>
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <li><a href="<?php print Yii::app()->request->baseUrl; ?>index.php?r=site/logout" class="hidden-phone visible-tablet visible-desktop" role="button">&nbsp;</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> &nbsp;
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">My Account</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone visible-tablet visible-desktop" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php print Yii::app()->request->baseUrl; ?>index.php?r=site/logout">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php print Yii::app()->request->baseUrl; ?>"><span class="first">Dinas Pekerjaan Umum Kepulauan Bangka Belitung</span> </a>
        </div>
    </div>
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>
		
		
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'list',
			'stacked'=>true,
			'items'=>array(
				
				array('label'=>'Dashboard','url'=>array('site/admin'),'icon'=>'home white'),
				array('label'=>'Website','url'=>array('site/index'),'icon'=>'arrow-right white','linkOptions'=>array('target'=>'_blank')),
				array('label'=>'Menu','url'=>array('menu/admin'),'icon'=>'list-alt white'),
				array('label'=>'Laman','url'=>array('page/admin'),'icon'=>'file white'),
				array('label'=>'Artikel','url'=>array('post/admin'),'icon'=>'book white'),
				array('label'=>'Foto','url'=>array('photo/admin'),'icon'=>'camera white'),
				array('label'=>'Video','url'=>array('video/admin'),'icon'=>'film white'),
				array('label'=>'Block','url'=>array('block/admin'),'icon'=>'th-large white'),
				array('label'=>'Slide','url'=>array('slide/admin'),'icon'=>'play-circle white'),
				array('label'=>'Theme','url'=>array('theme/admin'),'icon'=>'picture white'),
				array('label'=>'User','url'=>array('user/admin'),'icon'=>'user white'),
				array('label'=>'Setting','url'=>array('setting/admin'),'icon'=>'wrench white'),
				array('label'=>'Logout','url'=>array('site/logout'),'icon'=>'remove white'),
				
				
			),
		)); ?>
		
        
    </div>
    

    
    <div class="content">
        
        <div class="header">
            <h1 class="page-title"><?php print $this->pageTitle; ?></h1>
        </div>
        
        <ul class="breadcrumb" style="margin-top:0px !important">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Dashboard</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
	<div class="row-fluid">
	
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div class="alert alert-' . $key . '">';
				echo '<button type="button" class="close" data-dismiss="alert">×</button>';
				print $message;
				print "</div>\n";
				
				
			}
		?>
		
		<?php print $content; ?>
	</div>


                    
                    <footer>
                        <hr>
						<?php /*
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        */ ?>

                        <p>Copyright &copy; 2013 <a href="http://www.portnine.com" target="_blank">Dinas Pekerjaan Umum Kepulauan Bangka Belitung</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    
<?php $this->endContent(); ?>

   


