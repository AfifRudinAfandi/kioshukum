<div class="row">
    <div class="col-sm-4">
        <section class="panel">
			<header class="panel-heading">
				FORM
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
            <div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>member/save">
					<div class="form-group">
						<label for="text-input">Full Name</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" id="text-input" class="form-control" value="<?php echo $member_first_name; ?>" name="member_first_name">
							</div>
							<div class="col-sm-6">
								<input type="text" id="text-input" class="form-control" value="<?php echo $member_last_name; ?>" name="member_last_name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="text-input">member_phone</label>
						<input type="tel" id="text-input" class="form-control" value="<?php echo $member_phone; ?>" name="member_phone">
					</div>
					<div class="form-group">
						<label for="text-input">member_email</label>
						<input type="mail" id="text-input" class="form-control" value="<?php echo $member_email; ?>" name="member_email">
					</div>
					<div class="form-group">
						<label for="text-input">Password</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $member_password; ?>" name="member_password">
						<?php if($editor_status == 'edit'){echo'</small>* kosongkan jika tidak ingin merubah password.</small>';}?>
					</div>					
					<div class="form-group">
						<input type="hidden" value="<?php echo $member_id; ?>" name="member_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save User</button>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-sm-8">
        <section class="panel">
			<header class="panel-heading">
				MEMBER
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
									<th>Full Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Opsi</th>
								</tr>
								</thead>
							<tbody>
								<?php foreach ($data_member as $row) { ?>                             
								<tr>
									<td><?=$row['member_first_name']?> <?=$row['member_last_name']?></td>
									<td><?=$row['member_phone']?></td>
									<td><?=$row['member_email']?></td>
									<td><a href="<?=base_url()?>member/edit/<?=$row['member_id']?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>  
									<a href="<?=base_url()?>member/delete/<?=$row['member_id']?>" title="Remove" class="btn btn-danger btn-xs">
									<i class="fa fa-trash-o"></i></a></td>
								</tr>
								<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
						