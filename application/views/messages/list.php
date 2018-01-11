<div class="row">
  <div class="col-lg-12 main-chart">
	   <div class="form-panel">
		  <div class="pull-right">
			<a href="<?=base_url()?>messages/new" class="btn btn-theme">New message</a>
		  </div>
		  <h4 class="mb"><i class="fa fa-angle-right"></i> List of messages</h4>
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
		  <?php if($messages):?>
		  <table class="table">
			<thead>
				<th>To</th>
				<th>Text</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php foreach($messages as $message):?>
					<tr>
						<td><?=$message->get_relative()->name?></td>
						<td><?=$message->text?></td>
						<td>
							<a href="<?=base_url()?>messages/edit/<?=$message->id?>" class="btn btn-theme btn-xs">Edit</a> - 
							<a href="<?=base_url()?>messages/delete/<?=$message->id?>" class="btn btn-theme btn-xs">Delete</a> -
							<a href="<?=base_url()?>messages/view/<?=$message->id?>" class="btn btn-theme btn-xs">View as email</a>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		  </table>
		  <?php else:?>
			<center>You did not create any message yet!</center>
		  <?php endif;?>
	  </div>
  </div>
</div><! --/row -->