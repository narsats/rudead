<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <div class="pull-right">
			<a href="<?=base_url()?>relatives/new" class="btn btn-theme">New relative</a>
		  </div>
		  <h4 class="mb"><i class="fa fa-angle-right"></i> List of relatives</h4>
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
		  <?php if($relatives):?>
		  <table class="table">
			<thead>
				<th>Name</th>
				<th>Email address</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php foreach($relatives as $relative):?>
					<tr>
						<td><?=$relative->name?></td>
						<td><?=$relative->email?></td>
						<td>
							<a href="<?=base_url()?>relatives/edit/<?=$relative->id?>" class="btn btn-theme btn-xs">Edit</a> - 
							<a href="<?=base_url()?>relatives/delete/<?=$relative->id?>" class="btn btn-theme btn-xs">Delete</a>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		  </table>
		  <?php else:?>
			<center>You did not create any relative yet!</center>
		  <?php endif;?>
	  </div>
  </div>
</div><! --/row -->