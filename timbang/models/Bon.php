<?php

/**
 * This is the model class for table "{{bon}}".
 *
 * The followings are the available columns in table '{{bon}}':
 * @property integer $id
 * @property integer $sopir_id
 * @property string $tanggal
 * @property string $deskripsi
 * @property integer $total
 * @property string $status
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class Bon extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{bon}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sopir_id, total, created_user_id', 'numerical', 'integerOnly' => true),
            array('deskripsi', 'length', 'max' => 255),
            array('sopir_id, tanggal, total', 'required'),
//            array('status', 'length', 'max' => 11),
            array('lunas, tanggal, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sopir_id, tanggal, deskripsi, total, status, created_user_id, created, modified', 'safe', 'on' => 'search'),
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
            'Petugas' => array(self::BELONGS_TO, 'User', 'created_user_id'),
        );
    }

    public function getTotalBayar() {
        $tot = Yii::app()->db->createCommand()
                ->select('sum(bon_det.credit) as total')
                ->from('bon, bon_det')
                ->where('bon.id = bon_det.bon_id and bon.id = ' . $this->id)
                ->queryRow();
        $total = (isset($tot['total']) and !empty($tot['total'])) ? $tot['total'] : 0;
        return $total;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'sopir_id' => 'Sopir',
            'tanggal' => 'Tanggal',
            'deskripsi' => 'Deskripsi',
            'total' => 'Total Bon',
//            'status' => 'Status',
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
    public function getSopir() {
        return (!empty($this->Sopir->nama)) ? $this->Sopir->nama : '-';
    }

//    public function getStts() {
//        if ($this->status == "belum lunas") {
//            $status = '<span class="label label-important">Belum Lunas</span>';
//        } else {
//            $status = '<span class="label label-success">Lunas</span>';
//        }
//        return $status;
//    }

    public function getTgl() {
        return date('d-m-Y', strtotime($this->tanggal));
    }

    public function getRptotal() {
        return landa()->rp($this->total);
    }
    
    public function arrLunas() {
        $terpal = array('0' => 'Belum Lunas', '1' => 'Lunas');
        return $terpal;
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('sopir_id', $this->sopir_id);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('deskripsi', $this->deskripsi, true);
        $criteria->compare('total', $this->total);
//        $criteria->compare('status', $this->status);
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
     * @return Bon the static model class
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
