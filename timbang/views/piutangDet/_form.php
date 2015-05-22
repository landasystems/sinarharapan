<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'piutang-det-form',
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

        <?php
        echo $form->datePickerRow(
                $model, 'tanggal', array(
            'prepend' => '<i class="icon-calendar"></i>',
            'options' => array(
                'format' => 'yyyy-mm-dd',
            ),
                )
        );
        ?>

        <div class="control-group ">
            <label class="control-label" for="customer">Customer</label>
            <div class="controls">
                <?php
                $data = array('0' => '- Pilih Customer -') + CHtml::listData(Customer::model()->findall(array('condition' => 'is_delete = 0 ')), 'id', 'nama');
                $this->widget(
                        'bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name' => 'customer',
                    'data' => $data,
                    'htmlOptions' => array(
                        'style' => 'width:260px;',
                        'id' => 'customer'
                    ),
                        )
                );
                ?>
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label" for="eselon">Alamat</label>
            <div class="controls">
                <textarea  readonly="1" class="span4" id="alamat">-</textarea>
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="eselon">Telepon</label>
            <div class="controls">
                <input class="span2" maxlength="19" readonly="1" name="" id="telpon" type="text" value="-">
            </div>
        </div>

        <div id="list"></div>

        <?php if (!isset($_GET['v'])) { ?>        <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'icon' => 'ok white',
                    'label' => $model->isNewRecord ? 'Simpan' : 'Simpan',
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
    $("#customer").on("change", function() {
        //var name = $("#Registration_guest_user_id").val();
        //  alert(name);

        $.ajax({
            url: "<?php echo url('piutangDet/getDetail'); ?>",
            type: "POST",
            data: {id: $(this).val()},
            success: function(data) {

                obj = JSON.parse(data);
                $("#telpon").val(obj.telpon);
                $("#alamat").val(obj.alamat);
                $("#list").html(obj.list);
            }
        });
    });
</script>