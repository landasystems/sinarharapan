<?php

class PiutangController extends Controller {

    public $breadcrumbs;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'main';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // c
                'actions' => array('create'),
                'expression' => 'app()->controller->isValidAccess("pinjaman","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("pinjaman","r")'
            ),
            array('allow', // u
                'actions' => array('update'),
                'expression' => 'app()->controller->isValidAccess("pinjaman","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("pinjaman","d")'
            )
        );
    }
    

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        cs()->registerScript('read', '
                    $("form input, form textarea, form select").each(function(){
                    $(this).prop("disabled", true);
                });');
        $_GET['v'] = true;
        $this->actionUpdate($id);
    }

    public function actionGetListCustomer() {
        $name = $_GET["q"];
        $list = array();
        $data = Customer::model()->findAll(array('condition' => 'nama like "%' . $name . '%"', 'limit' => '10'));
        if (empty($data)) {
            $list[] = array("id" => "0", "text" => "No Results Found..");
        } else {
            foreach ($data as $val) {
                $list[] = array("id" => $val->id, "text" => $val->nama);
            }
        }
        echo json_encode($list);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Piutang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Piutang'])) {
            $model->attributes = $_POST['Piutang'];
            $model->customer_id = $_POST['Piutang']['customer_id'];
            $model->jumlah_pupuk = $_POST['Piutang']['jumlah_pupuk'];
            if ($model->save()){
                $pituangDet = new PiutangDet;
                $pituangDet->piutang_id = $model->id;
                $pituangDet->tanggal = $model->tanggal;
                $pituangDet->debet= $model->total;
                $pituangDet->save();
                $this->redirect(array('view', 'id' => $model->id));
        }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Piutang'])) {
            $model->attributes = $_POST['Piutang'];
            $model->customer_id = $_POST['Piutang']['customer_id'];
            $model->jumlah_pupuk = $_POST['Piutang']['jumlah_pupuk'];
            PiutangDet::model()->updateAll(array('debet'=>$_POST['Piutang']['total'],'tanggal'=>$_POST['Piutang']['tanggal']),'piutang_id='.$id);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            PiutangDet::model()->deleteAll('piutang_id='.$id);
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();
        $model = new Piutang('search');
        $model->unsetAttributes();  // clear any default values
        
        if (isset($_POST['delete']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a)){
                    $a->delete();
                    PiutangDet::model()->deleteAll('piutang_id='.$data);
                }
            }
            }
           
        if (isset($_GET['Piutang'])) {
            $model->attributes = $_GET['Piutang'];


            if ($model->customer_id == 0) {
                unset($model->customer_id);
            }
            
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    public function actionGenerateExcel() {
        $type = $_GET['type'];
        $customer_id = $_GET['customer_id'];

        $criteria = new CDbCriteria;
        if (!empty($type))
        $criteria->compare('type', $type, true);
        if (!empty($customer_id))
        $criteria->compare('customer_id', $customer_id, true);
        
        $model = Piutang::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Transaksi Pinjaman -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
                    'model' => $model
                        ), true)
        );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Piutang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'piutang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
