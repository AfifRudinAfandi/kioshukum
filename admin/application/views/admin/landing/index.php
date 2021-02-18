<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <a href="<?php echo base_url(); ?>landing/new" class="btn btn-sm btn-primary">Add New Landing</a>
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
                                <th>Landing</th>
                                <th>Url</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //$url = 'http://kioshukum.codekece.id/';
			    $url = $this->config->item('base_url_sort'); 
                            foreach ($data_landing as $row) { ?>
                                <tr>
                                    <td><?= $row['landing_name'] ?></td>
                                    <td><a href="<?= $url ?>page/<?= $row['landing_id'] ?>/<?= $row['landing_slug'] ?>"><code><?= $url ?>page/<?= $row['landing_id'] ?>/<?= $row['landing_slug'] ?></code></a></td>
                                    <td>
                                        <a href="<?= base_url() ?>landing/edit/<?= $row['landing_id'] ?>" title="Change" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> Change</a>
                                        <a href="<?= base_url() ?>landing/delete/<?= $row['landing_id'] ?>" title="Remove" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin akan Menghaspus PAGE dengan judul : <?= $row['landing_name'] ?> ?..')">
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
