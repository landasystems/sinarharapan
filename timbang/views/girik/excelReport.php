<h2>LAPORAN DATA STOR GIRIK CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th>NOMOR</th>
            <th width="80px">TANGGAL</th>	                
            <th width="80px">SOPIR</th>
            <th width="80px">NOMOR GIRIK</th>
            <th width="80px">ONGKOS SOPIR</th>
            <th width="80px">ONGKOS TRUK</th>
        </tr>
        <?php
        $no = 1;
        $feeSopir = 0;
        $feeTruk = 0;
        foreach ($model as $row):
            $feeSopir += $row->fee_sopir;
            $feeTruk += $row->fee_truk;
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tanggalTrans; ?></td>
                <td><?php echo $row->sopir; ?></td>
                <td><?php echo $row->nomor_girik; ?></td>
                <td><?php echo $row->fee_sopir; ?></td>
                <td><?php echo $row->fee_truk; ?></td>
            </tr>
            <?php
            $no++;
        endforeach;
        ?>
            <tr>
                <th colspan="4">TOTAL</th>
                <th><?php echo $feeSopir?></th>
                <th><?php echo $feeTruk?></th>
            </tr>
    </table>
<?php endif; ?>