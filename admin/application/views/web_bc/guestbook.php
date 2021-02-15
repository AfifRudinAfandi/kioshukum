<div class="row">
	<div class="col-sm-8 col-md-9">	
		
		<h1 class="head-title-1">Kritik & Saran</h1>
		<p>Media ini dibuat untuk menampung segala saran dan kritik Anda, manfaatkan kesempatan ini untuk kemajuan Kantor Pemberdayaan Perempuan.</p>
		<hr/>
		<div class="media">
		    <div class="alert alert-info">
                <div class="slick-guestbook">
                    <?php foreach ($data_guestbook as $row) { ?>
                    
                     <div class="slick-guestbook-list">
                        
                          <div class="media-left media-middle">
                            <a href="#">
                              <i class="fa fa-user-o fa-fw fa-2x"></i>
                            </a>
                          </div>
                          <div class="media-body">
                            <em><b><?=$row['guestbook_pesan'];?></b></em> 
                            <small><?=$row['guestbook_name'];?> -
                            <?=$row['guestbook_email'];?></small>
                            
                          </div>
                    </div>
                        
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <hr/>
		
		<?php echo $this->session->flashdata('success');?>
		<form method="post" action="<?=base_url();?>guestbook/send">
		  <div class="form-group">
			<label class="control-label">Nama <span class="text-required">*</span></label>
			<input type="text" class="form-control" id="inputPassword" placeholder="" name="guestbook_name" required>
		  </div>
		  <div class="form-group">
			<label class="control-label">Email <span class="text-required">*</span></label>
			<input type="email" class="form-control" placeholder="" name="guestbook_email" required>
		  </div>
		  <div class="form-group">
			<label class="control-label">Pesan <span class="text-required">*</span></label>
			<textarea class="form-control" name="guestbook_pesan" rows="6" required></textarea>
			<p><small>(<span class="text-required">*</span>) Tidak boleh kosong</small></p>
		  </div>
		  <div class="form-group">
			<?php echo $this->recaptcha->getWidget(); ?>
		  </div>
		  <div class="form-group">
			<button type="submit"  class="btn btn-default btn-lg">Kirim</button>
		  </div>
		</form>	
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