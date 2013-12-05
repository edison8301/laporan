<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/admin/main'); ?>
    <div class="navbar">
        <div class="navbar-inner">
                <a class="brand" href="<?php print Yii::app()->request->baseUrl; ?>"><span class="first">Dinas Pekerjaan Umum Kepulauan Bangka Belitung</span> </a>
        </div>
    </div>
	<div class="row-fluid">
		<?php echo $content; ?>
	</div>
<?php $this->endContent(); ?>