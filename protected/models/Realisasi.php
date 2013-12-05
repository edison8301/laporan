<?php

/**
 * This is the model class for table "realisasi".
 *
 * The followings are the available columns in table 'realisasi':
 * @property integer $id
 * @property string $kegiatan
 * @property string $pagu_anggaran
 * @property string $pagu_kontrak
 * @property string $pelaksana_kontrak
 * @property string $lokasi_kegiatan
 * @property string $waktu_pelaksanaan
 * @property string $realisasi_anggaran
 * @property string $output_fisik
 * @property string $output_nonfisik
 * @property string $capaian
 * @property string $keterangan
 * @property string $tahun
 */
class Realisasi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Realisasi the static model class
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
		return 'realisasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kegiatan', 'required'),
			array('kegiatan, pelaksana_kontrak, lokasi_kegiatan, output_fisik, output_nonfisik, keterangan', 'length', 'max'=>255),
			array('pagu_anggaran, pagu_kontrak, realisasi_anggaran', 'length', 'max'=>20),
			array('capaian', 'length', 'max'=>10),
			array('tahun', 'length', 'max'=>4),
			array('waktu_pelaksanaan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kegiatan, pagu_anggaran, pagu_kontrak, pelaksana_kontrak, lokasi_kegiatan, waktu_pelaksanaan, realisasi_anggaran, output_fisik, output_nonfisik, capaian, keterangan, tahun', 'safe', 'on'=>'search'),
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
			'kegiatan' => 'Kegiatan',
			'pagu_anggaran' => 'Pagu Anggaran',
			'pagu_kontrak' => 'Pagu Kontrak',
			'pelaksana_kontrak' => 'Pelaksana Kontrak',
			'lokasi_kegiatan' => 'Lokasi Kegiatan',
			'waktu_pelaksanaan' => 'Waktu Pelaksanaan',
			'realisasi_anggaran' => 'Realisasi Anggaran',
			'output_fisik' => 'Output Fisik',
			'output_nonfisik' => 'Output Nonfisik',
			'capaian' => 'Capaian',
			'keterangan' => 'Keterangan',
			'tahun' => 'Tahun',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('pagu_anggaran',$this->pagu_anggaran,true);
		$criteria->compare('pagu_kontrak',$this->pagu_kontrak,true);
		$criteria->compare('pelaksana_kontrak',$this->pelaksana_kontrak,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan,true);
		$criteria->compare('waktu_pelaksanaan',$this->waktu_pelaksanaan,true);
		$criteria->compare('realisasi_anggaran',$this->realisasi_anggaran,true);
		$criteria->compare('output_fisik',$this->output_fisik,true);
		$criteria->compare('output_nonfisik',$this->output_nonfisik,true);
		$criteria->compare('capaian',$this->capaian,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('tahun',$this->tahun,true);
		
		$criteria->order = 'waktu_pelaksanaan ASC';
		
		$criteria->addCondition('tahun = '.Bantu::getTahun());

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData() 
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'tahun=:tahun';
		$criteria->params=array(':tahun'=>Bantu::getTahun());
		$criteria->order = 'waktu_pelaksanaan ASC';
		
		return Realisasi::model()->findAll($criteria);
	}
}