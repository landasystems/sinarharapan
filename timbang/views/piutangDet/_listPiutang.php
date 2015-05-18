<?php
$piutang = Piutang::model()->findall(array('condition' => 'customer_id = ' . $customer_id));
?>
<div class="row-fluid">
    <div class="span12">
        <br><br>
        <h4>Detail Hutang</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jaminan</th>
                    <th>Hutang (Rp)</th>
                    <th>Total Bayar (Rp)</th>
                    <th width="120px;">Bayar</th>
                    <th width="20px;">#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($piutang as $val) {
                    if ($val->total > $val->totalBayar) {
                    ?>
                    <tr>
                        <td>
                            <input type="hidden" name="piutang_id[]" value="<?php echo $val->id ?>" class="piutang_id">
                            <input type="hidden" name="total_bayar[]" value="<?php echo (!empty($val->totalBayar)) ? $val->totalBayar : 0 ?>" class="total_bayar" id="total_bayar">
                            <?php echo date("d M Y", strtotime($val->tanggal)); ?>
                        </td>
                        <td><?php echo!empty($val->deskripsi) ? $val->deskripsi : "-"; ?></td>
                        <td><?php echo!empty($val->jaminan) ? $val->jaminan : "-"; ?></td>
                        <td><?php echo landa()->rp($val->total); ?></td>
                        <td><span class="terbayar"><?php echo landa()->rp($val->totalBayar); ?></span></td>
                        <td>
                            <div class="input-prepend">
                                <span class="add-on">Rp</span>
                                <input class="angka span12" name="bayar[]" id="bayar" type="text" onkeyup="calculate()" value="0">
                            </div>
                        </td>
                        <td><a href="#" class="btn btn-success" title="History"><span class="entypo-icon-history"></span></a></td>
                    </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right"><b>Total</b></td>
                    <td colspan="1"><span class="total">Rp. 0</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
                                    function rp(angka) {
                                        var rupiah = "";
                                        var angkarev = angka.toString().split("").reverse().join("");
                                        for (var i = 0; i < angkarev.length; i++)
                                            if (i % 3 == 0)
                                                rupiah += angkarev.substr(i, 3) + ".";
                                        var uang = rupiah.split("", rupiah.length - 1).reverse().join("");
                                        return "Rp. " + uang;
                                    }

                                    function calculate() {
                                        var total = 0;
                                        $(".piutang_id").each(function() {
                                            var totalBayar = parseInt($(this).parent().parent().find("#total_bayar").val());
                                            var bayar = parseInt($(this).parent().parent().find("#bayar").val());
                                            var subTotal = parseInt(totalBayar + bayar);
                                            $(this).parent().parent().find(".terbayar").html(rp(subTotal));
                                            total += subTotal;
                                        });
                                        $(".total").html(rp(total));
                                    }
</script>