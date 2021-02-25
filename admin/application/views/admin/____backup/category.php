<div class="row">
    <div class="col-sm-4">
        <section class="panel">
            <header class="panel-heading">
                EDITOR CATEGORY
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_category">
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $category_title; ?>" name="category_title">
						<small><em>The name is how it appears on your site.</em></small>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $category_id; ?>" name="category_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save Category</button>
					</div>
				</form>
			</div>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                DATA CATEGORY
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
				<?php echo $this->session->flashdata('message');?>
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>Category</th>
								<th>Opsi</th>
							</tr>
							</thead>
						<tbody>
							<?php if (!isset($data_category)){  
								echo "ERROR!!! NOT FOUNT";  
							}else{
								foreach ($data_category as $row) {
								?>                             
								<tr>
									<td><strong><?=$row['category_title']?></strong><br/>
									<small><?=base_url()?>category/<?=$row['category_id']?>/<?=$row['category_slug']?></small>
									</td>
									<td><a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
									<a href="<?=base_url()?>admin/del_category/<?=$row['category_id']?>" title="Remove" class="btn btn-danger btn-xs">
									<i class="fa fa-trash-o"></i></a></td>
								</tr>
								<?php
								}  
							}?>
						</tbody>
					</table>
                </div> 
            </div>
        </section>
    </div>
</div>