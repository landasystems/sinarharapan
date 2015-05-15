<?php

/**
 * This is the model class for table "{{girik}}".
 *
 * The followings are the available columns in table '{{girik}}':
 * @property integer $id
 * @property string $tanggal
 * @property integer $nomor_girik
 * @property double $berat
 * @property integer $total
 * @property integer $solar
 * @property integer $fee_sopir
 * @property integer $fee_truk
 * @property integer $sopir_id
 * @property integer $truk_id
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class Girik extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{girik}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('id, nomor_girik, total, solar, fee_sopir, fee_truk, sopir_id, truk_id, created_user_id', 'numerical', 'integerOnly' => true),
            array('berat', 'numerical'),
            array('tanggal, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tanggal, nomor_girik, berat, total, solar, fee_sopir, fee_truk, sopir_id, truk_id, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Sopir' => array(self::BELONGS_TO, 'Sopir', 'sopir_id'),
            'Truk' => array(self::BELONGS_TO, 'Truk', 'truk_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'nomor_girik' => 'Nomor Girik',
            'berat' => 'Berat',
            'total' => 'Total',
            'solar' => 'Solar',
            'fee_sopir' => 'Ongkos Sopir',
            'fee_truk' => 'Fee Truk',
            'sopir_id' => 'Sopir',
            'truk_id' => 'Kendaraan',
            'created_user_id' => 'Created User',
            'created' => 'Created',
            'modified' => 'Modified',
        );
    }

    public function getSopir() {
        return (!empty($this->Sopir->nama)) ? $this->Sopir->nama : '-';
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('nomor_girik', $this->nomor_girik);
        $criteria->compare('berat', $this->berat);
        $criteria->compare('total', $this->total);
        $criteria->compare('solar', $this->solar);
        $criteria->compare('fee_sopir', $this->fee_sopir);
        $criteria->compare('fee_truk', $this->fee_truk);
        $criteria->compare('sopir_id', $this->sopir_id);
        $criteria->compare('truk_id', $this->truk_id);
        $criteria->compare('created_user_id', $this->created_user_id);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'id DESC')
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Girik the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
