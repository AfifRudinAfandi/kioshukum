<div class="row">
    <div class="col-sm-4">
        <section class="panel">
            <header class="panel-heading">
                <?php if ($this->uri->segment(2) == 'category_edit') {
                    echo 'Edit Slide Category';
                } else {
                    echo 'Add New Slide Category';
                } ?>

                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url('slide/category_save'); ?>">
                    <div class="form-group">
                        <label for="text-input">Name</label>
                        <input type="text" id="text-input" class="form-control" value="<?php echo $slide_category_title; ?>" name="slide_category_title">
                        <small><em>The name is how it appears on your site.</em></small>
                    </div>
                    <div class="form-group">
                        <label for="text-input">Description</label>
                        <textarea type="text" id="text-input" class="form-control" name="slide_category_description" rows="8"><?php echo $slide_category_description; ?></textarea>
                        <small><em>The description is not prominent by default; however, some themes may show it.</em></small>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $slide_category_id; ?>" name="slide_category_id" />
                        <input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
                        <?php if ($this->uri->segment(2) == 'category_edit') { ?>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="<?php echo base_url('slide/category_delete') . '/' . $slide_category_id; ?>" class="btn btn-danger">Remove Category</a>
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
                                <th>Category</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_slide_category as $row) { ?>
                                <tr>
                                    <td>
                                        <h5><?= $row['slide_category_title'] ?></h5>

                                        <p> <small><?= $row['slide_category_description'] ?></small> </p>

                                        <a href="<?= base_url('slide/category_edit') ?>/<?= $row['slide_category_id'] ?>" title="Edit (<?= $row['slide_category_title'] ?>)" class="btn btn-warning btn-xs  btn-action">
                                            <i class="fa fa-pencil-square-o fa-fw"></i> Change </a>
                                        <a href="<?= base_url('slide/category_delete') ?>/<?= $row['slide_category_id'] ?>" title="Delete (<?= $row['slide_category_title'] ?>)" class="btn btn-danger btn-xs  btn-action">
                                            <i class="fa fa-trash-o"></i> Trash</a>
                                    </td>
                                    <td><a href="<?= base_url() ?>category/<?= $row['slide_category_id'] ?>/<?= $row['slide_category_slug'] ?>"> <?= $row['slide_category_slug'] ?> </a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>