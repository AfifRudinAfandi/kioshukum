<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				<?php if ($this->uri->segment(2) == 'edit') {
                    echo 'Edit FAQ';
                } else {
                    echo 'Add New FAQ';
                } ?>
				
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('frequently_ask_question/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="faq_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_faq_category as $row) { ?>
								<option value="<?= $row['id']; ?>" <?php if ($faq_category_id == $row['id']) {
																		echo 'selected';
																	} ?>><?= $row['category_faq_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="text-input">FAQ Question</label>
						<input type="text" class="form-control" value="<?php echo $faq_question; ?>" name="faq_question" required>
					</div>
					<div class="form-group">
						<label for="text-input">FAQ Answer</label>
						<textarea class="form-control" name="faq_answer" id="ckeditor" rows="10" required><?php echo $faq_answer; ?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $id; ?>" name="id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<?php if ($this->uri->segment(2) == 'edit') { ?>
                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                            <a href="<?php echo base_url('faq/delete') . '/' . $id; ?>" class="btn btn-danger">Remove FAQ</a>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Add New FAQ</button>
                        <?php } ?>					</div>
				</form>

			</div>
		</section>
	</div>
</div>