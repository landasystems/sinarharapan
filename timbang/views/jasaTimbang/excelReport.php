<h2>LAPORAN DATA TRANSAKSI JASA TIMBANG CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">CUSTOMER</th>	                
            <th width="80px">PLAT NOMOR</th>
            <th width="80px">PRODUK</th> 		
            <th width="80px">TANGGAL TIMBANG</th>
            <th width="80px">BERAT TIMBANG</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->customer; ?></td>
            <td><?php echo $row->nomor_polisi; ?></td>
            <td><?php echo $row->produk; ?></td>
            <td><?php echo $row->tanggalTimbang; ?></td>
            <td><?php echo $row->berat_timbang1; ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>