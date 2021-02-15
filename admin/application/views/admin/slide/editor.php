<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				<?php if ($this->uri->segment(2) == 'edit') {
                    echo 'Edit Slide';
                } else {
                    echo 'Add New Slide';
                } ?>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('slide/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="slide_id_category" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_slide_category as $row) { ?>
								<option value="<?= $row['slide_category_id']; ?>" <?php if ($slide_id_category == $row['slide_category_id']) {
																						echo 'selected';
																					} ?>><?= $row['slide_category_title'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="text-input">Label</label>
						<input type="text" class="form-control" value="<?php echo $slide_label; ?>" name="slide_label" required>
					</div>
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" class="form-control" value="<?php echo $slide_title; ?>" name="slide_title" required>
					</div>
					<div class="form-group">
						<label for="text-input">Description</label>
						<textarea class="form-control" name="slide_description" required><?php echo $slide_description; ?></textarea>
					</div>
					<div class="form-group">
						<label>Slide Image</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='slide_image' id='posts_image' value='<?php echo $slide_image; ?>' />
							</div>
							<div class="col-md-3">
								<button id="btn_browse_image" class="form-control btn btn-default btn-sm" >Browse</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">Link</label>
						<input type="text" class="form-control" value="<?php echo $slide_link; ?>" name="slide_link" required>
					</div>

					<div class="form-group">
						<input type="hidden" value="<?php echo $slide_id; ?>" name="slide_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<?php if ($this->uri->segment(2) == 'edit') { ?>
                            <button type="submit" class="btn btn-primary">Update Slide</button>
                            <a href="<?php echo base_url('slide/delete') . '/' . $slide_id; ?>" class="btn btn-danger">Remove Slide</a>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Add New Slide</button>
                        <?php } ?>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>