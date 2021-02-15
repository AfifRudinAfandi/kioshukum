<div class="row">
    <div class="col-sm-4">
        <section class="panel">
            <header class="panel-heading">
                <?php if ($this->uri->segment(2) == 'category_edit') {
                    echo 'Edit Service Category';
                } else {
                    echo 'Add Service Category';
                } ?>

                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url('service/category_save'); ?>">
                    <div class="form-group">
                        <label>Icon</label>
                        <div class="row">
                            <Div class="col-md-9">
                                <input type='text' class='validate[required] form-control' name='category_icon' id='posts_image' value='<?php echo $category_icon; ?>' />
                            </div>
                            <div class="col-md-3">
                                <button class="form-control btn btn-default btn-sm" id="btn_browse_image">Browse</button>
                            </div>
                        </Div>
                    </div>
                    <div class="form-group">
                        <label for="text-input">Name</label>
                        <input type="text" id="text-input" class="form-control" value="<?php echo $category_name; ?>" name="category_name">
                        <small><em>The name is how it appears on your site.</em></small>
                    </div>
                    <div class="form-group">
                        <label for="text-input">Description</label>
                        <textarea type="text" id="text-input" class="form-control" name="category_description" rows="8"><?php echo $category_description; ?></textarea>
                        <small><em>The description is not prominent by default; however, some themes may show it.</em></small>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" />
                        <input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
                        <?php if ($this->uri->segment(2) == 'category_edit') { ?>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="<?php echo base_url('service/category_delete') . '/' . $category_id; ?>" class="btn btn-danger">Remove Category</a>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary">Add New Category</button>
                        <?php } ?>


                    </div>
                </form>
            </div>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                Slide Category
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
                                <th>Icon</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_service_category as $row) { ?>
                                <tr>
                                    <td><img src="<?= $row['category_icon'] ?>" class="img-responsive" /></td>
                                    <td>
                                        <h5><?= $row['category_name'] ?></h5>
                                    </td>
                                    <td>
                                        <?= $row['category_description'] ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('service/category_edit') ?>/<?= $row['category_id'] ?>" title="Edit (<?= $row['category_name'] ?>)" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil-square-o fa-fw"></i> Change </a>
                                        <a href="<?= base_url('service/category_delete') ?>/<?= $row['category_id'] ?>" title="Delete (<?= $row['category_name'] ?>)" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i> Trash</a>
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