<?php

class JasaTimbangController extends Controller {

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
                'expression' => 'app()->controller->isValidAccess("jstimbang","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("jstimbang","r")'
            ),
            array('allow', // u
                'actions' => array( 'update'),
                'expression' => 'app()->controller->isValidAccess("jstimbang","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("jstimbang","d")'
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new JasaTimbang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JasaTimbang'])) {
            $model->attributes = $_POST['JasaTimbang'];
            $model->telepon = $_POST['JasaTimbang']['telepon'];
            $model->alamat = $_POST['JasaTimbang']['alamat'];
            if (!empty($_POST['JasaTimbang']['kode'])) {
                $model->kode = $_POST['JasaTimbang']['kode'];
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

        if (isset($_POST['JasaTimbang'])) {
            $model->attributes = $_POST['JasaTimbang'];
             $model->telepon = $_POST['JasaTimbang']['telepon'];
            $model->alamat = $_POST['JasaTimbang']['alamat'];
              if (!empty($_POST['JasaTimbang']['kode'])) {
                $model->kode = $_POST['JasaTimbang']['kode'];
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
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $model = new JasaTimbang('search');
        $model->unsetAttributes();  // clear any default values
         //delet all
        if (isset($_POST['delete']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->delete();
            }
        }
        if (isset($_GET['JasaTimbang'])) {
            $model->attributes = $_GET['JasaTimbang'];


           if ($model->customer == "") {
                unset($model->customer);
            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    public function actionGenerateExcel() {
        $customer = $_GET['customer'];
        
        $criteria = new CDbCriteria;
        if (!empty($customer))
        $criteria->compare('customer', $customer, true);
        
        $model = JasaTimbang::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Transaksi Jasa Timbang -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = JasaTimbang::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'jasa-timbang-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
