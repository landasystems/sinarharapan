<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'truk-form',
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
                <fieldset>
                    <legend>Data Truk</legend>
                </fieldset>

                <?php echo $form->textFieldRow($model, 'nomor_polisi', array('class' => 'span14', 'maxlength' => 60)); ?>

                <?php echo $form->textFieldRow($model, 'merk', array('class' => 'span14', 'maxlength' => 60)); ?>

                <?php echo $form->textFieldRow($model, 'type', array('class' => 'span14', 'maxlength' => 60)); ?>



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
                            'url' => Yii::app()->createUrl('truk/getListSopir'),
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
            </div>
            <div class="span5">
                <fieldset>
                    <legend>Masa Berlaku</legend>
                </fieldset>
                <?php
                echo $form->datepickerRow(
                        $model, 'pajak', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>
                <?php
                echo $form->datepickerRow(
                        $model, 'kir', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>
                <?php
                echo $form->datepickerRow(
                        $model, 'stnk', array(
                    'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                    'prepend' => '<i class="icon-calendar"></i>'
                        )
                );
                ?>
            </div></div>
        <fieldset>
            <legend>Kelengkapan</legend>
        </fieldset>
        <?php echo $form->radioButtonListRow($model, 'surat', Truk::model()->ArrSurat()); ?>
        <?php echo $form->radioButtonListRow($model, 'seling', Truk::model()->ArrSeling()); ?>
        <?php echo $form->radioButtonListRow($model, 'terpal', Truk::model()->ArrSurat()); ?>
        <?php echo $form->radioButtonListRow($model, 'dongkrak', Truk::model()->ArrSurat()); ?>
        <?php echo $form->radioButtonListRow($model, 'kunci', Truk::model()->ArrSurat()); ?>






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
