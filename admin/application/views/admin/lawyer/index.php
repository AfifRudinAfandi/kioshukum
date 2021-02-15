<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('lawyer/new'); ?>" class="btn btn-sm btn-primary">Add New lawyer</a>
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
								<th>Avatar</th>
								<th>lawyer_category_id</th>
								<th>Name</th>
								<th>Office</th>
								<th>Experien</th>
								<th>Study</th>
								<th>Legality</th>
								<th>Profile</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_lawyer)) {
								echo "Tidak ada lawyer";
							} else {
								foreach ($data_lawyer as $row) {
							?>
									<tr>
										<td><img src="<?= $row['lawyer_avatar'] ?>" width="100px" /></td>
										<td><?= $row['lawyer_category_name'] ?></td>
										<td><?= $row['lawyer_name'] ?></td>
										<td><?= $row['lawyer_office'] ?></td>
										<td><?= $row['lawyer_experien'] ?></td>
										<td><?= $row['lawyer_study'] ?></td>
										<td><?= $row['lawyer_legality'] ?></td>
										<td><?= $row['lawyer_profile'] ?></td>
										<td>
											<a href="<?= base_url('lawyer/edit') ?>/<?= $row['lawyer_id'] ?>" title="Change (<?= $row['lawyer_name'] ?>)" class="btn btn-warning btn-xs">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('lawyer/delete') ?>/<?= $row['lawyer_id'] ?>" title="Delete (<?= $row['lawyer_name'] ?>)" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a>
										</td>
									</tr>
							<?php
								}
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>