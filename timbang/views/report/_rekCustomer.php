<div id="printArea">
    <table width="100%">
        <tr>
            <td  style="text-align: center" colspan="4"><h2>Laporan Rekap Hutang Customer</h2>
                <h4><?php echo date('d M Y', strtotime($start)) . " - " . date('d M Y', strtotime($end)); ?></h4>
                <hr></td>
        </tr>   
    </table>
    <table class="table table-bordered table" border="1">
        <thead>
            <tr> 

                <th style="text-align:center">Nama Customer</th>
                <th style="text-align:center;width: 12%">Saldo Awal</th>
                <th style="text-align:center;width: 12%">Debet</th>
                <th style="text-align:center;width: 12%">Credit</th>
                <th style="text-align:center;width: 12%">Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $saldoAwal = 0;
            $saldoAkhir = 0;
            $sDebet = 0;
            $sCredit = 0;
            $debet = 0;
            $credit = 0;
            $totAwal = 0;
            $totAkhir = 0;
            $totDebet = 0;
            $totCredit = 0;


            $mPiutang = Piutang::model()->findAll(array(
                'with' => 'Customer',
                'condition' => 'Customer.is_delete = 0 ',
                'group'=> 'customer_id'
            ));
            foreach ($mPiutang as $val) {
                $mBalance = PiutangDet::model()->find(array(
                    'with' => 'Piutang',
                    'select' => 'sum(debet) as sumDebet,sum(credit) as sumCredit',
                    'condition' => 't.tanggal<"' . date('Y-m-d', strtotime($start)) . '" AND Piutang.customer_id=' . $val->customer_id,
//                    'group' => 'piutang_id'
                ));
                $mutasi = PiutangDet::model()->find(array(
                    'with' => 'Piutang',
                    'select' => 'sum(debet) as sumDebet,sum(credit) as sumCredit',
                    'condition' => '(t.tanggal>="' . date('Y-m-d', strtotime($start)) . '" AND t.tanggal<="' . date('Y-m-d', strtotime($end)) . '") AND Piutang.customer_id=' . $val->customer_id,
//                    'group' => 'piutang_id'
                ));

                $sDebet = (!empty($mBalance->sumDebet)) ? $mBalance->sumDebet : 0;
                $sCredit = (!empty($mBalance->sumCredit)) ? $mBalance->sumCredit : 0;
                $debet = (!empty($mutasi->sumDebet)) ? $mutasi->sumDebet : 0;
                $credit = (!empty($mutasi->sumCredit)) ? $mutasi->sumCredit : 0;
                $saldoAwal = $sDebet - $sCredit;
                $saldoAkhir = $saldoAwal + $debet - $credit;

                echo '<tr>';
                echo '<td>' . $val->Customer->nama . '</td>';
                if (isset($export) && $export = 1) {
                    echo '<td style="text-align:right">' . $saldoAwal . '</td>';
                    echo '<td style="text-align:right">' . $debet . '</td>';
                    echo '<td style="text-align:right">' . $credit . '</td>';
                    echo '<td style="text-align:right">' . $saldoAkhir . '</td>';
                } else {
                    echo '<td style="text-align:right">' . landa()->rp($saldoAwal) . '</td>';
                    echo '<td style="text-align:right">' . landa()->rp($debet) . '</td>';
                    echo '<td style="text-align:right">' . landa()->rp($credit) . '</td>';
                    echo '<td style="text-align:right">' . landa()->rp($saldoAkhir) . '</td>';
                }
                echo '</tr>';
                $totAwal += $saldoAwal;
                $totAkhir += $saldoAkhir;
                $totDebet += $debet;
                $totCredit += $credit;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <?php if (isset($export) && $export = 1) { ?>
                    <th style="text-align:right !important"><?php echo $totAwal; ?></th>
                    <th style="text-align:right !important"><?php echo $totDebet; ?></th>
                    <th style="text-align:right !important"><?php echo $totCredit; ?></th>
                    <th style="text-align:right !important"><?php echo $totAkhir; ?></th>
                <?php } else { ?>
                    <th style="text-align:right !important"><?php echo landa()->rp($totAwal); ?></th>
                    <th style="text-align:right !important"><?php echo landa()->rp($totDebet); ?></th>
                    <th style="text-align:right !important"><?php echo landa()->rp($totCredit); ?></th>
                    <th style="text-align:right !important"><?php echo landa()->rp($totAkhir); ?></th>
                    <?php } ?>
            </tr>
        </tfoot>
    </table>
</div>
