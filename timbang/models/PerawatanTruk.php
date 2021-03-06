<?php

/**
 * This is the model class for table "perawatan_truk".
 *
 * The followings are the available columns in table 'perawatan_truk':
 * @property integer $id
 * @property string $kode
 * @property string $truk_id
 * @property string $tanggal
 * @property string $deskripsi
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class PerawatanTruk extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'perawatan_truk';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created_user_id', 'numerical', 'integerOnly' => true),
            array('truk_id,tanggal', 'required'),
            array('kode', 'length', 'max' => 10),
            array('truk_id', 'length', 'max' => 45),
            array('keterangan', 'length', 'max' => 255),
            array('tanggal, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, kode, truk_id, tanggal, keterangan, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Truk' => array(self::BELONGS_TO, 'Truk', 'truk_id'),
            'PerawatanTrukDet' => array(self::HAS_MANY, 'PerawatanTrukDet', 'perawatan_truk_id'),
        );
    }

    public function getTotalDebet() {
        $tot = Yii::app()->db->createCommand()
                ->select('sum(perawatan_truk_det.debet) as totalDebet')
                ->from('perawatan_truk_det, perawatan_truk')
                ->where('perawatan_truk_det.perawatan_truk_id = perawatan_truk.id and perawatan_truk.id = ' . $this->id)
                ->queryRow();
        $total =  !empty($tot) ? $tot['totalDebet'] : 0;
        return landa()->rp($total);
    }
    
    public function getTotalCredit() {
        $tot = Yii::app()->db->createCommand()
                ->select('sum(perawatan_truk_det.credit) as totalCredit')
                ->from('perawatan_truk_det, perawatan_truk')
                ->where('perawatan_truk_det.perawatan_truk_id = perawatan_truk.id and perawatan_truk.id = ' . $this->id)
                ->queryRow();
        $total =  !empty($tot) ? $tot['totalCredit'] : 0;
        return landa()->rp($total);
    }

    public function getTanggalPerawatan() {
        return (!empty($this->tanggal)) ? date("d M Y", strtotime($this->tanggal)) : '-';
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'kode' => 'Kode',
            'truk_id' => 'Truk',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        if (!empty($this->tanggal)) {
            $dt = explode(" - ", $this->tanggal);
            $start = $dt[0];
            $end = $dt[1];
            $criteria->addCondition('tanggal >= "' . $start . '" and tanggal <= "' . $end . '"');
        }

        if (!empty($this->truk_id))
            $criteria->addCondition('truk_id = "' . $this->truk_id . '"');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'id DESC')
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PerawatanTruk the static model class
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
