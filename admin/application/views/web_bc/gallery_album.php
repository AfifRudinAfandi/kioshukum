<link rel="stylesheet" href="<?php echo base_url(); ?>com/web/plugin/responsivevideogallery/css/main.css">
<style>
	.fancybox-close {
		top: -5px;
		right: -5px;
	}
	.fancybox-opened .fancybox-skin {
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		box-shadow: none;
	}
	.fancybox-skin {
		position: relative;
		background: none;
		color: none;
		text-shadow: none;
		-webkit-border-radius: none;
		-moz-border-radius: none;
		border-radius: none;
	}
</style>
<div class="row">
	<div class="col-sm-6 col-md-9">
		<h1 class="head-title-1">
			ALBUM : <span><em><?=$data_gallery_album[0]['gallery_album_title'];?></em></span></p>
		</h1>
	
		<p><?=$data_gallery_album[0]['gallery_album_desc'];?></p>
		<hr/>
		
		<style>
			.masonry {
				margin: 1.5em 0;
				padding: 0;
				-moz-column-gap: 1.5em;
				-webkit-column-gap: 1.5em;
				column-gap: 1.5em;
				font-size: .85em;
			}

			.item {
				display: inline-block;
				background: #fff;
				padding: 1em;
				margin: 0 0 1.5em;
				width: 100%;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-shadow: 1px 1px 2px 0 #eee;
			}

			@media only screen and (min-width: 400px) {
				.masonry {
					-moz-column-count: 2;
					-webkit-column-count: 2;
					column-count: 2;
				}
			}

			@media only screen and (min-width: 700px) {
				.masonry {
					-moz-column-count: 3;
					-webkit-column-count: 3;
					column-count: 3;
				}
			}

			@media only screen and (min-width: 900px) {
				.masonry {
					-moz-column-count: 4;
					-webkit-column-count: 4;
					column-count: 4;
				}
			}

			@media only screen and (min-width: 1100px) {
				.masonry {
					-moz-column-count: 5;
					-webkit-column-count: 5;
					column-count: 5;
				}
			}

			@media only screen and (min-width: 1280px) {
				.wrapper {
					width: 1260px;
				}
			}
		</style>
	

		<div class="masonry">			
			<?php foreach ($data_gallery_photo as $row) {?>
				<div class="item">
					<a id="single_image" href="<?=base_url()?>upload/gallery/<?=$row['gallery_data']?>">
						<img src="<?=base_url()?>upload/gallery/thumbs/<?=$row['gallery_data']?>"/>
					</a>
				</div>
			<?php }?>
		</div>
		
		
	</div>
	<div class="col-sm-6 col-md-3">
		<form class="secondary-search" method="get" action="<?=base_url();?>web/search">
			 <input type="text" name="key" class="form-control" placeholder="Berita, Agenda, Artikel" />
		</form>
		
		<h1 class="head-title-1">Album</h1>
		
		<div class="list-group">
		<?php foreach ($data_gallery as $row) { ?>
		  <a href="<?=base_url()?>gallery/album/<?=$row['gallery_album_id']?>/<?=$row['gallery_album_slug']?>" class="list-group-item <?php $id = $this->uri->segment(3, 0); if($row['gallery_album_id'] == $id){echo 'active';};?>">
			<h4 class="list-group-item-heading text-left"><?=$row['gallery_album_title']?></h4>
			<p class="list-group-item-text"><?=substr(strip_tags($row['gallery_album_desc']),0,80)."..."?></p>
		  </a>
		<?php } ?>
		</div>
	
	</div>
</div>
