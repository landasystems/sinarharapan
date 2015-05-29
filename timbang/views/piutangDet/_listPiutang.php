<?php
$piutang = Piutang::model()->findall(array('condition' => 'customer_id = ' . $customer_id . ' and lunas = 0'));
?>
<div class="row-fluid">
    <div class="span12">
        <br><br>
        <legend>Detail Hutang</legend>
        <b><i>* Centang checkbox untuk menandakan bahwa hutang customer telah lunas</i></b>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10"></th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jaminan</th>
                    <th>Hutang (Rp)</th>
                    <th>Bunga</th>
                    <th>Total Bayar (Rp)</th>
                    <th width="120px;">Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($piutang)) {
                    echo '<tr>';
                    echo '<td colspan="8">Tidak ada data bon</td>';
                    echo '</tr>';
                } else {
                    foreach ($piutang as $val) {
                        if ($val->total > $val->totalBayar) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="lunas[]" value="1"></td>
                                <td>
                                    <input type="hidden" name="piutang_id[]" value="<?php echo $val->id ?>" class="piutang_id">
                                    <input type="hidden" name="total_bayar[]" value="<?php echo (!empty($val->totalBayar)) ? $val->totalBayar : 0 ?>" class="total_bayar" id="total_bayar">
                                    <input type="hidden" name="bunga[]" value="<?php echo $val->sub_total * ($val->bunga / 100); ?>" class="bunga" id="bunga">
                                    <?php echo date("d M Y", strtotime($val->tanggal)); ?>
                                </td>
                                <td><?php echo!empty($val->deskripsi) ? $val->deskripsi : "-"; ?></td>
                                <td><?php echo!empty($val->jaminan) ? $val->jaminan : "-"; ?></td>
                                <td><?php echo landa()->rp($val->sub_total); ?></td>
                                <td><?php echo landa()->rp($val->sub_total * ($val->bunga / 100)); ?></td>
                                <td><span class="terbayar"><?php echo landa()->rp($val->totalBayar); ?></span></td>
                                <td>
                                    <div class="input-prepend">
                                        <span class="add-on">Rp</span>
                                        <input class="angka span12" name="bayar[]" id="bayar" type="text" onkeyup="calculate()" value="0">
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
            <?php
            if (!empty($piutang)) {
                ?>
                <tfoot>
                    <tr>
                        <td colspan="7" style="text-align: right"><b>Total</b></td>
                        <td colspan="1"><span class="total">Rp. 0</span></td>
                    </tr>
                </tfoot>
                <?php
            }
            ?>
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
            if (subTotal > 0) {
                $(this).parent().parent().find(".terbayar").html(rp(subTotal));
                total += bayar;
            } else {
                $(this).parent().parent().find(".terbayar").html(rp(0));
            }
        });
        $(".total").html(rp(total));
    }
</script>
