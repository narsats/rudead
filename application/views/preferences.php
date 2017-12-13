<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <h4 class="mb"><i class="fa fa-angle-right"></i> Preferences</h4>
		  <form class="form-horizontal style-form" action="<?=base_url()?>preferences/set" method="post">
			  <?php if(isset($error)):?>
			  <div class="alert alert-danger">
				<strong>Oops!</strong> <?=$error?>
			  </div>
			  <?php endif;?>
			  <?php if(isset($success)):?>
			  <div class="alert alert-success">
				<strong>Success!</strong> <?=$success?>
			  </div>
			  <?php endif;?>
			  <?php if(isset($warning)):?>
			  <div class="alert alert-warning">
				<strong>Heads up!</strong> <?=$warning?>
			  </div>
			  <?php endif;?>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Check if alive every</label>
				  <div class="col-sm-8">
					  <input type="number" class="form-control" name="check_every" value="<?=$user->check_every_days?>" min="1" max="365" required>
				  </div>
				  <label class="col-sm-2 col-sm-2 control-label">days</label>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-2 col-sm-2 control-label">Send messages</label>
				  <div class="col-sm-8">
					  <input type="number" class="form-control" name="send_after" value="<?=$user->send_after_days?>" min="2" max="365" required>
				  </div>
				  <label class="col-sm-2 col-sm-2 control-label">days after last successful check</label>
			  </div>
			  <button type="submit" class="btn btn-theme">Update</button>
		  </form>
	  </div>
  </div>
</div><! --/row -->