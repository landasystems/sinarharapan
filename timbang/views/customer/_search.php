<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-customer-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>


<div class="row-fluid">
    <div class="span5">
        <?php echo $form->textFieldRow($model, 'kode', array('class' => 'span6', 'maxlength' => 10)); ?>

        <?php echo $form->textFieldRow($model, 'nama', array('class' => 'span6', 'maxlength' => 45)); ?>

        <?php echo $form->radioButtonListRow($model, 'is_delete', Customer::model()->ArrCustomerAktif()); ?>

    </div>
    <div class="span5">
        <?php echo $form->textFieldRow($model, 'telepon', array('class' => 'span6', 'maxlength' => 15)); ?>
        <?php echo $form->textFieldRow($model, 'alamat', array('class' => 'span6', 'maxlength' => 15)); ?>


    </div></div>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'search white', 'label' => 'Pencarian')); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'icon' => 'icon', 'label' => 'Export Excel',
        'htmlOptions' => array(
            'onclick' => 'excel()'
    )));
    ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'button', 'icon' => 'icon-remove-sign white', 'label' => 'Reset', 'htmlOptions' => array('class' => 'btnreset btn-small'))); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    jQuery(function ($) {
        $(".btnreset").click(function () {
            $(":input", "#search-customer-form").each(function () {
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

        if (document.getElementById('Customer_is_delete_0').checked) {
            var is_delete = document.getElementById('Customer_is_delete_0').value;
        } else if (document.getElementById('Customer_is_delete_1').checked) {
            var is_delete = document.getElementById('Customer_is_delete_1').value;
        } else {
            var is_delete = '';
        }
        var Customer_kode = $('#Customer_kode').val();
        var Customer_nama = $('#Customer_nama').val();
        var Customer_telepon = $('#Customer_telepon').val();
        var Customer_alamat = $('#Customer_alamat').val();
//        alert(is_delete);
        window.open("<?php echo url('customer/GenerateExcel') ?>?is_delete=" + is_delete + "&Customer_kode=" + Customer_kode + "&Customer_nama=" + Customer_nama + "&Customer_telepon=" + Customer_telepon + "&Customer_alamat=" + Customer_alamat);
    }
</script>

