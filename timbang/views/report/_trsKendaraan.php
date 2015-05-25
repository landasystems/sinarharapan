<div id="printArea">
    <table width="100%">
        <tr>
            <td  style="text-align: center" colspan="6"><h2>Laporan Transaksi Kendaraan</h2>
                <h4><?php echo date('d M Y', strtotime($start)) . " - " . date('d M Y', strtotime($end)); ?></h4>
                <hr></td>
        </tr>   
    </table>
    <table class="table table-bordered table" border="1">
        <thead>
            <tr> 
                <th style="text-align:center" colspan="2">Tanggal</th>
                <th style="text-align:center">Keterangan</th>
                <th style="text-align:center;width: 20%">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mBalance = PerawatanTrukDet::model()->find(array(
                'with' => array('PerawatanTruk','PerawatanTruk.Truk'),
                'select' => 'sum(debet) as sumDebet,sum(credit) as sumCredit',
                'condition' => 'Truk.id=' . $kendaraan . ' AND PerawatanTruk.tanggal<"' . date('Y-m-d', strtotime($start)) . '"',
            ));
            $salDebet = (!empty($mBalance->sumDebet)) ? $mBalance->sumDebet : 0;
            $salCredit = (!empty($mBalance->sumCredit)) ? $mBalance->sumCredit : 0;
            $balance = $salDebet - $salCredit;
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Saldo Awal</td>
                <?php
                echo '<td style="text-align:right">' . landa()->rp($balance) . '</td>';
                ?>
            </tr>
            <?php
            $total = 0;
            $monYear = '';

            $mPiutang = PerawatanTrukDet::model()->findAll(array(
                'with' => array('PerawatanTruk','PerawatanTruk.Truk'),
                'order'=>'PerawatanTruk.tanggal',
                'condition' => 'Truk.is_delete = 0 AND Truk.id=' . $kendaraan . ' AND (PerawatanTruk.tanggal>="' . date('Y-m-d', strtotime($start)) . '" AND PerawatanTruk.tanggal<="' . date('Y-m-d', strtotime($end)) . '")'
            ));
            foreach ($mPiutang as $val) {
                $sDate = ($monYear == date("F Y", strtotime($val->PerawatanTruk->tanggal))) ? "" : date("F Y", strtotime($val->PerawatanTruk->tanggal));
                $monYear = date("F Y", strtotime($val->PerawatanTruk->tanggal));
                echo '<tr>';
                echo '<td style="text-align:center;width:10%">' . $sDate . '</td>';
                echo '<td style="text-align:center;width:5%">' . date('d', strtotime($val->PerawatanTruk->tanggal)) . '</td>';
                
                echo '<td>' . $val->keterangan . '</td>';
                if (isset($export) && $export = 1) {
                    echo '<td style="text-align:right">' . ($val->debet - $val->credit) . '</td>';
                } else {
                    echo '<td style="text-align:right">' . landa()->rp($val->debet - $val->credit) . '</td>';
                }
                echo '</tr>';

                $total += ($val->debet - $val->credit);
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <?php if (isset($export) && $export = 1) { ?>
                    <th style="text-align:right !important"><?php echo $total; ?></th>
                <?php } else { ?>
                    <th style="text-align:right !important"><?php echo landa()->rp($total); ?></th>
                    <?php } ?>
            </tr>
        </tfoot>
    </table>
</div>