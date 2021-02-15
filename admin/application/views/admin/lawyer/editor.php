<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				Add New Lawyer
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('lawyer/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="lawyer_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_lawyer_category as $row) { ?>
								<option value="<?= $row['id']; ?>" <?php if ($lawyer_category_id == $row['id']) {
																						echo 'selected';
																					} ?>><?= $row['lawyer_category_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>lawyer_avatar</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='lawyer_avatar' id='posts_image' value='<?php echo $lawyer_avatar; ?>' />
							</div>
							<div class="col-md-3">
								<button id="btn_browse_image" class="form-control btn btn-default btn-sm" >Browse Image</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_name</label>
						<input type="text" class="form-control" value="<?php echo $lawyer_name; ?>" name="lawyer_name" required>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_office</label>
						<input type="text" class="form-control" value="<?php echo $lawyer_office; ?>" name="lawyer_office" required>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_profile</label>
						<textarea class="form-control" name="lawyer_profile" required><?php echo $lawyer_profile; ?></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_experien</label>
						<input type="text" class="form-control" value="<?php echo $lawyer_experien; ?>" name="lawyer_experien" required>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_study</label>
						<input type="text" class="form-control" value="<?php echo $lawyer_study; ?>" name="lawyer_study" required>
					</div>
					<div class="form-group">
						<label for="text-input">lawyer_legality</label>
						<input type="text" class="form-control" value="<?php echo $lawyer_legality; ?>" name="lawyer_legality" required>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $id; ?>" name="id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Add New Slide</button>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>