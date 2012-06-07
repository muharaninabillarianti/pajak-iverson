<h5>Selected Product</h5>
<p>Kode : <?php echo $product->getKode() ?></p>
<p>Nama : <?php echo $product->getNama() ?></p>
<p>Price : <?php echo $product->getPrice() ?></p>
<?php echo form_open('/trans/inputqty'); ?>
<input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>"/>
<p>Jumlah : <input type="text" name="qty" value="1"></p>
<p><input type="submit" value="Ok"/></p>
</form>