<?php
$bon = Bon::model()->findall(array('condition' => 'sopir_id = ' . $sopir_id . ' and lunas = 0'));
?>
<div class="row-fluid">
    <div class="span12">
        <br><br>
        <h4>Detail Hutang</h4>
        <b><i>* Centang checkbox untuk menandakan bahwa bon sopir telah lunas</i></b>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10"></th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Bon (Rp)</th>
                    <th>Total Bayar (Rp)</th>
                    <th width="120px;">Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(empty($bon)){
                    echo '<tr>';
                    echo '<td colspan="6">Tidak ada data bon</td>';
                    echo '</tr>';
                }else {
                    foreach ($bon as $val) {
                        if ($val->total > $val->totalBayar) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="lunas[]" value="1"></td>
                                <td>
                                    <input type="hidden" name="bon_id[]" value="<?php echo $val->id ?>" class="piutang_id">
                                    <input type="hidden" name="total_bayar[]" value="<?php echo (!empty($val->totalBayar)) ? $val->totalBayar : 0 ?>" class="total_bayar" id="total_bayar">
                                    <?php echo date("d M Y", strtotime($val->tanggal)); ?>
                                </td>
                                <td><?php echo!empty($val->deskripsi) ? $val->deskripsi : "-"; ?></td>
                                <td><?php echo landa()->rp($val->total); ?></td>
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
            if (!empty($bon)) {
                ?>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align: right"><b>Total</b></td>
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
            $(this).parent().parent().find(".terbayar").html(rp(subTotal));
            total += bayar;
        });
        $(".total").html(rp(total));
    }
</script>