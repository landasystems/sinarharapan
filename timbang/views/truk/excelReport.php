<h2>LAPORAN DATA TRUK CV SINAR HARAPAN</h2>
<h4>Tanggal : <?php echo date('d F Y'); ?></h4>
<?php if (!empty($model)): ?>
    <table border="1">
        <tr>		
            <th width="80px">SOPIR</th>	                
            <th width="80px">PLAT NOMOR</th>
            <th width="80px">MERK</th> 		
            <th width="80px">TIPE KENDARAAN</th>
            <th width="80px">TANGGAL PAJAK</th>
            <th width="80px">TANGGAL KIR</th>
            <th width="80px">TANGGAL STNK</th>
            <th width="80px">SURAT</th>
            <th width="80px">SELING</th>
            <th width="80px">TERPAL</th>
            <th width="80px">KUNCI</th>
            <th width="80px">DONGKRAK</th>
            
        </tr>
        <?php foreach ($model as $row): ?>
        <tr>
            <td><?php echo $row->sopir; ?></td>
            <td><?php echo $row->nomor_polisi; ?></td>
            <td><?php echo $row->merk; ?></td>
            <td><?php echo $row->type; ?></td>
            <td><?php echo $row->tglpajak; ?></td>
            <td><?php echo $row->tglkir; ?></td>
            <td><?php echo $row->tglstnk; ?></td>
            <td><?php echo $row->cekSurat; ?></td>
            <td><?php echo $row->cekSeling; ?></td>
            <td><?php echo $row->cekTerpal; ?></td>
            <td><?php echo $row->cekKunci; ?></td>
            <td><?php echo $row->cekDongkrak; ?></td>
        </tr>
        <?php endforeach;?>
    </table>
<?php endif;?>