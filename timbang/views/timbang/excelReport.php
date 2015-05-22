<h2>LAPORAN DATA TRANSAKSI TIMBANG CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">CUSTOMER</th>	                
            <th width="80px">PLAT NOMOR</th>
            <th width="80px">PRODUK</th> 		
            <th width="80px">NETTO (Kg)</th>
            <th width="80px">TOTAL</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->namaCustomer; ?></td>
            <td><?php echo $row->nomor_polisi; ?></td>
            <td><?php echo $row->produk; ?></td>
            <td><?php echo $row->netto; ?></td>
            <td><?php echo $row->totalRp; ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>