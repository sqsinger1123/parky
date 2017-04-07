
        <header>
        <div class="container">
        	<?php
				 if(!$_SERVER['QUERY_STRING']){
				?>
			  		<h3>
						Sign in to complete reservation</h3>
		          <?php
		            }
		            else {
		          ?>
		      	<h3>Sign in</h3>
		      	<?php
		            }
		          ?>
        </div>
      	</header>
    	<div class="row">
    	<div class="span6 offset4">

    			<div class="row-fluid" id="top_row_fluid">
    				<div class="profilemap p10">
    			<?php echo $this->Session->flash(); ?>
    				<?php echo $this->Form->create('User'); ?>
						<?php echo $this->Form->input('username', array("class"=>"input-medium input-block-level input-big","placeholder" => "Username", "label"=>false));?>
						<?php echo $this->Form->input('password', array("class"=>"input-medium input-block-level input-big","placeholder"=>"Password", "label"=>false));?>
					<?php echo $this->Form->end(array("label" => 'Sign In', "class" =>'btn btn-large btn-primary btn-block mt5')); ?>

					<?php
				 if(!$_SERVER['QUERY_STRING']){
		          	echo $this->Form->button('or, checkout as guest', array("type"=>"submit", "class"=>"btn btn-large btn-block mt5","onclick"=> "window.location.href='/users/'"));
		          }
		          ?>

					<?php if(isset($_GET['redirect'])){
							$session->write('redirect', $this->request->query['redirect']);
						}else{
							$session->delete('redirect');
						} 
					?>
				<br>
				<span class="lead">
						New to Parky?<br>
						<?php 
							if($_SERVER['QUERY_STRING']){
								$nextURL = "/users/add?".$_SERVER['QUERY_STRING'];
							}else{
								$nextURL = "/users/add";
							} 

						?>
						<a href= <?php echo $nextURL ?> >
							Create an Account >>
						</a><Br>
					</span>
				</div></div>
    	</div>

</div>