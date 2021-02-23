<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				EVENT
				<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-times"></a>
				</span>
			</header>
			<div class="panel-body">			
				<form method="post" action="<?php echo base_url(); ?>admin/save_event">      
					<label>Title *</label>
					<div class="form-group">
						<input type="text" name="event_title" value="<?php echo $event_title;?>" class="form-control" required="required" />
						<small><em>Enter title hire.</em></small>
					</div>
					<label>Date *</label>
					<div class="form-group">
						<input type="text" name="event_date" value="<?php echo $event_date;?>" class="form-control" placeholder="Ex: 2015/02/31" required="required" />
						<small><em>Enter event date format: YYYY/MM/DD</em></small>
					</div>					
					<label>Decribtion *</label>
					<div class="form-group">
						<textarea name="event_isi" id="ckeditor" class="form-control" required="required"><?php echo $event_isi;?></textarea>
						<small><em>Enter Article hire.</em></small>
					</div>					
					<hr/>   															 
					<input type="hidden" value="<?php echo $event_id; ?>" name="event_id" />
					<input type="hidden" value="<?php echo $editor_status; ?>" name="editor_status" />
					<button type="submit" class="btn btn-primary">Publish event</button>				
				</form>
			</div> 			
		</section>
	</div>
</div>
