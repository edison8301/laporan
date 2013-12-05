<?php

class PelanggaranLalinController extends Controller
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
				'expression'=>'Yii::app()->user->aksesPelanggaranLalin()'
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','export','exportAll','exportWord','exportExcel'),
				'expression'=>'Yii::app()->user->aksesPelanggaranLalin()'
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=>'Yii::app()->user->aksesPelanggaranLalin()'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public $menu = array(
			array('label'=>'Pelanggaran Lalu Lintas','url'=>array('admin'),'icon'=>'list'),
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
		$model=new PelanggaranLalin;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
		if(isset($_POST['PelanggaranLalin']))
		{
			$model->attributes=$_POST['PelanggaranLalin'];
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

		if(isset($_POST['PelanggaranLalin']))
		{
			$model->attributes=$_POST['PelanggaranLalin'];
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
		$dataProvider=new CActiveDataProvider('PelanggaranLalin');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	
	public function actionAdmin()
	{
		$model=new PelanggaranLalin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PelanggaranLalin']))
			$model->attributes=$_GET['PelanggaranLalin'];

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
		
		$section = $PHPWord->createSection(array('marginLeft'=>500, 'marginRight'=>500, 'marginTop'=>500, 'marginBottom'=>500));
		
		$section->addText('DATA PELANGGARAN LALU LINTAS',array('bold'=>true,'name'=>'Times New Roman','size'=>'14'),$center);		
		
		$section->addTextBreak(1);		
		
		$table = $section->addTable('tableStyle');
		
		$table->addRow();
			
		$table->addCell(500)->addText("No",array('bold'=>'true'),$headStyle);
		$table->addCell(2500)->addText('Tanggal Penindakan',array('bold'=>'true'),$headStyle);
		$table->addCell(2500)->addText('Tanggal Sidang',array('bold'=>'true'),$headStyle);
		$table->addCell(2500)->addText('Nomor',array('bold'=>'true'),$headStyle);
		$table->addCell(5000)->addText('Pelanggaran',array('bold'=>'true'),$headStyle);
		$table->addCell(4000)->addText('Keterangan',array('bold'=>'true'),$headStyle);
					
		$i=1;
		
		foreach(PelanggaranLalin::model()->getData() as $data)
		{
			$table->addRow();
			$table->addCell(100)->addText($i,array(),$paraStyle);
			$table->addCell(100)->addText(Bantu::tanggalSingkat($data->tanggal_penindakan),array(),$paraStyle);
			$table->addCell(100)->addText(Bantu::tanggalSingkat($data->tanggal_sidang),array(),$paraStyle);
			$table->addCell(100)->addText($data->nomor,array(),$paraStyle);
			$table->addCell(100)->addText($data->pelanggaran,array(),$paraStyle);
			$table->addCell(100)->addText($data->keterangan,array(),$paraStyle);
							
			$i++;
		}		
	
		$section->addTextBreak(1);		
		
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		
		$pathFile = Yii::app()->basePath.'/../uploads/export/';
		
		$filename = time().'_PelanggaranLalin.docx';
		
		$objWriter->save($pathFile.$filename);
		
		$this->redirect(Yii::app()->request->baseUrl.'/uploads/export/'.$filename);
		
	
	}
	
	public function actionExportExcel()
	{
		spl_autoload_unregister(array('YiiBase','autoload'));
		
		Yii::import('application.vendors.PHPExcel',true);
		
		spl_autoload_register(array('YiiBase', 'autoload'));

		$PHPExcel = new PHPExcel();
			
		$PHPExcel->getActiveSheet()->setCellValue('A1', 'DATA PELANGGARAN LALU LINTAS');
		
		$PHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	
		$PHPExcel->getActiveSheet()->setCellValue('A3', 'No');
		$PHPExcel->getActiveSheet()->setCellValue('B3', 'Tanggal Penindakan');
		$PHPExcel->getActiveSheet()->setCellValue('C3', 'Tanggal Sidang');
		$PHPExcel->getActiveSheet()->setCellValue('D3', 'Nomor');
		$PHPExcel->getActiveSheet()->setCellValue('E3', 'Pelanggaran');
		$PHPExcel->getActiveSheet()->setCellValue('F3', 'Keterangan');
		
				
		$PHPExcel->getActiveSheet()->getStyle('A3:F3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);				
		$PHPExcel->getActiveSheet()->getStyle('A3:F3')->getFont()->setBold(true);
		$PHPExcel->getActiveSheet()->getStyle('A3:F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		
		$PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
				
		$i = 1;
		$kolom = 4;

		foreach(PelanggaranLalin::model()->getData() as $data)
		{
			$PHPExcel->getActiveSheet()->setCellValue('A'.$kolom, $i);
			$PHPExcel->getActiveSheet()->setCellValue('B'.$kolom, Bantu::tanggalSingkat($data->tanggal_penindakan));
			$PHPExcel->getActiveSheet()->setCellValue('C'.$kolom, Bantu::tanggalSingkat($data->tanggal_sidang));
			$PHPExcel->getActiveSheet()->setCellValue('D'.$kolom, $data->nomor);
			$PHPExcel->getActiveSheet()->setCellValue('E'.$kolom, $data->pelanggaran);
			$PHPExcel->getActiveSheet()->setCellValue('F'.$kolom, $data->keterangan);
						
			$PHPExcel->getActiveSheet()->getStyle('A'.$kolom.':F'.$kolom)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$i++; $kolom++;
		}
	
			$filename = time().'_PelanggaranLalin.xlsx';

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
		$model=PelanggaranLalin::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pelanggaran-lalin-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
