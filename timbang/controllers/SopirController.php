<?php

class SopirController extends Controller {

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
     public function actionGetDetail() {
        $id = $_POST['id'];
        $cust = Sopir::model()->findByPk($id);
        $return['alamat'] = $cust->alamat;
        $return['telpon'] = landa()->hp($cust->telepon);
        echo json_encode($return);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Sopir;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sopir'])) {
            $model->attributes = $_POST['Sopir'];
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

        if (isset($_POST['Sopir'])) {
            $model->attributes = $_POST['Sopir'];

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

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            // we only allow deletion via POST request
//			$this->loadModel($id)->delete();
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
        $model = new Sopir('search');
        $model->unsetAttributes();  // clear any default values
        
         //delete checked
        if (isset($_POST['delete']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->is_delete = 1;
                $a->save();
                ;
            }
        }
        
        //restore checked
        if (isset($_POST['restore']) && isset($_POST['ceckbox'])) {
            foreach ($_POST['ceckbox'] as $data) {
                $a = $this->loadModel($data);
                if (!empty($a))
                    $a->is_delete = 0;
                $a->save();
            }
        }
        
        $model->is_delete = 0;
        if (isset($_GET['Sopir'])) {
            $model->attributes = $_GET['Sopir'];
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
        $model = Sopir::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

     public function actionGenerateExcel() {

        $kode = $_GET['Sopir_kode'];
        $is_delete = $_GET['is_delete'];
        $nama = $_GET['Sopir_nama'];
        $telepon = $_GET['Sopir_telepon'];
        $alamat = $_GET['Sopir_alamat'];

        $criteria = new CDbCriteria;
        $criteria->compare('kode', $kode, true);
        $criteria->addCondition('nama like "%' . $nama . '%"');
        $criteria->compare('is_delete', $is_delete, true);
        $criteria->compare('telepon', $telepon, true);
        $criteria->compare('alamat', $alamat, true);
        
        $model = Sopir::model()->findAll($criteria);
        
         Yii::app()->request->sendFile('Data Sopir -' . date('YmdHis') . '.xls', $this->renderPartial('excelReport', array(
                    'model' => $model
                        ), true)
        );
    }
    
    public function actionSearchJson() {
        $user = (empty(Yii::app()->session['searchSopir'])) ? Sopir::model()->findAll(array('condition' => 'nama like "%' . $_POST['queryString'] . '%"')) : Yii::app()->session['searchSopir'];
        $results = array();
        foreach ($user as $no => $o) {
            $results[$no]['url'] = url('sopir/' . $o->id);
//            $results[$no]['img'] = $o->imgUrl['small'];
            $results[$no]['title'] = ucfirst($o->nama);
            $results[$no]['description'] = '<br><b>No :</b> ' . $o->kode . '<br/><b>Telp :</b> ' . $o->telepon . '<br/><b>Addr:</b> ' . $o->alamat;
        }
        echo json_encode($results);
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sopir-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
