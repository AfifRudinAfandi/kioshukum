<div class="row">
	<div class="col-md-4">
		<section class="panel">
			<header class="panel-heading">
				FORM
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_photo" enctype="multipart/form-data">
					<div class="form-group">
						<label for="text-input">Photo</label>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse <input type="file" name="gallery_data" multiple required>
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="text-input">Album</label>
						<select  class="form-control" name="gallery_album_id" required>
							<option value="" disabled selected></option>
						<?php if (!isset($data_gallery_album)){  
								echo "ERROR!!! NOT FOUNT";  
							}else{
								foreach ($data_gallery_album as $row) {
								?>
							<option value="<?=$row['gallery_album_id']?>"><?=$row['gallery_album_title']?></option>
								<?php
							}
						}?>
						</select>
						<small><em>Select album gallery.</em></small>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save Photo</button>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				PHOTO GALLERY
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
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php if (!isset($data_gallery_photo)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_gallery_photo as $row) {
									?>                             
									<tr>
										<td><strong><?=$row['gallery_data']?></strong> / <small><?=$row['gallery_album_title']?></small></td>
										<td> 
										<a href="<?=base_url()?>admin/del_gallery_photo/<?=$row['gallery_id']?>" title="Remove" class="btn btn-danger btn-xs">
										<i class="fa fa-trash-o"></i></a></td>
									</tr>
									<?php
									}  
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>					