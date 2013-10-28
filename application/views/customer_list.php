<p><?php echo anchor('customers/insert', 'Insert'); ?></p>
<table border="1" >
    <tr>
        <td>No.</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Telp</td>
        <td>Email</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php foreach ($customers as $cust) { ?>
        <tr>    
            <td><?php echo ++$row; ?></td>
            <td><?php echo $this->encrypt->decode($cust->getNama()); ?></td>
            <td><?php echo $cust->getAlamat(); ?></td>
            <td><?php echo $cust->getTelp(); ?></td>
            <td><?php echo $cust->getEmail(); ?></td>
            <td><?php echo anchor('customers/edit/'.$cust->getId(), 'Edit'); ?></td>
            <td><?php echo anchor('customers/delete/'.$cust->getId(), 'Delete'); ?></td>
        </tr>
    <?php } ?>
</table>
<p><?php echo $paging; ?></p>
<br><br><br><br><br><br>