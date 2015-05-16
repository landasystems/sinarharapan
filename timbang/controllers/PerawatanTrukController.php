<?php

class PerawatanTrukController extends Controller {

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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new PerawatanTruk;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PerawatanTruk'])) {
            $model->attributes = $_POST['PerawatanTruk'];
            if ($model->save()) {
                for ($i = 0; $i <= count($_POST['keteranganDet']); $i++) {
                    if (!empty($_POST['keteranganDet'][$i])) {
                        $detail = new PerawatanTrukDet;
                        $detail->perawatan_truk_id = $model->id;
                        $detail->keterangan = $_POST['keteranganDet'][$i];
                        $detail->harga = $_POST['hargaDet'][$i];
                        $detail->qty = $_POST['jumlahDet'][$i];
                        $detail->credit = $_POST['subTotalDet'][$i];
                        $detail->save();
                    }
                }
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

        if (isset($_POST['PerawatanTruk'])) {
            $model->attributes = $_POST['PerawatanTruk'];
            $detail = PerawatanTrukDet::model()->deleteAll(array('condition' => 'perawatan_truk_id = ' . $id));

            if ($model->save()) {
                for ($i = 0; $i <= count($_POST['keteranganDet']); $i++) {
                    if (!empty($_POST['keteranganDet'][$i])) {
                        $detail = new PerawatanTrukDet;
                        $detail->perawatan_truk_id = $model->id;
                        $detail->keterangan = $_POST['keteranganDet'][$i];
                        $detail->harga = $_POST['hargaDet'][$i];
                        $detail->qty = $_POST['jumlahDet'][$i];
                        $detail->credit = $_POST['subTotalDet'][$i];
                        $detail->save();
                    }
                }
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
            $detail = PerawatanTrukDet::model()->deleteAll(array('condition' => 'perawatan_truk_id = ' . $id));

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
        $model = new PerawatanTruk('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PerawatanTruk'])) {
            $model->attributes = $_GET['PerawatanTruk'];

             if (!empty($model->tanggal)) {
                $dt = explode(" - ",$model->tanggal);
                $start = $dt[0];
                $end = $dt[1];
                $criteria->addCondition('tanggal >= "'.$start.'" and tanggal <= "'.$end.'"');
            }

            if (!empty($model->truk_id))
                $criteria->addCondition('truk_id = "' . $model->truk_id . '"');
            
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
        $model = PerawatanTruk::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'perawatan-truk-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
