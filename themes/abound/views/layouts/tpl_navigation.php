<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">SIM Pelaporan</a>
          
          <div class="nav-collapse">
			<?php $this->widget('bootstrap.widgets.TbMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Dashboard', 'url'=>array('/site/index')),
                        array('label'=>'Kegiatan Kerja', 'url'=>'#','visible'=>Yii::app()->user->aksesKegiatanKerja(),'items'=>array(
							array('label'=>'Kelola','url'=>array('kegiatanKerja/admin'),'icon'=>'list'),
							array('label'=>'Tambah','url'=>array('kegiatanKerja/create'),'icon'=>'plus'),
							
						)),
						array('label'=>'Capaian Kinerja', 'url'=>'#','visible'=>Yii::app()->user->aksesCapaianKinerja(),'items'=>array(
							array('label'=>'Kelola','url'=>array('capaianKinerja/admin'),'icon'=>'list'),
							array('label'=>'Tambah','url'=>array('capaianKinerja/create'),'icon'=>'plus'),
						)),
                        array('label'=>'Pelanggaran', 'url'=>'#','visible'=>Yii::app()->user->aksesPelanggaranLalin(),'items'=>array(
							array('label'=>'Kelola', 'url'=>array('/pelanggaranLalin/admin'),'icon'=>'list'),
							array('label'=>'Tambah', 'url'=>array('/pelanggaranLalin/create'),'icon'=>'plus'),
                        )),
						array('label'=>'Realisasi', 'url'=>'#','visible'=>Yii::app()->user->aksesRealisasi(),'items'=>array(
							array('label'=>'Kelola', 'url'=>array('/realisasi/admin'),'icon'=>'list'),
							array('label'=>'Tambah', 'url'=>array('/realisasi/create'),'icon'=>'plus'),
                        )),
                        array('label'=>'Pengaturan', 'url'=>'#','visible'=>Yii::app()->user->aksesPengaturan(),'items'=>array(
							array('label'=>'User', 'url'=>array('/user/admin'),'icon'=>'tags'),
							//array('label'=>'Role', 'url'=>array('/role/admin'),'icon'=>'tags'),	
                        )),
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>


<?php /*
<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->
*/ ?>