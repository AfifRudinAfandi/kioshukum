<div class="row">
	<div class="col-sm-4">
		<section class="panel">
			<header class="panel-heading">
				Add New Menu
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url(); ?>menu/save">
					<div class="form-group">
						<label for="text-input">Title</label>
						<input type="text" id="text-input" class="form-control" value="<?php echo $menu_title; ?>" name="menu_title">
						<small><em>The name is how it appears on your site.</em></small>
					</div>
					<div class="form-group">
						<label for="text-input">Link Menu</label>
						<textarea class="form-control" name="menu_link"><?php echo $menu_link; ?></textarea>
						<small><em>Link Menu</em></small>
					</div>
					<div class="form-group">
						<label for="text-input">Description Menu</label>
						<textarea class="form-control" name="menu_description"><?php echo $menu_description; ?></textarea>
						<small><em>Description Menu</em></small>
					</div>
					<div class="form-group">
						<label>Icon Menu</label>
						<div class="row">
							<Div class="col-md-9">
								<input type='text' class='validate[required] form-control' name='menu_icon' id='posts_image' value='<?php echo $menu_icon; ?>' />
							</div>
							<div class="col-md-3">
								<button class="form-control btn btn-default btn-sm" id="btn_browse_image">Browse Icon</button>
							</div>
						</Div>
					</div>
					<div class="form-group">
						<label for="text-input">Parent</label>
						<select name="is_parent" class="form-control">
							<option value="0">Yes</option>
							<?php
							$menu = $this->db->get('tbl_menu');
							foreach ($menu->result() as $m) {
								echo "<option value='$m->menu_id' ";
								echo $m->menu_id == $is_parent ? 'selected' : '';
								echo ">" .  strtoupper($m->menu_title) . "</option>";
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<input type="hidden" value="<?php echo $menu_id; ?>" name="menu_id" />
						<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
						<button type="submit" class="btn btn-primary">Save Menu</button>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-sm-8">
		<section class="panel">
			<header class="panel-heading">
				MENU
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message'); ?>
				<div class="adv-table">
					<div class="table-responsive">
						<table class="display table table-bordered table-striped" id="dynamic-table">
							<thead>
								<tr>
									<th>Name</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!isset($data_menu)) {
									echo "Tidak ada berita";
								} else {
									foreach ($data_menu as $row) {
								?>
										<tr>
											<td><strong><?= $row['menu_title'] ?></strong>
												<!--<br/><?= $row['menu_link'] ?>-->
											</td>
											<td><a href="<?= base_url() ?>menu/edit/<?= $row['menu_id'] ?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> EDIT </a>
												<a href="<?= base_url() ?>menu/delete/<?= $row['menu_id'] ?>" title="Remove" class="btn btn-danger btn-xs">
													<i class="fa fa-trash-o"></i></a></td>
										</tr>
								<?php
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>