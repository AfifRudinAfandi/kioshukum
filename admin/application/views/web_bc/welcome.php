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

<div class="row secondary-menu">
	<div class="col-md-offset-2 col-xs-6 col-sm-6 col-md-2">
		<div class="item">
			<a href="<?php echo base_url(); ?>page/56/call-center"><img src="<?php echo base_url(); ?>com/web/images/phone.png" class="img-responsive icon"/>Call Center</a>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-2">
		<div class="item">
			<a href="<?php echo base_url(); ?>page/57/layanan"><img src="<?php echo base_url(); ?>com/web/images/people.png" class="img-responsive icon"/>Layanan</a>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-2">
		<div class="item">
			<a href="<?php echo base_url(); ?>web/agenda"><img src="<?php echo base_url(); ?>com/web/images/notif.png" class="img-responsive icon"/>Agenda</a>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-2 ">
		<div class="item">
			<a href="<?php echo base_url(); ?>download"><img src="<?php echo base_url(); ?>com/web/images/data.png" class="img-responsive icon"/>Pusat Data</a>
		</div>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-sm-9 col-md-9">
		<div>
    		<div class="pull-right">
    			<a href="<?=base_url()?>web/news" class="btn btn-info">Lihat Semua</a>
    		</div>
    		<h1 class="head-title-1">Berita Terbaru</h1>
    	</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="cards">
					<?php foreach ($data_headline as $row) { ?>
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
						    	<div class="card_title"><?=substr(strip_tags($row['posts_judul']),0,40)?></div>
						    	<p class="card_date"><?=$row['posts_time']?> | <?=nama_hari($row['posts_date'])?>, <?=tgl_indo($row['posts_date'])?><p>
						    	<p class="card_text"><?=substr(strip_tags($row['posts_isi']),0,120)."."?></p>
						    	<a class="btn btn--block card_btn" href="<?=base_url()?>read/<?=$row['posts_id']?>/<?=$row['posts_slug']?>">Selengkapnya</a>
						  	</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-sm-3 col-md-3">
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

		<div class="baged-profile">
			<div class="a"></div>
			<div class="b">
				<div class="up">
					<img src="<?=$setting['0']['web_image2']?>" class="img-responsive"/>
				</div>
				
    			<div class="text-center"><small><?=$setting['0']['web_sambutan']?> <a class="readmore" href="<?=$setting['0']['web_sambutan_link']?>">Selanjutnya</a></small></div>
			</div>
		</div>

		<h1 class="head-title-1">Temukan Kami Di</h1>

		<div class="fb-page" data-href="<?=$setting['0']['web_facebook']?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?=$setting['0']['web_facebook']?>" class="fb-xfbml-parse-ignore"><a href="<?=$setting['0']['web_facebook']?>"><?php echo $setting[0]['web_title']; ?></a></blockquote></div>

		
		<table class="table table-bordered">
		    <tr>
		        <td width="50%"><img src="<?php echo base_url(); ?>com/web/images/bkkbn.png" class="img-responsive"/></td>
		        <td><img src="<?php echo base_url(); ?>com/web/images/bpina.png" class="img-responsive"/></td>
		    </tr>
		</table>
		 
		
		<h1 class="head-title-1">Pengunjung</h1>
		
		<p><span class="label label-success">Lifetime Visitors : <?=$total_visitor;?></span><br/>
		<span class="label label-danger">Today Visitors : <?=$total_visitor_today;?></span></p>
		
	</div>
</div>
