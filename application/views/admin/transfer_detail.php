<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Data Bukti Transfer PT SGS
        <small>Manajemen Transfer PT SGS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/transfer"><i class="fa fa-book"></i> <span>Data Bukti Transfer PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Detail Transfer PT SGS</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Transfer PT SGS</h3>
            </div>
            <!-- /.box-header -->
            
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-6 col-lg-offset-3">
                    <ul class="list-group list-group-unbordered">

                      <?php
                        $bukti = 'avatar.jpg';
                        if($bkt['bukti'] && file_exists('assets/backend/images/bukti_transfer/'.$bkt['bukti'])) {
                        $bukti = $bkt['bukti'];
                        }
                        ?>

                          <div class="form-group">
                            <label>Foto Bukti Transfer</label>
                              <div class="fileupload-new thumbnail" class="img-responsive" style="width: 600px; height: 610px;">
                                <img src="<?=base_URL().'assets/backend/images/bukti_transfer/'.$bukti?>" alt="Foto Bukti Transfer" style="height: 600px;"/>
                              </div>
                          </div>
                
                      <li class="list-group-item">
                        <b>ID TRANSFER</b> <a class="pull-right"><?=$bkt['id_transfer']?></a>
                      </li>
                      
                      <li class="list-group-item">
                        <b>TANGGAL TRANSFER</b> <a class="pull-right"><?=$bkt['tgl_transfer']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>NAMA REKENING</b> <a class="pull-right"><?=$bkt['nama_rekening']?></a>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <!-- /.box- footer -->
              <div class="box-footer">
                <a href="<?=base_URL()?>admin/transfer" class="btn btn-normal bg-orange pull-right"><i class="fa fa-undo"></i> <span>Kembali</span></a>
              </div>
              <!-- /.box- footer -->
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