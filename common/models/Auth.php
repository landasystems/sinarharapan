<?php

/**
 * This is the model class for table "{{auth}}".
 *
 * The followings are the available columns in table '{{auth}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $alias
 * @property string $module
 * @property string $crud
 */
class Auth extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{auth}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, description', 'length', 'max' => 255),
            array('module, crud', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, description, crud', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'description' => 'Description',
//            'alias' => 'Alias',
//            'module' => 'Module',
            'crud' => 'Crud',
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
//        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
//        $criteria->compare('alias', $this->alias, true);
//        $criteria->compare('module', $this->module, true);
        $criteria->compare('crud', $this->crud, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CDbConnection the database connection used for this class
     */
//    public function getDbConnection() {
//        return Yii::app()->db2;
//    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Auth the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function modules($arg = NULL) {
        if (empty($arg)) {
            $appName = app()->name;
        } else {
            $appName = $arg;
        }

        return array(
            array('label' => '<span class="icon16 icomoon-icon-screen"></span>Dashboard', 'url' => array('/dashboard')),
            array('visible' => landa()->checkAccess('user', 'r'), 'label' => '<span class="icon16 eco-users"></span>User', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('groupUser', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Group User', 'url' => url('landa/roles/user'), 'auth_id' => 'groupUser'),
                    array('visible' => landa()->checkAccess('user', 'r'), 'label' => '<span class="icon16  icomoon-icon-arrow-right"></span>User', 'url' => url('/user'), 'auth_id' => 'user'),
                )),
            array('visible' => landa()->checkAccess('customer', 'r'), 'label' => '<span class="icon16  eco-archive-2 "></span>Data Master', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('customer', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Customer', 'url' => url('/customer'), 'auth_id' => 'customer'),
                    array('visible' => landa()->checkAccess('sopir', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Sopir', 'url' => url('/sopir'), 'auth_id' => 'sopir'),
                    array('visible' => landa()->checkAccess('truk', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Truk', 'url' => url('/truk'), 'auth_id' => 'truk'),
                )),
            array('visible' => landa()->checkAccess('pinjaman', 'r'), 'label' => '<span class="icon16  icomoon-icon-cart "></span>Transaksi Timbangan', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('timbang', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Timbang', 'url' => url('/timbang'), 'auth_id' => 'timbang'),
                    array('visible' => landa()->checkAccess('jstimbang', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Jasa Timbang', 'url' => url('/jasaTimbang'), 'auth_id' => 'jstimbang'),
                )),
            array('visible' => landa()->checkAccess('pinjaman', 'r'), 'label' => '<span class="icon16 entypo-icon-card"></span>Transaksi Customer', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('pinjaman', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Pinjaman', 'url' => url('/piutang'), 'auth_id' => 'pinjaman'),
                    array('visible' => landa()->checkAccess('bayarPinjaman', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Bayar Pinjaman', 'url' => url('#'), 'auth_id' => 'bayarPinjaman'),
                )),
            array('visible' => landa()->checkAccess('pinjaman', 'r'), 'label' => '<span class="icon16 wpzoom-user-2"></span>Transaksi Supir', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('bon', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Bon', 'url' => url('/bon'), 'auth_id' => 'bon'),
                    array('visible' => landa()->checkAccess('storGir', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Stor Girik', 'url' => url('/girik'), 'auth_id' => 'storGir'),
                )),
            array('visible' => landa()->checkAccess('perawatan', 'r'), 'label' => '<span class="icon16 icomoon-icon-cars"></span>Perawatan Kendaraan', 'url' => url('#'), 'auth_id' => 'perawatan'),
            array('visible' => landa()->checkAccess('trsCustomer', 'r'), 'label' => '<span class="icon16  silk-icon-checklist"></span>Laporan', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('trsCustomer', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Hutang Customer', 'url' => url('report/trsCustomer'), 'auth_id' => 'trsCustomer'),
                    array('visible' => landa()->checkAccess('trSopir', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Piutang Sopir', 'url' => url('report/trsSopir'), 'auth_id' => 'trSopir'),
                    array('visible' => landa()->checkAccess('prKendaraan', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Kendaraan', 'url' => url('#'), 'auth_id' => 'prKendaraan'),
                )),
            array('visible' => landa()->checkAccess('rkpCostumer', 'r'), 'label' => '<span class="icon16  eco-article "></span>Rekap', 'url' => array('#'), 'submenuOptions' => array('class' => 'sub'), 'items' => array(
                    array('visible' => landa()->checkAccess('rkpCustomer', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Hutang Customer', 'url' => url('report/rekapHutCustomer'), 'auth_id' => 'rCustomer'),
                    array('visible' => landa()->checkAccess('rkpSopir', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Piutang Sopir', 'url' => url('report/rekapBonSopir'), 'auth_id' => 'rSopir'),
                    array('visible' => landa()->checkAccess('rkpKendaraan', 'r'), 'label' => '<span class="icon16 icomoon-icon-arrow-right"></span>Kendaraan', 'url' => url('#'), 'auth_id' => 'rKendaraan'),
                )),
        );
    }

}
