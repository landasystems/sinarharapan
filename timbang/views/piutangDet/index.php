<?php
$this->setPageTitle('Bayar Pinjaman');
$this->breadcrumbs = array(
    'Bayar Pinjaman',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('piutang-det-grid', {
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
        array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array(),'visible' => landa()->checkAccess('bayarPinjaman', 'c')),
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
if (landa()->checkAccess("bayarPinjaman", 'r'))
    $button .= '{view} ';
if (landa()->checkAccess("bayarPinjaman", 'u'))
    $button .= '{update} ';
if (landa()->checkAccess("bayarPinjaman", 'd'))
    $button .= '{delete}';

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'piutang-det-grid',
    'dataProvider' => $model->search(),
    'type' => 'striped bordered condensed',
    'template' => '{pager}{items}{pager}',
    'columns' => array(
        array(
            'header' => 'Tanggal',
            'name' => 'tanggal',
            'value' => 'date("d M Y",strtotime($data->tanggal))',
        ),
        array(
            'header' => 'Customer',
            'name' => 'piutang_id',
            'value' => '$data->customer',
        ),
        array(
            'header' => 'Total',
            'name' => 'credit',
            'value' => 'landa()->rp($data->credit)',
        ),
        /*
          'created',
          'modified',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => $button,
            'buttons' => array(
                'view' => array(
                    'label' => 'Lihat',
                    'visible' => '($data->debet == NULL or $data->debet == 0)',
                    'options' => array(
                        'class' => 'btn btn-small view'
                    )
                ),
                'update' => array(
                    'label' => 'Edit',
                    'visible' => '($data->debet == NULL or $data->debet == 0)',
                    'options' => array(
                        'class' => 'btn btn-small update'
                    )
                ),
                'delete' => array(
                    'label' => 'Hapus',
                    'visible' => '($data->debet == NULL or $data->debet == 0)',
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

