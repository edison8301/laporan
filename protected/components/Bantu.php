<?php

class Bantu {

	public function rp($jumlah)
	{
		$output = "Rp ".number_format($jumlah,0,',','.');
		
		return $output;
	}
	
	public function tanggalSingkat($tanggal=null)
	{
		$output = '';
		
		if($tanggal!=null)
		{
			$tanggal = explode('-',$tanggal);
				
			$output = $tanggal[2].'-'.$tanggal[1].'-'.$tanggal[0];
		}
		
		return $output;
	}
	
	public function getTanggalAwal()
	{
		$tanggal_awal = date('Y').'-01-01';
		
		if(!empty($_POST['tanggal_awal'])) $tanggal_awal = $_POST['tanggal_awal'];
		if(!empty($_GET['tanggal_awal'])) $tanggal_awal = $_GET['tanggal_awal'];
		
		return $tanggal_awal;
	}
	
	public function getTanggalAkhir()
	{
		$tanggal_akhir = date('Y').'-12-31';
		
		if(!empty($_POST['tanggal_akhir'])) $tanggal_akhir = $_POST['tanggal_akhir'];
		if(!empty($_GET['tanggal_akhir'])) $tanggal_akhir = $_GET['tanggal_akhir'];
		
		return $tanggal_akhir;
	}
	
	public function getTahun()
	{
		$tahun = date('Y');
		
		if(!empty($_POST['tahun'])) $tahun = $_POST['tahun'];
		if(!empty($_GET['tahun'])) $tahun = $_GET['tahun'];
		
		return $tahun;
	}
	
	public function getUserId()
	{
		$user_id = Yii::app()->user->id;
		
		if(!empty($_POST['user_id'])) $user_id = $_POST['user_id'];
		if(!empty($_GET['user_id'])) $user_id = $_GET['user_id'];
		
		return $user_id;
	}

}

?>