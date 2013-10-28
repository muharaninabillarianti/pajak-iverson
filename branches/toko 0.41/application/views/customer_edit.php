<h3>Edit Customer</h3>
<?php echo form_open('/customers/update'); ?>
<h5>Nama</h5>
<?php echo form_error('nama'); ?>
<input type="text" name="nama" value="<?php echo $customer->getNama(); ?>" size="50" />

<h5>Alamat</h5>
<?php echo form_error('alamat'); ?>
<input type="text" name="alamat" value="<?php echo $customer->getAlamat(); ?>" size="50" />

<h5>Telp</h5>
<?php echo form_error('telp'); ?>
<input type="text" name="telp" value="<?php echo $customer->getTelp(); ?>" size="20" />

<h5>Email</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo $customer->getEmail(); ?>" size="30" />
<input type="hidden" name="id" value="<?php echo $customer->getId(); ?>"/>
<div><input type="submit" value="Update" /></div>
</form>
