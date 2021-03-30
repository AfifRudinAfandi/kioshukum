<div class="row">
   <div class="col-sm-4">
      <section class="panel">
         <header class="panel-heading">
            <?php if ($this->uri->segment(2) == 'city_edit') {
               echo 'Edit Service City';
            } else {
               echo 'Add Service City';
            } ?>

            <span class="tools pull-right">
               <a href="javascript:;" class="fa fa-chevron-down"></a>
               <a href="javascript:;" class="fa fa-cog"></a>
               <a href="javascript:;" class="fa fa-times"></a>
            </span>
         </header>
         <div class="panel-body">
            <form method="post" action="<?php echo base_url('service/city_save'); ?>">

               <div class="form-group">
                  <label for="text-input">Name</label>
                  <input type="text" id="text-input" class="form-control" value="<?php echo $city_name; ?>" name="city_name">
               </div>
               <div class="form-group">
                  <label for="text-input">Our Cost</label>
                  <input type="text" id="text-input" class="form-control" value="<?php echo $city_our_cost; ?>" name="city_our_cost">
               </div>
               <div class="form-group">
                  <label for="text-input">Cost</label>
                  <input type="text" id="text-input" class="form-control" value="<?php echo $city_cost; ?>" name="city_cost">
               </div>
               <div class="form-group">
                  <label for="text-input">Note</label>
                  <input type="text" id="text-input" class="form-control" value="<?php echo $city_note; ?>" name="city_note">
               </div>
               <div class="form-group">
                  <input type="hidden" value="<?php echo $city_id; ?>" name="city_id" />
                  <input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
                  <?php if ($this->uri->segment(2) == 'city_edit') { ?>
                     <button type="submit" class="btn btn-primary">Update City</button>
                     <a href="<?php echo base_url('service/city_delete') . '/' . $city_id; ?>" class="btn btn-danger">Remove City</a>
                  <?php } else { ?>
                     <button type="submit" class="btn btn-primary">Add New City</button>
                  <?php } ?>


               </div>
            </form>
         </div>
      </section>
   </div>
   <div class="col-sm-8">
      <section class="panel">
         <header class="panel-heading">
            City
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
                        <th>City Name</th>
                        <th>Our Cost</th>
                        <th>City Cost</th>
                        <th>Note</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data_service_city as $row) { ?>
                        <tr>
                           <td>
                              <h5><?= $row['city_name'] ?></h5>
                           </td>
                           <td>
                              <h5><?= $row['city_our_cost'] ?></h5>
                           </td>
                           <td>
                              <h5><?= $row['city_cost'] ?></h5>
                           </td>
                           <td>
                              <h5><?= $row['city_note'] ?></h5>
                           </td>
                           <td>
                              <a href="<?= base_url('service/city_edit') ?>/<?= $row['city_id'] ?>" title="Edit (<?= $row['city_name'] ?>)" class="btn btn-warning btn-xs">
                                 <i class="fa fa-pencil-square-o fa-fw"></i> Change </a>
                              <a href="<?= base_url('service/city_delete') ?>/<?= $row['city_id'] ?>" title="Delete (<?= $row['city_name'] ?>)" class="btn btn-danger btn-xs">
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