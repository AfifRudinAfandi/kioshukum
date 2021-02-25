<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				<?php if ($this->uri->segment(2) == 'edit') {
                    echo 'Edit Work';
                } else {
                    echo 'Add New Work';
                } ?>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('work/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="work_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_work_category as $row) { ?>
								<option value="<?= $row['id']; ?>" <?php if ($work_category_id == $row['id']) {
																						echo 'selected';
																					} ?>><?= $row['category_work_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>work_icon</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='work_icon' id='posts_image' value='<?php echo $work_icon; ?>' />
							</div>
							<div class="col-md-3">
								<button id="btn_browse_image" class="form-control btn btn-default btn-sm" >Browse Image</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" class="form-control" value="<?php echo $work_title; ?>" name="work_title" required>
					</div>
					<div class="form-group">
						<label for="text-input">Description</label>
						<textarea class="form-control" name="work_description" id="ckeditor" required><?php echo $work_description; ?></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">Link</label>
						<input type="text" class="form-control" value="<?php echo $work_link; ?>" name="work_link" required>
					</div>
					<div class="form-group">
						<label for="text-input">Label Button</label>
						<input type="text" class="form-control" value="<?php echo $work_label_button; ?>" name="work_label_button" required>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $id; ?>" name="id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<?php if ($this->uri->segment(2) == 'edit') { ?>
                            <button type="submit" class="btn btn-primary">Update Work</button>
                            <a href="<?php echo base_url('work/delete') . '/' . $id; ?>" class="btn btn-danger">Remove Work</a>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Add New Work</button>
                        <?php } ?>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>