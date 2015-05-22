<h2>LAPORAN DATA TRANSAKSI PINJAMAN CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">CUSTOMER</th>	                
            <th width="80px">JAMINAN</th>
            <th width="80px">KETERANGAN</th> 		
            <th width="80px">TANGGAL</th>
            <th width="80px">PINJAMAN</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->customer; ?></td>
            <td><?php echo $row->jaminan; ?></td>
            <td><?php echo $row->deskripsi; ?></td>
            <td><?php echo $row->tanggalTimbang; ?></td>
            <td><?php echo $row->type; ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>