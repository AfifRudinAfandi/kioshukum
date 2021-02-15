<div class="row">
	<div class="col-sm-6 col-md-9">
		<h1 class="head-title-1">Berita : <small><em style="text-transform: capitalize;"><?=$category?></em></span></h1>
		<div class="row">
			<div class="col-md-12">
				<ul class="cards">
					<?php foreach ($data_posts_category as $row) { ?>
					<li class="cards_item">
						<div class="card">
						  	<div class="card_image" style="background-image: url(
								<?php if($row['posts_image'] != ''){
									echo $row['posts_image'];
								}else{
									echo 'com/upload/images/demo.jpg';
								}?>	  
							)"></div>
						  	<div class="card_content">
						    	<div class="card_title"><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=substr(strip_tags($row['posts_judul']),0,40)?></a></div>
						    	<p class="card_date"><?=$row['posts_time']?> | <?=nama_hari($row['posts_date'])?>, <?=tgl_indo($row['posts_date'])?><p>
						    	<p class="card_text"><?=substr(strip_tags($row['posts_isi']),0,120)."."?></p>
						  	</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<hr/>
		<?=$pages?>
	</div>
	<div class="col-sm-6 col-md-3">
		<form class="secondary-search" method="get" action="<?=base_url();?>web/search">
			 <input type="text" name="key" class="form-control" placeholder="Berita, Agenda, Artikel" />
		</form>
		
		<div class="baged-agenda">
			<div class="baged-agenda-header"><img src="<?php echo base_url(); ?>com/web/images/icon-03.png" class="img-responsive" /></div>
			<div class="slick-agenda">
				<?php foreach ($data_event as $row) { ?>
				<div class="slick-agenda-list">
					<a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>" class="title"><?=$row['event_title']?></a><br/>
					<small><?=tgl_indo($row['event_date'])?></small>
				</div>
				<?php } ?>
			</div>
		</div>

		<h1 class="head-title-1">Category</h1>
		
		<div class="list-group">
		 <?php foreach ($list_category as $row) { ?>
			<a href="<?=base_url()?>category/<?=$row['category_id']?>/<?=$row['category_slug']?>" class="list-group-item"><?=$row['category_title']?></a>
		<?php } ?>
		</div>
	</div>
</div>
