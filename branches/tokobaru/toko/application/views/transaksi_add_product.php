<h3>Transaksi Detail</h3>
<table border="0">
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td><?php echo $transaksi->getTanggal(); ?></td>
    </tr>
    <tr>
        <td>No.Faktur</td>
        <td>:</td>
        <td><?php echo $transaksi->getFaktur(); ?></td>
    </tr>
    <tr>
        <td>Customer</td>
        <td>:</td>
        <td><?php echo $transaksi->getCustomer()->getNama(); ?></td>
    </tr>
</table>
<p>Transaksi Detail</p>
<p><?php echo anchor('trans/browse', 'Add Product'); ?> | 
    <?php echo anchor('trans/submit', 'Submit'); ?></p>
<?php $row = 1; ?>
<table border="1">
    <tr>
        <td>No</td>
        <td>Product</td>
        <td>Jumlah</td>
        <td>Price</td>
        <td>Sub Total</td>
    </tr>
    <?php 
    $total = 0;
    foreach ($transaksi->getTransaksiDetail() as $detail) {
        ?>   
        <tr>
            <td><?php echo $row++; ?></td>
            <td><?php echo $detail->getProduct()->getNama(); ?></td>
            <td><?php echo $detail->getQty(); ?></td>
            <td><?php echo '$ '.$detail->getPrice(); ?></td>
            <td align="right"><?php $total += ($detail->getPrice() * $detail->getQty());
            echo '$ '.($detail->getPrice() * $detail->getQty()); ?></td>
        </tr>        
<?php } ?>
        <tr>
            <td align="right" colspan="4">Total</td>
            <td align="right"><?php echo '$ '.$total; ?></td>
        </tr>
</table>