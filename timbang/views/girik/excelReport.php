<h2>LAPORAN DATA STOR GIRIK CV SINAR HARAPAN</h2>
<h4>PERIODE : <?php echo $tanggal; ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th>NOMOR</th>
            <th width="80px">TANGGAL</th>	                
            <th width="80px">SOPIR</th>
            <th width="80px">PLAT NOMOR</th>
            <th width="80px">NOMOR GIRIK</th>
            <th width="80px">BERAT (KW)</th>
            <th width="80px">ONGKOS SOPIR (Rp)</th>
            <th width="80px">ONGKOS TRUK (Rp)</th>
        </tr>
        <?php
        $no = 1;
        $feeSopir = 0;
        $feeTruk = 0;
        $berat=0;
        foreach ($model as $row):
            $berat += $row->berat;
            $feeSopir += $row->fee_sopir;
            $feeTruk += $row->fee_truk;
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row->tanggalTrans; ?></td>
                <td><?php echo $row->sopir; ?></td>
                <td><?php echo $row->platnomor; ?></td>
                <td><?php echo $row->nomor_girik; ?></td>
                <td><?php echo $row->berat; ?></td>
                <td><?php echo $row->fee_sopir; ?></td>
                <td><?php echo $row->fee_truk; ?></td>
            </tr>
            <?php
            $no++;
        endforeach;
        ?>
            <tr>
                <th colspan="5">TOTAL</th>
                <th><?php echo $berat?></th>
                <th><?php echo $feeSopir?></th>
                <th><?php echo $feeTruk?></th>
            </tr>
    </table>
<?php endif; ?>