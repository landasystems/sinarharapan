<?php
$this->setPageTitle('Perawatan Truks');
$this->breadcrumbs=array(
	'Perawatan Truks',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('perawatan-truk-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Tambah', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array(), 'visible' => landa()->checkAccess('perawatan', 'c')),
                array('label'=>'List Data', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Pencarian & Export Excel', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
	),
));
$this->endWidget();
?>



<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php 
$button='';
if (landa()->checkAccess("perawatan", 'r'))
    $button .= '{view} ';
if (landa()->checkAccess("perawatan", 'u'))
    $button .= '{update} ';
if (landa()->checkAccess("perawatan", 'd'))
    $button .= '{delete}';

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'perawatan-truk-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{items}{pager}{summary}',
	'columns'=>array(
//		'id',
		array(
                    'header' => 'Truk',
                    'name' => 'truk_id',
                    'value' => 'isset($data->Truk->nama) ? $data->Truk->nama : "-"',
                ),
		array(
                    'header' => 'Tanggal',
                    'name' => 'tanggal',
                    'value' => '$data->tanggalPerawatan',
                ),
		'keterangan',
                array(
                    'header' => 'Total',
                    'name' => 'total',
                    'value' => '$data->totalDebet',
                ),
		/*
		'created',
		'modified',
		*/
       array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => $button,
			'buttons' => array(
			      'view' => array(
					'label'=> 'Lihat',
					'options'=>array(
						'class'=>'btn btn-small view'
					)
				),	
                              'update' => array(
					'label'=> 'Edit',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Hapus',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 125px'),
           )
	),
)); ?>

