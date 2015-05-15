<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-piutang-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>



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
                    'url' => Yii::app()->createUrl('piutang/getListCustomer'),
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

        <?php echo $form->textFieldRow($model, 'jaminan', array('class' => 'span7', 'maxlength' => 150)); ?>

        <?php echo $form->textFieldRow($model, 'deskripsi', array('class' => 'span7', 'maxlength' => 255)); ?>

        <?php
        echo $form->datepickerRow(
                $model, 'tanggal', array(
            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
            'prepend' => '<i class="icon-calendar"></i>'
                )
        );
        ?>
    </div>
    <div class="span5">



        <?php echo $form->radioButtonListRow($model, 'type', Piutang::model()->ArrPinjaman()); ?>

        <?php
        $bunga = Pengaturan::model()->findByPk(1);
        ?>
        <div class="control-group ">
            <label class="control-label" for="Piutang_bunga">Bunga</label>
            <div class="controls">
                <div class="input-append">
                    <input class="angka span12" value="<?php echo $bunga->bunga ?>" name="Piutang[bunga]" id="Piutang_bunga" type="text"><span class="add-on">%</span>
                </div>
            </div>
        </div>
        <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span12', 'prepend' => 'Rp')); ?>


        <?php echo $form->textFieldRow($model, 'sub_total', array('class' => 'span7')); ?>
    </div></div>



<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'search white', 'label' => 'Pencarian')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'button', 'icon' => 'icon-remove-sign white', 'label' => 'Reset', 'htmlOptions' => array('class' => 'btnreset btn-small'))); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function ($) {
        $(".btnreset").click(function () {
            $(":input", "#search-piutang-form").each(function () {
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

