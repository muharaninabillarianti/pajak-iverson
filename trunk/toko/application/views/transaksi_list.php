<p><?php echo anchor('customers/insert', 'Insert'); ?></p>
<?php $row=1; ?>
<table border="1" >
    <tr>
        <td>No.</td>
        <td>Tanggal</td>
        <td>No.Faktur</td>
        <td>Customer</td>        
        <td>Edit</td>
        <td>Hapus</td>
        <td>Detail</td>
    </tr>
    <?php foreach ($transaksis as $trans) { ?>
        <tr>    
            <td><?php echo $row++; ?></td>
            <td><?php echo $trans->getTanggal(); ?></td>
            <td><?php echo $trans->getFaktur(); ?></td>
            <td><?php echo $trans->getCustomer()->getNama(); ?></td>            
            <td><?php echo anchor('trans/edit/'.$trans->getId(), 'Edit'); ?></td>
            <td><?php echo anchor('trans/delete/'.$trans->getId(), 'Delete'); ?></td>
            <td><?php echo anchor('trans/detail/'.$trans->getId(), 'Detail'); ?></td>
        </tr>
    <?php } ?>
</table>
<br><br><br><br><br><br>