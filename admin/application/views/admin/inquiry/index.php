<div class="row">
	<div class="col-sm-12">
        <section class="panel">
			<header class="panel-heading">
				inquiry
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
				<div class="adv-table">
					<div class="table-responsive">
						<table  class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Type</th>
									<th>Message</th>
									<th>Date</th>
									<th></th>
								</tr>
								</thead>
							<tbody>
								<?php foreach ($data_inquiry as $row) { ?>                             
									<tr>
										<td><?=$row['inquiry_name']?></td>
										<td><?=$row['inquiry_email']?></td>
										<td><?=$row['inquiry_phone']?></td>
										<td><?=$row['inquiry_type']?></td>
										<td><?=$row['inquiry_message']?></td>
										<td><?=$row['at_date_time']?></td>
										<td><a href="<?= base_url('inquiry/delete') ?>/<?= $row['inquiry_id'] ?>" title="Delete inquiry from (<?= $row['inquiry_name'] ?>)" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a></td>
									</tr>
								<?php }  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
						