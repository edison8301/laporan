<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->menu=array(
	array('label'=>'Izin Usaha Angkutan','url'=>array('iua/admin'),'icon'=>'tags'),
	array('label'=>'Izin Bongkar Muat','url'=>array('ibm/admin'),'icon'=>'tags'),
	array('label'=>'Jenis Kendaraan','url'=>array('jenisKendaraan/admin'),'icon'=>'tags'),
	array('label'=>'Merek','url'=>array('merek/admin'),'icon'=>'tags'),
	array('label'=>'Jenis Usaha','url'=>array('create'),'icon'=>'tags'),
);

?>

<h1>Selamat Datang di Aplikasi SIPA</h1>

<p>Aplikasi ini dibuat untuk memudahkan pengelolaan data pelaporan</p>

<p>Silahkan gunakan menu navigasi pada bagian atas halaman</p>


