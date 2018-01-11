<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Create a new message!</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>messages/new" method="post">
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Relative</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="to_relative">
						 <?php foreach($relatives as $relative):?>
							<option value="<?=$relative->id?>"><?=$relative->name?></option>
						 <?php endforeach;?>
					  </select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Text</label>
				  <div class="col-sm-10">
					  <div id="text" class="form-control" style="height:100%" name="text" placeholder="Your text" contenteditable="true"></div>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Create message</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->

<script>
$(function() {
	var msg = tinymce.init({
	  selector: 'div#text',
	  theme: 'inlite',
	  plugins: 'table link paste contextmenu textpattern autolink',
	  insert_toolbar: 'quicktable',
	  selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
	  inline: true,
	  paste_data_images: false,
	  content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tinymce.com/css/codepen.min.css']
	});
});
</script>