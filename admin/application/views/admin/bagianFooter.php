<!-- page end-->
        </section>
    </section>
    <!--main content end-->
	<!--right sidebar start-->
	<div class="right-sidebar">
		<div class="search-row">
			<input type="text" placeholder="Search" class="form-control">
		</div>
		<div class="right-stat-bar">
			<ul class="right-side-accordion">
				<li class="widget-collapsible">
					<a href="#" class="head widget-head red-bg active clearfix">
						<span class="pull-left">work progress (5)</span>
						<span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
					</a>
					<ul class="widget-container">
						<li>
							<div class="prog-row side-mini-stat clearfix">
								<div class="side-graph-info">
									<h4>Target sell</h4>
									<p>
										25%, Deadline 12 june 13
									</p>
								</div>
								<div class="side-mini-graph">
									<div class="target-sell">
									</div>
								</div>
							</div>
							<div class="prog-row side-mini-stat">

							</div>
							<div class="prog-row side-mini-stat">
								
							</div>
							<div class="prog-row side-mini-stat">
								
							</div>
							<div class="prog-row side-mini-stat">

							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!--right sidebar end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?=base_url()?>com/panel/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url()?>com/panel/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url()?>com/panel/js/jquery.scrollTo.min.js"></script>
<script src="<?=base_url()?>com/panel/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?=base_url()?>com/panel/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?=base_url()?>com/panel/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?=base_url()?>com/panel/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?=base_url()?>com/panel/js/flot-chart/jquery.flot.js"></script>
<script src="<?=base_url()?>com/panel/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?=base_url()?>com/panel/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?=base_url()?>com/panel/js/flot-chart/jquery.flot.pie.resize.js"></script>
<!--dynamic table-->
<script type="text/javascript" language="javascript" src="<?=base_url()?>com/panel/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url()?>com/panel/js/data-tables/DT_bootstrap.js"></script>
<!--common script init for all pages-->
<!--dynamic table initialization -->
<script src="<?=base_url()?>com/panel/js/dynamic_table_init.js"></script>
<script src="<?=base_url()?>com/panel/js/fileupload/bootstrap-fileupload.js"></script>
<!--datatimepipicker initialization -->
<script src="<?=base_url()?>com/panel/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>com/panel/js/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?=base_url()?>com/panel/js/initial.min.js"></script>
<!--common script init for all pages-->
<script src="<?=base_url()?>com/panel/js/scripts.js"></script>
<!--ckeditor-->
<script type="text/javascript" src="<?=base_url()?>com/panel/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url()?>com/panel/js/main.js"></script>
<script src="<?= base_url() ?>com/panel/js/switcher/js/jquery.switcher.js"></script>
<!-- <script src="<?=base_url()?>com/panel/js/ckfinder/ckfinder.js"></script>-->
<script type="text/javascript">

	/*var button1 = document.getElementById( 'btn_browse_image' );
	var button2 = document.getElementById( 'btn_browse_image2' );

	button1.onclick = function() {
		selectFileWithCKFinder( 'posts_image' );
	};
	button2.onclick = function() {
		selectFileWithCKFinder( 'posts_image2' );
	};

	function selectFileWithCKFinder( elementId ) {
		CKFinder.popup( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}*/

	$.switcher('input[type=radio]');

	$(document).ready(function(){
		$("#btn_browse_image").click(function(){
			window.KCFinder = {
				callBack: function(url) {
					$('#posts_image').val(url);
					window.KCFinder = null;					
				}
			};
			window.open('<?php echo base_url(); ?>com/panel/js/media/browse.php?type=images', 'kcfinder_textbox',
				'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				'resizable=1, scrollbars=0, width=800, height=600'
			);
			return false;
		});
	});
	$(document).ready(function(){
		$("#btn_browse_image2").click(function(){
			window.KCFinder = {
				callBack: function(url) {
					$('#posts_image2').val(url);
					window.KCFinder = null;					
				}
			};
			window.open('<?php echo base_url(); ?>com/panel/js/media/browse.php?type=images', 'kcfinder_textbox',
				'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				'resizable=1, scrollbars=0, width=800, height=600'
			);
			return false;
		});
	});
	$(document).ready(function(){
		$("#btn_browse_image3").click(function(){
			window.KCFinder = {
				callBack: function(url) {
					$('#posts_image3').val(url);
					window.KCFinder = null;					
				}
			};
			window.open('<?php echo base_url(); ?>com/panel/js/media/browse.php?type=images', 'kcfinder_textbox',
				'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				'resizable=1, scrollbars=0, width=800, height=600'
			);
			return false;
		});
	});

	$(document).ready(function(){
		$("#btn_browse_image_logo").click(function(){
			window.KCFinder = {
				callBack: function(url) {
					$('#posts_image_logo').val(url);
					window.KCFinder = null;					
				}
			};
			window.open('<?php echo base_url(); ?>com/panel/js/media/browse.php?type=images', 'kcfinder_textbox',
				'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				'resizable=1, scrollbars=0, width=800, height=600'
			);
			return false;
		});
	});
	$(document).ready(function(){
		$("#btn_browse_image_favicon").click(function(){
			window.KCFinder = {
				callBack: function(url) {
					$('#posts_image_favicon').val(url);
					window.KCFinder = null;					
				}
			};
			window.open('<?php echo base_url(); ?>com/panel/js/media/browse.php?type=images', 'kcfinder_textbox',
				'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				'resizable=1, scrollbars=0, width=800, height=600'
			);
			return false;
		});
	});
	
	var ckeditor = CKEDITOR.replace('ckeditor',{
        height:'300px',
        filebrowserBrowseUrl : '<?=base_url()?>com/panel/js/media/browse.php?type=files',
        filebrowserImageBrowseUrl : '<?=base_url()?>com/panel/js/media/browse.php?type=images',
        filebrowserFlashBrowseUrl : '<?=base_url()?>com/panel/js/media/browse.php?type=flash',
        filebrowserUploadUrl : '<?=base_url()?>com/panel/panel/js/upload.php?type=files',
        filebrowserImageUploadUrl : '<?=base_url()?>com/panel/js/media/upload.php?type=images',
        filebrowserFlashUploadUrl : '<?=base_url()?>com/panel/js/media/upload.php?type=flash'     
    });
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline('editable');
</script>
</body>
</html>
