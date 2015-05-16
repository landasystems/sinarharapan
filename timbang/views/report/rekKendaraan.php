<?php
$this->setPageTitle('Laporan Rekap Perawatan Kendaraan');
$this->breadcrumbs = array(
    'Laporan Rekap Perawatan Kendaraan',
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
            'value' => (isset($_POST['PerawatanTruk']['tanggal'])) ? $_POST['PerawatanTruk']['tanggal'] : '',
            'options' => array('callback' => 'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}'),
//            'value' => (isset($_POST['AccCoaDet']['created'])) ? $_POST['AccCoaDet']['created'] : ''
                )
        );
        ?> 

        <div class="control-group ">
            <label class="control-label" for="Pegawai_jabatan_id">Nomor Polisi Kendaran</label>
            <div class="controls">
                <?php
                $data = array('0' => '- Pilih Nopol-') + CHtml::listData(Truk::model()->findAll(array('condition'=>'is_delete = 0')), 'id', 'nomor_polisi');
                $this->widget(
                        'bootstrap.widgets.TbSelect2', array(
                    'name' => 'PerawatanTruk[truk_id]',
                    'data' => $data,
                    'value' => (isset($_POST['PerawatanTruk']['truk_id'])) ? $_POST['PerawatanTruk']['truk_id'] : '',
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
    if (!empty($_POST['PerawatanTruk']['tanggal'])) {
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
if (!empty($_POST['PerawatanTruk']['tanggal'])) {

    $tanggal = explode('-', $_POST['PerawatanTruk']['tanggal']);
    $start = $tanggal[0];
    $end = $tanggal[1];
    $kendaraan = (isset($_POST['PerawatanTruk']['truk_id'])) ? $_POST['PerawatanTruk']['truk_id'] : '';

    $this->renderPartial('_rekKendaraan', array(
        'model' => $model,
        'start' => $start,
        'end' => $end,
        'kendaraan' => $kendaraan
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
