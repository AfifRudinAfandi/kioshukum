<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url(); ?>admin/new_event" class="btn btn-sm btn-primary">Add New EVENT</a>
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
								<th>Title</th>
								<th>Date</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_event)){  
								echo "Tidak ada event";  
							}else{
								foreach ($data_event as $row) {
								?>                            
								<tr>
									<td><?=$row['event_title']?><small><em> <a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>" target="_admin">View</a></em></small></td>
									<td><?=$row['event_date']?></td>
									<td>
									<a href="<?=base_url()?>admin/edit_event/<?=$row['event_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT</a>
									<a href="<?=base_url()?>admin/del_event/<?=$row['event_id']?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus event dengan judul : <?=$row[ 'event_title']?> ?..')">
									<i class="fa fa-trash-o"></i>
									</a>
									</td>
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