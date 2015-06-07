<?php

class TrukController extends Controller {

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
                'expression' => 'app()->controller->isValidAccess("truk","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("truk","r")'
            ),
            array('allow', // u
                'actions' => array('update'),
                'expression' => 'app()->controller->isValidAccess("truk","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("truk","d")'
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

    public function actionGetListSopir() {
        $name = $_GET["q"];
        $list = array();
        $data = Sopir::model()->findAll(array('condition' => 'nama like "%' . $name . '%"', 'limit' => '10'));
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
        $model = new Truk;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Truk'])) {
            $model->attributes = $_POST['Truk'];
            $model->is_delete = 0;
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

        if (isset($_POST['Truk'])) {
            $model->attributes = $_POST['Truk'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionRestore($id) {
//		if(Yii::app()->request->isPostRequest)
//		{
        // we only allow deletion via POST request
//			$this->loadModel($id)->delete();
        $cus = $this->loadModel($id);
        $cus->is_delete = 0;
        $cus->save();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            // $this->loadModel($id)->delete();
            $cus = $this->loadModel($id);
            $cus->is_delete = 1;
            $cus->save();
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

        $model = new Truk('search');
        $model->unsetAttributes(); // clear any default values

        if (isset($_POST['delete']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->is_delete = 1;
                $a->save();
                ;
            }
        }
        if (isset($_POST['restore']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->is_delete = 0;
                $a->save();
            }
        }

        $model->is_delete = 0;
        if (isset($_GET['Truk'])) {
            $model->attributes = $_GET['Truk'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionGenerateExcel() {


        $is_delete = $_GET['is_delete'];
        //kelengkapan
        $surat = $_GET['surat'];
        $seling = $_GET['seling'];
        $dongkrak = $_GET['dongkrak'];
        $terpal = $_GET['terpal'];
        $kunci = $_GET['kunci'];
        //jenis kendaraan
        $sopir_id = $_GET['Truk_sopir_id'];
        $merk = $_GET['Truk_merk'];
        $type = $_GET['Truk_type'];
        $nomor_polisi = $_GET['Truk_nomor_polisi'];


        $criteria = new CDbCriteria;
        //kelengkapan
        $criteria->compare('surat', $surat);
        $criteria->compare('seling', $seling);
        $criteria->compare('dongkrak', $dongkrak);
        $criteria->compare('terpal', $terpal);
        $criteria->compare('kunci', $kunci);
        //jenis kendaraan
        $criteria->compare('sopir_id', $sopir_id);
        $criteria->compare('merk', $merk, true);
        $criteria->compare('type', $type, true);
        $criteria->compare('nomor_polisi', $nomor_polisi, true);
        $criteria->compare('is_delete', $is_delete);

        $model = Truk::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Truk -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = Truk::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'truk-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
