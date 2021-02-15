<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url('frequently_ask_question/new'); ?>" class="btn btn-sm btn-primary">Add New Faq</a>
				<span class="tools pull-right">
					<a href="javascript:;" class="fa fa-chevron-down"></a>
					<a href="javascript:;" class="fa fa-cog"></a>
					<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">
				<?php echo $this->session->flashdata('message'); ?>
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="dynamic-table">
						<thead>
							<tr>
								<th>FAQ</th>
								<th>Category</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($data_faq)) {
								echo "Tidak ada faq";
							} else {
								foreach ($data_faq as $row) {
							?>
									<tr>
										<td>

											<p>
												<b><?= $row['faq_question'] ?></b>
											<ul>
												<li><?= $row['faq_answer'] ?></li>
											</ul>
											</p>

											<a href="<?= base_url('frequently_ask_question/edit') ?>/<?= $row['faq_id'] ?>" title="Change (<?= $row['faq_question'] ?>)" class="btn btn-warning btn-xs  btn-action">
												<i class="fa fa-pencil-square-o fa-fw"></i> Change
											</a>
											<a href="<?= base_url('frequently_ask_question/delete') ?>/<?= $row['faq_id'] ?>" title="Delete (<?= $row['faq_question'] ?>)" class="btn btn-danger btn-xs  btn-action" onClick="return confirm('Are you sure ?..')">
												<i class="fa fa-trash-o"></i> Trash
											</a>
										</td>
										<td><?= $row['category_faq_name'] ?></td>
									</tr>
							<?php
								}
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>