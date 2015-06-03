<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-jasa-timbang-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>


<div class="span5">
    <?php echo $form->textFieldRow($model, 'customer', array('class' => 'span3', 'maxlength' => 50)); ?>
</div>

<div class="span5">
    <?php
    echo $form->dateRangeRow(
            $model, 'tanggal_timbang1', array(
        'prepend' => '<i class="icon-calendar"></i>',
        'options' => array(
            'format' => 'yyyy-MM-dd',
        ),
            )
    );
    ?>
</div>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'search white', 'label' => 'Pencarian')); ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'success', 'icon' => 'entypo-icon-export', 'label' => 'Export Excel',
        'htmlOptions' => array(
            'onclick' => 'excel()'
    )));
    ?>     
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'button', 'icon' => 'icon-remove-sign white', 'label' => 'Reset', 'htmlOptions' => array('class' => 'btnreset btn-small'))); ?>
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

    function excel() {
        var customer = $("#JasaTimbang_customer").val();
        window.open("<?php echo url('jasaTimbang/GenerateExcel') ?>?customer=" + customer);
    }
</script>

