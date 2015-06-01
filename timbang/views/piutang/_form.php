<style type="text/css">

    #printNota{display: none;}

</style>
<style type="text/css" media="print">
    body {visibility:hidden;}
    #printNota{
        visibility:visible;
        display: block; 
        position: absolute;top: 0;left: 0;float: left;
        padding: 0 20px 0 0;
    } 
</style>
<script>
    function printDiv(divName)
    {
        var w = window.open();
        var css = '<style media="print">body{ margin-top:0 !important}</style>';
        var printContents = '<div style="width:100%;" class="printNota"><center>' + $("#" + divName + "").html() + '</center></div>';

        $(w.document.body).html(css + printContents);
        w.print();
        w.window.close();
    }

</script>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'piutang-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>
    <?php
    $bunga = Pengaturan::model()->findByPk(1);
    ?>
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>

        <div class="row-fluid">
            <div class="span5">
                <legend>Detail Customer</legend>
                <?php
                $idcustomer = isset($model->customer_id) ? $model->customer_id : 0;
                $namaCustomer = isset($model->Customer->nama) ? $model->Customer->nama : 0;
                echo $form->select2Row($model, 'customer_id', array(
                    'asDropDownList' => false,
                    'options' => array(
                        'placeholder' => t('choose', 'global'),
                        'allowClear' => true,
                        'width' => '260px',
                        'minimumInputLength' => '3',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('timbang/getListCustomer'),
                            'dataType' => 'json',
                            'data' => 'js:function(term, page) { 
                                                        return {
                                                            q: term 
                                                        }; 
                                                    }',
                            'results' => 'js:function(data) { 
                                                        return {
                                                            results: data
                                                            
                                                        };
                                                    }',
                        ),
                        'initSelection' => 'js:function(element, callback) 
                            { 
                                 callback({id: ' . $idcustomer . ', text: "' . $namaCustomer . '" });
                            }',
                    ),
                        )
                );
                ?>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Alamat</label>
                    <div class="controls">
                        <textarea rows="6" cols="50" readonly="1" class="span20" id="alamat"><?php echo (isset($model->Customer->alamat)) ? $model->Customer->alamat : '-' ?></textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Telepon</label>
                    <div class="controls">
                        <input class="span12" maxlength="19" readonly="1" name="" id="telpon" type="text" value="<?php echo (isset($model->Customer->telepon)) ? $model->Customer->telepon : '-' ?>">
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'jaminan', array('class' => 'span12', 'maxlength' => 150)); ?>

                <?php echo $form->textFieldRow($model, 'deskripsi', array('class' => 'span12', 'maxlength' => 255)); ?>
            </div>
            <div class="span5">
                <legend>Detail Pinjaman</legend>
                <?php
                echo $form->datepickerRow(
                        $model, 'tanggal', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>

                <?php echo $form->radioButtonListRow($model, 'type', Piutang::model()->ArrPinjaman()); ?>

                <div class="control-group ">
                    <label class="control-label" for="Piutang_jumlah_pupuk">Jumlah Pupuk</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span12 angka" name="Piutang[jumlah_pupuk]" id="Piutang_jumlah_pupuk" type="text" value="<?php echo $model->jumlah_pupuk; ?>">
                            <span class="add-on">Kg</span>
                        </div>
                        <?php
                        $pupuk = 0;
                        if ($model->isNewRecord == true) {
                            $pupuk = $bunga->harga_pupuk;
                        } else if ($model->jumlah_pupuk > 0) {
                            $pupuk = $model->sub_total / $model->jumlah_pupuk;
                        }
                        ?>
                        <div class="input-prepend">
                            <span class="add-on">Rp</span>
                            <input class="span12 angka" style="width:100px;" name="harga_pupuk" id="harga_pupuk" type="text" value="<?php echo $pupuk; ?>">
                        </div>
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'sub_total', array('class' => 'angka span12', 'prepend' => 'Rp')); ?>

                <div class="control-group ">
                    <label class="control-label" for="Piutang_bunga">Bunga</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="angka span12" value="<?php echo (isset($model->bunga)) ? $model->bunga : $bunga->bunga ?>" name="Piutang[bunga]" id="Piutang_bunga" type="text"><span class="add-on">%</span>
                        </div>
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span12', 'prepend' => 'Rp', 'readOnly' => true)); ?>
                <?php
                if ($model->isNewRecord == false)
                    echo $form->radioButtonListRow($model, 'lunas', Piutang::model()->ArrLunas());
                ?>
            </div>
        </div>


        <?php if (!isset($_GET['v'])) { ?>        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'icon' => 'ok white',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'reset',
                'icon' => 'remove',
                'label' => 'Reset',
            ));
            ?>
            </div>
        <?php } ?>    </fieldset>

    <?php $this->endWidget(); ?>

