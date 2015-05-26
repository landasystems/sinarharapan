<?php

class PiutangDetController extends Controller {

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
                'expression' => 'app()->controller->isValidAccess("bayarPinjaman","c")'
            ),
            array('allow', // r
                'actions' => array('index', 'view'),
                'expression' => 'app()->controller->isValidAccess("bayarPinjaman","r")'
            ),
            array('allow', // u
                'actions' => array('update'),
                'expression' => 'app()->controller->isValidAccess("bayarPinjaman","u")'
            ),
            array('allow', // d
                'actions' => array('delete'),
                'expression' => 'app()->controller->isValidAccess("bayarPinjaman","d")'
            )
        );
    }

    public function actionGetDetail() {
        $id = $_POST['id'];
        $cust = Customer::model()->findByPk($id);
        $return['alamat'] = $cust->alamat;
        $return['telpon'] = landa()->hp($cust->telepon);
        $return['list'] = $this->renderPartial("_listPiutang", array('customer_id' => $id), TRUE);
        echo json_encode($return);
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
        $model = new PiutangDet;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PiutangDet'])) {
            for ($i = 0; $i <= count($_POST['piutang_id']); $i++) {
                if (!empty($_POST['bayar'][$i])) {
                    $bayar = new PiutangDet;
                    $bayar->attributes = $_POST['PiutangDet'];
                    $bayar->tanggal = $_POST['PiutangDet']['tanggal'];
                    $bayar->credit = $_POST['bayar'][$i];
                    $bayar->piutang_id = $_POST['piutang_id'][$i];
                    $bayar->save();
                }
                $i++;
            }
            logs($bayar);
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
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

        if (isset($_POST['PiutangDet'])) {
            $model->attributes = $_POST['PiutangDet'];
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
        $model = new PiutangDet('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PiutangDet'])) {
            $model->attributes = $_GET['PiutangDet'];
            $criteria->with = 'Piutang';

            if (!empty($model->tanggal)) {
                $dt = explode(" - ", $model->tanggal);
                $start = $dt[0];
                $end = $dt[1];
                $criteria->addCondition('t.tanggal >= "' . $start . '" and t.tanggal <= "' . $end . '"');
            }
            if (!empty($model->piutang_id))
                $criteria->addCondition('Piutang.customer_id = "' . $model->piutang_id . '"');
        
             $criteria->addCondition('t.debet = 0 or t.debet is null');
            }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionGenerateExcel() {
        $tanggal = $_GET['tanggal'];
        $piutang = $_GET['piutang'];

        $criteria = new CDbCriteria;
        if (!empty($tanggal)) {
            $dt = explode(" - ", $tanggal);
            $start = $dt[0];
            $end = $dt[1];
            $criteria->addCondition('t.tanggal >= "' . $start . '" and t.tanggal <= "' . $end . '"');
        };
        if (!empty($piutang))
            $criteria->addCondition('Piutang.customer_id = "' . $piutang . '"');

        $criteria->addCondition('t.debet = 0 or t.debet is null');

        $model = PiutangDet::model()->findAll($criteria);

        Yii::app()->request->sendFile('Data Transaksi Bayar Pinjaman -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
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
        $model = PiutangDet::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'piutang-det-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
