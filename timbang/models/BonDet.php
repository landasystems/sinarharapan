<?php

/**
 * This is the model class for table "bon_det".
 *
 * The followings are the available columns in table 'bon_det':
 * @property integer $id
 * @property integer $bon_id
 * @property string $tanggal
 * @property string $debet
 * @property string $credit
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class BonDet extends CActiveRecord {

    public $sumTotal, $sumDebet, $sumCredit;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'bon_det';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('id', 'required'),
            array('id, bon_id, created_user_id', 'numerical', 'integerOnly' => true),
            array('debet, credit', 'length', 'max' => 20),
            array('tanggal, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, bon_id, tanggal, debet, credit, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Bon' => array(self::BELONGS_TO, 'Bon', 'bon_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'bon_id' => 'Bon',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('bon_id', $this->bon_id);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('debet', $this->debet, true);
        $criteria->compare('credit', $this->credit, true);
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
     * @return BonDet the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
