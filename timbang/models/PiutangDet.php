<?php

/**
 * This is the model class for table "piutang_det".
 *
 * The followings are the available columns in table 'piutang_det':
 * @property integer $id
 * @property integer $piutang_id
 * @property string $tanggal
 * @property string $debet
 * @property string $credit
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class PiutangDet extends CActiveRecord {

    public $sumTotal, $sumDebet, $sumCredit;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'piutang_det';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('piutang_id, created_user_id', 'numerical', 'integerOnly' => true),
            array('debet, credit', 'length', 'max' => 20),
            array('tanggal, created, modified', 'safe'),
            array('tanggal', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, piutang_id, tanggal, debet, credit, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Piutang' => array(self::BELONGS_TO, 'Piutang', 'piutang_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'piutang_id' => 'Piutang',
            'tanggal' => 'Tanggal',
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
    public function getCustomer() {
        return isset($this->Piutang->Customer->nama) ? $this->Piutang->Customer->nama : "-";
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with='Piutang';

        if (!empty($this->tanggal)) {
            $dt = explode(" - ", $this->tanggal);
            $start = $dt[0];
            $end = $dt[1];
            $criteria->addCondition('t.tanggal >= "' . $start . '" and t.tanggal <= "' . $end . '"');
        }
        if (!empty($this->piutang_id))
            $criteria->addCondition('Piutang.customer_id = "' . $this->piutang_id . '"');
        
        $criteria->addCondition('t.debet = 0 or t.debet is null');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC')
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PiutangDet the static model class
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
