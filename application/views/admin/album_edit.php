<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Edit Album Foto Umroh PT SGS
	<small>Manajemen Album Foto PT SGS</small>
	</h1>

	<ol class="breadcrumb">
		<li><a href="<?=base_URL()?>admin/dashboard" ><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li><a href="<?=base_URL()?>admin/album"><i class="fa fa-book"></i> <span>Album Foto Umroh PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Edit Album Foto PT SGS</span></li>
	</ol>
</section>

<?php
	$gbr_galeri = 'avatar.jpg';
	if($glr['gbr_galeri'] && file_exists('assets/backend/images/galeri/'.$glr['gbr_galeri'])) {
	$gbr_galeri = $glr['gbr_galeri'];
	}
	?>

<!-- Main content -->
	<section class="content">
	<div class="row">

<!-- left column -->
	<div class="col-md-12">

<!-- general form elements -->
	<div class="box box-success">

<!-- form start -->
<?=form_open_multipart('admin/album_edit', 'role="form"')?>
			<div class="box-body">
                <div class="row">
	                <div class="col-xs-3">
	                    <div class="form-group">
	                      <label class="control-label">Id Album</label>
	                        <div class="input-group">
	                          <div class="input-group-addon">
	                            <i class="fa  fa-list-alt"></i>
	                          </div>
	                              <input type="text" class="form-control" name="id_galeri" value="<?=$glr['id_galeri']?>" maxlength="75" placeholder="ID GALERI" required readonly>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-xs-3">
	                   	<div class="form-group">
	                    	<label class="control-label">Judul Album</label>
	                      		<div class="input-group">
	                        		<div class="input-group-addon">
	                          		<i class="fa fa-book"></i>
	                        		</div>
	                            <input type="text" class="form-control" name="jdl_galeri" value="<?=$glr['jdl_galeri']?>" placeholder="JUDUL GALERI">
	                      		</div><!-- /.input group -->
	                  	</div>
	                </div>

                <div class="col-xs-6">
                   <div class="form-group">
                    <label class="control-label">Sampul Album</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-camera"></i>
                        </div>
                            <input type="file" class="btn btn-primary" name="gbr_galeri" placeholder="SAMPUL ALBUM">
                      </div><!-- /.input group -->
                          <p>* Format File : jpg, JPG, jpeg, JPEG, png, PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                  </div>
                </div>


                </div>
                </div>
            </div>

<div class="box-footer">
	<button type="submit" name="submit" class="btn btn-info btn-normal"><i class="fa fa-save"></i> <span>Edit</span></button>
		<a href="<?=base_URL()?>admin/album" class="btn btn-warning btn-flat pull-right"><i class="fa fa-undo"></i> <span>Batal</span></a>
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