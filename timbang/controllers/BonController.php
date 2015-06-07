<?php

class BonController extends Controller {

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
                'expression' => 'app()->controller->isValidAccess("bon","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("bon","r")'
            ),
            array('allow', // u
                'actions' => array('update'),
                'expression' => 'app()->controller->isValidAccess("bon","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("bon","d")'
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
        $model = new Bon;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bon'])) {
            $model->attributes = $_POST['Bon'];
//            $model->status = "belum lunas";
            if ($model->save()) {
                $bonDet = new BonDet;
                $bonDet->bon_id = $model->id;
                $bonDet->tanggal = $model->tanggal;
                $bonDet->debet = $model->total;
                $bonDet->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionGetListSopir() {
        $name = $_GET["q"];
        $list = array();
        $data = Sopir::model()->findAll(array('condition' => 'nama like "%' . $name . '%" and is_delete=0', 'limit' => '10'));
        // $data->is_delete = 0;
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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Bon'])) {
            $model->attributes = $_POST['Bon'];
            if ($model->save()) {
                $bondDet = BonDet::model()->find(array('condition' => 'bon_id = ' . $id, 'order' => 'id ASC'));
                $bondDet->debet = $model->total;
                $bondDet->save();
                
            }
//            BonDet::model()->updateAll(array('debet' => $_POST['Bon']['total'], 'tanggal' => $_POST['Bon']['tanggal']), 'debet > 0 AND bon_id=' . $id);

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
            BonDet::model()->deleteAll('bon_id=' . $id);
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

        $model = new Bon('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Bon'])) {
            $model->attributes = $_GET['Bon'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionGenerateExcel() {

        $sopir_id = $_GET['Bon_sopir_id'];
        $deskripsi = $_GET['Bon_deskripsi'];
        $tanggal = $_GET['Bon_tanggal'];
        $total = $_GET['Bon_total'];

        $criteria = new CDbCriteria;
        $criteria->compare('sopir_id', $sopir_id);
        $criteria->compare('tanggal', $tanggal, true);
        $criteria->compare('deskripsi', $deskripsi, true);
        $criteria->compare('total', $total);

        $model = Bon::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Bon -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = Bon::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bon-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
