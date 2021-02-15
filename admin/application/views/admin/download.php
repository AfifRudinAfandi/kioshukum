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
				<form method="post" action="<?php echo base_url(); ?>admin/save_download" enctype="multipart/form-data">
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" id="text-input" class="form-control" name="download_title">
						<small><em>The name is how it appears on your site.</em></small>
					</div>
					<div class="form-group">
						<label for="text-input">File</label>
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse <input type="file" name="download_file" multiple required>
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
						<span class="help-block">
							Try selecting one or more files .pdf .doc .zip .rar and watch the feedback
						</span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Save File</button>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-8">
		<section class="panel">
			<header class="panel-heading">
				DOWNLOAD
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
								<?php if (!isset($data_download)){  
									echo "ERROR!!! NOT FOUNT";  
								}else{
									foreach ($data_download as $row) {
									?>                             
									<tr>
										<td><strong><?=$row['download_title']?></strong> / <small><?=$row['download_file']?></small></td>
										<td> 
										<a href="<?=base_url()?>admin/del_download/<?=$row['download_id']?>" title="Remove" class="btn btn-danger btn-xs">
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