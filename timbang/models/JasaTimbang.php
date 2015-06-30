<?php

/**
 * This is the model class for table "jasa_timbang".
 *
 * The followings are the available columns in table 'jasa_timbang':
 * @property integer $id
 * @property string $customer
 * @property string $nomor_polisi
 * @property string $produk
 * @property string $tanggal_timbang1
 * @property double $berat_timbang1
 * @property string $tanggal_timbang2
 * @property double $berat_timbang2
 * @property double $rafaksi
 * @property double $netto
 * @property integer $harga
 * @property integer $total
 * @property integer $created_user_id
 * @property string $created
 * @property string $modified
 */
class JasaTimbang extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jasa_timbang';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('harga, total, created_user_id', 'numerical', 'integerOnly' => true),
            array('berat_timbang1, berat_timbang2, rafaksi, netto', 'numerical'),
            array('customer', 'length', 'max' => 50),
            array('customer,berat_timbang1, berat_timbang2', 'required'),
            array('nomor_polisi', 'length', 'max' => 25),
            array('produk', 'length', 'max' => 45),
            array('tanggal_timbang1, tanggal_timbang2, created, modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id,kode, customer,telepon,alamat, nomor_polisi, produk, tanggal_timbang1, berat_timbang1, tanggal_timbang2, berat_timbang2, rafaksi, netto, harga, total, created_user_id, created, modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Petugas' => array(self::BELONGS_TO, 'User', 'created_user_id'),
//            'Customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'kode' => 'No. Trans',
            'customer' => 'Customer',
            'nomor_polisi' => 'Nomor Polisi',
            'produk' => 'Produk',
            'tanggal_timbang1' => 'Tanggal Timbang1',
            'berat_timbang1' => 'Berat Timbang1',
            'tanggal_timbang2' => 'Tanggal Timbang2',
            'berat_timbang2' => 'Berat Timbang2',
            'rafaksi' => 'Rafaksi',
            'netto' => 'Netto',
            'harga' => 'Harga',
            'total' => 'Total',
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
    public function search($export = null) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        
        if (!empty($this->tanggal_timbang1)) {
            $dt = explode(" - ", $this->tanggal_timbang1);
            $start = $dt[0];
            $end = $dt[1];
            $criteria->addCondition('tanggal_timbang1 between "' . $start . '" and "' . $end . '"');
//            $criteria->addCondition('tanggal_timbang1 >= "' . $start . '" and tanggal_timbang1 <= "' . $end . '"');
        }

        $criteria->compare('customer', $this->customer, true);

          if (empty($export)) {
            $data = new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => array('defaultOrder' => 'id DESC')
            ));
        } else {
            $data = JasaTimbang::model()->findAll($criteria);
        }
        return $data;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JasaTimbang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeValidate() {
        if (empty($this->created_user_id)) {
            $this->created_user_id = Yii::app()->user->id;
            $this->modified = date("Y-m-d H:i:s");
//            $this->modified_user_id = Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }

//    public function getNamaCustomer() {
////        return (isset($this->Customer->nama)) ? $this->Customer->nama : '';
//    }
//
    public function getTanggalTimbang() {
        return (!empty(date('d M Y', strtotime($this->tanggal_timbang1)))) ? date('d M Y', strtotime($this->tanggal_timbang1)) : '-';
    }
    public function getTanggalTimbang2() {
        return (!empty(date('d M Y', strtotime($this->tanggal_timbang1)))) ? date('d M Y', strtotime($this->tanggal_timbang1)) : '-';
    }

    public function getTotalRp() {
        return landa()->rp($this->total);
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

//    protected function beforeValidate() {
//        if (empty($this->created_user_id))
//            $this->created_user_id = Yii::app()->user->id;
//        return parent::beforeValidate();
//    }

}
