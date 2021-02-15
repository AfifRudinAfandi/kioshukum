<div class="row">
	<div class="col-sm-6 col-md-9 read_news">
	<?php foreach ($data_posts_read as $row) { ?>
		
		<div class="read_news_meta">
			By <?=$row['user_nama_depan']?>  -  <?=nama_hari($row['posts_date'])?>, <?=tgl_indo($row['posts_date'])?> / <?=$row['posts_time']?>
			In <a href="<?=base_url()?>category/<?=$row['category_id']?>/<?=$row['category_slug']?>"><?=$row['category_title']?></a>
		</div>
		
		<?php if($row['posts_image'] != ''){
			echo'<div class="read_news_image_thum"><img class="img-responsive" src="'.$row['posts_image'].'"data-holder-rendered="true"></div>';
		}else{
			echo'';
		} ?>

		<div class="read_news_title">
			<a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=$row['posts_judul']?></a>
		</div>
		
		<div class="read_news_content"><?=$row['posts_isi']?></div>

		<!--
		<div class="share-blog">
			<h5>Share :</h5>
			<a href="whatsapp://send?text=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
			<a href="http://www.twitter.com/home?status=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-twitter"></i></a>
			<a href="http://www.facebook.com/sharer.php?u=<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-facebook"></i></a>
			<a href="https://plus.google.com/share?url=http:<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><i class="fa fa-google-plus"></i></a>
		</div>
		<div class="comments">
			<div class="fb-comments" width="100%"></div>
		</div>

		-->

	<?php } ?>
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
