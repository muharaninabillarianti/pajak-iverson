<p><?php echo anchor('products/insert', 'Insert'); ?></p>
<?php $row=1; ?>
<table border="1" >
    <tr>
        <td>No.</td>
        <td>Kode</td>
        <td>Nama</td>
        <td>Price</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php foreach ($products as $product) { ?>
        <tr>    
            <td><?php echo $row++; ?></td>
            <td><?php echo $product->getKode(); ?></td>
            <td><?php echo $product->getNama(); ?></td>
            <td><?php echo $product->getPrice(); ?></td>
            <td><?php echo anchor('products/edit/'.$product->getId(), 'Edit'); ?></td>
            <td><?php echo anchor('products/delete/'.$product->getId(), 'Delete'); ?></td>
        </tr>
    <?php } ?>
</table>
<br><br><br><br><br><br><br>