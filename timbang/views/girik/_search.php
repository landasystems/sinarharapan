<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-girik-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<div class="row-fluid">
    <div class="span6">
        <?php
        echo $form->dateRangeRow(
                $model, 'tanggal', array(
            'prepend' => '<i class="icon-calendar"></i>',
            'options' => array(
                'format' => 'yyyy-MM-dd',
            ),
                )
        );
        ?>

        <?php echo $form->textFieldRow($model, 'nomor_girik', array('class' => 'span6')); ?> 
    </div>
    <div class="span6">
        <?php
        $data = array('0' => '- Semua Sopir -') + CHtml::listData(Sopir::model()->findall(array('condition' => 'is_delete = 0 ')), 'id', 'nama');
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
        $data = array('0' => '- Semua Truk -') + CHtml::listData(Truk::model()->findall(array('condition' => 'is_delete = 0')), 'id', 'nama');
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
    </div>
</div>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'search white', 'label' => 'Pencarian')); ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'success', 'icon' => 'entypo-icon-export', 'label' => 'Export Excel',
        'htmlOptions' => array(
            'onclick' => 'excel()'
    )));
    ?>  
    <?php // $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'button', 'type' => 'success', 'icon' => 'entypo-icon-export', 'label' => 'Export Excel')); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function ($) {
        $(".btnreset").click(function () {
            $(":input", "#search-girik-form").each(function () {
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
    
    function excel(){
        var tanggal = $('#Girik_tanggal').val();
        var nomor_girik = $('#Girik_nomor_girik').val();
        var sopir_id = $('#Girik_sopir_id').val();
        var truk_id = $('#Girik_truk_id').val();
        
        window.open("<?php echo url("girik/generateExcel")?>?tanggal="+tanggal+"&nomor_girik="+nomor_girik+"&sopir_id="+sopir_id+"&truk_id="+truk_id);
    }
</script>

