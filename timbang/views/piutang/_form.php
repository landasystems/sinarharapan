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
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>

        <div class="row-fluid">
            <div class="span5">


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
                        <div class="input-prepend">
                            <span class="add-on">+62</span>
                            <input class="span12" maxlength="19" readonly="1" name="" id="telpon" type="text" value="<?php echo (isset($model->Customer->telepon)) ? $model->Customer->telepon : '-' ?>">
                        </div>
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'jaminan', array('class' => 'span12', 'maxlength' => 150)); ?>

                <?php echo $form->textFieldRow($model, 'deskripsi', array('class' => 'span12', 'maxlength' => 255)); ?>
            </div>
            <div class="span5">
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
                            <input class="span12 angka" name="Piutang[jumlah_pupuk]" id="Piutang_jumlah_pupuk" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'sub_total', array('class' => 'span12')); ?>

                <?php
                $bunga = Pengaturan::model()->findByPk(1);
                ?>
                <div class="control-group ">
                    <label class="control-label" for="Piutang_bunga">Bunga</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="angka span12" value="<?php echo (isset($model->bunga)) ? $model->bunga : $bunga->bunga ?>" name="Piutang[bunga]" id="Piutang_bunga" type="text"><span class="add-on">%</span>
                        </div>
                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span12', 'prepend' => 'Rp', 'readOnly' => true)); ?>

            </div></div>


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
<script>
    function calculate() {
        var jumlah = parseInt($("#Piutang_sub_total").val());
        var bunga = parseInt($("#Piutang_bunga").val());
        var sBunga = bunga / 100;
        var total = jumlah - (sBunga * jumlah);
        $("#Piutang_total").val(total);
    }
    $("body").on("keyup", "#Piutang_sub_total", function() {
        calculate();
    });
    $("body").on("keyup", "#Piutang_bunga", function() {
        calculate();
    });

    $("body").on("click", ".radio", function() {
        var id = $(this).find("input").val();

        if (id == "pupuk") {
            $("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:");
        }
        else {
            $("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:none");
        }

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
} else {
    echo '$("#Piutang_jumlah_pupuk").parent().parent().parent().attr("style", "display:");';
}
?>
</script>