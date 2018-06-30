<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Pemesanan Umroh
        <small>Manajemen Pemesanan Umroh</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/pemesanan"><i class="fa fa-inbox"></i> <span>Pemesanan Umroh</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Tambah Pemesanan Umroh</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Pemesanan Umroh</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <?=form_open_multipart('admin/pemesanan_tambah')?>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-4">
                    <div class="form-group">
                    <label class="control-label">Id Pemesanan</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-qrcode"></i>
                        </div>
                            <input type="text" class="form-control" name="id_pemesanan" value="<?=$kodeunik?>" placeholder="ID PEMESANAN">
                      </div><!-- /.input group -->
                  </div>
                </div>

                  <div class="col-xs-4">
                    <div class="form-group">
                      <label class="control-label">Nama Anggota</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-users"></i>
                              </div>
                              <select class="form-control" name="id_anggota" required autofocus>
                              <option value="">Nama Anggota</option>
                                <?php foreach ($agt as $g) : ?>
                                  <option value="<?=$g->id_anggota?>"><?=getAnggota($g->id_anggota)?></option>
                                  <?php endforeach ?>
                            </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group">
                          <label>Kategori Paket</label><br>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa  fa-object-group"></i>
                              </div>
                            <select class="form-control" name="id_kategori" required autofocus>
                              <option value="">Kategori Paket</option>
                                <?php foreach ($kate as $k) : ?>
                                  <option value="<?=$k->id_kategori?>"><?=getKategori($k->id_kategori)?></option>
                                  <?php endforeach ?>
                            </select>
                        </div>
                      </div>
                    </div>

                  <div class="col-xs-4">
                    <div class="form-group">
                      <label class="control-label">Berangkat </label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar-check-o"></i>
                        </div>
                      <input type="text" class="form-control" id="datepicker" name="berangkat" value="<?=date('Y-m-d')?>" placeholder="TANGGAL" required>
                    </div>
                  </div>
                </div>

                <div class="col-xs-4">
                    <div class="form-group">
                      <label class="control-label">Kembali </label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar-check-o"></i>
                          </div>
                      <input type="text" class="form-control" id="datepicker2" name="kembali" value="<?=date('Y-m-d')?>" placeholder="TANGGAL" required>
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
                              <select class="form-control" name="id_transfer" required autofocus>
                              <option value="">Nama Rekening</option>
                                <?php foreach ($bkt as $b) : ?>
                                  <option value="<?=$b->id_transfer?>"><?=getBukti($b->id_transfer)?></option>
                                  <?php endforeach ?>
                            </select>
                        </div>
                      </div>
                    </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-normal btn-info"><i class="fa fa-save"></i> <span>Simpan</span></button>
                <a href="<?=base_URL()?>admin/pemesanan" class="btn btn-normal bg-orange pull-right"><i class="fa fa-undo"></i> <span>Kembali</span></a>
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
  <!-- /.content-wrapper -->