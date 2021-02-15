<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php foreach ($data_slide_0 as $slide1) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<?php  } ?> 
		<?php $no=1; foreach ($data_slide_1 as $slide1) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="<?=$no;?>"></li>
		<?php $no++; } ?> 
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php foreach ($data_slide_0 as $slide1) { ?>
		<div class="item active">
			<img src="<?=$slide1['slide_image'];?>" alt="<?=$slide1['slide_title'];?>">
			<div class="carousel-caption">
				<?=$slide1['slide_title'];?>
			</div>
		</div>
		<?php  } ?> 
		<?php foreach ($data_slide_1 as $slide1) { ?>
		<div class="item">
			<img src="<?=$slide1['slide_image'];?>" alt="<?=$slide1['slide_title'];?>">
			<div class="carousel-caption">
				<?=$slide1['slide_title'];?>
			</div>
		</div>
		<?php  } ?> 
	</div>
</div>
				
<div class="row m-30">
	<div class="col-xs-offset-2 col-xs-8 col-sm-8">
		<div class="search-area">
			<form class="form-horizontal" method="get" action="<?=base_url();?>web/search">
				<div class="form-group">
					<div class="col-sm-9">
						<input type="text" class="form-control input-lg" name="key" placeholder="Berita, Artikel, Agenda">
					</div>
					<div class="col-sm-3">
						<button type="submit" class="btn btn-default btn-lg btn-block">Search</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 read_news">
	
		<br/>
		
		<h4 class="head-title-1">Hasil Pencarian : "<em style="text-transform: capitalize; font-size: 70%;"><?=$_GET['key']?></em>"</h4>
		<?php foreach ($data_post_search as $row) {?>
			<div class="read_news_title"><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>"><?=$row['posts_judul']?></a></div>
			<div class="read_news_meta">
				By <?=$row['user_nama_depan']?>  -  <?=nama_hari($row['posts_date'])?>, <?=tgl_indo($row['posts_date'])?> / <?=$row['posts_time']?>
				In <a href="<?=base_url()?>category/<?=$row['category_id']?>/<?=$row['category_slug']?>"><?=$row['category_title']?></a>
			</div>
			<div class="read_news_content"><?=substr(strip_tags($row['posts_isi']),0,160)."... "?><a href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Readmore </a></div>
		<?php }?>
	</div>
</div>