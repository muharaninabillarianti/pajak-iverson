<h3>Insert New Product</h3>
<?php echo form_open('/products/insert'); ?>
<h5>Kode</h5>
<?php echo form_error('kode'); ?>
<input type="text" name="kode" value="<?php echo set_value('kode'); ?>" size="20" />

<h5>Nama</h5>
<?php echo form_error('nama'); ?>
<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" size="50" />

<h5>Price</h5>
<?php echo form_error('price'); ?>
<input type="text" name="price" value="<?php echo set_value('price'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>
</form>
