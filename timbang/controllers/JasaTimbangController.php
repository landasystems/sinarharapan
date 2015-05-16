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
        $model = new JasaTimbang;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['JasaTimbang'])) {
            $model->attributes = $_POST['JasaTimbang'];
            if (!empty($_POST['JasaTimbang']['kode'])) {
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

        if (isset($_POST['JasaTimbang'])) {
            $model->attributes = $_POST['JasaTimbang'];
              if (!empty($_POST['JasaTimbang']['kode'])) {
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


            if (!empty($model->id))
                $criteria->addCondition('id = "' . $model->id . '"');


            if (!empty($model->customer))
                $criteria->addCondition('customer = "' . $model->customer . '"');


            if (!empty($model->nomor_polisi))
                $criteria->addCondition('nomor_polisi = "' . $model->nomor_polisi . '"');


            if (!empty($model->produk))
                $criteria->addCondition('produk = "' . $model->produk . '"');


            if (!empty($model->tanggal_timbang1))
                $criteria->addCondition('tanggal_timbang1 = "' . $model->tanggal_timbang1 . '"');


            if (!empty($model->berat_timbang1))
                $criteria->addCondition('berat_timbang1 = "' . $model->berat_timbang1 . '"');


            if (!empty($model->tanggal_timbang2))
                $criteria->addCondition('tanggal_timbang2 = "' . $model->tanggal_timbang2 . '"');


            if (!empty($model->berat_timbang2))
                $criteria->addCondition('berat_timbang2 = "' . $model->berat_timbang2 . '"');


            if (!empty($model->rafaksi))
                $criteria->addCondition('rafaksi = "' . $model->rafaksi . '"');


            if (!empty($model->netto))
                $criteria->addCondition('netto = "' . $model->netto . '"');


            if (!empty($model->harga))
                $criteria->addCondition('harga = "' . $model->harga . '"');


            if (!empty($model->total))
                $criteria->addCondition('total = "' . $model->total . '"');


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
