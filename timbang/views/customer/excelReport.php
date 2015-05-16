<h2>LAPORAN DATA CUSTOMER CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">NO. CUSTOMER</th>	                
            <th width="80px">NAMA</th>
            <th width="80px">ALAMAT</th> 		
            <th width="80px">NO. TELEPON</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo "'" . $row->kode; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td><?php echo landa()->hp($row->telepon); ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>