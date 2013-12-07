<?php

/**
 * This is the model class for table "capaian_kinerja".
 *
 * The followings are the available columns in table 'capaian_kinerja':
 * @property integer $id
 * @property string $kode
 * @property string $program
 * @property string $kegiatan
 * @property string $indikator
 * @property string $target
 * @property string $realisasi
 * @property string $keterangan
 * @property integer $user_id
 */
class CapaianKinerja extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CapaianKinerja the static model class
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
		return 'capaian_kinerja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode', 'required'),
			array('user_id, urutan', 'numerical', 'integerOnly'=>true),
			array('kode, program, kegiatan, jenis_indikator, indikator, target, realisasi, keterangan', 'length', 'max'=>255),
			array('tahun','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode, program, kegiatan, indikator, target, realisasi, keterangan, user_id', 'safe', 'on'=>'search'),
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
			'kode' => 'Kode',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'indikator' => 'Indikator',
			'target' => 'Target',
			'realisasi' => 'Realisasi',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('program',$this->program,true);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('jenis_indikator',$this->jenis_indikator,true);
		$criteria->compare('indikator',$this->indikator,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('realisasi',$this->realisasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('user_id',$this->user_id);
		
		$criteria->addCondition('tahun = '.Bantu::getTahun());
		
		if(Yii::app()->user->isAdmin())
		{
			$criteria->addCondition('user_id = '.Bantu::getUserId());
		} else {
			$criteria->addCondition('user_id = '.Yii::app()->user->id);
		}
		
		$criteria->order = 'urutan ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('tahun = '.Bantu::getTahun());
		$criteria->addCondition('user_id = '.Bantu::getUserId());
		$criteria->order = 'urutan ASC';
		
		return CapaianKinerja::model()->findAll($criteria);
	}
	
	public function updateUrutan()
	{
		$i=1;
		foreach(CapaianKinerja::model()->findAllByAttributes(array('user_id'=>$this->user_id,'tahun'=>$this->tahun),array('order'=>'urutan ASC')) as $data)
		{
			$data->urutan = $i;
			$data->save();
			$i++;
		}
		
		return true;
	}
}