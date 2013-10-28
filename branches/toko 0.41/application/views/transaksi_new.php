<h3>Insert New Transaksi Penjualan</h3>
<?php echo form_open('/trans/insert'); ?>
<p>    
    Tanggal: <input type="text" name="tanggal"/><?php echo form_error('tanggal'); ?>
</p>
<p>    
    Faktur: <input type="text" name="faktur"/><?php echo form_error('faktur'); ?>
</p>
<p>
    Customer: 
    <select name="customer">
        <?php foreach ($customers as $customer) { ?>            
            <option value="<?php echo $customer->getId();?>">
                <?php echo $customer->getNama();    ?></option>
        <?php } ?>
    </select>
</p>
<p><input type="submit" value="Submit"></p>
</form>