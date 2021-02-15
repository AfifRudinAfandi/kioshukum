
<div class="row">
	<div class="col-md-12">

		<h1 class="head-title-1">Album dan Gallery</h1>

		<div class="row">
			<div class="col-md-12">
				<ul class="cards">
					<?php foreach ($data_gallery as $row) { ?>
					<li class="cards_item">
						<div class="card">
						  	<div class="card_image" style="background-image: url(
								<?php if($row['gallery_album_image'] != ''){
									echo $row['gallery_album_image'];
								}else{
									echo 'com/upload/images/demo.jpg';
								}?>	  
							)"></div>
						  	<div class="card_content text-center">
						    	<div class="card_title"><a href="<?=base_url()?>gallery/album/<?=$row['gallery_album_id']?>/<?=$row['gallery_album_slug']?>"><?=$row['gallery_album_title']?></a></div>
						    	<p class="card_text"><?=substr(strip_tags($row['gallery_album_desc']),0,200)."..."?></p>
						  	</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-md-12">	
		<div>
    		<div class="pull-right">
    			<a href="<?=base_url()?>gallery/video" class="btn btn-info">Lihat Semua</a>
    		</div>
    		<h1 class="head-title-1">Video</h1>
    	</div>
		<link rel="stylesheet" href="<?php echo base_url(); ?>com/web/plugin/responsivevideogallery/css/main.css">
		<div class="row gallery-video">
			
			<?php if (!isset($data_gallery_video)){  
				echo "ERROR";    
			}else{  
				foreach ($data_gallery_video as $row) { ?>
				<article class="video">
					<figure>
					<a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/<?=$row['gallery_data']?>?rel=0&amp;showinfo=0"><img class="videoThumb" src="http://i1.ytimg.com/vi/<?=$row['gallery_data']?>/mqdefault.jpg"></a>
					</figure>
					<h4 class="videoTitle"><?=$row['gallery_title']?></h4>
				  </article>
				<?php }  
			}?>
		
		</div>
	</div>
</div>

	
	
	
	
