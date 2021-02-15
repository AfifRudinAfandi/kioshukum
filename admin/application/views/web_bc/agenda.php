<div class="row">	
	<div class="col-sm-6 col-md-9 read_news">	
	<?php foreach ($data_event_read as $row) {?>
		<h3 class="read_news_title"><a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>"><?=$row['event_title']?></a></h3>
		<div class="read_news_meta">
			<?=nama_hari($row['event_date'])?>, <?=tgl_indo($row['event_date'])?>
		</div>

		<div class="read_news_content"><?=$row['event_isi']?></div>	
		
		<!--
		<div class="share-blog">
			<h5>Share :</h5>
			<a href="whatsapp://send?text=<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>" data-action="share/whatsapp/share">
			<i class="fa fa-whatsapp"></i></a>
			<a href="http://www.twitter.com/home?status=<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>">
			<i class="fa fa-twitter"></i></a>
			<a href="http://www.facebook.com/sharer.php?u=<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>">
			<i class="fa fa-facebook"></i></a>
			<a href="https://plus.google.com/share?url=http:<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>">
			<i class="fa fa-google-plus"></i></a>
		</div>
		-->
		

	<?php } ?>
	</div>
	<div class="col-sm-6 col-md-3">
		<form class="secondary-search">
			 <input type="text" class="form-control" placeholder="Berita, Agenda, Artikel" />
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
	</div>
</div>