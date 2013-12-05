<?php

/**
 * This is the model class for table "kegiatan_kerja".
 *
 * The followings are the available columns in table 'kegiatan_kerja':
 * @property integer $id
 * @property string $tanggal
 * @property string $kegiatan
 * @property string $tempat
 * @property string $waktu
 * @property string $yang_menghadiri
 * @property integer $user_id
 */
class KegiatanKerja extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KegiatanKerja the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kegiatan_kerja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, kegiatan', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('kegiatan, tempat, yang_menghadiri, waktu', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal, kegiatan, tempat, waktu, yang_menghadiri, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user'=>array(self::BELONGS_TO,'User','user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal',
			'kegiatan' => 'Kegiatan',
			'tempat' => 'Tempat',
			'waktu' => 'Waktu',
			'yang_menghadiri' => 'Yang Menghadiri',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition = 'tanggal >= :tanggal_awal AND tanggal <= :tanggal_akhir';
		$criteria->params = array(':tanggal_awal'=>Bantu::getTanggalAwal(),':tanggal_akhir'=>Bantu::getTanggalAkhir());
		
		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('tempat',$this->tempat,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('yang_menghadiri',$this->yang_menghadiri,true);
		$criteria->compare('user_id',$this->user_id);
		
		$criteria->order = 'tanggal ASC';
		
		if(Yii::app()->user->isAdmin() or Yii::app()->user->isBidang())
		{
			$criteria->addCondition('user_id = '.Bantu::getUserId());
		} else {
			$criteria->addCondition('user_id = '.Yii::app()->user->id);
		}
		
		
				
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'tanggal >= :tanggal_awal AND tanggal <= :tanggal_akhir';
		$criteria->params = array(':tanggal_awal'=>Bantu::getTanggalAwal(),':tanggal_akhir'=>Bantu::getTanggalAkhir());
		
		$criteria->order = 'tanggal ASC';
		
		if(Yii::app()->user->isAdmin())
		{
			if(!empty($_POST['user_id']))
			$criteria->addCondition('user_id = '.Bantu::getUserId());
		} else {
			$criteria->addCondition('user_id = '.Yii::app()->user->id);
		}
		
		$model = KegiatanKerja::model()->findAll($criteria);
		
		if($model!==null)
			return $model;
		else
			return false;
	}
}