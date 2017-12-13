<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit a message</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>messages/edit/<?=$message->id?>" method="post">
			  <div class="form-group">
				  <label class="col-lg-2 col-sm-2 control-label">To</label>
					<div class="col-lg-10">
					  <p class="form-control-static"><?=$message->relative->name?> &lt;<?=$message->relative->email?>&gt;</p>
				    </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Text</label>
				  <div class="col-sm-10">
					  <div id="text" class="form-control" style="height:100%" name="text" placeholder="Your text" contenteditable="true"><?=$message->text?></div>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Edit message</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->

<script>
$(function() {
	var msg = tinymce.init({
	  selector: 'div#text',
	  theme: 'inlite',
	  plugins: 'media table link paste contextmenu textpattern autolink codesample',
	  insert_toolbar: 'quickimage quicktable media codesample',
	  selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
	  inline: true,
	  paste_data_images: true,
	  content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css']
	});
});
</script>