<h3>Insert New Customer</h3>
<?php echo form_open('/customers/insert'); ?>
<h5>Nama</h5>
<?php echo form_error('nama'); ?>
<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" size="50" />

<h5>Alamat</h5>
<?php echo form_error('alamat'); ?>
<input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>" size="50" />

<h5>Telp</h5>
<?php echo form_error('telp'); ?>
<input type="text" name="telp" value="<?php echo set_value('telp'); ?>" size="20" />

<h5>Email</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="30" />

<div><input type="submit" value="Submit" /></div>
</form>
