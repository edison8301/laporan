<?php

/**
 * This is the model class for table "pelanggaran_lalin".
 *
 * The followings are the available columns in table 'pelanggaran_lalin':
 * @property integer $id
 * @property string $tanggal_penindakan
 * @property string $tanggal_sidang
 * @property string $nomor
 * @property string $pelanggaran
 * @property string $keterangan
 */
class PelanggaranLalin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PelanggaranLalin the static model class
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
		return 'pelanggaran_lalin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_penindakan', 'required'),
			array('nomor, pelanggaran, keterangan', 'length', 'max'=>255),
			array('tanggal_sidang', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal_penindakan, tanggal_sidang, nomor, pelanggaran, keterangan', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal_penindakan' => 'Tanggal Penindakan',
			'tanggal_sidang' => 'Tanggal Sidang',
			'nomor' => 'Nomor',
			'pelanggaran' => 'Pelanggaran',
			'keterangan' => 'Keterangan',
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
		
		$criteria->condition = 'tanggal_penindakan >= :tanggal_awal AND tanggal_penindakan <= :tanggal_akhir';
		$criteria->params = array(':tanggal_awal'=>Bantu::getTanggalAwal(),':tanggal_akhir'=>Bantu::getTanggalAkhir());
		
		$criteria->order = 'tanggal_penindakan ASC';
		
		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal_penindakan',$this->tanggal_penindakan,true);
		$criteria->compare('tanggal_sidang',$this->tanggal_sidang,true);
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('pelanggaran',$this->pelanggaran,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'tanggal_penindakan >= :tanggal_awal AND tanggal_penindakan <= :tanggal_akhir';
		$criteria->params = array(':tanggal_awal'=>Bantu::getTanggalAwal(),':tanggal_akhir'=>Bantu::getTanggalAkhir());
		
		$criteria->order = 'tanggal_penindakan ASC';
		
		$model = PelanggaranLalin::model()->findAll($criteria);
		
		if($model!==null)
			return $model;
		else
			return false;
	}
}