<h2>LAPORAN DATA TRANSAKSI TIMBANG CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if ($model !== null): ?>
    <table border="1">
        <tr>		
            <th width="80px">CUSTOMER</th>	                
            <th width="80px">PLAT NOMOR</th>
            <th width="80px">PRODUK</th> 		
            <th width="80px">NETTO (Kg)</th>
            
            <th width="80px">Tanggal Timbang 1</th>
            <th width="80px">Tanggal Timbang 2</th>
            <th width="80px">TOTAL</th>
            
        </tr>
        <?php 
        $total=0;
        foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->namaCustomer; ?></td>
            <td><?php echo $row->nomor_polisi; ?></td>
            <td><?php echo $row->produk; ?></td>
            <td><?php echo $row->netto; ?></td>
            
            <td><?php echo $row->tglTimbang; ?></td>
            <td><?php echo $row->tglTimbang2; ?></td>
            <td><?php echo $row->total; ?></td>
        </tr>
        <?php 
        
        $total += $row->total;
        endforeach;
        ?>
        <tr>
            <td colspan="6" align="right">Total</td>
            <td><?php echo $total ?></td>
        </tr>
    </table>
<?php endif;?>