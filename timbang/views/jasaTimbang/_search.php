<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'search-jasa-timbang-form',
'action'=>Yii::app()->createUrl($this->route),
'method'=>'get',
));  ?>


        <?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'customer',array('class'=>'span5','maxlength'=>50)); ?>

        <?php echo $form->textFieldRow($model,'nomor_polisi',array('class'=>'span5','maxlength'=>25)); ?>

        <?php echo $form->textFieldRow($model,'produk',array('class'=>'span5','maxlength'=>45)); ?>

        <?php echo $form->textFieldRow($model,'tanggal_timbang1',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'berat_timbang1',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'tanggal_timbang2',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'berat_timbang2',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'rafaksi',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'netto',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'harga',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'total',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'created_user_id',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

        <?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Pencarian')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset', 'htmlOptions'=>array('class'=>'btnreset btn-small'))); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function($) {
        $(".btnreset").click(function() {
            $(":input", "#search-jasa-timbang-form").each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase(); // normalize case
                if (type == "text" || type == "password" || tag == "textarea")
                    this.value = "";
                else if (type == "checkbox" || type == "radio")
                    this.checked = false;
                else if (tag == "select")
                    this.selectedIndex = "";
            });
        });
    })
</script>
