<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'girik-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'type' => 'horizontal',
        ),
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    $pengaturan = Pengaturan::model()->findByPk(1);
    if ($model->isNewRecord == TRUE) {
        $ongkos = (!empty($pengaturan->ongkos_sopir)) ? $pengaturan->ongkos_sopir : 0;
    } else {
        $ongkos = $model->ongkos;
    }
    ?>
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <div class="row-fluid">
            <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>
            <div class="span5">
                <?php
                echo $form->datepickerRow(
                        $model, 'tanggal', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>
                <?php
//                $idsopir = isset($model->sopir_id) ? $model->sopir_id : 0;
//                $namaSopir = isset($model->Sopir->nama) ? $model->Sopir->nama : 0;
                $data = array('0' => '- Pilih Sopir -') + CHtml::listData(Sopir::model()->findall(array('condition' => 'is_delete = 0 ')), 'id', 'nama');
                echo $form->select2Row($model, 'sopir_id', array(
                    'asDropDownList' => true,
                    'data' => $data,
                    'options' => array(
                        'placeholder' => t('choose', 'global'),
                        'allowClear' => true,
                        'width' => '260px',
                    ),
                        )
                );
                ?>
                <?php
                $data = array('0' => '- Pilih Truk -') + CHtml::listData(Truk::model()->findall(array('condition' => 'is_delete = 0')), 'id', 'nama');
                echo $form->select2Row($model, 'truk_id', array(
                    'asDropDownList' => true,
                    'data' => $data,
                    'options' => array(
                        'placeholder' => t('choose', 'global'),
                        'allowClear' => true,
                        'width' => '260px',
                    ),
                        )
                );
                ?>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Alamat</label>
                    <div class="controls">
                        <textarea rows="3" cols="20" readonly="1" class="span12" id="alamat"><?php echo (isset($model->Sopir->alamat)) ? $model->Sopir->alamat : '-' ?></textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Telepon</label>
                    <div class="controls">
                        <input class="span15" maxlength="19" readonly="1" name="" id="telepon" type="text" value="<?php echo (isset($model->Sopir->telepon)) ? $model->Sopir->telepon : '-' ?>">
                    </div>
                </div>
            </div>
            <div class="span5">
                <?php echo $form->textFieldRow($model, 'nomor_girik', array('class' => 'span6')); ?>

                <?php echo $form->textFieldRow($model, 'berat', array('class' => 'angka span12', 'append' => 'Kg', 'onkeyup' => 'calculate()')); ?>

                <?php echo $form->textFieldRow($model, 'ongkos', array('class' => 'angka span12', 'prepend' => 'Rp', 'onkeyup' => 'calculate()', 'value' => $ongkos, 'append' => '/ Kw')); ?>

                <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span12', 'prepend' => 'Rp', 'readonly' => true)); ?>

                <?php echo $form->textFieldRow($model, 'solar', array('class' => 'angka span12', 'prepend' => 'Rp', 'value' => (!empty($pengaturan->solar)) ? $pengaturan->solar : 0, 'onkeyup' => 'calculate()')); ?>

                <?php echo $form->textFieldRow($model, 'fee_sopir', array('class' => 'angka span12', 'prepend' => 'Rp', 'readonly' => true,)); ?>
                <input type="hidden" id="fee_sopir" value="<?php echo (!empty($pengaturan->persentasi_sopir)) ? ($pengaturan->persentasi_sopir / 100) : 0; ?>">
                <?php echo $form->textFieldRow($model, 'fee_truk', array('class' => 'angka span12', 'prepend' => 'Rp', 'readonly' => true)); ?>
                <input type="hidden" id="fee_truk" value="<?php echo (!empty($pengaturan->persentasi_truk)) ? ($pengaturan->persentasi_truk / 100) : 0; ?>">


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
<script type="text/javascript">
    function calculate() {
        var berat = parseFloat($("#Girik_berat").val() / 1000);
        var ongkos = parseInt($("#Girik_ongkos").val());
        var solar = parseInt($("#Girik_solar").val());
        var persentasi_truk = parseFloat($("#fee_truk").val());
        var persentasi_sopir = parseFloat($("#fee_sopir").val());
        var total = berat * ongkos;
        $("#Girik_total").val(total);
        $("#Girik_fee_truk").val(total * persentasi_truk);
        $("#Girik_fee_sopir").val((total * persentasi_sopir) - solar);
    }
    $(document).ready(function() {
        $("#Girik_sopir_id").change(function() {
            $.ajax(
                    {
                        type: "POST",
                        url: "<?php echo url('girik/getDetail'); ?>",
                        data: {id: $(this).val()},
                        success: function(data)
                        {
                            obj = JSON.parse(data);
                            $("#alamat").html(obj.alamat);
                            $("#telepon").val(obj.telepon);
                        }
                    });
        });
    });
</script>