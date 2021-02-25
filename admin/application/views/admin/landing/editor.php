<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <?php if ($editor_status == 'edit') {
                    echo 'Edit Landing Page';
                } else {
                    echo 'Add New Landing Page';
                } ?>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <form method="post" class="form-horizontal" action="<?php echo base_url(); ?>landing/save">
                      
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Landing Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="landing_name" value="<?php echo $landing_name; ?>" class="form-control" required="required" />
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Landing Slide</label>
                        <div class="col-sm-6">
                            <select name="landing_slide" class="form-control">
                                <!-- <option value="" selected>default</option> -->
                                <?php foreach ($data_slide_category as $row) { ?>
                                    <option value="<?= $row['slide_category_id']; ?>" <?php if ($landing_slide == $row['slide_category_id']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $row['slide_category_title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Section 1 - Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="s1_landing_title" value="<?php echo $s1_landing_title; ?>" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Section 1 - Content</label>
                        <div class="col-sm-6">
                            <textarea name="s1_landing_content" class="form-control"><?php echo $s1_landing_content; ?></textarea>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Section 2</label>
                        <div class="col-sm-6">
                            <?php if($section2_on == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="section2_on" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="section2_on"  value="1">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Section 2 - Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="s2_landing_title" value="<?php echo $s2_landing_title; ?>" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Feature 1</label>
                        <div class="col-sm-6">

                            <?php
                            if ($s2_landing_icon1 != "") {
                                echo "<img src='$s2_landing_icon1' class='m-bot15 img-responsive' style='border: solid 4px #eee; background: darkgrey; max-width:100px;'/>";
                                echo '<div class="input-group m-bot15">';
                                echo "<input type='text' class='validate[required] form-control' name='s2_landing_icon1' id='posts_image' value='$s2_landing_icon1'/>";
                                echo '<span class="input-group-btn">
                                <button class="btn btn-default btn-sm" id="btn_browse_image">Browse</button>
                                </span>';
                                echo '</div>';
                            } else {
                                echo '<div class="input-group m-bot15">';
                                echo '<input type="text" class="validate[required] form-control" name="s2_landing_icon1" id="posts_image"/>';
                                echo '<span class="input-group-btn">
                                <button class="btn btn-default btn-sm" id="btn_browse_image">Browse</button>
                                </span>';
                                echo '</div>';
                            }
                            ?>

                            <div class="m-bot15">
                                <input type="text" name="s2_landing_title1" value="<?php echo $s2_landing_title1; ?>" class="form-control" />
                            </div>

                            <div class="m-bot15">
                                <textarea name="s2_landing_description1" class="form-control"><?php echo $s2_landing_description1; ?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Feature 2</label>
                        <div class="col-sm-6">
                            
                                <?php
                                if ($s2_landing_icon2 != "") {
                                    echo "<img src='$s2_landing_icon2' class='m-bot15 img-responsive' style='border: solid 4px #eee; background: darkgrey; max-width:100px;' />";
                                    echo '<div class="input-group m-bot15">';
                                    echo "<input type='text' class='validate[required] form-control' name='s2_landing_icon2' id='posts_image2' value='$s2_landing_icon2'/>";
                                     echo '<span class="input-group-btn">
                                <button class="btn btn-default btn-sm" id="btn_browse_image2">Browse</button>
                                </span>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="input-group m-bot15">';
                                    echo '<input type="text" class="validate[required] form-control" name="s2_landing_icon2" id="posts_image2"/>';
                                    echo '<span class="input-group-btn">
                                    <button class="btn btn-default btn-sm" id="btn_browse_image2">Browse</button>
                                    </span>';
                                    echo '</div>';
                                }
                                ?>
                            

                            <div class="m-bot15">
                                <input type="text" name="s2_landing_title2" value="<?php echo $s2_landing_title2; ?>" class="form-control" />
                            </div>

                            <div class="m-bot15">
                                <textarea name="s2_landing_description2" class="form-control""><?php echo $s2_landing_description2; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Feature 3</label>
                        <div class="col-sm-6">
                            
                                <?php
                                if ($s2_landing_icon3 != "") {
                                    echo "<img src='$s2_landing_icon3' class='m-bot15 img-responsive' style='border: solid 4px #eee; background: darkgrey; max-width:100px;' />";
                                    echo '<div class="input-group m-bot15">';
                                    echo "<input type='text' class='validate[required] form-control' name='s2_landing_icon3' id='posts_image3' value='$s2_landing_icon3'/>";
                                     echo '<span class="input-group-btn">
                                <button class="btn btn-default btn-sm" id="btn_browse_image3">Browse</button>
                                </span>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="input-group m-bot15">';
                                    echo '<input type="text" class="validate[required] form-control" name="s2_landing_icon3" id="posts_image3"/>';
                                    echo '<span class="input-group-btn">
                                    <button class="btn btn-default btn-sm" id="btn_browse_image3">Browse</button>
                                    </span>';
                                    echo '</div>';
                                }
                                ?>
                            

                            <div class="m-bot15">
                                <input type="text" name="s2_landing_title3" value="<?php echo $s2_landing_title3; ?>" class="form-control" />
                            </div>

                            <div class="m-bot15">
                                <textarea name="s2_landing_description3" class="form-control"><?php echo $s2_landing_description3; ?></textarea>
                            </div>

                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Search Service</label>
                        <div class="col-sm-6">
                            <?php if($landing_search == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="landing_search" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="landing_search"  value="1">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Service Category</label>
                        <div class="col-sm-6">
                            <select name="landing_service_category[]" class="form-control" multiple>
                                <?php 
                                $service_id = explode(",",$landing_service_category);
                                foreach ($data_service_category as $row) { ?>
                                <option value="<?= $row['category_id']; ?>"  <?php if(array_search($row['category_id'], $service_id) !== false) {echo 'selected';} ?>  ><?= $row['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Lawyer List</label>
                        <div class="col-sm-6">
                            <?php if($landing_lawyers == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="landing_lawyers" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="landing_lawyers"  value="1">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Lawyers</label>
                        <div class="col-sm-6">
                            <select name="lawyers_list" class="form-control">
                                <option value="0">All</option>
                                <?php foreach ($data_lawyer_category as $row) { ?>
                                <option value="<?= $row['id']; ?>"
                                    <?php if ($lawyers_list == $row['id']) {
                                        echo 'selected';
                                    } ?>><?= $row['lawyer_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Work List</label>
                        <div class="col-sm-6">
                            <?php if($landing_work == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="landing_work" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="landing_work"  value="1">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Work</label>
                        <div class="col-sm-6">
                            <select name="work_list" class="form-control">
                                <option value="0">All</option>
                                <?php foreach ($data_work_category as $row) { ?>
                                <option value="<?= $row['id']; ?>"
                                    <?php if ($work_list == $row['id']) {
                                        echo 'selected';
                                    } ?>><?= $row['category_work_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Prtner List</label>
                        <div class="col-sm-6">
                            <?php if($partner_on == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="partner_on" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="partner_on"  value="1">
                            <?php } ?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Partner</label>
                        <div class="col-sm-6">
                            <select name="landing_partner" class="form-control">
                                <option value="0">All</option>
                                <?php foreach ($data_pertner_category as $row) { ?>
                                <option value="<?= $row['id']; ?>"
                                    <?php if ($landing_partner == $row['id']) {
                                        echo 'selected';
                                    } ?>><?= $row['partner_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Testimonial List</label>
                        <div class="col-sm-6">
                            <?php if($testimonial_on == 1){ ?>
                            <input type="checkbox" id="my-checkbox" name="testimonial_on" checked  value="1">
                            <?php } else { ?>
                            <input type="checkbox" id="my-checkbox" name="testimonial_on"  value="1">
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Testimonial</label>
                        <div class="col-sm-6">
                            <select name="landing_testimonial" class="form-control">
                                <option value="0">All</option>
                                <?php foreach ($data_testimonial_category as $row) { ?>
                                <option value="<?= $row['id']; ?>"
                                    <?php if ($landing_testimonial == $row['id']) {
                                        echo 'selected';
                                    } ?>><?= $row['testimonial_category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Landing Slug</label>
                        <div class="col-sm-6">
                            <input type="text" name="landing_slug" value="<?php echo $landing_slug; ?>" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-md-offset-3">
                            <input type="hidden" value="<?php echo $landing_id; ?>" name="landing_id" />
                            <input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />

                            <?php if ($editor_status == 'edit') { ?>
                                <button type="submit" class="btn btn-primary">Update Landing</button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary">Add New Landing</button>
                            <?php } ?>
                        </div>
                    </div> 

                </form>
            </div>
        </section>
    </div>
</div>