<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('office/new'); ?>" class="btn btn-sm btn-primary">Add New Office</a>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-cog"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message'); ?>
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>office_title</th>
								<th>office_city</th>
								<th>office_direct_map</th>
								<th>office_address</th>
								<th>date_create</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_office as $row) {?>
									<tr>
										<td>
											<?=$row['office_title']?>
										</td>
										<td><?=$row['office_city']?></td>
										<td><?=$row['office_direct_map']?></td>
										<td><?=$row['office_address']?></td>
										<td><?=$row['date_create']?></td>
										<td>
											
											<a href="<?= base_url('office/edit') ?>/<?= $row['office_id'] ?>" title="Change (<?= $row['office_title'] ?>)" class="btn btn-warning btn-xs">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('office/delete') ?>/<?= $row['office_id'] ?>" title="Delete (<?= $row['office_title'] ?>)" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a>

										</td>
									</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>