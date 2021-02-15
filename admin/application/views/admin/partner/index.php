<div class="row">
	<div class="col-sm-4">
		<section class="panel">
			<header class="panel-heading">
				<?php if ($this->uri->segment(2) == 'edit') {
                    echo 'Edit Partner';
                } else {
                    echo 'Add New Partner';
                } ?>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('partner/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="partner_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_category_partner as $row) { ?>
								<option value="<?= $row['id']; ?>" <?php if ($partner_category_id == $row['id']) {
																						echo 'selected';
																					} ?>><?= $row['partner_category_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Partner Logo</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='partner_image' id='posts_image' value='<?php echo $partner_image; ?>' />
							</div>
							<div class="col-md-3">
								<button class="form-control btn btn-default btn-sm" id="btn_browse_image">Browse</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">Partner Name</label>
						<input type="text" class="form-control" value="<?php echo $partner_name; ?>" name="partner_name" required>
					</div>
					<div class="form-group">
						<label for="text-input">Partner Link</label>
						<input type="text" class="form-control" value="<?php echo $partner_link; ?>" name="partner_link" required>
					</div>
					<div class="form-group">
						<label for="text-input">Set as featured partner</label>
						<select class="form-control" name="set_as_home" required>
							<option value="1" <?php if($set_as_home == 1){echo "selected";} ?> >Yes</option>
							<option value="0" <?php if($set_as_home == 0){echo "selected";} ?> >No</option>
						</select>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $partner_id; ?>" name="partner_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<?php if ($this->uri->segment(2) == 'edit') { ?>
                            <button type="submit" class="btn btn-primary">Update Partner</button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Add New partner</button>
                        <?php } ?>
					</div>
				</form>

			</div>
		</section>
	</div>

	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				Partner
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message'); ?>
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>Logo</th>
								<th>Partner</th>
								<th>Partner Category</th>
								<th>Set as featured partner</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_partner as $row) { ?>
									<tr>
										<td width="100px"><img src="<?= $row['partner_image'] ?>" width="100px" /></td>
										<td>
											<b><?= $row['partner_name'] ?></b>
											<p><?= $row['partner_link'] ?></p>
										</td>
										<td>
											<?= $row['partner_category_name'] ?>
										</td>
										<td>
											<?php if($row['set_as_home'] == 1){echo "Yes";}else{echo "No";} ?>
										</td>
										<td>
											<a href="<?= base_url('partner/edit') ?>/<?= $row['partner_id'] ?>" title="Change (<?= $row['partner_name'] ?>)" class="btn btn-warning btn-xs">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('partner/delete') ?>/<?= $row['partner_id'] ?>" title="Delete (<?= $row['partner_name'] ?>)" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure ?..')">
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