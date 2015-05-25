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
        'id' => 'piutang-det-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'type' => 'horizontal',
        ),
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
        <style>
            .form-horizontal .control-label {
                float: left;
                width: 120px;
                padding-top: 5px;
                text-align: left;
            }
            .form-horizontal .controls {
                margin-left: 160px;
            }
        </style>
        <div class="row-fluid">
            <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>
            <div class="span6">
                <legend>Data Customer</legend>
                <?php
                echo $form->datePickerRow(
                        $model, 'tanggal', array(
                    'prepend' => '<i class="icon-calendar"></i>',
                    'options' => array(
                        'format' => 'yyyy-mm-dd',
                    ),
                        )
                );
                ?>

                <div class="control-group ">
                    <label class="control-label" for="customer">Customer</label>
                    <div class="controls">
                        <?php
                        if ($model->isNewRecord == TRUE) {
                            $data = array('0' => '- Pilih Customer -') + CHtml::listData(Customer::model()->findall(array('condition' => 'is_delete = 0 ')), 'id', 'nama');
                            $this->widget(
                                    'bootstrap.widgets.TbSelect2', array(
                                'asDropDownList' => true,
                                'name' => 'customer',
                                'data' => $data,
                                'value' => isset($model->Piutang->Customer->id) ? $model->Piutang->Customer->id : "-",
                                'htmlOptions' => array(
                                    'style' => 'width:260px;',
                                    'id' => 'customer',
                                ),
                                    )
                            );
                        } else {
                            $data = array('0' => '- Pilih Customer -') + CHtml::listData(Customer::model()->findall(array('condition' => 'is_delete = 0 ')), 'id', 'nama');
                            $this->widget(
                                    'bootstrap.widgets.TbSelect2', array(
                                'asDropDownList' => true,
                                'name' => 'customer',
                                'data' => $data,
                                'value' => isset($model->Piutang->Customer->id) ? $model->Piutang->Customer->id : "-",
                                'htmlOptions' => array(
                                    'style' => 'width:260px;',
                                    'id' => 'customer',
                                    'readonly' => true,
                                ),
                                    )
                            );
                        }
                        ?>
                    </div>
                </div>

                <div class="control-group ">
                    <label class="control-label" for="alamat">Alamat</label>
                    <div class="controls">
                        <textarea  readonly="1" class="span12" id="alamat"><?php echo isset($model->Piutang->Customer->alamat) ? $model->Piutang->Customer->alamat : "-"; ?></textarea>
                    </div>
                </div>
                <div class="control-group ">
                    <label class="control-label" for="eselon">Telepon</label>
                    <div class="controls">
                        <input class="span12" maxlength="19" readonly="1" name="" id="telpon" type="text" value="<?php echo isset($model->Piutang->Customer->telepon) ? $model->Piutang->Customer->telepon : "-"; ?>">
                    </div>
                </div>
            </div>
            <?php
            if ($model->isNewRecord == FALSE) {
                ?>
                <div class="span5">
                    <legend>Data Piutang</legend>
                    <div class="control-group ">
                        <label class="control-label" for="kode_piutang">Kode Piutang</label>
                        <div class="controls">
                            <p class="help-inline"><?php echo isset($model->piutang_id) ? $model->piutang_id : "-"; ?><p>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label" for="total_piutang">Total Piutang</label>
                        <div class="controls">
                            <p class="help-inline"><?php echo (isset($model->Piutang->total)) ? landa()->rp($model->Piutang->total) : landa()->rp(0) ?>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label" for="bayar">Bayar</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on">Rp</span>
                                <input class="span6" maxlength="19" name="bayar" id="bayar" type="text" value="<?php echo (isset($model->credit)) ? $model->credit : '0' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div id="list"></div>

        <?php if (!isset($_GET['v'])) { ?>        <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'icon' => 'ok white',
                    'label' => $model->isNewRecord ? 'Simpan' : 'Simpan',
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
<div class="printNota" id="printNota" style="width:100%;">
    <center style="font-size: 11.5px;"><strong>CV Sinar Harapan</strong></center>
    <center style="font-size: 11.5px;">Jl. Mayjen Panjaitan No. 62 Malang</center>
    <center style="font-size: 11.5px;">Telp. (0341) 789555</center>
    <hr>
    <table class="printTable" id="nota" style="margin : 0 auto; font-size: 11px;  width:100%;">
        <tr>
            <td style="text-align: left;"><b>Tanggal</b></td>
            <td style="width:80px; text-align: " colspan="2"><?php echo date("d M Y", strtotime($model->tanggal));?></td>
            <td style="width:80px; text-align: "></td>
            <td style="text-align: "></td>
        </tr>
        <tr>
            <td style="text-align: left;"><b>Customer</b></td>
            <td style="width:80px; text-align: " colspan="2"><?php echo isset($model->Piutang->Customer->nama) ? $model->Piutang->Customer->nama : "-";?></td>
            <td style="width:80px; text-align: "><b></b></td>
            <td style="text-align: "></td>
        </tr>
        <tr>
            <td style="text-align: left;"><b>Hutang</b></td>
            <td style="width:80px; text-align: " colspan="2"><?php echo isset($model->Piutang->total) ? landa()->rp($model->Piutang->total) : "-";?></td>
            <td style="width:80px; text-align: "><b></b></td>
            <td style="text-align: "></td>
        </tr>
        <tr>
            <td style="text-align: left;"><b>Bayar</b></td>
            <td style="width:80px; text-align: " colspan="2"><?php echo isset($model->credit) ? landa()->rp($model->credit) : "-";?></td>
            <td style="width:80px; text-align: "></td>
            <td style="text-align: "></td>
        </tr>
    </table>
    <hr>
    <p style="text-align:center;font-size: 11.5px;"></p>
</div>
<script>
    $("#customer").on("change", function() {
        //var name = $("#Registration_guest_user_id").val();
        //  alert(name);

        $.ajax({
            url: "<?php echo url('piutangDet/getDetail'); ?>",
            type: "POST",
            data: {id: $(this).val()},
            success: function(data) {

                obj = JSON.parse(data);
                $("#telpon").val(obj.telpon);
                $("#alamat").val(obj.alamat);
                $("#list").html(obj.list);
            }
        });
    });
</script>
