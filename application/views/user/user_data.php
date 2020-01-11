<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>


<section class="content-header">
      <h1>Users</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
      </ol>
</section>

<section class="content">
      <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<center><h3 class="box-tittle">Data Users</h3></center>
			<div>
				<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"> Create</i>
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">

			<table id="table1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Name</th>
						<th>Address</th>
						<th>Level</th>
						<th>Actions</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($row->result() as $key => $data) { ?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->username?></td>
						<td><?=$data->name?></td>
						<td><?=$data->address?></td>
						<td><?php
							if($data->level == 1){
								echo "Admin";
							}
							elseif ($data->level == 2){ 
								echo "RT";
							}else{
								echo "Bendahara";
							}
						  ?></td>
						<td class="text-center" width="160px">
						<form action="<?=site_url('user/del')?>" method="post">
							<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"> Update</i>
						</a>
					
						<input type="hidden" name="user_id" value="<?=$data->user_id?>">
						<button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
							<i class="fa fa-trash"> Delete</i>
						</button>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>