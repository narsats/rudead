<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Create a new webhook!</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>webhooks/new" method="post">
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Method</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="method">
						<option value="GET">GET</option>
						<option value="POST">POST</option>
						<option value="PUT">PUT</option>
						<option value="DELETE">DELETE</option>
						<option value="HEAD">HEAD</option>
					  </select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">URL</label>
				  <div class="col-sm-10">
					  <input type="url" class="form-control" name="url" required placeholder="https://your-website/action.php?action=dead">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Content to send</label>
				  <div class="col-sm-10">
					  <input type="text" class="form-control" name="content" placeholder='{"method": "tell_children"}'>
				  </div>
			  </div>
			  
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Expected return code</label>
				  <div class="col-sm-10">
					  <input type="num" class="form-control" name="expect_code" placeholder="200">
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Create webhook</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->