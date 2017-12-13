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
					  <textarea class="form-control" name="text" placeholder="Your text"></textarea>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Create message</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->