<?php
$this->setPageTitle('Giriks');
$this->breadcrumbs = array(
    'Giriks',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('girik-grid', {
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
        array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array(), 'visible' => landa()->checkAccess('storGir', 'c')),
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
if (landa()->checkAccess("storGir", 'r'))
    $button .= '{view} ';
if (landa()->checkAccess("storGir", 'u'))
    $button .= '{update}';
if (landa()->checkAccess("storGir", 'd'))
    $button .= '{delete}';
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'girik-grid',
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
        
        array(
            'name' => 'tanggal',
            'value' => '$data->tanggalTrans',
        ),
        array(
            'name' => 'sopir_id',
            'value' => '$data->sopir',
        ),
        array(
            'name' => 'truk_id',
            'value' => '$data->truk',
        ),
//        'tanggal',
        'nomor_girik',
//        'berat',
        array(
            'name' => 'fee_sopir',
            'value' => 'landa()->rp($data->fee_sopir)',
        ),
        array(
            'name' => 'fee_truk',
            'value' => 'landa()->rp($data->fee_truk)',
        ),
//        'total',
//        'solar',
        /*
          'fee_sopir',
          'fee_truk',
          'sopir_id',
          'truk_id',
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
                'delete' => array(
                    'label' => 'Hapus',
                    'options' => array(
                        'class' => 'btn btn-small delete'
                    )
                )
            ),
            'htmlOptions' => array('style' => 'width: 125px'),
        )
    ),
));
?>

