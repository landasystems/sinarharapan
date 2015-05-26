<h2>LAPORAN DATA STOR GIRIK CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">TANGGAL</th>	                
            <th width="80px">SOPIR</th>
            <th width="80px">NOMOR GIRIK</th>
            <th width="80px">ONGKOS SOPIR</th>
            <th width="80px">ONGKOS TRUK</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->tanggalTrans; ?></td>
            <td><?php echo $row->sopir; ?></td>
            <td><?php echo $row->truk; ?></td>
            <td><?php echo $row->nomor_girik; ?></td>
            <td><?php echo landa()->rp($row->fee_sopir); ?></td>
            <td><?php echo landa()->rp($row->fee_truk); ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>