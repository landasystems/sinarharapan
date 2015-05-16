<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-truk-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<fieldset>
    <legend>Data Truk</legend>
</fieldset>
<div class="row-fluid">
    <div class="span5">
        <?php echo $form->textFieldRow($model, 'nomor_polisi', array('class' => 'span14', 'maxlength' => 60)); ?>



        <?php
        $idsopir = isset($model->sopir_id) ? $model->sopir_id : 0;
        $namaSopir = isset($model->Sopir->nama) ? $model->Sopir->nama : 0;
        echo $form->select2Row($model, 'sopir_id', array(
            'asDropDownList' => false,
            'options' => array(
                'placeholder' => t('choose', 'global'),
                'allowClear' => true,
                'width' => '400px',
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

    </div><div class="span5">
        <?php echo $form->textFieldRow($model, 'merk', array('class' => 'span14', 'maxlength' => 60)); ?>

        <?php echo $form->textFieldRow($model, 'type', array('class' => 'span14', 'maxlength' => 60)); ?>



    </div></div>

<fieldset>
    <legend>Kelengkapan</legend>
</fieldset>
<div class="row-fluid">
    <div class="span3">
        <?php echo $form->radioButtonListRow($model, 'surat', Truk::model()->ArrSurat()); ?>
        <?php echo $form->radioButtonListRow($model, 'seling', Truk::model()->ArrSeling()); ?>

    </div><div class="span3">

        <?php echo $form->radioButtonListRow($model, 'dongkrak', Truk::model()->ArrSurat()); ?>
        <?php echo $form->radioButtonListRow($model, 'terpal', Truk::model()->ArrSurat()); ?>

    </div><div class="span3">

        <?php echo $form->radioButtonListRow($model, 'kunci', Truk::model()->ArrSurat()); ?>

    </div>
</div>

<fieldset>
    <legend>Aktifasi Truk</legend>
</fieldset>

<?php echo $form->radioButtonListRow($model, 'is_delete', Truk::model()->ArrTrukAktif()); ?>

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
            $(":input", "#search-truk-form").each(function () {
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
        //surat
        if (document.getElementById('Truk_surat_0').checked) {
            var surat = document.getElementById('Truk_surat_0').value;
        } else if (document.getElementById('Truk_surat_1').checked) {
            var surat = document.getElementById('Truk_surat_1').value;
        } else {
            var surat = '';
        }
        //seling
        if (document.getElementById('Truk_seling_0').checked) {
            var seling = document.getElementById('Truk_seling_0').value;
        } else if (document.getElementById('Truk_seling_1').checked) {
            var seling = document.getElementById('Truk_seling_1').value;
        } else {
            var seling = '';
        }
        //dongkrak
        if (document.getElementById('Truk_dongkrak_0').checked) {
            var dongkrak = document.getElementById('Truk_dongkrak_0').value;
        } else if (document.getElementById('Truk_dongkrak_1').checked) {
            var dongkrak = document.getElementById('Truk_dongkrak_1').value;
        } else {
            var dongkrak = '';
        }
        //terpal
        if (document.getElementById('Truk_terpal_0').checked) {
            var terpal = document.getElementById('Truk_terpal_0').value;
        } else if (document.getElementById('Truk_terpal_1').checked) {
            var terpal = document.getElementById('Truk_terpal_1').value;
        } else {
            var terpal = '';
        }
        //kunci
        if (document.getElementById('Truk_kunci_0').checked) {
            var kunci = document.getElementById('Truk_kunci_0').value;
        } else if (document.getElementById('Truk_kunci_1').checked) {
            var kunci = document.getElementById('Truk_kunci_1').value;
        } else {
            var kunci = '';
        }
        //is_delete
        if (document.getElementById('Truk_is_delete_0').checked) {
            var is_delete = document.getElementById('Truk_is_delete_0').value;
        } else if (document.getElementById('Truk_is_delete_1').checked) {
            var is_delete = document.getElementById('Truk_is_delete_1').value;
        } else {
            var is_delete = '';
        }

        var Truk_nomor_polisi = $('#Truk_nomor_polisi').val();
        var Truk_merk = $('#Truk_merk').val();
        var Truk_type = $('#Truk_type').val();
        var Truk_sopir_id = $('#Truk_sopir_id').val();
        
      window.open("<?php echo url('truk/GenerateExcel') ?>?is_delete=" + is_delete + "&surat=" + surat + "&seling=" + seling + "&dongkrak=" + dongkrak + "&terpal=" + terpal+"&kunci="+kunci+"&Truk_nomor_polisi="+Truk_nomor_polisi+"&Truk_merk="+Truk_merk+"&Truk_type="+Truk_type+"&Truk_sopir_id="+Truk_sopir_id);
    
    }
</script>

