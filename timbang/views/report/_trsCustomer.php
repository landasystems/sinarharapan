<div id="printArea">
    <table width="100%">
        <tr>
            <td  style="text-align: center" colspan="6"><h2>Laporan Transaksi Customer</h2>
                <h4><?php echo date('d M Y', strtotime($start)) . " - " . date('d M Y', strtotime($end)); ?></h4>
                <hr></td>
        </tr>   
    </table>
    <table class="table table-bordered table" border="1">
        <thead>
            <tr> 
                <th style="text-align:center" colspan="2">Tanggal</th>
                <th style="text-align:center">Keterangan</th>
                <th style="text-align:center;width: 20%">Debet</th>
                <th style="text-align:center;width: 20%">Credit</th>
                <th style="text-align:center;width: 20%">Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mBalance = PiutangDet::model()->find(array(
                'with' => 'Piutang.Customer',
                'select' => 'sum(debet) as sumDebet,sum(credit) as sumCredit',
                'condition' => 'Customer.id=' . $customer . ' AND t.tanggal<"' . date('Y-m-d', strtotime($start)) . '"',
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
                if ($balance > 0) {
                    if (isset($export)) {
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td style="text-align:right">' . $balance . '</td>';
                    } else {
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td style="text-align:right">' . landa()->rp($balance) . '</td>';
                    }
                } else {
                    if (isset($export)) {
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td style="text-align:right">' . $balance . '</td>';
                    } else {
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td style="text-align:right">' . landa()->rp($balance) . '</td>';
                    }
                }
                ?>
            </tr>
            <?php
            $debet = 0;
            $credit = 0;
            $monYear = '';
            $saldo = 0;

            $mPiutang = PiutangDet::model()->findAll(array(
                'with' => 'Piutang.Customer',
                'order' => 't.tanggal',
                'condition' => 'Customer.is_delete = 0 AND Customer.id=' . $customer . ' AND (t.tanggal>="' . date('Y-m-d', strtotime($start)) . '" AND t.tanggal<="' . date('Y-m-d', strtotime($end)) . '")'
            ));
            foreach ($mPiutang as $val) {
                $sDate = ($monYear == date("F Y", strtotime($val->tanggal))) ? "" : date("F Y", strtotime($val->tanggal));
                $monYear = date("F Y", strtotime($val->tanggal));
                echo '<tr>';
                echo '<td style="text-align:center;width:10%">' . $sDate . '</td>';
                echo '<td style="text-align:center;width:5%">' . date('d', strtotime($val->tanggal)) . '</td>';
                echo '<td>' . $val->Piutang->deskripsi . '</td>';
                $saldo += $balance + $val->debet - $val->credit;
                if (isset($export) && $export = 1) {
                    echo '<td style="text-align:right">' . $val->debet . '</td>';
                    echo '<td style="text-align:right">' . $val->credit . '</td>';
                    echo '<td style="text-align:right">' . $saldo . '</td>';
                } else {
                    echo '<td style="text-align:right">' . landa()->rp($val->debet) . '</td>';
                    echo '<td style="text-align:right">' . landa()->rp($val->credit) . '</td>';
                    echo '<td style="text-align:right">' . landa()->rp($saldo) . '</td>';
                }
                echo '</tr>';

                $debet += $val->debet;
                $credit += $val->credit;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <?php if (isset($export) && $export = 1) { ?>
                    <th style="text-align:right !important"><?php echo $debet; ?></th>
                    <th style="text-align:right !important"><?php echo $credit; ?></th>
                    <th style="text-align:right !important"><?php echo $saldo; ?></th>
                <?php } else { ?>
                    <th style="text-align:right !important"><?php echo landa()->rp($debet); ?></th>
                    <th style="text-align:right !important"><?php echo landa()->rp($credit); ?></th>
                    <th style="text-align:right !important"><?php echo landa()->rp($saldo); ?></th>
                    <?php } ?>
            </tr>
        </tfoot>
    </table>
</div>
