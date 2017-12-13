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
					  <textarea class="form-control" name="text" placeholder="Your text"><?=$message->text?></textarea>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Edit message</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->