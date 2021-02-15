<div class="row">
	<div class="col-sm-4">
		<section class="panel">
			<header class="panel-heading">
				<?php if ($this->uri->segment(2) == 'edit') {
                    echo 'Edit Testimonial';
                } else {
                    echo 'Add New Testimonial';
                } ?>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>testimonial/save">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="testimonial_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($testimonial_category_data as $row) { ?>
								<option value="<?= $row['id']; ?>" <?php if ($testimonial_category_id == $row['id']) {
																						echo 'selected';
																					} ?>><?= $row['testimonial_category_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Testimonia Avatar</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='testimonial_avatar' id='posts_image' value='<?php echo $testimonial_avatar; ?>' />
							</div>
							<div class="col-md-3">
								<button class="form-control btn btn-default btn-sm" id="btn_browse_image">Browse</button>
							</div>
						</Div>
					</div>
					<label>Testimonial Name</label>
					<div class="form-group">
						<input type="text" name="testimonial_name" value="<?php echo $testimonial_name; ?>" class="form-control" required="required" />
					</div>
					<label>Testimonial Company</label>
					<div class="form-group">
						<input type="text" name="testimonial_company" value="<?php echo $testimonial_company; ?>" class="form-control" required="required" />
					</div>
					<label>Testimonial</label>
					<div class="form-group">
						<textarea name="testimonial" class="form-control" required="required" rows="6"><?php echo $testimonial; ?></textarea>
					</div>
					<label>Testimonial Status</label>
					<div class="form-group">
						<select name="testimonial_status" class="form-control" required>
							<option value="" selected disabled>- choose -</option>
							<option value="0" <?php if ($testimonial_status == '0') {
													echo 'selected';
												} ?>>Padding</option>
							<option value="1" <?php if ($testimonial_status == '1') {
													echo 'selected';
												} ?>>Publish</option>
						</select>
					</div>
					<div class="form-group">
						<label for="text-input">Set as featured testimonial</label>
						<select class="form-control" name="set_as_home" required>
							<option value="1" <?php if($set_as_home == 1){echo "selected";} ?> >Yes</option>
							<option value="0" <?php if($set_as_home == 0){echo "selected";} ?> >No</option>
						</select>
					</div>
					<input type="hidden" value="<?php echo $testimonial_id; ?>" name="testimonial_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<?php if ($this->uri->segment(2) == 'edit') { ?>
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                    <a href="<?php echo base_url('testimonial/delete') . '/' . $testimonial_id; ?>" class="btn btn-danger">Remove Testimonial</a>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary">Add New Testimonial</button>
                <?php } ?>


				</form>
			</div>
		</section>
	</div>

	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				testimonial
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message'); ?>
				<div class="adv-table">
					<div class="table-responsive">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Avatar</th>
									<th>Testimonial</th>
									<th>Category</th>
									<th>Set as Home</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_testimonial as $row) { ?>
									<tr>
										<td><img src="<?= $row['testimonial_avatar'] ?>" class="img-responsive" style="max-width: 56px;" /></td>
										<td>
											<p><b><?= $row['testimonial_name'] ?></b><br />
												<?= $row['testimonial_company'] ?></p>

											<p>"<?= $row['testimonial'] ?>"</p>
										</td>
										<td><?= $row['testimonial_category_name'] ?></td>
										<td><?php if($row['set_as_home'] == 1){echo "Yes";}else{echo "No";} ?></td>
										<td>
											<?php if ($row['testimonial_status'] == '1') {
												echo '<span class="label label-success">Publish</span>';
											} else {
												echo '<span class="label label-danger">Padding</span>';
											} ?>
										</td>
										<td>
											<a href="<?= base_url() ?>testimonial/edit/<?= $row['testimonial_id'] ?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> Change</a>
											<a href="<?= base_url() ?>testimonial/delete/<?= $row['testimonial_id'] ?>" title="Remove" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Trash</a>

										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>