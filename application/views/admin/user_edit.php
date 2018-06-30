<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Edit Admin PT SGS
        <small>Manajemen Admin PT SGS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/user"><i class="fa fa-user"></i> <span>Admin PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Edit Admin PT SGS</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Admin PT SGS</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <?=form_open_multipart('admin/user_edit')?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-2">
                    <div class="form-group">
                    <label class="control-label">Id Admin</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-qrcode"></i>
                        </div>
                            <input type="text" class="form-control" name="id_admin" value="<?=$usr['id_admin']?>" placeholder="ID ADMIN" required readonly>
                      </div><!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                    <label class="control-label">Nama Admin</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                            <input type="text" class="form-control" name="nama_admin" value="<?=$usr['nama_admin']?>" placeholder="NAMA ADMIN">
                      </div><!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                    <label class="control-label">Username</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-users"></i>
                        </div>
                            <input type="text" class="form-control" name="username" value="<?=$usr['username']?>" placeholder="USERNAME">
                      </div><!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                    <label class="control-label">Password</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-asterisk"></i>
                        </div>
                            <input type="Password" class="form-control" name="password" placeholder="PASSWORD">
                      </div><!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group">
                      <label class="control-label">Foto Profil</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-camera"></i>
                          </div>
                            <input type="file" class="btn btn-primary" name="foto" placeholder="FOTO PROFIL">
                        </div><!-- /.input group -->
                            <p>* Format File : jpg, JPG, jpeg, JPEG, png, PNG, gif, BMP &nbsp; | &nbsp; Ukuran : 2 MB</p>
                    </div>
                  </div>

                  <?php
                    $foto = 'avatar.jpg';
                      if($usr['foto'] && file_exists('assets/backend/images/admin/'.$usr['foto'])) {
                      $foto = $usr['foto'];
                    }
                  ?>
                  
                  <div class="col-xs-6" align="pull-right">
                    <div class="form-group">
                      <label class="control-label">Foto Profil</label>
                      <div class="fileupload-new thumbnail" class="img-responsive" style="width: 150px; height: 150px;">
                          <img src="<?=base_URL().'assets/backend/images/admin/'.$foto?>" alt="Foto Profil" style="height: 140px;"/>
                      </div>
                    </div>
                  </div>

              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-normal btn-info"><i class="fa fa-save"></i> <span>Simpan</span></button>
                <a href="<?=base_URL()?>admin/user" class="btn btn-normal bg-orange pull-right"><i class="fa fa-undo"></i> <span>Batal</span></a>
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