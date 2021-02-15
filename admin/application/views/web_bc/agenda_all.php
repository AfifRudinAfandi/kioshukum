<div class="row">
	<div class="col-sm-6 col-md-9 read_news"> 
		
		<h1 class="head-title-1">Agenda</h1>
		
		<?php foreach ($data_event as $row) {?>
		<div class="read_news_title"><a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>"><?=$row['event_title']?></a></div>
		<div class="read_news_meta">
			<?=nama_hari($row['event_date'])?>, <?=tgl_indo($row['event_date'])?>
		</div>
		<div class="read_news_content"><?=substr(strip_tags($row['event_isi']),0,160)."... "?><a href="<?=base_url()?>agenda/<?=$row['event_id']?>/<?=$row['event_slug']?>">Readmore</a></div>
		<?php } ?>
		<hr/>
		<?=$pages?>
	</div>
	<div class="col-sm-6 col-md-3">
		<form class="secondary-search" method="get" action="<?=base_url();?>web/search">
			 <input type="text" name="key" class="form-control" placeholder="Berita, Agenda, Artikel" />
		</form>
		
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
