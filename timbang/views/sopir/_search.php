<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-sopir-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<div class="row-fluid">
    <div class="span5">


        <?php echo $form->textFieldRow($model, 'kode', array('class' => 'span6', 'maxlength' => 10)); ?>

        <?php echo $form->textFieldRow($model, 'nama', array('class' => 'span6', 'maxlength' => 45)); ?>

        <?php echo $form->radioButtonListRow($model, 'is_delete', Sopir::model()->ArrSopirAktif()); ?>

    </div><div class="span5">
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
            $(":input", "#search-sopir-form").each(function () {
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

        if (document.getElementById('Sopir_is_delete_0').checked) {
            var is_delete = document.getElementById('Sopir_is_delete_0').value;
        } else if (document.getElementById('Sopir_is_delete_1').checked) {
            var is_delete = document.getElementById('Sopir_is_delete_1').value;
        } else {
            var is_delete = '';
        }
        var Sopir_kode = $('#Sopir_kode').val();
        var Sopir_nama = $('#Sopir_nama').val();
        var Sopir_alamat = $('#Sopir_alamat').val();
        var Sopir_telepon = $('#Sopir_telepon').val();
//     alert(is_delete);
       window.open("<?php echo url('sopir/GenerateExcel') ?>?is_delete=" + is_delete + "&Sopir_kode=" + Sopir_kode + "&Sopir_nama=" + Sopir_nama + "&Sopir_telepon=" + Sopir_telepon + "&Sopir_alamat=" + Sopir_alamat);
    }
</script>

