<?php

/**
 * This is the model class for table "{{piutang}}".
 *
 * The followings are the available columns in table '{{piutang}}':
 * @property integer $id
 * @property integer $customer_id
 * @property string $jaminan
 * @property string $deskripsi
 * @property string $tanggal
 * @property string $type
 * @property integer $sub_total
 * @property double $bunga
 * @property integer $total
 * @property string $status
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class Piutang extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{piutang}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_id, sub_total, total, created_user_id', 'numerical', 'integerOnly' => true),
            array('bunga', 'numerical'),
            array('jaminan', 'length', 'max' => 150),
            array('deskripsi', 'length', 'max' => 255),
            array('type', 'length', 'max' => 5),
//            array('status', 'length', 'max' => 11),
            array('tanggal, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, customer_id, jaminan, deskripsi, tanggal, type,jumlah_pupuk, sub_total, bunga, total, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'Pengaturan' => array(self::BELONGS_TO, 'Pengaturan', 'bunga'),
        );
    }

    public function getTotalBayar() {
        $tot = Yii::app()->db->createCommand()
                ->select('sum(piutang_det.credit) as total')
                ->from('piutang, piutang_det')
                ->where('piutang.id = piutang_det.piutang_id and piutang.id = ' . $this->id)
                ->queryRow();
        $total = !empty($tot) ? $tot['total'] : 0;
        return $total;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'customer_id' => 'Customer',
            'jaminan' => 'Jaminan',
            'deskripsi' => 'Keterangan',
            'tanggal' => 'Tanggal',
            'type' => 'Pinjaman',
            'sub_total' => 'Jumlah',
            'bunga' => 'Bunga',
            'total' => 'Total',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('jaminan', $this->jaminan, true);
        $criteria->compare('deskripsi', $this->deskripsi, true);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('sub_total', $this->sub_total);
        $criteria->compare('bunga', $this->bunga);
        $criteria->compare('total', $this->total);
        $criteria->compare('jumlah_pupuk', $this->jumlah_pupuk, true);
        $criteria->compare('created_user_id', $this->created_user_id);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('modified', $this->modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 'id DESC')
        ));
    }

    public function getCustomer() {
        return (!empty($this->Customer->nama)) ? $this->Customer->nama : '-';
    }

    public function arrPinjaman() {
        $terpal = array('uang' => 'Uang', 'pupuk' => 'Pupuk');
        return $terpal;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Piutang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
