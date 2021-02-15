<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('slide/new'); ?>" class="btn btn-sm btn-primary">Add New Slide</a>
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
								<th>Slide</th>
								<th>Details</th>
								<th>Category</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_slide)) {
								echo "Tidak ada slide";
							} else {
								foreach ($data_slide as $row) {
							?>
									<tr>
										<td><img src="<?= $row['slide_image'] ?>" width="100px" /></td>
										<td>
											<p><span class="label label-primary"> <?= $row['slide_label'] ?> </span></p>
											<b><?= $row['slide_title'] ?></b>
											<p><?= $row['slide_description'] ?></p>


											<a href="<?= base_url('slide/edit') ?>/<?= $row['slide_id'] ?>" title="Change (<?= $row['slide_title'] ?>)" class="btn btn-warning btn-xs  btn-action">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('slide/delete') ?>/<?= $row['slide_id'] ?>" title="Delete (<?= $row['slide_title'] ?>)" class="btn btn-danger btn-xs  btn-action" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a>
										</td>

										<td><?= $row['slide_category_title'] ?></td>
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