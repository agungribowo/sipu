<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Anggota PT Salwana Global Sarana
	<small>Manajemen Anggota</small>
	</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="active"><i class="fa fa-home"></i> <span>Anggota PT SGS</span></li>
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
	} else if ($this->session->flashdata('hapus')) {
		echo "<div class='callout callout-danger' id='alert'>
			<h4><i class='icon fa fa-ban'></i>&nbsp; HAPUS</h4>
			<p>".$this->session->flashdata('hapus')."</p></div>";
		
	}

	?>
	<div class="row">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">List Anggota PT SGS</h3>
				<a href="<?=base_URL()?>admin/anggota_tambah" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Tambah Anggota Baru</a>
			</div>
			<!-- /.box-header -->

	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th style="text-align: center">NO</th>
				<th style="text-align: center">ID ANGGOTA</th>
				<th style="text-align: center">NAMA ANGGOTA</th>
				<th style="text-align: center">EMAIL ANGGOTA</th>
				<th style="text-align: center">NO HP</th>
				<th style="text-align: center">TANGGAL LAHIR</th>
				<th style="text-align: center">JENIS KELAMIN</th>
				<th style="text-align: center; width: 15%">AKSI</th>
			</tr>
			</thead>

	<tbody>
		<?php
		$no = 1;
		foreach($agt as $g) :
		?>
		<tr>
			<td style="text-align: center"><b><?=$no?>.</b></td>
			<td style="text-align: center"><?=$g->id_anggota?></td>
			<td style="text-align: center"><?=$g->nama_anggota?></td>
			<td style="text-align: center"><?=$g->email_anggota?></td>
			<td style="text-align: center"><?=$g->no_hp?></td>
			<td style="text-align: center"><?=$g->tgl_lahir?></td>
			<td style="text-align: center"><?=$g->jekel?></td>
			<td style="text-align: center">
				<b>
					<a href="<?=base_URL()?>admin/anggota_detail/<?=$g->id_anggota?>" class="btn btn-xs btn-info btn-flat" title="Detail Data"><i class="fa fa-search"></i></a>
					<a href="<?=base_URL()?>admin/	anggota_edit/<?=$g->id_anggota?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a>
					<a href="<?=base_URL()?>admin/anggota_hapus/<?=$g->id_anggota?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->