<div class="row">
	<div class="col-sm-8 col-md-9">
		
		<h1 class="head-title-1">Bank Data</h1>
				
		<div class="row">
			<?php foreach ($data_download as $row) { ?> 
			<div class="col-xs-6 col-sm-4 col-md-3 download">
				<div class="item">
					<a href="<?=base_url()?>upload/files/<?=$row['download_file']?>"><?=$row['download_title']?></a><br/>
					<small><i class="fa fa-clock-o" aria-hidden="true"></i>
 <?=$row['download_date']?></small>
					
				</div>
			</div>
			<?php } ?>
		</div>
		
	</div>
	<div class="col-sm-4 col-md-3">
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

		<h1 class="head-title-1">Berita Terbaru</h1>
				
		<ul class="recent-news">
		<?php foreach ($data_posts as $row) { ?>
			<li style="background-image: url('<?=$row['posts_image']?>');">
				<div class="news-title">
				<a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=$row['posts_judul']?></a>
				</div>
			</li>
		<?php } ?>
		</ul>
	</div>
</div>