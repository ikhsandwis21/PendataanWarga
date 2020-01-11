<section class="content-header">
      <h1>Warga</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Warga</li>
      </ol>
</section>

<section class="content">

<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Data Warga</h3></center>
			<div>
				<a href="<?=site_url('warga/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"> Create</i>
				</a>

				<a href="<?=site_url('warga/print')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-print"> Print</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table id="table1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>TTL</th>
						<th>No.Rumah</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Status</th>
						<th>Pekerjaan</th>
						<th>Status Tinggal</th>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
						<th>Actions</th>
						<?php } ?>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%; "><?=$no++?></td>
						<td><?=$data->nik?></td>
						<td><?=$data->nama?></td>
						<td><?=$data->ttl?></td>
						<td><?=$data->alamat?></td>
						<td><?=$data->jenis_kelamin?></td>
						<td><?=$data->agama?></td>
						<td><?=$data->status?></td>
						<td><?=$data->pekerjaan?></td>
						<td><?=$data->status_tinggal?></td>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
						<td class="text-center" width="160px">
						<a href="<?=site_url('warga/edit/'.$data->nik)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
						<a href="<?=site_url('warga/del/'.$data->nik)?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
						<i class="fa fa-trash"> Delete</i>
						</a>
						<?php } ?>
					</form>
						</td>
					</tr>
				<?php
				} ?>
				</tbody>
			</table>
		</div>
	</div>
        
</section>