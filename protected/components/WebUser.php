<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->first_name;
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
	function isAdmin(){
		$user = $this->loadUser(Yii::app()->user->id);
		return intval($user->role_id) == 1;
	}
	
	function isBidang(){
		$user = $this->loadUser(Yii::app()->user->id);
		return intval($user->role_id) == 2;
	}
	
	public function role_id()
	{
		return $this->loadUser(Yii::app()->user->id)->role_id;
	}
	
	public function aksesKegiatanKerja()
	{
		$akses = 1;
		
		return $akses;
	}
	
	public function aksesCapaianKinerja()
	{
		$akses = 0;
		
		if(Yii::app()->user->role_id() == 1) $akses = 1;
		if(Yii::app()->user->role_id() == 2) $akses = 1;
		
		return $akses;
	}
	
	public function aksesPelanggaranLalin()
	{
		$akses = 0;
		
		if(Yii::app()->user->role_id() == 1) $akses = 1;	
		if(Yii::app()->user->role_id() == 3) $akses = 1;
		
		foreach(User::model()->findAllByAttributes(array('parent_id'=>Yii::app()->user->id)) as $data)
		{
			if($data->role_id == 3) $akses = 1;
		}
		
		return $akses;
	}
	
	public function aksesPengaturan()
	{
		$akses = 0;
		
		if(Yii::app()->user->role_id() == 1) $akses = 1;	
		
		return $akses;
	}
	
	public function aksesRealisasi()
	{
		$akses = 0;
		
		if(Yii::app()->user->role_id() == 1) $akses = 1;	
		if(Yii::app()->user->role_id() == 4) $akses = 1;
		
		foreach(User::model()->findAllByAttributes(array('parent_id'=>Yii::app()->user->id)) as $data)
		{
			if($data->role_id == 4) $akses = 1;
		}
		
		return $akses;
	}
  
  
  
 
  // Load user model.
	protected function loadUser($id=null)
	{
		if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        
		return $this->_model;
   }
}
?>