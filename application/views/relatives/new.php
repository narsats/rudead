<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Create a new relative!</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>relatives/new" method="post">
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Relative name</label>
				  <div class="col-sm-10">
					  <input type="text" class="form-control" name="name" placeholder="Name">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Relative email address</label>
				  <div class="col-sm-10">
					  <input type="email" class="form-control" name="email" placeholder="Email">
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Create relative</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->