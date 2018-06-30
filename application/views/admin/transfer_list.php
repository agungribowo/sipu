<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Form Bukti Transfer PT SGS
	<small>Manajemen Data Bukti Transfer</small>
	</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_URL()?>admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="active"><i class="fa fa-camera-retro"></i> <span>Data Bukti Transfer PT SGS</span></li>
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
				<h3 class="box-title">Data Bukti Transfer PT SGS</h3>
				<a href="<?=base_URL()?>admin/transfer_tambah" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Tambah Bukti Transfer</a>
			</div>
			<!-- /.box-header -->

	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th style="text-align: center">NO</th>
				<th style="text-align: center">ID TRANSFER</th>
				<th style="text-align: center">TANGGAL TRANSFER</th>
				<th style="text-align: center">NAMA REKENING</th>
				<th style="text-align: center">NO REKENING</th>
				<th style="text-align: center">FOTO BUKTI TRANSFER</th>
			</tr>
			</thead>

		<tbody>
			<?php
			$no = 1;
			foreach($bkt as $t) :
			?>

			<?php
				$bukti= 'avatar.jpg';
				if($t->bukti && file_exists('assets/backend/images/bukti_transfer/'.$t->bukti)) {
				$bukti = $t->bukti;
			}
			?>
			<tr>
				<td style="text-align: center"><b><?=$no?>.</b></td>
				<td style="text-align: center"><?=$t->id_transfer?></td>
				<td style="text-align: center"><?=$t->tgl_transfer?></td>
				<td style="text-align: center"><?=$t->nama_rekening?></td>
				<td style="text-align: center"><?=$t->no_rekening?></td>
				<td style="text-align: center"><img src="<?=base_URL().'assets/backend/images/bukti_transfer/'.$bukti?>" class="img-circle" alt="bukti" style="height: 40px; width: 40px"/></td>
				<td style="text-align: center">
					<b>
						<a href="<?=base_URL()?>admin/transfer_detail/<?=$t->id_transfer?>" class="btn btn-xs btn-info btn-flat" title="Detail Data"><i class="fa fa-search"></i></a>
						<a href="<?=base_URL()?>admin/transfer_edit/<?=$t->id_transfer?>" class="btn btn-xs btn-warning btn-flat" title="Edit Data"><i class="fa fa-edit"></i></a>
						<a href="<?=base_URL()?>admin/transfer_hapus/<?=$t->id_transfer?>" onclick="return confirm('Kamu yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></a>
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