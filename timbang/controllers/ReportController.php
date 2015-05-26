<?php

class ReportController extends Controller {

    public $breadcrumbs;
    public $layout = 'main';

//    public function filters() {
//        return array(
//            'rights', 
//        );
//    }
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // u
                'actions' => array('trsCustomer'),
                'expression' => 'app()->controller->isValidAccess("trsCustomer","r")'
            ),
            array('allow', // u
                'actions' => array('trsSopir'),
                'expression' => 'app()->controller->isValidAccess("trSopir","r")'
            ),
            array('allow', // u
                'actions' => array('trsKendaraan'),
                'expression' => 'app()->controller->isValidAccess("prKendaraan","r")'
            ),
            array('allow', // u
                'actions' => array('rekapHutCustomer'),
                'expression' => 'app()->controller->isValidAccess("rkpCostumer","r")'
            ),
            array('allow', // u
                'actions' => array('rekapBonSopir'),
                'expression' => 'app()->controller->isValidAccess("rkpSopir","r")'
            ),
            array('allow', // d
                'actions' => array('rekapKendaraan'),
                'expression' => 'app()->controller->isValidAccess(rkpKendaraan,"r")'
            )
        );
    }

    public function css() {
        cs()->registerCss('', '
            @page { margin: 0.4cm;} 
                .tbPrint {width:100%}
                table.tbPrint td, table.tbPrint th{
                    border: solid #000 2px;
            }');
    }

    public function actionTrsCustomer() {
        $this->css();
        $model = new Piutang();
        if (isset($_POST['export']) && !empty($_POST['Piutang']['tanggal'])) {
            $tanggal = explode('-', $_POST['Piutang']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $export = 1;
            $customer = (isset($_POST['Piutang']['customer_id'])) ? $_POST['Piutang']['customer_id'] : '';
            Yii::app()->request->sendFile('Rekap Hutang Customer - ' . date('dmY') . '.xls', $this->renderPartial('_trsCustomer', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'customer' => $customer,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('trsCustomer', array('model' => $model));
    }
    public function actionDetailCustomer(){
        $id = $_POST['id'];
        $detail = array();
        if($id != 0){
            $customer = Customer::model()->findByPk($id);
            $detail['alamat'] = $customer->alamat;
            $detail['telepon'] = $customer->telepon;
            
            echo json_encode($detail);
        }
    }
    public function actionTrsSopir() {
        $this->css();
        $model = new Bon();
        if (isset($_POST['export']) && !empty($_POST['Bon']['tanggal'])) {
            $tanggal = explode('-', $_POST['Bon']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $sopir = (isset($_POST['Bon']['sopir_id'])) ? $_POST['Bon']['sopir_id'] : '';
            $export = 1;
            Yii::app()->request->sendFile('Laporan Transaksi Sopir - ' . date('dmY') . '.xls', $this->renderPartial('_trsSopir', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'sopir' => $sopir,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('trsSopir', array('model' => $model));
    }
    public function actionDetailSopir(){
        $id = $_POST['id'];
        $detail = array();
        if($id != 0){
            $sopir = Sopir::model()->findByPk($id);
            $detail['alamat'] = $sopir->alamat;
            $detail['telepon'] = $sopir->telepon;
            
            echo json_encode($detail);
        }
    }
    public function actionTrsKendaraan() {
        $this->css();
        $model = new PerawatanTruk();
        if (isset($_POST['export']) && !empty($_POST['PerawatanTruk']['tanggal'])) {
            $tanggal = explode('-', $_POST['PerawatanTruk']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $kendaraan = (isset($_POST['PerawatanTruk']['truk_id'])) ? $_POST['PerawatanTruk']['truk_id'] : '';
            $export = 1;
            Yii::app()->request->sendFile('Rekap Kendaraan - ' . date('dmY') . '.xls', $this->renderPartial('_trsKendaraan', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'kendaraan' => $kendaraan,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('trsKendaraan', array('model' => $model));
    }
    public function actionDetailTruk(){
        $id = $_POST['id'];
        $detail = array();
        if($id != 0){
            $truk = Truk::model()->findByPk($id);
            $detail['alamat'] = $truk->alamat;
            $detail['telepon'] = $truk->telepon;
            
            echo json_encode($detail);
        }
    }
    public function actionRekapHutCustomer() {
        $this->css();
        $model = new Piutang();
        if (isset($_POST['export']) && !empty($_POST['Piutang']['tanggal'])) {
            $tanggal = explode('-', $_POST['Piutang']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $export = 1;
            $customer = (isset($_POST['Piutang']['customer_id'])) ? $_POST['Piutang']['customer_id'] : '';
            Yii::app()->request->sendFile('Rekap Hutang Customer - ' . date('dmY') . '.xls', $this->renderPartial('_rekCustomer', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'customer' => $customer,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('rekCustomer', array('model' => $model));
    }

    public function actionRekapBonSopir() {
        $this->css();
        $model = new Bon();
        if (isset($_POST['export']) && !empty($_POST['Bon']['tanggal'])) {
            $tanggal = explode('-', $_POST['Bon']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $sopir = (isset($_POST['Bon']['sopir_id'])) ? $_POST['Bon']['sopir_id'] : '';
            $export = 1;
            Yii::app()->request->sendFile('Rekap Bon Sopir - ' . date('dmY') . '.xls', $this->renderPartial('_rekBonSopir', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'sopir' => $sopir,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('rekBonSopir', array('model' => $model));
    }
    public function actionRekapKendaraan() {
        $this->css();
        $model = new PerawatanTruk();
        if (isset($_POST['export']) && !empty($_POST['PerawatanTruk']['tanggal'])) {
            $tanggal = explode('-', $_POST['PerawatanTruk']['tanggal']);
            $start = $tanggal[0];
            $end = $tanggal[1];
            $kendaraan = (isset($_POST['PerawatanTruk']['truk_id'])) ? $_POST['PerawatanTruk']['truk_id'] : '';
            $export = 1;
            Yii::app()->request->sendFile('Rekap Kendaraan - ' . date('dmY') . '.xls', $this->renderPartial('_rekKendaraan', array(
                        'model' => $model,
                        'start' => $start,
                        'end' => $end,
                        'kendaraan' => $kendaraan,
                        'export' => $export
                            ), true)
            );
        }
        $this->render('rekKendaraan', array('model' => $model));
    }

    public function cssTable() {
        cs()->registerCss('', '
            thead{display:table-header-group;}
                ');
    }

}
