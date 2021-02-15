<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				Add New Service
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('service/save'); ?>">
					<div class="form-group">
						<label for="text-input">Category</label>
						<select class="form-control" name="service_category_id" required>
							<option value="" selected disabled>- Choose -</option>
							<?php foreach ($data_service_category as $row) { ?>
								<option value="<?= $row['category_id']; ?>" <?php if ($service_category_id == $row['category_id']) { echo 'selected'; } ?>><?= $row['category_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="text-input">Service Name</label>
						<input type="text" class="form-control" value="<?php echo $service_name; ?>" name="service_name" required>
					</div>
					<div class="form-group">
						<label for="text-input">Description</label>
						<textarea class="form-control" name="service_description" required><?php echo $service_description; ?></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">Our Cost</label>
						<input type="number" min="0" class="form-control" name="service_our_cost" value="<?php echo $service_our_cost; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Jabotabek Cost</label>
						<input type="number" min="0" class="form-control" name="service_jabotabek_cost" value="<?php echo $service_jabotabek_cost; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Surabaya Cost</label>
						<input type="number" min="0" class="form-control" name="service_surabaya_cost" value="<?php echo $service_surabaya_cost; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Other City Cost</label>
						<input type="number" min="0" class="form-control" name="service_other_cost" value="<?php echo $service_other_cost; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Note</label>
						<input type="text" class="form-control" name="service_note" value="<?php echo $service_note; ?>" required>
					</div>

					<div class="form-group">
						<input type="hidden" value="<?php echo $service_id; ?>" name="service_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Add New Slide</button>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>