</div>
<?php if ($model->isNewRecord == false) { ?>
    <div class="printNota" id="printNota" style="width:100%;">
        <center style="font-size: 12px;"><strong>CV Sinar Harapan</strong></center>
        <center style="font-size: 12px;">Alamat 1 Jl. Mayjen Panjaitan No. 62 Malang Telp. (0341) 789555</center>
        <center style="font-size: 12px;">Alamat 2 Jl. Raya Gatot Subroto, Talok</center>
        <hr>
        <table class="printTable" id="nota" style="margin : 0 auto; font-size: 11px;  width:100%;">
            <tr>
                <td style="text-align: left;"><b>Customer</b></td>
                <td colspan="2"><?php echo $model->Customer->nama; ?></td>

                <td ><b>Tanggal</b></td>
                <td ><?php echo date("d M Y", strtotime($model->tanggal)) ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>No Tlp</b></td>
                <td  colspan="2"><?php echo $model->Customer->telepon; ?></td>
                
                <td ><b>Pinjaman</b></td>
                <td ><?php echo landa()->rp($model->total); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Jaminan</b></td>
                <td  colspan="2"><?php echo $model->jaminan; ?></td>
                
                <td ><b>Bunga</b></td>
                <td ><?php echo landa()->rp($model->sub_total * ($model->bunga / 100)); ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Keterangan</b></td>
                <td  colspan="2"><?php echo $model->deskripsi; ?></td>
                
                <td ><b>Total Pinjaman</b></td>
                <td ><?php echo landa()->rp($model->total - $model->sub_total * ($model->bunga / 100)); ?></td>
            </tr>
        </table>
        <hr>
        <p style="text-align:center;font-size: 11.5px;"></p>
    </div>
<?php } ?>
<script>
    $("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:none");

    function calculate() {
        var jumlah = parseInt($("#Piutang_sub_total").val());
        var bunga = parseInt($("#Piutang_bunga").val());
        var sBunga = bunga / 100;
        var total = jumlah + (sBunga * jumlah);
        $("#Piutang_total").val(total);
    }
    $("body").on("keyup", "#Piutang_sub_total", function() {
        calculate();
    });
    $("body").on("keyup", "#Piutang_bunga", function() {
        calculate();
    });

    $("body").on("keyup", "#Piutang_jumlah_pupuk, #harga_pupuk", function() {
        var jumlah = parseInt($("#Piutang_jumlah_pupuk").val()) * parseInt($("#harga_pupuk").val());
        $("#Piutang_sub_total").val(jumlah);
        calculate();
    });

    $("#Piutang_type_0").click(function(event) {
        $("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:none");
    });

    $("#Piutang_type_1").click(function(event) {
        $("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:");
    });

    $("#Piutang_customer_id").on("change", function() {
        //var name = $("#Registration_guest_user_id").val();
        //  alert(name);

        $.ajax({
            url: "<?php echo url('customer/getDetail'); ?>",
            type: "POST",
            data: {id: $(this).val()},
            success: function(data) {

                obj = JSON.parse(data);
                $("#telpon").val(obj.telpon);
                $("#alamat").val(obj.alamat);
            }
        });
    });
<?php
if ($model->type == "uang") {
    echo '$("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:none");';
} else if ($model->isNewRecord == True) {
    echo '$("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:none");';
} else {
    echo '$("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:");';
}
?>
</script>