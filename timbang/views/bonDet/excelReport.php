<h2>LAPORAN DATA BAYAR BON CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">TANGGAL</th>	                
            <th width="80px">SOPIR</th>
            <th width="80px">TOTAL</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo date("d M Y",strtotime($row->tanggal)); ?></td>
            <td><?php echo $row->sopir; ?></td>
            <td><?php echo landa()->rp($row->credit); ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>