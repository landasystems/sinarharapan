<?php
$this->setPageTitle('Laporan Transaksi Sopir');
$this->breadcrumbs = array(
    'Laporan Transaksi Sopir',
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
                $data = array('0' => '- Pilih Nama Sopir -') + CHtml::listData(Sopir::model()->findAll(array('condition'=>'is_delete = 0')), 'id', 'nama');
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
        <div class="control-group ">
            <label class="control-label" for="Pegawai_jabatan_id">Alamat</label>
            <div class="controls">
                <textarea id="alamat" name="alamat" readonly="readonly"><?php echo (isset($_POST['alamat']))? $_POST['alamat'] :''?></textarea>
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="Pegawai_jabatan_id">No. Telp</label>
            <div class="controls">
                <input type="text" readonly="readonly" id="telp" name="telp" value="<?php echo (isset($_POST['telp']))? $_POST['telp'] :''?>">
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

    $this->renderPartial('_trsSopir', array(
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
    $("body").on("change", "#Bon_sopir_id", function () {
        var id = $(this).val();
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo url('report/detailSopir') ?>",
            success: function (data) {
                if (data != "") {
                    isi = JSON.parse(data);
                    $("#alamat").html(isi.alamat);
                    $("#telp").val(isi.telepon);
                }
            }

        });
    });
</script>
<style>
    .form-horizontal .control-group{
        margin-bottom: 5px !important;
    }
</style>
