<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('service/new'); ?>" class="btn btn-sm btn-primary">Add New Slide</a>
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
								<th>Service Name</th>
								<th>Category</th>
								<th>Description</th>
								<th>Our Cost</th>
								<th>Jabotabek Cost</th>
								<th>Surabaya Cost</th>
								<th>Other City Cost</th>
								<th>Note</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_service)) {
								echo "Tidak ada slide";
							} else {
								foreach ($data_service as $row) {
							?>
									<tr>
										<td>
											<?=$row['service_name']?>
											
											<p style="margin-top: 10px">
											<a href="<?= base_url('service/edit') ?>/<?= $row['service_id'] ?>" title="Change (<?= $row['service_name'] ?>)" class="btn btn-warning btn-xs  btn-action">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('service/delete') ?>/<?= $row['service_id'] ?>" title="Delete (<?= $row['service_name'] ?>)" class="btn btn-danger btn-xs  btn-action" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a>
											</p>
										</td>
										<td><?=$row['category_name']?></td>
										<td><?=$row['service_description']?></td>
										<td><?='Rp. '.number_format($row['service_our_cost'], 0, ',', '.')?></td>
										<td><?='Rp. '.number_format($row['service_jabotabek_cost'], 0, ',', '.')?></td>
										<td><?='Rp. '.number_format($row['service_surabaya_cost'], 0, ',', '.')?></td>
										<td><?='Rp. '.number_format($row['service_other_cost'], 0, ',', '.')?></td>
										<td><?=$row['service_note']?></td>
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