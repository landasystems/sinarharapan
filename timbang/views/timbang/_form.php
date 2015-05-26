<style type="text/css">

    #printNota{display: none;}

</style>
<style type="text/css" media="print">
    body {visibility:hidden;}
    #printNota{
        visibility:visible;
        display: block; 
        position: absolute;top: 0;left: 0;float: left;
        padding: 0 20px 0 0;
    } 
</style>
<script>
    function printDiv(divName)
    {
        var w = window.open();
        var css = '<style media="print">body{ margin-top:0 !important}</style>';
        var printContents = '<div style="width:100%;" class="printNota"><center>' + $("#" + divName + "").html() + '</center></div>';

        $(w.document.body).html(css + printContents);
        w.print();
        w.window.close();
    }

</script>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'timbang-form',
        'enableAjaxValidation' => false,
        'method' => 'post',
        'type' => 'horizontal',
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        )
    ));
    ?>
    <fieldset>
        <legend>
            <p class="note">Fields dengan <span class="required">*</span> harus di isi.</p>
        </legend>

        <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>
        <fieldset>
            <legend>Info Customer</legend>
        </fieldset>
        <?php
        $bunga = Pengaturan::model()->findByPk(1);
        $idcustomer = isset($model->customer_id) ? $model->customer_id : 0;
        $namaCustomer = isset($model->Customer->nama) ? $model->Customer->kode . ' - ' . $model->Customer->nama : 0;
        $telp = isset($model->Customer->telepon) ? $model->Customer->telepon : 0;
        $alamat = isset($model->Customer->alamat) ? $model->Customer->alamat : 0;
        echo $form->select2Row($model, 'customer_id', array(
            'asDropDownList' => false,
            'options' => array(
                'placeholder' => t('choose', 'global'),
                'allowClear' => true,
                'width' => '360px',
                'minimumInputLength' => '3',
                'ajax' => array(
                    'url' => Yii::app()->createUrl('timbang/getListCustomer'),
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
                                 callback({id: ' . $idcustomer . ', text: "' . $namaCustomer . '" });
                            }',
            ),
                )
        );
        ?>
        <div class="control-group ">
            <label class="control-label" for="Timbang_nomor_polisi">Telp / Alamat</label>
            <div class="controls">
                <input class="span2" maxlength="25"  id="telpon" value="<?php echo $telp ?>" readonly type="text">
                <input class="span2" maxlength="25"  id="alamat" value="<?php echo $alamat ?>" readonly type="text">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="Timbang_nomor_polisi">Produk</label>
            <div class="controls">
                <input class="span2" maxlength="25" name="Timbang[produk]" id="Timbang_produk" value="Tebu" readonly type="text">
            </div>
        </div>
        <?php echo $form->textFieldRow($model, 'nomor_polisi', array('class' => 'span2', 'maxlength' => 25)); ?>

        <fieldset>
            <legend>Info Timbangan</legend>
        </fieldset>
        <?php echo $form->textFieldRow($model, 'kode', array('class' => 'angka', 'maxlength' => 25, 'hint' => '<span aria-hidden="true" class="entypo-icon-info-circle"></span> Kosongkan kode, untuk generate otomatis')); ?>
        <div class="row-fluid">
            <div class="span4">
                <div class="control-group ">
                    <label class="control-label" for="Timbang_nomor_polisi">Tanggal Berat 1</label>
                    <div class="controls">
                        <?php
                        echo $form->datepickerRow(
                                $model, 'tanggal_timbang1', array(
                            'style' => 'width:80px',
                            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                            'prepend' => '<i class="icon-calendar"></i>', 'labelOptions' => array('label' => false)
                                )
                        );
                        ?>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="Timbang_nomor_polisi">Tanggal Berat 2</label>
                    <div class="controls">
                        <?php
                        echo $form->datepickerRow(
                                $model, 'tanggal_timbang2', array(
                            'style' => 'width:80px',
                            'options' => array('language' => 'id', 'format' => 'yyyy-mm-dd'),
                            'prepend' => '<i class="icon-calendar"></i>', 'labelOptions' => array('label' => false)
                                )
                        );
                        ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group ">
                    <label class="control-label">Berat 1</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span6 angka" name="Timbang[berat_timbang1]" id="Timbang_berat_timbang1" value="<?php echo (isset($model->berat_timbang1)) ? $model->berat_timbang1 : '' ?>" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label">Berat 2</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span6 angka" name="Timbang[berat_timbang2]" id="Timbang_berat_timbang2" value="<?php echo (isset($model->berat_timbang2)) ? $model->berat_timbang2 : 0 ?>" type="text">
                            <span class="add-on">Kg</span>
                        </div>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="Timbang_nomor_polisi">Rafaksi</label>
                    <div class="controls">

                        <div class="input-append">
                            <input class="span6 angka" name="Timbang[rafaksi]" id="Timbang_rafaksi" value="<?php echo (isset($model->rafaksi)) ? $model->rafaksi : $bunga->rafaksi ?>" type="text">
                            <span class="add-on">Kw</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang2', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group ">
                    <label class="control-label" for="Timbang_nomor_polisi">Netto</label>
                    <div class="controls">

                        <div class="input-append">
                            <input class="span6" name="Timbang[netto]" id="Timbang_netto" value="<?php echo (isset($model->netto)) ? $model->netto : '' ?>" type="text">
                            <span class="add-on">Kw</span>
                        </div>
                        <?php // echo $form->textFieldRow($model, 'berat_timbang2', array('class' => 'span3', 'labelOptions' => array('label' => false))); ?>

                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="Timbang_harga">Harga</label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">Rp</span>
                            <input class="span7 angka" name="Timbang[harga]" value="<?php echo (isset($model->harga)) ? $model->harga : $bunga->harga_tebu ?>" id="Timbang_harga" type="text">
                            <span class="add-on">/ Kw</span>
                        </div>
                    </div>
                </div>
                <?php // echo $form->textFieldRow($model, 'harga', array('class' => 'span7 angka', 'prepend' => 'Rp',)); ?>
                <?php echo $form->textFieldRow($model, 'total', array('class' => 'span7', 'prepend' => 'Rp', 'readOnly' => true)); ?>
            </div>
        </div>
        <?php if (!isset($_GET['v'])) { ?>        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'icon' => 'ok white',
                'label' => $model->isNewRecord ? 'Tambah' : 'Simpan',
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'reset',
                'icon' => 'remove',
                'label' => 'Reset',
            ));
            ?>
            </div>
        <?php } ?>    </fieldset>

    <?php $this->endWidget(); ?>

