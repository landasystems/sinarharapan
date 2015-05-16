<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'girik-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    $pengaturan = Pengaturan::model()->findByPk(1);
    if ($model->isNewRecord == TRUE) {
        $ongkos = (!empty($pengaturan->harga_tebu)) ? $pengaturan->harga_tebu : 0;
    } else {
        $ongkos = $model->ongkos;
    }
    ?>
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>
        <div class="row-fluid">
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
                $data = array('0' => '- Pilih Truk -') + CHtml::listData(Truk::model()->findall(array('condition' => 'is_delete = 0 and sopir_id = ' . $model->sopir_id)), 'id', 'nama');
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
                <div class="control-group ">
                    <label class="control-label" for="ongkos">
                        Ongkos
                    </label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">Rp</span>
                            <input class="angka span12" name="ongkos" id="ongkos" type="text" onkeyup="calculate()" value="<?php echo $ongkos; ?>">
                        </div>
                    </div>
                </div>
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
<script>
                                function calculate() {
                                    var berat = parseInt($("#Girik_berat").val());
                                    var ongkos = parseInt($("#ongkos").val());
                                    var solar = parseInt($("#Girik_solar").val());
                                    var persentasi_truk = $("#fee_truk").val();
                                    var persentasi_sopir = $("#fee_sopir").val();
                                    var total = berat * ongkos;
                                    $("#Girik_total").val(total);
                                    $("#Girik_fee_truk").val(total * persentasi_truk);
                                    $("#Girik_fee_sopir").val((total * persentasi_truk) - solar);
                                }
                                $(document).ready(function() {
                                    $("#Girik_sopir_id").change(function() {
                                        $.ajax(
                                                {
                                                    type: "POST",
                                                    url: "<?php echo url('girik/ambilTruk'); ?>",
                                                    data: {id: $(this).val()},
                                                    success: function(data)
                                                    {
                                                        obj = JSON.parse(data);
                                                        $("#Girik_truk_id").html(obj.body);
                                                        $("#alamat").html(obj.alamat);
                                                        $("#telepon").val(obj.telepon);
                                                    }
                                                });
                                    });
                                });
</script>