<?php

class TimbangController extends Controller {

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
                'expression' => 'app()->controller->isValidAccess("timbang","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("timbang","r")'
            ),
            array('allow', // u
                'actions' => array('update'),
                'expression' => 'app()->controller->isValidAccess("timbang","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("timbang","d")'
            )
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionGetListCustomer() {
        $name = $_GET["q"];
        $list = array();
        $data = Customer::model()->findAll(array('condition' => '(nama like "%' . $name . '%" or kode like "%' . $name . '%") AND is_delete=0', 'limit' => '10'));
        if (empty($data)) {
            $list[] = array("id" => "0", "text" => "No Results Found..");
        } else {
            foreach ($data as $val) {
                $list[] = array("id" => $val->id, "text" => $val->kode . ' - ' . $val->nama);
            }
        }
        echo json_encode($list);
    }

    public function actionView($id) {
        cs()->registerScript('read', '
                    $("form input, form textarea, form select").each(function(){
                    $(this).prop("disabled", true);
                });');
        $_GET['v'] = true;
        $this->actionUpdate($id);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Timbang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Timbang'])) {

            $model->attributes = $_POST['Timbang'];
            if (!empty($_POST['Timbang']['kode'])) {
                $model->kode = $_POST['Timbang']['kode'];
            } else {
                $forkode = Timbang::model()->findAll(array('order' => 'id desc', 'limit' => 1));
                if (empty($forkode)) {
                    $model->kode = 1;
                } else {
                    foreach ($forkode as $a) {
                        $model->kode = $a->kode + 1;
                    }
                }
            }
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

        if (isset($_POST['Timbang'])) {
            $model->attributes = $_POST['Timbang'];
            if (!empty($_POST['Timbang']['kode'])) {
                $model->kode = $_POST['Timbang']['kode'];
            } else {
                $forkode = Timbang::model()->findAll(array('order' => 'id desc', 'limit' => 1));
                if (empty($forkode)) {
                    $model->kode = 1;
                } else {
                    foreach ($forkode as $a) {
                        $model->kode = $a->kode + 1;
                    }
                }
            }
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

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();
        $model = new Timbang('search');
        $model->unsetAttributes();  // clear any default values
        //delet all
        if (isset($_POST['delete']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->delete();
            }
        }
        if (isset($_GET['Timbang'])) {
            $model->attributes = $_GET['Timbang'];

            if (!empty($model->tanggal_timbang1)) {
                $dt = explode(" - ", $model->tanggal_timbang1);
                $start = $dt[0];
                $end = $dt[1];
                $criteria->addCondition('tanggal_timbang1 >= "' . $start . '" and tanggal_timbang1 <= "' . $end . '"');
            }

            if ($model->customer_id == 0) {
                unset($model->customer_id);
            }
//            if ($model->kode == "") {
//                unset($model->kode);
//            }
//            if ($model->nomor_polisi == "") {
//                unset($model->nomor_polisi);
//            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionGenerateExcel() {
        $customer_id = $_GET['customer_id'];
        $nomor_polisi = $_GET['nomor_polisi'];

        $criteria = new CDbCriteria;
        if (!empty($customer_id))
            $criteria->compare('t.customer_id', $customer_id, true);
        if (!empty($nomor_polisi))
            $criteria->compare('nomor_polisi', $nomor_polisi, true);

        $model = Timbang::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Transaksi Timbang -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = Timbang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'timbang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
