<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favico.ico" type="image/x-icon" />
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>
	
		<div id="page-login" class="container">
			<div class="row-fluid">
				<div class="span12"><h3>SISTEM INFORMASI MANAJEMEN PELAPORAN</h3></div>
			</div>
			<div class="row-fluid">
				<div class="span12"><?php echo $content;?></div>
			</div>
		</div>
</body>
</html>