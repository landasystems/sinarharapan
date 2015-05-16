<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-perawatan-truk-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
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

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'search white', 'label' => 'Pencarian')); ?>
   <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'button', 'type' => 'success', 'icon' => 'entypo-icon-export', 'label' => 'Export Excel')); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function($) {
        $(".btnreset").click(function() {
            $(":input", "#search-perawatan-truk-form").each(function() {
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

