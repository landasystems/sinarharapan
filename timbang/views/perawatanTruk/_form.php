<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'perawatan-truk-form',
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

        <?php echo $form->textAreaRow($model, 'keterangan', array('class' => 'span3', 'maxlength' => 255)); ?>
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
                            if(!isset($_GET['v'])){
                                echo '<th>#</th>';
                            }
                            ?>
                        </tr>
                    </thead>
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
                                    <input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" value="0">
                                </div>
                            </td>
                            <?php
                            if(!isset($_GET['v'])){
                                echo '<td align="center">
                                            <a href="#" class="btn btn-success" onclick="addrow()"><i class="iconic-icon-plus-alt white"></i></a>
                                      </td>';
                            }
                            ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td colspan="<?php echo isset($_GET['v']) ? 1 : 2;?>">
                                <div class="input-prepend">
                                    <span class="add-on">Rp</span>
                                    <input class="angka span12" name="total" id="total" type="text" readonly="true" value="0">
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
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
<script>
                                        function removeRow() {
                                            alert("asdads");
                                            $(this).remove();
                                        }
                                        function addrow() {
                                            var row;
                                            row += '<tr>';
                                            row += '<td><input type="text" name="keteranganDet[]" class="ket span12" id="keteranganDet"></td>';
                                            row += '<td><div class="input-prepend"><span class="add-on">Rp</span><input class="angka span12" name="hargaDet[]" id="hargaDet" type="text" onkeyup="calculate()" value="0"></div></td>';
                                            row += '<td><input type="text" name="jumlahDet[]" class="span3" id="jumlahDet" value="1"></td>';
                                            row += '<td><div class="input-prepend"><span class="add-on">Rp</span><input class="angka span12" name="subTotalDet[]" id="subTotalDet" type="text" readonly="true" value="0"></div></td>';
                                            row += '<td align="center"><a href="#" class="btn btn-danger" onclick="$(this).parent().parent().remove(); calculate"><i class="icon-remove-sign white"></i></a></td></tr>';
//                                            $("#detail tr:last").after(row);
                                            $("#detail tbody").append(row);
                                        }
                                        function calculate() {
                                            var total = 0;
                                            $(".ket").each(function() {
                                                var harga = parseInt($(this).parent().parent().find("#hargaDet").val());
                                                var jumlah = parseInt($(this).parent().parent().find("#jumlahDet").val());
                                                var subtotal = harga * jumlah;
                                                total += subtotal;
                                                $(this).parent().parent().find("#subTotalDet").val(subtotal);
                                            });
                                            $("#total").val(total);
                                        }
</script>