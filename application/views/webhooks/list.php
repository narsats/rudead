<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <div class="pull-right">
			<a href="<?=base_url()?>webhooks/new" class="btn btn-theme">New webhook</a>
		  </div>
		  <h4 class="mb"><i class="fa fa-angle-right"></i> List of webhooks</h4>
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
		  <?php if($webhooks):?>
		  <table class="table">
			<thead>
				<th>Method</th>
				<th>URL</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php foreach($webhooks as $webhook):?>
					<tr>
						<td><?=$webhook->method?></td>
						<td><?=$webhook->url?></td>
						<td>
							<a href="<?=base_url()?>webhooks/edit/<?=$webhook->id?>" class="btn btn-theme btn-xs">Edit</a> - 
							<a href="<?=base_url()?>webhooks/delete/<?=$webhook->id?>" class="btn btn-theme btn-xs">Delete</a>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		  </table>
		  <?php else:?>
			<center>You did not create any webhook yet!</center>
		  <?php endif;?>
	  </div>
  </div>
</div><! --/row -->