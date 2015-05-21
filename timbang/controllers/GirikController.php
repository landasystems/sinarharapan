<?php

class GirikController extends Controller {

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

    public function actionGetDetail() {
        $id = $_POST['id'];
        $sopir = Sopir::model()->findByPk($id);
        $body['alamat'] = $sopir->alamat;
        $body['telepon'] = landa()->hp($sopir->telepon);
        echo json_encode($body);
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
        $model = new Girik;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Girik'])) {
            $model->attributes = $_POST['Girik'];
            if ($model->save()) {
                $det = new PerawatanTrukDet;
                $det->girik_id = $model->id;
                $det->keterangan = 'Setor girik tanggal ' . $model->tanggal;
                $det->credit = $model->fee_truk;
                $det->save();
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

        if (isset($_POST['Girik'])) {
            $model->attributes = $_POST['Girik'];
            if ($model->save()) {
                $det = PerawatanTrukDet::model()->find(array('condition' => 'girik_id = ' . $model->id));
                $det->girik_id = $model->id;
                $det->keterangan = 'Setor girik tanggal ' . $model->tanggal;
                $det->credit = $model->fee_truk;
                $det->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
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
        $criteria = new CDbCriteria();
        $model = new Girik('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Girik'])) {
            $model->attributes = $_GET['Girik'];

            if (!empty($model->tanggal)) {
                $dt = explode(" - ", $model->tanggal);
                $start = $dt[0];
                $end = $dt[1];
                $criteria->addCondition('tanggal >= "' . $start . '" and <= "' . $end . '"');
            }

            if (!empty($model->nomor_girik))
                $criteria->addCondition('nomor_girik = "' . $model->nomor_girik . '"');


            if (!empty($model->sopir_id))
                $criteria->addCondition('sopir_id = "' . $model->sopir_id . '"');


            if (!empty($model->truk_id))
                $criteria->addCondition('truk_id = "' . $model->truk_id . '"');
        }

        $this->render('index', array(
            'model' => $model,
        ));
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Girik::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'girik-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
