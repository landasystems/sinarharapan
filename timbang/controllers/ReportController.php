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
                'actions' => array('index', 'update'),
                'expression' => 'app()->controller->isValidAccess(1,"u")'
            ),
            array('allow', // d
                'actions' => array('index', 'delete'),
                'expression' => 'app()->controller->isValidAccess(1,"d")'
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
