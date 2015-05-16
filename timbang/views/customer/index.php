<?php
$this->setPageTitle('Customers');
$this->breadcrumbs = array(
    'Customers',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('customer-grid', {
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
        array('label' => 'Tambah', 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
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
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'customer-grid',
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
        'kode',
        'nama',
        'alamat',
        'telepon',
        /*
          'created_user_id',
          'created',
          'modified',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view} {update} {delete} {restore}',
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
                    'url' => 'Yii::app()->createUrl("customer/restore",array("id"=>$data->id))',
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
jQuery(document).on('click','#customer-grid a.btn.btn-small.ok',function() {
        if(!confirm('Anda yakin ingin mengembalikan data ini?')) return false;
        jQuery('#customer-grid').yiiGridView('update', {
                type: 'POST',
                url: jQuery(this).attr('href'),
                success: function(data) {
                        jQuery('#customer-grid').yiiGridView('update');
                },
        });
        return false;
});
</script>