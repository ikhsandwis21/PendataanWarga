<section class="content-header">
      <h1>Kas Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Kas Keluar</li>
      </ol>
</section>

<section class="content">

<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Kas Keluar</h3></center>
			<div>
				<a href="<?=site_url('kas_keluar/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Tambah</i>
				</a>
				<a href="<?=site_url('kas_keluar/print')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-print"> Print</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Pengguna</th>
						<th>Keperluan</th>
						<th>Jumlah Pengeluaran</th>
						<th>Tanggal</th>
						<th>Actions</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%; "><?=$no++?></td>
						<td><?=$data->pengguna?></td>
						<td><?=$data->keperluan?></td>
						<td><?=$data->jumlah?></td>
						<td><?=$data->tanggal?></td>
						
						<td class="text-center" width="160px">
						<a href="<?=site_url('kas_keluar/edit/'.$data->kd_kas_keluar)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
						<a href="<?=site_url('kas_keluar/del/'.$data->kd_kas_keluar)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
						<i class="fa fa-trash"> Delete</i>
						</a>
					</form>
						</td>
					</tr>
					<thead>
					
				<?php
				} ?>
				<tr>
						<th></th>
						<th>Total Kas Keluar</th>
						<th colspan="6"><?= $jumlah['total_jumlah'] ;?></th>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
        
</section>