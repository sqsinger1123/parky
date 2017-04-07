<!-- Add a new user! -->
    <header>
        <div class="container">
        <h3>Create an Account</h3>
        </div>
      </header>

    <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->create('User'); ?>
      <div class="row">
        <div class="span6 offset4">
          <div class="profilemap pl10 pr10 pb10">
          <h3>Personal Information</h3>
          	<?php
            echo $this->Form->input('firstname',array("class"=>"input-medium input-block-level input-big",'placeholder'=>'First Name', "label"=>false));
	        echo $this->Form->input('lastname',array("class"=>"input-medium input-block-level input-big",'placeholder'=>"Last Name", "label"=>false));
	        echo $this->Form->input('email', array("class"=>"input-medium input-block-level input-big", 'placeholder'=>"Email", "label"=>false));
	        ?>
        </div>
        <div class="profilemap pl10 pr10 pb10">
          <h3>Account Information</h3>
          	<?php
	        echo $this->Form->input('username',array("class"=>"input-medium input-block-level input-big", 'placeholder'=>"Username", "label"=>false));
	        echo $this->Form->input('passwd', array("class"=>"input-medium input-block-level input-big", 'placeholder'=>"Password", "label"=>false));
          echo $this->Form->input('passwd_confirm', array("class"=>"input-medium input-block-level input-big", 'placeholder'=>"Confirm Password", "label"=>false, "type"=>"password"));

	        ?>
        </div>

<div class="profilemap pl10 pr10 pb10">   
  <h3>Payment Information</h3>
  <div class="row-fluid">
    <div class="span6">
        <input name="first_name" type="text" class="span12 input-medium input-block-level input-big" placeholder="First Name">
    </div>
    <div class="span6">
        <input name="last_name" type="text" class="span12 input-medium input-block-level input-big" placeholder="Last Name">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <?php 
        $options = array(array('name'=>'Visa', 'value'=>'Visa'), array('name'=>'American Express', 'value'=>'American Express'), array('name'=>'Mastercard', 'value'=>'Mastercard'));
      echo $this->Form->input('cardtype', array("label"=>false,'options' => $options, 'empty' => 'Select Your Card Type',"class"=>"input-block-level input-big")); ?>
    </div>
    <div class="span6">
      <?php
        echo $this->Form->input('creditcards',array("label"=>false, "placeholder"=>"4716758877592824","value"=>"4716758877592824", "class"=>"input-block-level input-big"));?>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
        <input name="ccvnumber" type="text" class="span12 input-medium input-block-level input-big" placeholder="CCV Number">
    </div>
    <div class="span6">
      <div class="row-fluid">
        <div class="span12">
          <input name="expiration_month" placeholder="MM" maxlength="2" class="span6 inline input-medium input-block-level input-big" type="text">
          <input name="expiration_year" placeholder="YYYY" maxlength="4" class="span6 inline input-medium input-block-level input-big" type="text">
        </div>
      </div>
    </div>
  </div>
</div>  

<div class="pt10 pl10 pr10 pb20"> 
        <div class="row-fluid">
                  <?php 
                   if(isset($_GET['redirect'])){ 
                  echo $this->Form->input('redirect', array('type' => 'hidden', 'value' => $this->request->query['redirect']));}?>
            <?php echo $this->Form->button("Create Account",array('type' => 'submit', 'class' => 'btn btn-large  btn-primary btn-block mt5')); ?>
          </div>
      </div>
    </form>
  </div>
  </div>
