<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Edit Bukti Transfer PT SGS
        <small>Manajemen Anggota PT SGS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/anggota"><i class="fa fa-camera"></i> <span>Edit Bukti Transfer PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Edit Data Bukti Transfer PT SGS</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Bukti Transfer PT SGS</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <?=form_open_multipart('admin/transfer_edit')?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-2">
                    <div class="form-group">
                    <label class="control-label">Id Transfer</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-qrcode"></i>
                        </div>
                            <input type="text" class="form-control" name="id_transfer" value="<?=$bkt['id_transfer']?>" placeholder="ID TRANSFER" required readonly>
                      </div><!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label class="control-label">Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar-check-o"></i>
                        </div>
                      <input type="text" class="form-control" id="datepicker" name="tgl_transfer" value="<?=$bkt['tgl_transfer']?>" placeholder="TANGGAL" required>
                    </div>
                  </div>
                </div>

                  <div class="col-xs-4">
                    <div class="form-group">
                      <label class="control-label">Nama Rekening</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-money"></i>
                              </div>
                              <input type="text" class="form-control" name="nama_rekening" value="<?=$bkt['nama_rekening']?>" maxlength="50" placeholder="NAMA ANGGOTA" required autofocus>
                        </div>
                      </div>
                    </div>


                  <div class="col-xs-3">
                    <div class="form-group">
                      <label class="control-label">No Rekening</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-money"></i>
                              </div>
                              <input type="number" class="form-control" name="no_rekening" value="<?=$bkt['no_rekening']?>" maxlength="50" placeholder="NO REKENING" required autofocus>
                        </div>
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
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-normal btn-info"><i class="fa fa-save"></i> <span>Simpan</span></button>
                <a href="<?=base_URL()?>admin/transfer" class="btn btn-normal bg-orange pull-right"><i class="fa fa-undo"></i> <span>Batal</span></a>
              </div>
              <!-- /.box-footer -->
            <?=form_close()?>
            <!-- /.form end -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper