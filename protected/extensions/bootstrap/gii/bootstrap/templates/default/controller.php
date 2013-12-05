<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass . "\n"; ?>
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','export','exportAll','exportWord','exportExcel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public $menu = array(
			array('label'=>'<?php echo $this->modelClass; ?>','url'=>array('admin'),'icon'=>'list'),
			array('label'=>'Tambah','url'=>array('create'),'icon'=>'plus'),
			array('label'=>'Export Word','url'=>array('exportWord'),'icon'=>'download-alt'),
			array('label'=>'Export Excel','url'=>array('exportExcel'),'icon'=>'download-alt'),
	);

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionExport($id)
	{
		$this->render('export',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionExportAll()
	{
		$this->render('export_all',array(
			'model'=>$this->loadModel($id),
		));
	}
	

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	
	public function actionCreate()
	{
		$model=new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success','Data berhasil disimpan');
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success','Data berhasil disimpan');
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else	
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

/**
* Lists all models.
*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('<?php echo $this->modelClass; ?>');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	
	public function actionAdmin()
	{
		$model=new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes=$_GET['<?php echo $this->modelClass; ?>'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionExportWord()
	{
		spl_autoload_unregister(array('YiiBase','autoload'));
		
		Yii::import('application.vendors.PHPWord',true);
		
		spl_autoload_register(array('YiiBase', 'autoload'));
		
		$PHPWord = new PHPWord();
		
		$PHPWord->addFontStyle('bold', array('bold'=>true));
		$PHPWord->addFontStyle('subjudul', array('name'=>'Arial','bold'=>true, 'size'=>11));
		$PHPWord->addFontStyle('judul', array('bold'=>true, 'size'=>16,'align'=>'center','name'=>'Times New Roman'));
		
		$tableStyle = array(
					'borderSize'=>1, 
					'borderColor'=>'000000', 
					'cellMargin'=>80,
					'border'=>true
		);
			
		$PHPWord->addTableStyle('tableStyle', $tableStyle);
		
		$center = array('align'=>'center');
		
		$paraStyle = array('spaceAfter'=>'2');
		$headStyle = array('spaceAfter'=>'2','align'=>'center');
		
		$section = $PHPWord->createSection(array('orientation'=>'landscape','marginLeft'=>500, 'marginRight'=>500, 'marginTop'=>500, 'marginBottom'=>500));
		
		$section->addText('DATA <?php print $this->modelClass; ?>',array('bold'=>true,'name'=>'Times New Roman','size'=>'14'),$center);		
		
		$section->addTextBreak(1);		
		
		$table = $section->addTable('tableStyle');
		
		$table->addRow();
			
		$table->addCell(500)->addText("No",array('bold'=>'true'),$headStyle);
			
		<?php foreach ($this->tableSchema->columns as $column) { ?>
		$table->addCell(2000)->addText('<?php print ucwords(str_replace('_',' ',$column->name)); ?>',array('bold'=>'true'),$headStyle);
		<?php } ?>
			
		$i=1;
		
		foreach(<?php print $this->modelClass; ?>::model()->findAll() as $data)
		{
			$table->addRow();
			$table->addCell(100)->addText($i,array(),$paraStyle);
			<?php foreach ($this->tableSchema->columns as $column) { ?>
			$table->addCell(100)->addText($data-><?php print $column->name; ?>,array(),$paraStyle);
			<?php } ?>
				
			$i++;
		}		
	
		$section->addTextBreak(1);		
		
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		
		$pathFile = Yii::app()->basePath.'/../uploads/export/';
		
		$filename = time().'_<?php print $this->modelClass; ?>.docx';
		
		$objWriter->save($pathFile.$filename);
		
		$this->redirect(Yii::app()->request->baseUrl.'/uploads/export/'.$filename);
		
	
	}
	
	public function actionExportExcel()
	{
		spl_autoload_unregister(array('YiiBase','autoload'));
		
		Yii::import('application.vendors.PHPExcel',true);
		
		spl_autoload_register(array('YiiBase', 'autoload'));

		$PHPExcel = new PHPExcel();
			
		$PHPExcel->getActiveSheet()->setCellValue('A1', 'DATA <?php print $this->modelClass; ?>');
		
		$PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	
		$PHPExcel->getActiveSheet()->setCellValue('A3', 'No');
			
		<?php $char = 66; foreach ($this->tableSchema->columns as $column) { ?>
		$PHPExcel->getActiveSheet()->setCellValue('<?php print chr($char); ?>3', '<?php print ucwords(str_replace('_',' ',$column->name)); ?>');
		
		<?php $char++; } ?>
		
		<?php $char--; ?>
		$PHPExcel->getActiveSheet()->getStyle('A3:<?php print chr($char); ?>3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);				
		$PHPExcel->getActiveSheet()->getStyle('A3:<?php print chr($char); ?>3')->getFont()->setBold(true);
		$PHPExcel->getActiveSheet()->getStyle('A3:<?php print chr($char); ?>3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		
		<?php for($i=66;$i<=$char;$i++) { ?>
		$PHPExcel->getActiveSheet()->getColumnDimension('<?php print chr($i); ?>')->setWidth(20);
		<?php } ?>
		
		$i = 1;
		$kolom = 4;

		foreach(<?php print $this->modelClass; ?>::model()->findAll() as $data)
		{
			$PHPExcel->getActiveSheet()->setCellValue('A'.$kolom, $i);
			<?php $char = 66; foreach ($this->tableSchema->columns as $column) { ?>
			$PHPExcel->getActiveSheet()->setCellValue('<?php print chr($char); ?>'.$kolom, $data-><?php print $column->name; ?>);
			<?php $char++; } ?>
			
			<?php $char--; ?>
			$PHPExcel->getActiveSheet()->getStyle('A'.$kolom.':<?php print chr($char); ?>'.$kolom)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$i++; $kolom++;
		}
	
			$filename = time().'_<?php print $this->modelClass; ?>.xlsx';

			$path = Yii::app()->basePath.'/../uploads/export/';
			$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
			$objWriter->save($path.$filename);	
			$this->redirect(Yii::app()->request->baseUrl.'/uploads/export/'.$filename);
	}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
	public function loadModel($id)
	{
		$model=<?php echo $this->modelClass; ?>::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
