<link rel="stylesheet" href="<?php echo base_url(); ?>com/web/plugin/responsivevideogallery/css/main.css">
<div class="row">
	<div class="col-md-12">
		<h1 class="head-title-1">Video</h1>
		<div class="row gallery-video">
			<?php if (!isset($data_gallery_video)){  
				echo "ERROR";    
			}else{  
				foreach ($data_gallery_video as $row) { ?>
				<article class="video">
					<figure>
					<a class="fancybox fancybox.iframe" href="//www.youtube.com/embed/<?=$row['gallery_data']?>"><img class="videoThumb" src="http://i1.ytimg.com/vi/<?=$row['gallery_data']?>/mqdefault.jpg"></a>
					</figure>
					<h4 class="videoTitle"><?=$row['gallery_title']?></h4>
				  </article>
				<?php }  
			}?>
			
		</div>		
	</div>
</div>







