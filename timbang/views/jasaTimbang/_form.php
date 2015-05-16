<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'timbang-form',
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
        <fieldset>
            <legend>Info Customer</legend>
        </fieldset>
       
        <div class="control-group ">
            <label class="control-label" for="JasaTimbang_police_number">Customer</label>
            <div class="controls">
               <input class="4" maxlength="25" name="JasaTimbang[customer]" id="JasaTimbang_customer" value="<?php echo (isset($model->customer)) ? $model->customer : '' ?>"  type="text">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="JasaTimbang_police_number">Produk</label>
            <div class="controls">
                <input class="span2" maxlength="25" name="JasaTimbang[produk]" id="JasaTimbang_produk" value="Tebu" readonly type="text">
            </div>
        </div>


        <?php echo $form->textFieldRow($model, 'nomor_polisi', array('class' => 'span2', 'maxlength' => 25)); ?>

        <fieldset>
            <legend>Info JasaTimbangan</legend>
        </fieldset>
        <div class="row-fluid">
            <div class="span5">
                <div class="control-group ">
                    <label class="control-label" for="JasaTimbang_police_number">Berat 1</label>
                    <div class="controls">
                        <?php
                        echo $form->datepickerRow(
                                $model, 'tanggal_timbang1', array(
                            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                            'prepend' => '<i class="icon-calendar"></i>', 'labelOptions' => array('label' => false)
                                )
                        );
                        ?>

                        <div class="input-append">
                            <input class="span6" name="JasaTimbang[berat_timbang1]" id="JasaTimbang_berat_timbang1" value="<?php echo (isset($model->berat_timbang1)) ? $model->berat_timbang1 : '' ?>" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang1', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="JasaTimbang_police_number">Berat 2</label>
                    <div class="controls">
                        <?php
                        echo $form->datepickerRow(
                                $model, 'tanggal_timbang2', array(
                            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                            'prepend' => '<i class="icon-calendar"></i>', 'labelOptions' => array('label' => false)
                                )
                        );
                        ?>
                        <div class="input-append">
                            <input class="span6 angka" name="JasaTimbang[berat_timbang2]" id="JasaTimbang_berat_timbang2" value="<?php echo (isset($model->berat_timbang2)) ? $model->berat_timbang2 : 0 ?>" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang2', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group ">
                    <label class="control-label" for="JasaTimbang_police_number">Rafaksi</label>
                    <div class="controls">

                        <div class="input-append">
                            <input class="span6 angka" name="JasaTimbang[rafaksi]" id="JasaTimbang_rafaksi" value="<?php echo (isset($model->rafaksi)) ? $model->rafaksi : 0 ?>" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang2', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="JasaTimbang_police_number">Netto</label>
                    <div class="controls">

                        <div class="input-append">
                            <input class="span6" name="JasaTimbang[netto]" id="JasaTimbang_netto" value="<?php echo (isset($model->netto)) ? $model->netto : '' ?>" readonly type="text">
                            <span class="add-on">Kg</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang2', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
                <?php echo $form->textFieldRow($model, 'harga', array('class' => 'span7 angka','prepend' => 'Rp',)); ?>
                <?php echo $form->textFieldRow($model, 'total', array('class' => 'span7','prepend' => 'Rp','readOnly'=>true)); ?>
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
        var berat1 = parseInt($("#JasaTimbang_berat_timbang1").val());
        var berat2 = parseInt($("#JasaTimbang_berat_timbang2").val());
        var rafaksi = parseInt($("#JasaTimbang_rafaksi").val());
        var harga = parseInt($("#JasaTimbang_harga").val());
        var netto = berat1 - berat2 - rafaksi;
        var total = netto * harga;
        $("#JasaTimbang_netto").val(netto);
        $("#JasaTimbang_total").val(total);
    }

$("body").on("keyup", "#JasaTimbang_berat_timbang1",function(){
    calculate();
});
$("body").on("keyup", "#JasaTimbang_berat_timbang2",function(){
    calculate();
});
$("body").on("keyup", "#JasaTimbang_rafaksi",function(){
    calculate();
});
$("body").on("keyup", "#JasaTimbang_harga",function(){
    calculate();
});
</script>