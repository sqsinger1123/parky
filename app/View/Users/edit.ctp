    <header>
        <div class="container">
        <h3>Edit Your Account</h3>
        </div>
      </header>


                <?php echo $this->Session->flash(); ?>
      <br>
      <?php echo $this->Form->create('User'); ?>
      <div class="row">
          <div class="span6 offset4">
            <div class="profilemap pl10 pr10 pb10">
          <h3>Account Information</h3>
          Re-enter your password to save your changes
          <br>
          <br>
            <?php
          echo $this->Form->input('username', array("class"=>"input-medium input-block-level input-big", "label"=>false));
          echo $this->Form->input('passwd', array("class"=>"input-medium input-block-level input-big","label"=>false, "placeholder"=>"Password"));
          ?>
        </div>
        <div class="profilemap pl10 pr10 pb10"> 
          <h3>Personal Information</h3>
          <br>
          	<?php
            echo $this->Form->input('firstname', array("class"=>"input-medium input-block-level input-big",'label'=>false));
	        echo $this->Form->input('lastname', array("class"=>"input-medium input-block-level input-big",'label'=>false));
	        echo $this->Form->input('email', array("class"=>"input-medium input-block-level input-big",'label'=>false));
	        ?>
        </div>
        <div class="profilemap pl10 pr10 pb10"> 
          <div id="currentCC">
            <h3>Your Credit Card</h3>
            <br>
              <?php 
              if($session->read('Auth.User.cardtype')){
                echo ('My');
              }
              echo $session->read('Auth.User.cardtype');?>
            <br>  
            <?php 

            $cc= $session->read('Auth.User.creditcards');
            $cardArray = str_split($cc);   
            $length = count($cardArray);   
            $maskedCardNumber = '';   
            // Mask all numbers except the last 4   
            for ($i = 0; $i < $length -4; $i++) {   
                $cardArray[$i] = 'X';   
            }   
            // Turn back into a string   
            for ($i = 0; $i < $length; $i++) {   
                $maskedCardNumber = $maskedCardNumber . $cardArray[$i];   
            }   
            echo $maskedCardNumber;   
            ?>
            <br>
            <br>
            <a href="javascript:$('#cc_info').slideDown('slow');
                      $('#currentCC').slideUp('slow');">
                    Change Your Credit Card
            </a> 
            <?php

            $display = "'display:".$showDiv.";'";

            ?>
          </div>
          <div id="cc_info" style=<?php echo $display?>>
                

<div>
  <h3>Enter New Credit Card Information</h3>
  <h6 style="background-color:">(Note: We've provided a default credit card for demo purposes)</h6>
  <br/>
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
      echo $this->Form->input('cardtype', array("label"=>false,'options' => $options, "class" =>"input-medium input-block-level input-big" ,'empty' => 'Select Card Type',"style"=>'width:90%')); ?>
    </div>
    <div class="span6">
      <?php
        echo $this->Form->input('creditcards',array("label"=>false, "class"=>"input-medium input-block-level input-big", "style"=>"width:90%","value"=>"4716758877592824"));?>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
       <input name="ccvnumber" type="text" class="span12 input-medium input-block-level input-big" placeholder="CCV Number">
    </div>
    <div class="span6">
      <div class="row-fluid">
        <div class="span12">
          <input name="expiration_month" placeholder="Expiration Month: MM" maxlength="2" class="span5 input-medium input-block-level input-big" type="text">
          <input name="expiration_year" placeholder="Expiration Year: YYYY" maxlength="4" class="span5 input-medium input-block-level input-big" type="text">
        </div>
      </div>
    </div>
  </div>
</div>


                
                <button  class = "btn btn-medium  btn-block mt5" href="javascript:$('#cc_info').slideUp('slow');
                      $('#currentCC').slideDown('slow');">
               Cancel</button>  

          </div>
        </div>
    

<div class="pt10 pl10 pr10 pb20"> 
        <div class="row-fluid">
        <div class="form">
          <?php echo $this->Form->button("Edit Account",array('type' => 'submit', 'class' => 'btn btn-primary btn-block btn-large mt5')); ?>
        </div>
      </div>
      </div>
    </div>
  </div>
    </div>
    <?php echo $this->Js->writeBuffer();?>