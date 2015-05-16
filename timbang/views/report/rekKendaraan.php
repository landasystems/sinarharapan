<?php
$this->setPageTitle('Laporan Rekap Kendaran');
$this->breadcrumbs = array(
    'Laporan Rekap Kendaraan',
);
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'results',
    'enableAjaxValidation' => false,
    'method' => 'post',
    'type' => 'horizontal',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
        ));
?>
<div class="well">

    <div class="row-fluid">
        <?php
        echo $form->dateRangeRow(
                $model, 'tanggal', array(
            'prepend' => '<i class="icon-calendar"></i>',
            'value' => (isset($_POST['Bon']['tanggal'])) ? $_POST['Bon']['tanggal'] : '',
            'options' => array('callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}'),
//            'value' => (isset($_POST['AccCoaDet']['created'])) ? $_POST['AccCoaDet']['created'] : ''
                )
        );
        ?> 

        <div class="control-group ">
            <label class="control-label" for="Pegawai_jabatan_id">Sopir</label>
            <div class="controls">
                <?php
                $data = array('0' => '- Pilih Nama Sopir -') + CHtml::listData(Sopir::model()->findAll(), 'id', 'nama');
                $this->widget(
                        'bootstrap.widgets.TbSelect2', array(
                    'name' => 'Bon[sopir_id]',
                    'data' => $data,
                    'value' => (isset($_POST['Bon']['sopir_id'])) ? $_POST['Bon']['sopir_id'] : '',
                    'options' => array(
                        'width' => '25%;margin:0px;text-align:left',
                )));
                ?>
            </div>
        </div>


    </div>
</div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'icon' => 'ok white',
        'label' => 'Lihat Report',
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'icon' => ' icomoon-icon-file-excel white',
        'label' => 'Export ke Excel',
        'htmlOptions' => array(
            'name' => 'export'
        )
    ));
    ?>
    <?php
    if (!empty($_POST['Bon']['tanggal'])) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary',
            'icon' => 'entypo-icon-printer white',
            'label' => 'Print',
            'htmlOptions' => array(
                'id' => 'print',
                'onClick' => 'printDiv("printArea")'
            )
        ));
    }
    ?>
</div>

<?php $this->endWidget(); ?>


<?php
if (!empty($_POST['Bon']['tanggal'])) {

    $tanggal = explode('-', $_POST['Bon']['tanggal']);
    $start = $tanggal[0];
    $end = $tanggal[1];
    $sopir = (isset($_POST['Bon']['sopir_id'])) ? $_POST['Bon']['sopir_id'] : '';

    $this->renderPartial('_rekBonSopir', array(
        'model' => $model,
        'start' => $start,
        'end' => $end,
        'sopir' => $sopir
    ));
}
?>

<script>
    function printDiv(divName)
    {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<style>
    .form-horizontal .control-group{
        margin-bottom: 5px !important;
    }
</style>
