<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'bon-form',
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

        <div class="row-fluid">
            <div class="span6">

                <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>


                <?php
                $idsopir = isset($model->sopir_id) ? $model->sopir_id : 0;
                $namaSopir = isset($model->Sopir->nama) ? $model->Sopir->nama : 0;
                echo $form->select2Row($model, 'sopir_id', array(
                    'asDropDownList' => false,
                    'options' => array(
                        'placeholder' => t('choose', 'global'),
                        'allowClear' => true,
                        'width' => '260px',
                        'minimumInputLength' => '3',
                        'ajax' => array(
                            'url' => Yii::app()->createUrl('bon/getListSopir'),
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
                                 callback({id: ' . $idsopir . ', text: "' . $namaSopir . '" });
                            }',
                    ),
                        )
                );
                ?>

                <div class="control-group ">
                    <label class="control-label" for="eselon">Alamat</label>
                    <div class="controls">
                        <textarea rows="6" cols="50" readonly="1" class="span20" id="alamat"><?php echo (isset($model->Sopir->alamat)) ? $model->Sopir->alamat : '-' ?></textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Telepon</label>
                    <div class="controls">
                        <input class="span15" maxlength="19" readonly="1" name="" id="telepon" type="text" value="<?php echo (isset($model->Sopir->telepon)) ? $model->Sopir->telepon : '-' ?>">
                    </div>
                </div>

            </div>
            <div class="span6 img-polaroid" style="padding: 15px">
                <?php
                echo $form->datepickerRow(
                        $model, 'tanggal', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>
                <?php echo $form->textAreaRow($model, 'deskripsi', array('rows' => 3, 'cols' => 50, 'class' => 'span20')); ?>
                <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span10', 'prepend' => 'Rp')); ?>

                <?php
                if($model->isNewRecord == false)
                    echo $form->radioButtonListRow($model, 'lunas', Piutang::model()->ArrLunas());
                ?>
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
    $("#Bon_sopir_id").on("change", function() {
        //var name = $("#Registration_guest_user_id").val();
        //  alert(name);

        $.ajax({
            url: "<?php echo url('sopir/getDetail'); ?>",
            type: "POST",
            data: {id: $(this).val()},
            success: function(data) {

                obj = JSON.parse(data);
                $("#telepon").val(obj.telpon);
                $("#alamat").val(obj.alamat);
            }
        });
    });
</script>
