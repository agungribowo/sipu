<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Tambah Data Bukti Transfer PT SGS
	<small>Manajemen Data Bukti Transfer PT SGS</small>
	</h1>

	<ol class="breadcrumb">
		<li><a href="<?=base_URL()?>admin/dashboard" ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li><a href="<?=base_URL()?>admin/transfer"><i class="fa fa-camera-retro"></i> <span>Data Bukti Transfer PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Tambah Data Bukti Transfer PT SGS</span></li>
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
<?=form_open_multipart('admin/transfer_tambah', 'role="form"')?>
			<div class="box-body">
                <div class="row">
	                <div class="col-xs-6">
	                  <div class="form-group">
	                    <label class="control-label">Id Transfer</label>
	                      <div class="input-group">
	                        <div class="input-group-addon">
	                          <i class="fa fa-qrcode"></i>
	                        </div>
	                            <input type="text" class="form-control" name="id_transfer" value="<?=$kodeunik?>" placeholder="ID transfer" required readonly>
	                      </div><!-- /.input group -->
	                  </div>
	                </div>

	               <div class="col-xs-6">
                    <div class="form-group">
                      <label class="control-label">Tanggal Transfer</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar-check-o"></i>
                        </div>
                      <input type="text" class="form-control" id="datepicker" name="tgl_transfer" value="<?=date('Y-m-d')?>" placeholder="TANGGAL" required>
                    </div>
                  </div>
                </div>

	                <div class="col-xs-6">
	                    <div class="form-group">
	                      <label class="control-label">Nama Rekening</label>
	                        <div class="input-group">
	                          <div class="input-group-addon">
	                            <i class="fa  fa-money"></i>
	                          </div>
	                              <input type="text" class="form-control" name="nama_rekening" maxlength="75" placeholder="NAMA REKENING" required autofocus>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-xs-6">
	                   	<div class="form-group">
	                    	<label class="control-label">No Rekening</label>
	                      		<div class="input-group">
	                        		<div class="input-group-addon">
	                          		<i class="fa fa-money"></i>
	                        		</div>
	                            <input type="text" class="form-control" name="no_rekening" placeholder="NO REKENING">
	                      		</div><!-- /.input group -->
	                  	</div>
	                </div>

                <div class="col-xs-6">
                   <div class="form-group">
                    <label class="control-label">Foto Bukti Transfer</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-camera"></i>
                        </div>
                            <input type="file" class="btn btn-primary" name="bukti" placeholder="Foto Bukti Transfer">
                      </div><!-- /.input group -->
                          <p>* Format File : jpg, JPG, jpeg, JPEG, png, PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                  </div>
                </div>


                </div>
                </div>
            </div>

<div class="box-footer">
	<button type="submit" name="submit" class="btn btn-info btn-normal"><i class="fa fa-save"></i> <span> Simpan</span></button>
		<a href="<?=base_URL()?>admin/transfer" class="btn btn-warning btn-normal pull-right"><i class="fa fa-undo"></i> <span>Batal</span></a>
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