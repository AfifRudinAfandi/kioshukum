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
                                    <td><?php
									if($row['booking_status'] == 0){
										echo 'Pending';
									}else if($row['booking_status'] == 1){
										echo 'Proses';
									}else if($row['booking_status'] == 2){
										echo 'Selesai';
									}
									?></td>
                                    <td>
										<div class="btn-group">
											<button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fa fa-pencil-square-o fa-fw"></i> Set Status <span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="<?= base_url() ?>booking/setstatus/<?= $row['booking_id'] ?>/2">Selesai</a></li>
												<li><a href="<?= base_url() ?>booking/setstatus/<?= $row['booking_id'] ?>/1">Proses</a></li>
												<li><a href="<?= base_url() ?>booking/setstatus/<?= $row['booking_id'] ?>/0">Pending</a></li>
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
