<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'search-bon-form',
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>


<div class="row-fluid">
    <div class="span5">

        <?php
        $idsopir = isset($model->sopir_id) ? $model->sopir_id : 0;
        $namaSopir = isset($model->Sopir->nama) ? $model->Sopir->nama : 0;
        echo $form->select2Row($model, 'sopir_id', array(
            'asDropDownList' => false,
            'options' => array(
                'placeholder' => t('choose', 'global'),
                'allowClear' => true,
                'width' => '250px',
                'minimumInputLength' => '3',
                'ajax' => array(
                    'url' => Yii::app()->createUrl('bon/getListSopir'),
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

        <?php
        echo $form->datepickerRow(
                $model, 'tanggal', array(
            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
            'prepend' => '<i class="icon-calendar"></i>'
                )
        );
        ?>
        <?php // echo $form->dropDownListRow($model, 'status', Bon::model()->ArrStatus(), array('empty' => '- Status -')); ?>
    </div>
    <div class="span5">
        <?php echo $form->textFieldRow($model, 'total', array('class' => 'angka span10', 'prepend' => 'Rp')); ?>
        <?php echo $form->textFieldRow($model, 'deskripsi', array('class' => 'span6')); ?>



    </div></div>




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
    jQuery(function ($) {
        $(".btnreset").click(function () {
            $(":input", "#search-bon-form").each(function () {
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

        var Bon_sopir_id = $('#Bon_sopir_id').val();
        var Bon_tanggal = $('#Bon_tanggal').val();
        var Bon_total = $('#Bon_total').val();
        var Bon_deskripsi = $('#Bon_deskripsi').val();

        window.open("<?php echo url('bon/GenerateExcel') ?>?Bon_sopir_id=" + Bon_sopir_id + "&Bon_sopir_id=" + Bon_sopir_id + "&Bon_tanggal=" + Bon_tanggal + "&Bon_total=" + Bon_total + "&Bon_deskripsi" + Bon_deskripsi);
    }
</script>

