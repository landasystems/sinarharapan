<h2>LAPORAN DATA PERAWATAN TRUK CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">TRUK</th>	                
            <th width="80px">TANGGAL</th>
            <th width="80px">KETERANGAN</th> 		
            <th width="80px">TOTAL</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->Truk->nama; ?></td>
            <td><?php echo $row->tanggalPerawatan; ?></td>
            <td><?php echo $row->keterangan; ?></td>
            <td><?php echo $row->totalDebet; ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>