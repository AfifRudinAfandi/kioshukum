<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <?php echo $this->session->flashdata('message'); ?>
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Booking Date</th>
                                <th>Member</th>
                                <th>Service</th>
                                <th>Kota</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //$url = 'http://kioshukum.codekece.id/';
							$url = $this->config->item('base_url_sort'); 
                            foreach ($data_booking as $row) { ?>
                                <tr>
                                    <td><?= $row['booking_date'] ?></td>
                                    <td><?= $row['member_first_name'] ?></td>
                                    <td><?= $row['service_name'] ?></td>
                                    <td><?= $row['booking_city'] ?></td>
                                    <td><?= $row['booking_price'] ?></td>
                                    <td><?= $row['booking_status'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>booking/view/<?= $row['booking_id'] ?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> Change Status</a>
										<div class="btn-group">
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="<?= base_url() ?>booking/setstatus/<?= $row['booking_id'] ?>/1">Selesai</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li role="separator" class="divider"></li>
												<li><a href="#">Separated link</a></li>
											</ul>
										</div>
                                        <a href="<?= base_url() ?>booking/delete/<?= $row['booking_id'] ?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus data ini?..')">
                                            <i class="fa fa-trash-o"></i> Trash
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
