<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('work/new'); ?>" class="btn btn-sm btn-primary">Add New Work</a>
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
								<th>work_icon</th>
								<th>work_category_name</th>
								<th>work_title</th>
								<th>work_description</th>
								<th>work_link</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_work as $row) { ?>
							<tr>
								<td><img src="<?= $row['work_icon'] ?>" width="100px" /></td>
								<td><?= $row['category_work_name'] ?></td>
								<td><?= $row['work_title'] ?></td>
								<td><?= $row['work_description'] ?></td>
								<td><?= $row['work_link'] ?></td>
								<td>
									<a href="<?= base_url('work/edit') ?>/<?= $row['work_id'] ?>" title="Change (<?= $row['work_title'] ?>)" class="btn btn-warning btn-xs">
										<i class="fa fa-pencil-square-o fa-fw"></i> Change
									</a>
									<a href="<?= base_url('work/delete') ?>/<?= $row['work_id'] ?>" title="Delete (<?= $row['work_title'] ?>)" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure ?..')">
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