<div class="row">
	<div class="col-md-12">	
	<?php foreach ($data_page as $row) {
		if($row['page_image'] != ''){
			echo '<img src="'.$row['page_image'].'" class="img-responsive" width="100%"/>';
		}
		?>
		<h3><?=$row['page_title']?></h3>
		<?=$row['page_isi']?>
	<?php } ?>
	</div>
</div>