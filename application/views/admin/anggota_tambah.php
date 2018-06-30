Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Anggota PT SGS
        <small>Manajemen Anggota PT SGS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/anggota"><i class="fa fa-group"></i> <span>Anggota PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Tambah Anggota PT SGS</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Anggota PT SGS</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <?=form_open_multipart('admin/anggota_tambah')?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-2">
                    <div class="form-group">
                    <label class="control-label">Id Anggota</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-qrcode"></i>
                        </div>
                            <input type="text" class="form-control" name="id_anggota" value="<?=$kodeunik?>" placeholder="ID ANGGOTA">
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
                            <input type="text" class="form-control" name="username" placeholder="USERNAME">
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

                  <div class="col-xs-4">
                    <div class="form-group">
                      <label class="control-label">Nama Anggota</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-user"></i>
                              </div>
                              <input type="text" class="form-control" name="nama_anggota" maxlength="50" placeholder="NAMA ANGGOTA" required autofocus>
                        </div>
                      </div>
                    </div>


                  <div class="col-xs-3">
                    <div class="form-group">
                      <label class="control-label">Email Anggota</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-at"></i>
                              </div>
                              <input type="text" class="form-control" name="email_anggota" maxlength="50" placeholder="EMAIL ANGGOTA" required autofocus>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tipe Identitas</label><br>
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-black-tie"></i>
                            </div>
                          <select class="form-control" name="tipe_identitas" required autofocus>
                            <option value="">Pilih Tipe Identitas</option>
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                          </select>
                      </div>
                    </div>
                </div>

                <div class="col-xs-3">
                    <div class="form-group">
                      <label class="control-label">No Identitas</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-black-tie"></i>
                              </div>
                              <input type="number" class="form-control" name="no_identitas" maxlength="50" placeholder="NO IDENTITAS" required autofocus>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-3">
                    <div class="form-group">
                      <label class="control-label">No Hp</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-phone"></i>
                              </div>
                              <input type="number" class="form-control" name="no_hp" maxlength="50" placeholder="NO HP" required autofocus>
                        </div>
                      </div>
                    </div>

                  <div class="col-xs-2">
                    <div class="form-group">
                      <label class="control-label">Tanggal Lahir</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar-check-o"></i>
                        </div>
                      <input type="text" class="form-control" id="datepicker" name="tgl_lahir" value="<?=date('Y-m-d')?>" placeholder="TANGGAL" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-genderless"></i>
                            </div>
                          <select class="form-control" name="jekel" required autofocus>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                    </div>
                </div>

                <div class="col-xs-7">
                    <div class="form-group">
                      <label class="control-label">Alamat</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-home"></i>
                              </div>
                              <input type="text" class="form-control" name="alamat" maxlength="200" placeholder="ALAMAT ANGGOTA" required autofocus>
                        </div>
                      </div>
                    </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-normal btn-primary"><i class="fa fa-save"></i> <span>Simpan</span></button>
                <a href="<?=base_URL()?>admin/anggota" class="btn btn-normal bg-orange pull-right"><i class="fa fa-undo"></i> <span>Kembali</span></a>
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