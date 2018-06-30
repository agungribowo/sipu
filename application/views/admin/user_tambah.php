<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Tambah Data Admin PT SGS
	<small>Manajemen Data Admin PT SGS</small>
	</h1>

	<ol class="breadcrumb">
		<li><a href="<?=base_URL()?>admin/dashboard" ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li><a href="<?=base_URL()?>admin/user"><i class="fa fa-user"></i> <span>Admin PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Tambah Data PT SGS</span></li>
	</ol>
</section>

<!-- Main content -->
	<section class="content">
	<div class="row">

<!-- left column -->
	<div class="col-md-12">

<!-- general form elements -->
	<div class="box box-success">

<!-- form start -->
<?=form_open_multipart('admin/user_tambah', 'role="form"')?>
			<div class="box-body">
                <div class="row">
	                <div class="col-xs-6">
	                  <div class="form-group">
	                    <label class="control-label">Id Admin</label>
	                      <div class="input-group">
	                        <div class="input-group-addon">
	                          <i class="fa fa-qrcode"></i>
	                        </div>
	                            <input type="text" class="form-control" name="id_admin" value="<?=$kodeunik?>" placeholder="ID ADMIN" required readonly>
	                      </div><!-- /.input group -->
	                  </div>
	                </div>

	                <div class="col-xs-6">
	                    <div class="form-group">
	                      <label class="control-label">Nama Admin</label>
	                        <div class="input-group">
	                          <div class="input-group-addon">
	                            <i class="fa  fa-user"></i>
	                          </div>
	                              <input type="text" class="form-control" name="nama_admin" maxlength="75" placeholder="NAMA ADMIN" required autofocus>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-xs-6">
	                   	<div class="form-group">
	                    	<label class="control-label">Username</label>
	                      		<div class="input-group">
	                        		<div class="input-group-addon">
	                          		<i class="fa fa-users"></i>
	                        		</div>
	                            <input type="text" class="form-control" name="username" placeholder="USERNAME">
	                      		</div><!-- /.input group -->
	                  	</div>
	                </div>

	                <div class="col-xs-6">
	                   	<div class="form-group">
	                    	<label class="control-label">Password</label>
	                      		<div class="input-group">
	                        		<div class="input-group-addon">
	                          		<i class="fa fa-asterisk"></i>
	                        		</div>
	                            <input type="password" class="form-control" name="password" placeholder="PASSWORD">
	                      		</div><!-- /.input group -->
	                  	</div>
	                </div>

                <div class="col-xs-6">
                   <div class="form-group">
                    <label class="control-label">Foto</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-camera"></i>
                        </div>
                            <input type="file" class="btn btn-primary" name="foto" placeholder="Foto">
                      </div><!-- /.input group -->
                          <p>* Format File : jpg, JPG, jpeg, JPEG, png, PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                  </div>
                </div>


                </div>
                </div>
            </div>

			<div class="box-footer">
				<button type="submit" name="submit" class="btn btn-info btn-normal"><i class="fa fa-save"></i> <span>Simpan</span></button>
					<a href="<?=base_URL()?>admin/user" class="btn btn-warning btn-normal pull-right"><i class="fa fa-undo"></i> <span>Kembali</span></a>
			</div>

<?=form_close()?>

<!-- form end -->
</div>
<!-- /.box -->
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->