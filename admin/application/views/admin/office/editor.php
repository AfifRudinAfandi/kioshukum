<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				Office
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">

				<form method="post" action="<?php echo base_url('office/save'); ?>">
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" class="form-control" value="<?php echo $office_title; ?>" name="office_title" required>
					</div>
					
					<div class="form-group">
						<label for="text-input">City</label>
						<input type="text" min="0" class="form-control" name="office_city" value="<?php echo $office_city; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Link Map</label>
						<input type="text" min="0" class="form-control" name="office_direct_map" value="<?php echo $office_direct_map; ?>" required>
					</div>
					<div class="form-group">
						<label for="text-input">Address</label>
						<textarea class="form-control" name="office_address" required><?php echo $office_address; ?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $office_id; ?>" name="office_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save Office</button>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>