<h5>Select Product</h5>
<?php $row=1; ?>
<table border="1" >
    <tr>
        <td>No.</td>
        <td>Kode</td>
        <td>Nama</td>
        <td>Price</td>
        <td>Select</td>        
    </tr>
    <?php foreach ($products as $product) { ?>
        <tr>    
            <td><?php echo $row++; ?></td>
            <td><?php echo $product->getKode(); ?></td>
            <td><?php echo $product->getNama(); ?></td>
            <td><?php echo $product->getPrice(); ?></td>
            <td><?php echo anchor('trans/select/'.$product->getId(), 'Select'); ?></td>            
        </tr>
    <?php } ?>
</table>
<br><br><br><br>