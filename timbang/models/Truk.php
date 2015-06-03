<?php

/**
 * This is the model class for table "{{truk}}".
 *
 * The followings are the available columns in table '{{truk}}':
 * @property integer $id
 * @property string $kode
 * @property string $nomor_polisi
 * @property string $merk
 * @property string $type
 * @property string $pajak
 * @property string $kir
 * @property string $stnk
 * @property integer $surat
 * @property integer $seling
 * @property integer $terpal
 * @property string $kunci
 * @property integer $sopir_id
 * @property integer $is_delete
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class Truk extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{truk}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('surat, seling, terpal, sopir_id, is_delete, created_user_id', 'numerical', 'integerOnly' => true),
            array('kode, merk, type, kunci', 'length', 'max' => 45),
            array('nomor_polisi, pajak, kir, stnk, seling, dongkrak, terpal, kunci, surat', 'required'),
            array('nomor_polisi', 'length', 'max' => 25),
            array('pajak, kir, dongkrak, stnk, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, kode, dongkrak, nomor_polisi, merk, type, pajak, kir, stnk, surat, seling, terpal, kunci, sopir_id, is_delete, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {

        return array(
            'Sopir' => array(self::BELONGS_TO, 'Sopir', 'sopir_id'),
        );
    }

    public function getNama() {
        $merk = '';
        if (!empty($this->merk))
            $merk = $this->merk;
        if (!empty($this->nomor_polisi))
            $merk .= " (" . $this->nomor_polisi . ") ";
        return $merk;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'nomor_polisi' => 'Plat Nomor',
            'merk' => 'Merk',
            'type' => 'Tipe Kendaraan',
            'pajak' => 'Pajak',
            'kir' => 'KIR',
            'stnk' => 'STNK',
            'dongkrak' => 'Dongkrak',
            'surat' => 'Surat',
            'seling' => 'Seling',
            'terpal' => 'Terpal',
            'kunci' => 'Kunci',
            'sopir_id' => 'Sopir',
            'is_delete' => 'Aktifasi truck',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('kode', $this->kode, true);
        $criteria->compare('nomor_polisi', $this->nomor_polisi, true);
        $criteria->compare('merk', $this->merk, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('pajak', $this->pajak, true);
        $criteria->compare('kir', $this->kir, true);
        $criteria->compare('stnk', $this->stnk, true);
        $criteria->compare('surat', $this->surat);
        $criteria->compare('seling', $this->seling);
        $criteria->compare('dongkrak', $this->dongkrak);
        $criteria->compare('terpal', $this->terpal);
        $criteria->compare('kunci', $this->kunci, true);
        $criteria->compare('sopir_id', $this->sopir_id);
        $criteria->compare('is_delete', $this->is_delete);
        $criteria->compare('created_user_id', $this->created_user_id);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'id DESC')
        ));
    }

    public function arrSurat() {
        $surat = array('1' => 'Ada', '2' => 'Tidak Ada');
        return $surat;
    }

    public function arrSeling() {
        $seling = array('1' => 'Ada', '2' => 'Tidak Ada');
        return $seling;
    }

    public function arrTerpal() {
        $terpal = array('1' => 'Ada', '2' => 'Tidak Ada');
        return $terpal;
    }

    public function arrDongkrak() {
        $dongkrak = array('1' => 'Ada', '2' => 'Tidak Ada');
        return $dongkrak;
    }

    public function arrKunci() {
        $kunci = array('1' => 'Ada', '2' => 'Tidak Ada');
        return $kunci;
    }

    public function arrTrukAktif() {
        $kunci = array('0' => 'Aktif', '1' => 'Tidak Aktif');
        return $kunci;
    }
    
    public function getSopir() {
        return (!empty($this->Sopir->nama)) ? $this->Sopir->nama : '-';
    }

     public function getCekSurat() {
        return ($this->surat == '1') ? 'Ada' : 'Tidak Ada';
    }
     public function getCekSeling() {
        return ($this->seling == '1') ? 'Ada' : 'Tidak Ada';
    }
     public function getCekTerpal() {
        return ($this->terpal == '1') ? 'Ada' : 'Tidak Ada';
    }
     public function getCekDongkrak() {
        return ($this->dongkrak == '1') ? 'Ada' : 'Tidak Ada';
    }
     public function getCekKunci() {
        return ($this->kunci == '1') ? 'Ada' : 'Tidak Ada';
    }
     
    
    
    public function getTglpajak() {
        return date('d-m-Y', strtotime($this->pajak));
    }

    public function getTglkir() {
        return date('d-m-Y', strtotime($this->kir));
    }

    public function getTglstnk() {
        return date('d-m-Y', strtotime($this->stnk));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Truk the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function behaviors() {
        return array(
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
                'setUpdateOnCreate' => true,
            ),
        );
    }

    protected function beforeValidate() {
        if (empty($this->created_user_id))
            $this->created_user_id = Yii::app()->user->id;
        return parent::beforeValidate();
    }

}
