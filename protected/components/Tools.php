<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Tools {
    public static function number($number,$decimals=0){
		$result = number_format($number,$decimals,'.',',');
		
		return $result;
	}
	
    public static function getMonth($date, $model=1)
    {
	    
		list($year, $month, $day) = explode('-', $date);
	    
	    if($model==1)
	    {
		$month = Tools::getMonthName($month);
		
		$date = $day."-".$month."-".$year;
	    }
	    elseif($model==2)
	    {
		$date = $day."-".$month."-".$year;
	    }		
	    return $date;
    }
	
	public static function getTimeStampToDate($timeStamp)
	{
		list($date, $time) = explode(' ', $timeStamp);
		
		return $date;
	}
	
    
    public static function getMonthName($month)
    {
	switch ($month){
	    case '01' : $month = 'Januari'; break;
	    case '02' : $month = 'Februari'; break;
	    case '03' : $month = 'Maret'; break;
	    case '04' : $month = 'April'; break;
	    case '05' : $month = 'Mei'; break;
	    case '06' : $month = 'Juni'; break;
	    case '07' : $month = 'July'; break;
	    case '08' : $month = 'Agustus'; break;
	    case '09' : $month = 'September'; break;
	    case '10' : $month = 'Oktober'; break;
	    case '11' : $month = 'Nopember'; break;
	    case '12' : $month = 'Desember'; break;
	}
	
	return $month;
    }
    
    public static function getNamaHari($hari){
	
	switch($hari){     
	    case 0 : {
			$hari='Minggu';
		    }break;
	    case 1 : {
			$hari='Senin';
		    }break;
	    case 2 : {
			$hari='Selasa';
		    }break;
	    case 3 : {
			$hari='Rabu';
		    }break;
	    case 4 : {
			$hari='Kamis';
		    }break;
	    case 5 : {
			$hari="Jum'at";
		    }break;
	    case 6 : {
			$hari='Sabtu';
		    }break;
	    default: {
			$hari='UnKnown';
		    }break;
	}
	
	return $hari;
    }
    
}
?>