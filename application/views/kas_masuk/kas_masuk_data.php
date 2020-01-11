<section class="content-header">
      <h1>Kas Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="">Kas Masuk</li>
      </ol>
</section>

<section class="content">

<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Kas Masuk</h3></center>
			<div>
				<a href="<?=site_url('kas_masuk/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Tambah</i>
				</a>
				<a href="<?=site_url('kas_masuk/print')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-print"> Print</i>
				</a>
				<a href="<?=site_url('cetak_kas_masuk/cetak')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-print"> Print Filter</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Asal Dana</th>
						<th>Jumlah Dana</th>
						<th>Saldo Saat Ini</th>
						<th>Tanggal Masuk</th>
						<th>Actions</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%; "><?=$no++?></td>
						<td><?=$data->asal_dana?></td>
						<td><?=$data->jumlah?></td>
						<td><?=$data->saldo?></td>
						<td><?=$data->tanggal?></td>
						
						<td class="text-center" width="160px">
						<a href="<?=site_url('kas_masuk/edit/'.$data->kd_kas_masuk)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
						<a href="<?=site_url('kas_masuk/del/'.$data->kd_kas_masuk)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
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
						<th>Total Kas Masuk</th>
						<th colspan="6"><?= $jumlah['total_jumlah'] ;?></th>

					</tr>
				<tr>
						<th></th>
						<th>Total Saldo Saat Ini</th>
						<th colspan="6"><?= $saldo['total_saldo'] ;?></th>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
        
</section>