<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Kategori Paket Umroh
	<small>Manajemen Paket Umroh</small>
	</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="active"><i class="fa fa-object-group"></i> <span>Kategori Paket Umroh</span></li>
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
		}else if ($this->session->flashdata('hapus')) {
			echo "<div class='callout callout-danger' id='alert'>
				<h4><i class='icon fa fa-ban'></i>&nbsp; HAPUS</h4>
				<p>".$this->session->flashdata('hapus')."</p></div>";
			
	}
	?>
	<div class="row">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">List Kategori Paket Umroh</h3>
				<a href="<?=base_URL()?>admin/kategori_tambah" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Tambah Kategori Paket</a>
			</div>
			<!-- /.box-header -->

	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th style="text-align: center; width: 10%">NO</th>
				<th style="text-align: center">BANNER PAKET</th>
				<th style="text-align: center">KATEGORI PAKET</th>
				<th style="text-align: center">DEFINISI PAKET</th>
				<th style="text-align: center">AUTHOR</th>
				<th style="text-align: center; width: 15%">AKSI</th>
			</tr>
			</thead>

		<tbody>
			<?php
			$no = 1;
			foreach($kate as $k) :
			?>

				<?php
				$banner_kategori = 'avatar.jpg';
				if($k->banner_kategori && file_exists('assets/backend/images/kategori/'.$k->banner_kategori)) {
				$banner_kategori = $k->banner_kategori;
				}
				?>
			
			<tr>
				<td style="text-align: center"><b><?=$no?>.</b></td>
				<td style="text-align: center"><img src="<?=base_URL().'assets/backend/images/kategori/'.$banner_kategori?>" class="img-circle" alt="banner" style="height: 40px; width: 40px"/></td>
				<td style="text-align: center"><?=$k->kategori?></td>
				<td style="text-align: center"><?=$k->definisi_kategori?></td>
				<td style="text-align: center"><?=getAdmin($k->id_admin)?></td>
				<td style="text-align: center">
					<b>
						<a href="<?=base_URL()?>admin/kategori_edit/<?=$k->id_kategori?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a>
						<a href="<?=base_URL()?>admin/kategori_hapus/<?=$k->id_kategori?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a>
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