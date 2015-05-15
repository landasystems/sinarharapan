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
                'actions' => array('index', 'create'),
                'expression' => 'app()->controller->isValidAccess(1,"c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess(1,"r")'
            ),
            array('allow', // u
                'actions' => array('index', 'update'),
                'expression' => 'app()->controller->isValidAccess(1,"u")'
            ),
            array('allow', // d
                'actions' => array('index', 'delete'),
                'expression' => 'app()->controller->isValidAccess(1,"d")'
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
        $model = new Truk('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Truk'])) {
            $model->attributes = $_GET['Truk'];


            if (!empty($model->id))
                $criteria->addCondition('id = "' . $model->id . '"');


            if (!empty($model->kode))
                $criteria->addCondition('kode = "' . $model->kode . '"');


            if (!empty($model->nomor_polisi))
                $criteria->addCondition('nomor_polisi = "' . $model->nomor_polisi . '"');


            if (!empty($model->merk))
                $criteria->addCondition('merk = "' . $model->merk . '"');


            if (!empty($model->type))
                $criteria->addCondition('type = "' . $model->type . '"');


            if (!empty($model->pajak))
                $criteria->addCondition('pajak = "' . $model->pajak . '"');


            if (!empty($model->kir))
                $criteria->addCondition('kir = "' . $model->kir . '"');


            if (!empty($model->stnk))
                $criteria->addCondition('stnk = "' . $model->stnk . '"');


            if (!empty($model->surat))
                $criteria->addCondition('surat = "' . $model->surat . '"');


            if (!empty($model->seling))
                $criteria->addCondition('seling = "' . $model->seling . '"');


            if (!empty($model->terpal))
                $criteria->addCondition('terpal = "' . $model->terpal . '"');


            if (!empty($model->kunci))
                $criteria->addCondition('kunci = "' . $model->kunci . '"');


            if (!empty($model->sopir_id))
                $criteria->addCondition('sopir_id = "' . $model->sopir_id . '"');


            if (!empty($model->is_delete))
                $criteria->addCondition('is_delete = "' . $model->is_delete . '"');


            if (!empty($model->created_user_id))
                $criteria->addCondition('created_user_id = "' . $model->created_user_id . '"');


            if (!empty($model->created))
                $criteria->addCondition('created = "' . $model->created . '"');


            if (!empty($model->modified))
                $criteria->addCondition('modified = "' . $model->modified . '"');
        }

        $this->render('index', array(
            'model' => $model,
        ));
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
