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
        'id' => 'perawatan-truk-form',
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
        <div class="row-fluid">
            <?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); ?>

            <?php
            $data = array('0' => '- Pilih Truk -') + CHtml::listData(Truk::model()->findall(array('condition' => 'is_delete = 0')), 'id', 'nama');
            echo $form->select2Row($model, 'truk_id', array(
                'asDropDownList' => true,
                'data' => $data,
                'options' => array(
                    'placeholder' => t('choose', 'global'),
                    'allowClear' => true,
                    'width' => '260px',
                ),
                    )
            );
            ?>  

            <?php
            echo $form->datepickerRow(
                    $model, 'tanggal', array(
                'options' => array(
                    'language' => 'id',
                    'format' => 'yyyy-mm-dd',
                    'class' => 'span3',
                ),
                'prepend' => '<i class="icon-calendar"></i>'
                    )
            );
            ?>

            <?php echo $form->textAreaRow($model, 'keterangan', array('class' => 'span5', 'maxlength' => 255)); ?>
            <div class="row-fluid">
                <div class="span12">
                    <br><br>
                    <h3>Detail Perawatan Kendaraan</h3>
                    <table class="table table-bordered" width="100%" id="detail">
                        <thead>
                            <tr>
                                <th width="50%">Keterangan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                                <?php
                                if (!isset($_GET['v'])) {
                                    echo '<th>#</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <?php
                        if ($model->isNewRecord == FALSE) {
                            $detail = PerawatanTrukDet::model()->findAll(array('condition' => 'perawatan_truk_id =' . $model->id));
                            if (empty($detail) and isset($_GET['v'])) {
                                echo '<tr><td colspan="4">Tidak ada detail</td></tr>';
                            } else if (empty($detail)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="keteranganDet[]" class="ket span12" id="keteranganDet"></td>
                                        <td>
                                            <div class="input-prepend">
                                                <span class="add-on">Rp</span>
                                                <input class="angka span12" name="hargaDet[]" id="hargaDet" type="text" onkeyup="calculate()" value="0">
                                            </div>
                                        </td>
                                        <td><input type="text" name="jumlahDet[]" class="span3" id="jumlahDet" value="1" onkeyup="calculate()"></td>
                                        <td>
                                            <div class="input-prepend">
                                                <span class="add-on">Rp</span>
                                                <input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" value="0">
                                            </div>
                                        </td>
                                        <td align="center">
                                            <a href="#" class="btn btn-success" onclick="addrow()"><i class="iconic-icon-plus-alt white"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><b>Total</b></td>
                                        <td colspan="<?php echo isset($_GET['v']) ? 1 : 2; ?>">
                                            <div class="input-prepend">
                                                <span class="add-on">Rp</span>
                                                <input class="angka span12" name="total" id="total" type="text" readonly="true" value="0">
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                <?php
                            } else {
                                ?>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total = 0;
                                    foreach ($detail as $val) {
                                        ?>
                                        <tr>
                                            <td><input type="text" name="keteranganDet[]" class="ket span12" id="keteranganDet" value="<?php echo $val->keterangan; ?>"></td>
                                            <td>
                                                <div class="input-prepend">
                                                    <span class="add-on">Rp</span>
                                                    <input class="angka span12" name="hargaDet[]" id="hargaDet" type="text" onkeyup="calculate()" value="<?php echo $val->harga; ?>">
                                                </div>
                                            </td>
                                            <td><input type="text" name="jumlahDet[]" class="span3" id="jumlahDet" value="<?php echo $val->qty ?>" onkeyup="calculate()"></td>
                                            <td>
                                                <div class="input-prepend">
                                                    <span class="add-on">Rp</span>
                                                    <input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" value="<?php echo $val->debet ?>" >
                                                </div>
                                            </td>
                                            <?php
                                            if (!isset($_GET['v'])) {
                                                if ($no <= 1) {
                                                    echo '<td align="center">
                                                            <a href="#" class="btn btn-success" onclick="addrow()"><i class="iconic-icon-plus-alt white"></i></a>
                                                      </td>';
                                                } else {
                                                    echo '<td align="center"><a href="#" class="btn btn-danger" onclick="$(this).parent().parent().remove(); calculate();"><i class="icon-remove-sign white"></i></a></td>';
                                                }
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $total += $val->debet;
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><b>Total</b></td>
                                        <td colspan="<?php echo isset($_GET['v']) ? 1 : 2; ?>">
                                            <div class="input-prepend">
                                                <span class="add-on">Rp</span>
                                                <input class="angka span12" name="total" id="total" type="text" readonly="true" value="<?php echo $total ?>">
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                <?php
                            }
                        } else {
                            ?>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="keteranganDet[]" class="ket span12" id="keteranganDet"></td>
                                    <td>
                                        <div class="input-prepend">
                                            <span class="add-on">Rp</span>
                                            <input class="angka span12" name="hargaDet[]" id="hargaDet" type="text" onkeyup="calculate()" value="0">
                                        </div>
                                    </td>
                                    <td><input type="text" name="jumlahDet[]" class="span3" id="jumlahDet" value="1"></td>
                                    <td>
                                        <div class="input-prepend">
                                            <span class="add-on">Rp</span>
                                            <input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" onkeyup="calculate()" value="0">
                                        </div>
                                    </td>
                                    <td align="center">
                                        <a href="#" class="btn btn-success" onclick="addrow()"><i class="iconic-icon-plus-alt white"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><b>Total</b></td>
                                    <td colspan="<?php echo isset($_GET['v']) ? 1 : 2; ?>">
                                        <div class="input-prepend">
                                            <span class="add-on">Rp</span>
                                            <input class="angka span12" name="total" id="total" type="text" readonly="true" value="0">
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            <?php
                        }
                        ?>
                    </table>
                </div>
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
<?php if (isset($_GET['v'])) { ?>
    <div class="printNota" id="printNota" style="width:100%;">
        <center style="font-size: 12px;"><strong>CV Sinar Harapan</strong></center>
        <center style="font-size: 12px;">Jl. Mayjen Panjaitan No. 62 Malang</center>
        <center style="font-size: 12px;">Telp. (0341) 789555</center>
        <hr>
        <table class="printTable" id="nota" style="margin : 0 auto; font-size: 11px;  width:100%;">
            <tr>
                <td style="text-align: left;"><b>Tanggal</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo date("d M Y", strtotime($model->tanggal)); ?></td>
                <td style="width:80px; text-align: "><b>Type Truk</b></td>
                <td style="text-align: "><?php echo $model->Truk->type ?></td>
            </tr>
            <tr>
                <td style="text-align: left;"><b>Merk Truk</b></td>
                <td style="width:80px; text-align: " colspan="2"><?php echo isset($model->Truk->merk) ? $model->Truk->merk : "-"; ?></td>
                <td style="width:80px; text-align: "><b>Nomor Polisi</b></td>
                <td style="text-align: "><?php echo isset($model->Truk->nomor_polisi) ? $model->Truk->nomor_polisi : "-"; ?></td>
            </tr>
        </table>
        <p style="margin-left: 0px; font-size: 12px; text-align: left;"><b>Detail Perawatan</b></p>
        <style>
            #table td {
                /*border: 1px solid #000;*/
            }
        </style>
        <table width="100%" id="table" style="font-size: 12px;">
            <tr>
                <td><b>No</b></td>
                <td><b>Keterangan</b></td>
                <td><b>Jumlah</b></td>
                <td><b>Harga</b></td>
                <td><b>Sub Total</b></td>
            </tr>
            <?php
            if (empty($detail)) {
                echo '<tr>';
                echo '<td colspan="5">Tidak ada detail.</td>';
                echo '</tr>';
            } else {
                $no = 1;
                $total = 0;
                foreach ($detail as $val) {
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . $val->keterangan . '</td>';
                    echo '<td>' . $val->qty . '</td>';
                    echo '<td>' . landa()->rp($val->harga) . '</td>';
                    echo '<td>' . landa()->rp($val->credit) . '</td>';
                    echo '</tr>';
                    $no++;
                    $total += $val->credit;
                }
            }
            ?>
            <tr>
                <td colspan="4" style="text-align: right;"><b>Total</b></td>
                <td><?php echo landa()->rp($total) ?></td>
            </tr>
        </table>
        <hr>
        <p style="text-align:center;font-size: 11.5px;"></p>
    </div>
<?php } ?>
<script>
    function removeRow() {
        $(this).remove();
    }
    function addrow() {
        var row;
        row += '<tr>';
        row += '<td><input type="text" name="keteranganDet[]" class="ket span12" id="keteranganDet"></td>';
        row += '<td><div class="input-prepend"><span class="add-on">Rp</span><input class="angka span12" name="hargaDet[]" id="hargaDet" type="text" onkeyup="calculate()" value="0"></div></td>';
        row += '<td><input type="text" name="jumlahDet[]" class="span3" id="jumlahDet" value="1" onkeyup="calculate()"></td>';
        row += '<td><div class="input-prepend"><span class="add-on">Rp</span><input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" value="0"></div></td>';
        row += '<td align="center"><a href="#" class="btn btn-danger" onclick="$(this).parent().parent().remove(); calculate();"><i class="icon-remove-sign white"></i></a></td></tr>';
        $("#detail tbody").append(row);
    }
    function calculate() {
        var total = 0;
        $(".ket").each(function () {
            var harga = parseInt($(this).parent().parent().find("#hargaDet").val());
            var jumlah = parseInt($(this).parent().parent().find("#jumlahDet").val());
            var subtotal = harga * jumlah;
            $(this).parent().parent().find("#subTotalDet").val(subtotal);
            total += subtotal;
        });
        $("#total").val(total);
    }
</script>
