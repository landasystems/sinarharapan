<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'search-timbang-form',
'action'=>Yii::app()->createUrl($this->route),
'method'=>'get',
));  ?>


        <?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

        <?php
        $idcustomer = isset($model->customer_id) ? $model->customer_id : 0;
        $namaCustomer = isset($model->Customer->nama) ? $model->Customer->kode.' - '.$model->Customer->nama : 0;
      
        echo $form->select2Row($model, 'customer_id', array(
            'asDropDownList' => false,
            'options' => array(
                'placeholder' => t('choose', 'global'),
                'allowClear' => true,
                'width' => '360px',
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
            $(":input", "#search-timbang-form").each(function() {
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

