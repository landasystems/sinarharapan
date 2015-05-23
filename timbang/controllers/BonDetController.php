<?php

class BonDetController extends Controller {

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
    public function actionGetDetail() {
        $id = $_POST['id'];
        $cust = Sopir::model()->findByPk($id);
        $return['alamat'] = $cust->alamat;
        $return['telpon'] = landa()->hp($cust->telepon);
        $return['list'] = $this->renderPartial("_listBon", array('sopir_id' => $id), TRUE);
        echo json_encode($return);
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
        $model = new BonDet;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BonDet'])) {
            for ($i = 0; $i < count($_POST['bon_id']); $i++) {
                if ($_POST['bayar'][$i] > 0) {
                    $model->tanggal = $_POST['BonDet']['tanggal'];
                    $model->credit = $_POST['bayar'][$i];
                    $model->bon_id = $_POST['bon_id'][$i];
//                $model->induk_id = $model->piutang_id;
                    $model->save();
                }
                $i++;
            }
            $model->attributes = $_POST['BonDet'];
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

        if (isset($_POST['BonDet'])) {
            $model->attributes = $_POST['BonDet'];
            $model->credit = $_POST['bayar'];
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
        $model = new BonDet('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['BonDet'])) {
            $model->attributes = $_GET['BonDet'];
            $criteria->with = 'Bon';

            if (!empty($model->tanggal)) {
                $dt = explode(" - ", $model->tanggal);
                $start = $dt[0];
                $end = $dt[1];
                $criteria->addCondition('t.tanggal >= "' . $start . '" and t.tanggal <= "' . $end . '"');
            }
            if (!empty($model->piutang_id))
                $criteria->addCondition('Bon.sopir_id = "' . $model->sopir_id . '"');
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }
    
      public function actionGenerateExcel() {
        $tanggal = $_GET['tanggal'];
        $bon_id = $_GET['bon_id'];
        
        $criteria = new CDbCriteria;
        if (!empty($tanggal)) {
            $dt = explode(" - ", $tanggal);
            $start = $dt[0];
            $end = $dt[1];
            $criteria->addCondition('t.tanggal >= "' . $start . '" and t.tanggal <= "' . $end . '"');
        }
        if (!empty($bon_id))
            $criteria->addCondition('Bon.sopir_id = "' . $bon_id. '"');
        
        $criteria->addCondition('t.debet = 0 or t.debet is null');
        
        $model = BonDet::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Bayar Bon -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = BonDet::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bon-det-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
