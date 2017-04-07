

    <div class="container">
      <br>
      <?php echo $this->Form->create('Parkyuser'); ?>
      	<?php echo __('Edit Your Account'); ?>
      <div class="row-fluid">
        <div class="span6 well">
          <h3>Personal Information</h3>
          <br>
          	<?php
            echo $this->Form->input('firstname');
	        echo $this->Form->input('lastname');
	        echo $this->Form->input('email');
	        ?>
        </div>
        <div class="span6 well">
          <h3>Account Information</h3>
          <br>
          	<?php
	        echo $this->Form->input('username');
	        echo $this->Form->input('password');
	        ?>
        </div>
      </div>
      <div class="row-fluid">
        <div class="form-actions">
          <?php echo $this->Form->button("Create Account",array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
          <input type="reset" class="btn" value="Reset"> 
        </div>
      </div>
    </div>