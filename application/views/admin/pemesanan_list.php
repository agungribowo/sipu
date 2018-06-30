<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	List Pemesanan Umroh Umroh
	<small>Manajemen Pemesanan Umroh</small>
	</h1>
		<ol class="breadcrumb">
		<li><a href="<?=base_URL()?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li class="active"><i class="fa fa-ticket"></i> <span>Pemesanan Umroh</span></li>
		</ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Notifikasi -->
	<?php
		if ($this->session->flashdata('simpan')) {
		echo "<div class='callout callout-success' id='alert'>
		<h4><i class='icon fa fa-check'></i>&nbsp; BERHASIL</h4>
		<p>".$this->session->flashdata('simpan')."</p>
		</div>";
		} else if ($this->session->flashdata('gagal')) {
		echo "<div class='callout callout-danger' id='alert'>
		<h4><i class='icon fa fa-ban'></i>&nbsp; GAGAL</h4>
		<p>".$this->session->flashdata('gagal')."</p></div>";
		} else if ($this->session->flashdata('salah')) {
		echo "<div class='callout callout-warning' id='alert'>
		<h4><i class='icon fa fa-warning'></i>&nbsp; PERINGATAN</h4>
		<p>".$this->session->flashdata('salah')."</p>
		</div>";
		}
	?>
<div class="row">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">List Pemesanan Umroh</h3>
				<a href="<?=base_URL()?>admin/pemesanan_tambah" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Tambah Pemesanan Umroh</a>
			</div>

<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th style="text-align: center">NO</th>
			<th style="text-align: center;">ID PEMESANAN</th>
			<th style="text-align: center;">NAMA ANGGOTA</th>
			<th style="text-align: center;">KATEGORI PAKET</th>
			<th style="text-align: center;">BERANGKAT</th>
			<th style="text-align: center;">KEMBALI</th>
			<th style="text-align: center;">NAMA REKENING</th>
			<th style="text-align: center; width: 15%">AKSI</th>
		</tr>
		</thead>

<tbody>
	<?php
	$no = 1;
	foreach($pms as $p) :
	?>
	<tr>
		<td style="text-align: center"><b><?=$no?>.</b></td>
		<td style="text-align: center"><?=$p->id_pemesanan?></td>
		<td style="text-align: center"><?=getAnggota($p->id_anggota)?></td>
		<td style="text-align: center"><?=getKategori($p->id_kategori)?></td>
		<td style="text-align: center"><?=$p->berangkat?></td>
		<td style="text-align: center"><?=$p->kembali?></td>
		<td style="text-align: center"><?=getBukti($p->id_transfer)?></td>
		<td style="text-align: center">

<b>
	<a href="<?=base_URL()?>admin/pemesanan_edit/<?=$p->id_pemesanan?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a>
	<a href="<?=base_URL()?>admin/pemesanan_hapus/<?=$p->id_pemesanan?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a>
</b>
		</td>
	</tr>

<?php $no++; endforeach; ?>
</tbody>
		</table>
	</div>
	<!-- /.box-body -->
		</div>
	<!-- /.box -->



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