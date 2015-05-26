<?php
$this->setPageTitle('Truks');
$this->breadcrumbs = array(
    'Truks',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('truk-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php
$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
$this->widget('bootstrap.widgets.TbMenu', array(
    'type' => 'pills',
    'items' => array(
        array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array(),'visible' => landa()->checkAccess('truk', 'c')),
        array('label' => 'List Data', 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('index'), 'active' => true, 'linkOptions' => array()),
        array('label' => 'Pencarian & Export Excel', 'icon' => 'icon-search', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
    ),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$button='';
if (landa()->checkAccess("truk", 'r'))
    $button .= '{view} ';
if (landa()->checkAccess("truk", 'u'))
    $button .= '{update} ';
if (landa()->checkAccess("truk", 'd'))
    $button .= '{delete}{restore}';

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'chargeAdditional-form',
    'enableAjaxValidation' => false,
    'method' => 'post',
    'type' => 'horizontal',
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
        ));
?>
<button type="submit" name="delete" value="dd" style="margin-left: 10px;" class="btn btn-danger pull-right"><span class="icon16 brocco-icon-trashcan white"></span> Delete Checked</button>
<button type="submit" name="restore" value="dd" style="margin-left: 10px;" class="btn btn-success pull-right"><span class="icon16 brocco-icon-checkmark white"></span> Restore Checked</button>    
    
<br>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'truk-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 2,
            'htmlOptions' => array('style' => 'text-align:center;display:'),
            'headerHtmlOptions' => array('style' => 'width:25px;text-align:center;display:'),
            'checkBoxHtmlOptions' => array(
                'name' => 'ceckbox[]',
                'value' => '$data->id',
            ),
        ),
        'nomor_polisi',
        'merk',
        'type',
        array(
            'name' => 'pajak',
            'value' => '$data->tglpajak',
        ),
        array(
            'name' => 'kir',
            'value' => '$data->tglkir',
        ),
        array(
            'name' => 'stnk',
            'value' => '$data->tglstnk',
        ),
        /*
          'surat',
          'seling',
          'terpal',
          'kunci',
          'sopir_id',
          'is_delete',
          'created_user_id',
          'created',
          'modified',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => $button,
            'buttons' => array(
                'view' => array(
                    'label' => 'Lihat',
                    'options' => array(
                        'class' => 'btn btn-small view'
                    )
                ),
                'update' => array(
                    'label' => 'Edit',
                    'options' => array(
                        'class' => 'btn btn-small update'
                    )
                ),
                'restore' => array(
//                    'label' => '',
                    'icon' => 'icon-ok',
                    'visible' => '($data->is_delete == 1)',
                    'url' => 'Yii::app()->createUrl("truk/restore",array("id"=>$data->id))',
                    'options' => array(
                        'class' => 'btn btn-small ok',
                    )
                ),
                'delete' => array(
                    'label' => 'Hapus',
                    'visible' => '($data->is_delete == 0)',
                    'options' => array(
                        'class' => 'btn btn-small delete'
                    )
                ),
            ),
            'htmlOptions' => array('style' => 'width: 125px'),
        )
    ),
));

?>
<script type="text/javascript">
jQuery(document).on('click','#truk-grid a.btn.btn-small.ok',function() {
        if(!confirm('Anda yakin ingin mengembalikan data ini?')) return false;
        jQuery('#truk-grid').yiiGridView('update', {
                type: 'POST',
                url: jQuery(this).attr('href'),
                success: function(data) {
                        jQuery('#truk-grid').yiiGridView('update');
                },
        });
        return false;
});

</script>
<?php $this->endWidget();?>