</div>
<?php if ($model->isNewRecord == false) { ?>
    <div class="printNota" id="printNota" style="width:310px; width:310px;">
        <center style="font-size: 11.5px;"><strong>CV Sinar Harapan</strong></center>
        <center style="font-size: 11.5px;">Jl. Mayjen Panjaitan No. 62 Malang</center>
        <center style="font-size: 11.5px;">Telp. (0341) 789555</center>
        <hr>
        <table class="printTable" id="nota" style="margin : 0 auto; font-size: 11px;  width:100%;">
            <tr>
                <td style="text-align: left;"><b>Customer</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $namaCustomer ?></td>

                <td style="width:80px; text-align: "><b>No Truck</b></td>
                <td style="width:80px; text-align: "><?php echo $model->nomor_polisi ?></td>

            </tr>
            <tr>
                <td style="text-align: left;"><b>No Telp</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $telp ?></td>

                <td style="width:80px; text-align: "><b>Product</b></td>
                <td style="width:80px; text-align: "><?php echo $model->produk ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Alamat</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $alamat ?></td>

                <td style="width:80px; text-align: "><b>Tanggal</b></td>
                <td style="width:80px; text-align: "><?php echo date('d-m-Y', strtotime($model->created)) ?></td>
            </tr>



            <tr style="height: 20px;">
                <td colspan="6"><hr style="border-top: 3px double #8c8b8b;"></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Timbang 1</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $model->berat_timbang1 ?> Kg</td>
                <td style="width:80px; text-align: "></td>
                <td style="width:80px; text-align: "><b>Date</b></td>
                <td style="width:80px; text-align: "><?php echo date('d-m-Y', strtotime($model->tanggal_timbang1)) ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Timbang 2</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $model->berat_timbang2 ?> Kg</td>
                <td style="width:80px; text-align: "></td>
                <td style="width:80px; text-align: "><b>Date</b></td>
                <td style="width:80px; text-align: "><?php echo date('d-m-Y', strtotime($model->tanggal_timbang2)) ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Rafaksi</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo $model->rafaksi ?> Kg</td>
                <td style="width:80px; text-align: "></td>
                <td style="width:80px; text-align: "></td>
                <td style="width:80px; text-align: "></td>
            </tr>
            <tr>

                <td style="width:80px;">&nbsp;</td>
                <td style="width:80px; text-align: "><hr></td>
            </tr>
            <tr>

                <td style="width:80px;">&nbsp;</td>
                <td style="width:80px; text-align: "><?php echo $model->netto ?> Kg</td>
            </tr>
            <tr>

                <td style="width:80px; text-align:right " colspan="5">Juru Timbang</td>

            </tr>
            <tr>

                <td style="width:80px; text-align:right " colspan="5">&nbsp;</td>

            </tr>
            <tr>


                <td style="width:80px; text-align:right " colspan="5">_____________</td>

            </tr>
        </table>
        <hr>
        <p style="text-align:center;font-size: 11.5px;"></p>
    </div>
<?php } ?>
<script>
    $("#Timbang_customer_id").on("change", function() {
        //var name = $("#Registration_guest_user_id").val();
        //  alert(name);

        $.ajax({
            url: "<?php echo url('customer/getDetail'); ?>",
            type: "POST",
            data: {id: $(this).val()},
            success: function(data) {

                obj = JSON.parse(data);
                $("#telpon").val(obj.telpon);
                $("#alamat").val(obj.alamat);
            }
        });
    });

    function calculate() {
        var berat1 = parseInt($("#Timbang_berat_timbang1").val());
        var berat2 = parseInt($("#Timbang_berat_timbang2").val());
        var rafaksi = parseFloat($("#Timbang_rafaksi").val() * 100);
        var harga = parseInt($("#Timbang_harga").val());
        var netto = Math.round(((berat1) - (berat2) - rafaksi) / 100);
        var total = netto * harga;
        $("#Timbang_netto").val(netto);
        $("#Timbang_total").val(total);
    }

    $("body").on("keyup", "#Timbang_berat_timbang1", function() {
        calculate();
    });
    $("body").on("keyup", "#Timbang_berat_timbang2", function() {
        calculate();
    });
    $("body").on("keyup", "#Timbang_rafaksi", function() {
        calculate();
    });
    $("body").on("keyup", "#Timbang_harga", function() {
        calculate();
    });
</script>
