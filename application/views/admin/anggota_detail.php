<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Anggota PT SGS
        <small>Manajemen Anggota PT SGS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?=base_URL()?>admin/anggota"><i class="fa fa-book"></i> <span>Anggota PT SGS</span></a></li>
        <li class="active"><i class="fa fa-wpforms"></i> <span>Detail Anggota PT SGS</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Anggota PT SGS</h3>
            </div>
            <!-- /.box-header -->
            
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-6 col-lg-offset-3">
                    <ul class="list-group list-group-unbordered">
                
                      <li class="list-group-item">
                        <b>ID ANGGOTA</b> <a class="pull-right"><?=$agt['id_anggota']?></a>
                      </li>
                      
                      <li class="list-group-item">
                        <b>USERNAME</b> <a class="pull-right"><?=$agt['username']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>NAMA ANGGOTA</b> <a class="pull-right"><?=$agt['nama_anggota']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>EMAIL ANGGOTA</b> <a class="pull-right"><?=$agt['email_anggota']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>TIPE ANGGOTA</b> <a class="pull-right"><?=$agt['tipe_identitas']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>NO IDENTITAS</b> <a class="pull-right"><?=$agt['no_identitas']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>NO HP</b> <a class="pull-right"><?=$agt['no_hp']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>TANGGAL LAHIR</b> <a class="pull-right"><?=$agt['tgl_lahir']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>JENIS KELAMIN</b> <a class="pull-right"><?=$agt['jekel']?></a>
                      </li>

                      <li class="list-group-item">
                        <b>ALAMAT</b> <a class="pull-right"><?=$agt['alamat']?></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <!-- /.box- footer -->
              <div class="box-footer">
                <a href="<?=base_URL()?>admin/anggota" class="btn btn-flat bg-orange pull-right"><i class="fa fa-undo"></i> <span>Kembali</span></a>
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