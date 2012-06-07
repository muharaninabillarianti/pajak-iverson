
<h3>Edit Product</h3>
<?php echo form_open('/products/update'); ?>
<h5>Kode</h5>
<?php echo form_error('kode'); ?>
<input type="text" name="kode" 
       value="<?php echo $product->getKode(); ?>" size="20" />
<h5>Nama</h5>
<?php echo form_error('nama'); ?>
<input type="text" name="nama" 
       value="<?php echo $product->getNama(); ?>" size="50" />
<h5>Price</h5>
<?php echo form_error('price'); ?>
<input type="text" name="price" 
       value="<?php echo $product->getPrice(); ?>" size="20" />
<input type="hidden" name="id" 
       value="<?php echo $product->getId(); ?>">
<div><input type="submit" value="Update" /></div>
</form>
