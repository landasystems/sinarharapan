<h2>LAPORAN DATA BAYAR PINJAMAN CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">TANGGAL</th>	                
            <th width="80px">CUSTOMER</th>
            <th width="80px">TOTAL</th> 
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo date("d M Y",strtotime($row->tanggal)) ?></td>
            <td><?php echo $row->customer; ?></td>
            <td><?php echo landa()->rp($row->credit); ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>