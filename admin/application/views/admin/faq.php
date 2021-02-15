<div class="row">
    <div class="col-sm-4">
        <section class="panel">
            <header class="panel-heading">
                EDITOR FAQ
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>admin/save_faq">
					<div class="form-group">
						<label for="text-input">Question</label>
						<textarea class="form-control" name="faq_question" required><?php echo $faq_question; ?></textarea>
					</div>
					<div class="form-group">
						<label for="text-input">Answer</label>
						<textarea class="form-control" name="faq_answer" required><?php echo $faq_answer; ?></textarea>
					</div>
					<div class="form-group">
						<input type="hidden" value="<?php echo $faq_id; ?>" name="faq_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save Faq</button>
					</div>
				</form>
			</div>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                DATA FAQ
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
								<th>Faq</th>
								<th>Opsi</th>
							</tr>
							</thead>
						<tbody>
							<?php if (!isset($data_faq)){  
								echo "ERROR!!! NOT FOUNT";  
							}else{
								foreach ($data_faq as $row) {
								?>                             
								<tr>
									<td><strong><?=$row['faq_question']?></strong><br/>
									<small><?=$row['faq_answer']?></small>
									</td>
									<td><a href="<?=base_url()?>admin/edit_faq/<?=$row['faq_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
									<a href="<?=base_url()?>admin/del_faq/<?=$row['faq_id']?>" title="Remove" class="btn btn-danger btn-xs">
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