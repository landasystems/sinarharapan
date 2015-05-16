<?php

/**
 * This is the model class for table "perawatan_truk_det".
 *
 * The followings are the available columns in table 'perawatan_truk_det':
 * @property integer $id
 * @property integer $perawatan_truk_id
 * @property string $keterangan
 * @property integer $harga
 * @property integer $qty
 * @property integer $debet
 * @property string $credit
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class PerawatanTrukDet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'perawatan_truk_det';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perawatan_truk_id, harga, qty, debet, created_user_id', 'numerical', 'integerOnly'=>true),
			array('keterangan', 'length', 'max'=>255),
			array('credit', 'length', 'max'=>45),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, perawatan_truk_id, keterangan, harga, qty, debet, credit, created_user_id, created, modified', 'safe', 'on'=>'search'),
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
			'perawatan_truk_id' => 'Perawatan Truk',
			'keterangan' => 'Keterangan',
			'harga' => 'Harga',
			'qty' => 'Qty',
			'debet' => 'Debet',
			'credit' => 'Credit',
			'created_user_id' => 'Created User',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('perawatan_truk_id',$this->perawatan_truk_id);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('debet',$this->debet);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('created_user_id',$this->created_user_id);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array('defaultOrder' => 'id DESC')
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerawatanTrukDet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
