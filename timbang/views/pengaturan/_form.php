<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'pengaturan-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>
    <fieldset>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>
        <div class="row-fluid">
            <div class="span5">
                <fieldset>
                    <legend>Pengaturan Data</legend>
                </fieldset>

                <?php echo $form->textFieldRow($model, 'harga_pupuk', array('class' => 'angka span10', 'prepend' => 'Rp')); ?>

                <?php echo $form->textFieldRow($model, 'harga_tebu', array('class' => 'angka span10', 'prepend' => 'Rp')); ?>

                <?php echo $form->textFieldRow($model, 'bunga', array('class' => 'angka span10', 'append' => '%', 'style' => 'width:45px;')); ?>

                <?php echo $form->textFieldRow($model, 'rafaksi', array('class' => 'angka span5', 'append' => 'Kg')); ?>

                <?php echo $form->textFieldRow($model, 'solar', array('class' => 'angka span10', 'prepend' => 'Rp')); ?>

                <?php echo $form->textFieldRow($model, 'ongkos_sopir', array('class' => 'angka span10', 'prepend' => 'Rp', 'append' => '/ Kw')); ?>

            </div>
            <div class="span5">
                <fieldset>
                    <legend>Pembagian</legend>
                </fieldset>
                <?php echo $form->textFieldRow($model, 'persentasi_sopir', array('class' => 'angka span9', 'append' => '%', 'style' => 'width:45px;')); ?>

                <?php echo $form->textFieldRow($model, 'persentasi_truk', array('class' => 'angka span9', 'append' => '%', 'style' => 'width:45px;')); ?>

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
