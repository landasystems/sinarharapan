<?php

/**
 * This is the model class for table "{{m_user}}".
 *
 * The followings are the available columns in table '{{m_user}}':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $employeenum
 * @property string $name
 * @property integer $city_id
 * @property string $address
 * @property string $phone
 * @property string $created
 * @property integer $created_user_id
 * @property string $modified
 */
class User extends CActiveRecord {

    public $cache;

//    public function __construct() {
//        $this->cache = Yii::app()->cache;
//    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, roles_id', 'required'),
            array(' city_id, created_user_id', 'numerical', 'integerOnly' => true),
            array('username, phone', 'length', 'max' => 20),
            array('password, name,description, address', 'length', 'max' => 255),
            array('code', 'length', 'max' => 100),
            array('modified,sex,nationality,others,birth, enabled', 'safe'),
            array('username, email', 'unique', 'message' => '{attribute} : {value} already exists!', 'on' => 'allow'),
            array('email', 'email', 'on' => 'allow'),
            array('username, email', 'required', 'on' => 'allow'),
            array('username, email', 'safe', 'message' => '{attribute} : {value} already exists!', 'on' => 'notAllow'),
            array('id, username, email, password, code, name, city_id, address, phone, created, created_user_id, modified,description', 'safe', 'on' => 'search'),
            array('avatar_img', 'unsafe'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'code' => 'NIP',
            'name' => 'Nama',
            'city_id' => 'city_id',
            'address' => 'Alamat',
            'phone' => 'Telephone',
            'sex' => 'Jenis Kelamin',
            'created' => 'Created',
            'created_user_id' => 'Created Userid',
            'modified' => 'Modified',
        );
    }

    public function search($type = 'user') {
        $criteria = new CDbCriteria;
        $criteria->with = array('Roles');
        $criteria->together = true;

        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
//        $criteria->compare('password', $this->password, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('t.name', $this->name, true);
//        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('roles_id', $this->roles_id, true);
        if ($type == 'guest') {
//            $criteria->alias = "u";
            $siteConfig = SiteConfig::model()->listSiteConfig();
            $sCriteria = json_decode($siteConfig->roles_guest, true);
            $criteria->addInCondition('roles_id', $sCriteria);
        }elseif ($type == 'vendor') {
            $siteConfig = SiteConfig::model()->listSiteConfig();
            $sCriteria = json_decode($siteConfig->roles_vendor, true);
            $criteria->addInCondition('roles_id', $sCriteria);
        }elseif ($type == 'supplier') {
            $siteConfig = SiteConfig::model()->listSiteConfig();
            $sCriteria = json_decode($siteConfig->roles_supplier, true);
            $criteria->addInCondition('roles_id', $sCriteria);
        } elseif ($type == 'user') {
            $criteria->compare('Roles.is_allow_login', '1', true);
        }
        $data = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC')
        ));

        //app()->session['User_records'] = $this->findAll($criteria); 

        return $data;
    }

    public function listUser() {
       /* if (!app()->session['listUser']) {
            $result = array();*/
            $users = $this->findAll(array('index' => 'id'));
            /*app()->session['listUser'] = $users;
        }*/
        return $users;//app()->session['listUser'];
    }

    public function listUserPhone() {
       /* if (!app()->session['listUserPhone']) {
            $result = array();*/
            $users = $this->findAll(array('index' => 'phone'));
            /*app()->session['listUserPhone'] = $users;
        }*/

        return $users; //app()->session['listUserPhone'];
    }

    public function roles() {
        $result = Roles::model()->findAll();
        return $result;
    }

    public function role($user_id) {
        $role = User::model()->findByPk($user_id);

        if (isset($role->Roles->name)) {
            $result = $role->Roles->name;
        } else {
            $result = '';
        }

        return $result;
    }

    public function listUsers($type = '') {
        $siteConfig = SiteConfig::model()->listSiteConfig();
        if ($type == 'user') {
//             $criteria->with = array('Roles');
//            $criteria->together = true;
            $sResult = User::model()->with('Roles')->findAll(array('condition' => 'Roles.is_allow_login=1'));
        } elseif ($type == 'supplier') {
            $sCriteria = json_decode($siteConfig->roles_supplier, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        } elseif ($type == 'vendor') {
            $sCriteria = json_decode($siteConfig->roles_vendor, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        } elseif ($type == 'customer') {
            $sCriteria = json_decode($siteConfig->roles_customer, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        } elseif ($type == 'contact') {
            $sCriteria = json_decode($siteConfig->roles_contact, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        } elseif ($type == 'client') {
            $sCriteria = json_decode($siteConfig->roles_client, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        } elseif ($type == 'guest') {
            $sCriteria = json_decode($siteConfig->roles_guest, true);
            if (!empty($sCriteria)) {
                $list = '';
                foreach ($sCriteria as $o) {
                    $list .= '"' . $o . '",';
                }
                $list = substr($list, 0, strlen($list) - 1);
                $sResult = User::model()->findAll(array('condition' => 'roles_id in(' . $list . ')'));
            } else {
                $sResult = '';
            }
        }
        return $sResult;
    }

    public function typeRoles($sType = 'user') {
        $siteConfig = SiteConfig::model()->listSiteConfig();
        $result = array();

        if ($sType == 'user') {
            if (Yii::app()->user->roles_id == -1) {
                $array = array(-1 => 'Super User');
            } else {
                $array = array();
            }

            $sResult = Roles::model()->findAll(array('condition' => 'is_allow_login=1'));
            $result = $array + Chtml::listdata($sResult, 'id', 'name');
        } elseif ($sType == 'customer') {
            $customers = json_decode($siteConfig->roles_customer, true);
            $list = '';
            foreach ($customers as $customer) {
                $list .= '"' . $customer . '",';
            }
            $list = substr($list, 0, strlen($list) - 1);
            $sResult = Roles::model()->findAll(array('condition' => 'id in(' . $list . ')'));
            $result = Chtml::listdata($sResult, 'id', 'name');
        } elseif ($sType == 'supplier') {
            $customers = json_decode($siteConfig->roles_supplier, true);
            $list = '';
            foreach ($customers as $customer) {
                $list .= '"' . $customer . '",';
            }
            $list = substr($list, 0, strlen($list) - 1);
            $sResult = Roles::model()->findAll(array('condition' => 'id in(' . $list . ')'));
            $result = Chtml::listdata($sResult, 'id', 'name');
        } elseif ($sType == 'employment') {
            $customers = json_decode($siteConfig->roles_employment, true);
            $list = '';
            foreach ($customers as $customer) {
                $list .= '"' . $customer . '",';
            }
            $list = substr($list, 0, strlen($list) - 1);
            $sResult = Roles::model()->findAll(array('condition' => 'id in(' . $list . ')'));
            $result = Chtml::listdata($sResult, 'id', 'name');
        } elseif ($sType == 'guest') {
            $customers = json_decode($siteConfig->roles_guest, true);
            $list = '';
            foreach ($customers as $customer) {
                $list .= '"' . $customer . '",';
            }
            $list = substr($list, 0, strlen($list) - 1);
            $sResult = Roles::model()->findAll(array('condition' => 'id in(' . $list . ')'));
            $result = Chtml::listdata($sResult, 'id', 'name');
        }


        return $result;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'City' => array(self::BELONGS_TO, 'City', 'city_id'),
            'Payment' => array(self::HAS_MANY, 'Payment', 'id'),
            'FormBuilder' => array(self::HAS_MANY, 'FormBuilder', 'id'),
            'Roles' => array(self::BELONGS_TO, 'Roles', 'roles_id'),
            'UserLog' => array(self::HAS_MANY, 'UserLog', 'id'),
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password) {
        return sha1($password);
    }

    public function getUrlFull() {
        return param('urlImg') . $this->DownloadCategory->path . $this->url;
    }

    public function getUrlDel() {
        return createUrl('download/' . $this->Download->id);
    }

    public function getImgUrl() {
        return landa()->urlImg('avatar/', $this->avatar_img, $this->id);
    }

    public function getUrl() {

        return url('user/' . $this->id);
    }

    public function getTagImg() {
        return '<img src="' . $this->imgUrl['small'] . '" class="img-polaroid"/><br>';
    }

    public function getMediumImage() {
        return '<img src="' . $this->imgUrl['medium'] . '" class="img-polaroid"/><br>';
    }

    public function getTagBiodata() {

        return '
                <div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>Nama</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . $this->guestName . '
                    </div>
                </div>
                     <div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>Telepon</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . landa()->hp($this->phone) . '
                    </div>
                </div>
                ';
    }

    function getFullName() {
        $roles = (isset($this->Roles->name)) ? $this->Roles->name : '-';
        if (isset($this->Roles->prefix) and $this->Roles->prefix == 1) {
            $title = ($this->sex == 'f') ? 'Mrs. ' : 'Mr. ';
        } else {
            $title = '';
        }
        if ($this->roles_id != -1)
            return '[' . $roles . '] ' . strtoupper($title . ucwords($this->name));
    }

    function getJenisKelamin() {
       $jk = ($this->sex == 'f') ? 'Perempuan ' : 'Laki - Laki ';
       return $jk;
    }   

    function getGuestName() {
        if (isset($this->Roles->prefix) && $this->Roles->prefix == 1) {
            $title = ($this->sex == 'f') ? 'Mrs. ' : 'Mr. ';
        } else {
            $title = '';
        }
        return strtoupper($title . ucwords($this->name));
    }

    public function getDetailGuest($id) {
        $guest = User::model()->findByPk($id);
        $detail = '';
        if (!empty($guest)) {
            $detail = "<center><b>DETAIL GUEST</b></center><hr>";
            $detail .= "<div class=\\'span1\\'>Name</div><div class=\\'span3\\'>: " . ucwords($guest->guestName) . "</div><br>";
            $detail .= "<div class=\\'span1\\'>Province</div><div class=\\'span3\\'>: " . ucwords($guest->City->Province->name) . "</div><br>";
            $detail .= "<div class=\\'span1\\'>City</div><div class=\\'span3\\'>: " . ucwords($guest->City->name) . "</div><br>";
            $detail .= "<div class=\\'span1\\'>Address</div><div class=\\'span3\\'>: " . ucwords($guest->address) . "</div><br>";
            $detail .= "<div class=\\'span1\\'>Phone</div><div class=\\'span3\\'>: " . ucwords($guest->phone) . "</div><br>";
        }
        return $detail;
    }

    public function getTagAccess() {
        $name = (isset($this->Roles->name))?$this->Roles->name:'-';
        $rolesName = ($this->roles_id != -1) ? $name : "Super User";
        $enabled = ($this->enabled == 0) ? "<span class=\"label label-important\">No</span>" :
                "<span class=\"label label-info\">Yes</span>";
        return '<div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>Username</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . $this->username . '
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>Permission</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . $rolesName . '
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>E-mail</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . $this->email . '
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3" style="text-align:left">
                        <b>Enabled</b>
                    </div>
                    <div class="span1">:</div>
                    <div class="span8" style="text-align:left">
                        ' . $enabled . '
                    </div>
                </div>';
    }

//    public function getEnable(){
//        return '$this->enabled == 1 ? 'badge badge-success' : (($model->result >= 80) ? 'badge badge-warning' : 'badge badge-important');
//$result = '<span class="' . $resultColor . '"><h1>' . $model->result . '</h1></span>';';
//    } 
}
