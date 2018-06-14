<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit a relative</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>webhooks/edit/<?=$webhook->id?>" method="post">
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Method</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="method">
						<option <?php if($webhook->method=='GET'):?>selected <?php endif;?>value="GET">GET</option>
						<option <?php if($webhook->method=='POST'):?>selected <?php endif;?>value="POST">POST</option>
						<option <?php if($webhook->method=='PUT'):?>selected <?php endif;?>value="PUT">PUT</option>
						<option <?php if($webhook->method=='DELETE'):?>selected <?php endif;?>value="DELETE">DELETE</option>
						<option <?php if($webhook->method=='HEAD'):?>selected <?php endif;?>value="HEAD">HEAD</option>
					  </select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">URL</label>
				  <div class="col-sm-10">
					  <input type="url" class="form-control" name="url" required placeholder="https://your-website/action.php?action=dead" value="<?=$webhook->url?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Content to send <small>(only used when using POST or PUT)</small></label>
				  <div class="col-sm-10">
					  <input type="text" class="form-control" name="content" placeholder='{"method": "tell_children"}' value="<?=$webhook->content?>">
				  </div>
			  </div>
			  
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Expected return code</label>
				  <div class="col-sm-10">
					  <input type="num" class="form-control" name="expect_code" placeholder="200" value="<?=$webhook->expect_code?>">
				  </div>
			  </div>
			  <button type="submit" class="btn btn-theme">Save webhook</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->