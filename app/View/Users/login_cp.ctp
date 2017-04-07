
    <div class="container">
      <div class="row-fluid" id="top_row_fluid">  
                  <?php echo $this->Session->flash(); ?>
        <div class="well">
          <div class="row-fluid" id="top_well_inner">
            <div class="span3" id="logo_signin">
              <h1>Sign In</h1>
            </div> 
          <?php echo $this->Form->create('User'); ?>
			<fieldset>
				<div class="span3">
					<?php echo $this->Form->input('username', array("class"=>"input-medium input-block-level","label"=>"Username"));?>
				</div>
				<div class="span3">
					<?php echo $this->Form->input('password', array("class"=>"input-medium input-block-level","label"=>"Password"));?>
					</div>
				</div>
				<div class="span3">
				    <br/>
					<button type="submit" class="btn btn-primary" >Submit
					</button>
					<input type="reset" class="btn" value="Reset"> 
				</div>
			  </form> 
          </div> 
        </div>  
      </div> 
	<div class="row-fluid">
		<div class="span4">
	  		<p class="lead">
				New to Parky? <br/>
				<?php 
					if($_SERVER['QUERY_STRING']){
						$nextURL = "/users/add?".$_SERVER['QUERY_STRING'];
					}else{
						$nextURL = "/users/add";
					} 

				?>
				<a href= <?php echo $nextURL ?> >
					Create an Account >>
				</a>
			</p>
		</div> 
		<div class="span4">
	  		<p class="lead">
				Don't want to register now?
				<br/>
					<a href="javascript:$('#cc_info').slideDown('slow');
                    $('#currentCC').slideUp('slow');">
					  Guest Checkout >>
					</a>
				  </p>
				</div>
    </div>
    <div class="row-fluid">
    </div>
    <div id="cc_info" style="display:none;">
      

        <div class="well">

            <h3>Enter New Credit Card Information</h3>
            <br/>
            <div class="row-fluid">
			  <div class="control-group">
				<div class="span6">
					<label>First Name</label>
					<input name="first_name" type="text" class="span12">
				  </div>
				  <div class="span6">
					<label>Last Name</label>
					<input name="last_name" type="text" class="span12">
				  </div>
			  </div>
    
			   <div class="control-group">
        		<div class="span6">
 				<?php echo $this->Form->input('cardtype', array("label"=>"Credit Card Type",'options' => array('Visa', 'American Express','Mastercard'), 'empty' => 'Select a Card Type')); ?>
        </select>
        </div>
        <div class="span6">
        <?php
          echo $this->Form->input('creditcards',array("label"=>"Credit Card Number"));?>
        </div>
            </div>
      <div class="control-group">
        <div class="span6">
          <div class="span6">
              <label>CCV Number</label>
              <input name="ccvnumber" class="span12" type="text">
            </div>
            <div class="span6">
              <label>Expiration Date</label>
              <div class="span12">
                <input name="expiration_month" placeholder="MM" maxlength="2" class="span5" type="text">
                <input name="expiration_year" placeholder="YYYY" maxlength="4" class="span5" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="container">
          <?php
          $confirmURL = "'/parkys/confirm/".$session->read('parkyid')."'";
          $session->write(
          		AuthComponent::$sessionKey, array('User' => array('id' => 0,'username' => 'guest'
   				)));

          echo $this->Form->button('Submit', array("type"=>"submit", "class"=>"btn btn-primary","onclick"=> "window.location.href=".$confirmURL));

          ?>

          <input type="reset" class="btn" value="Reset"> 
        </div>
    </div>

    </div>
    <div class="row-fluid">
    	 <?php echo $this->Form->input('redirect', array('type' => 'hidden', 'value' => $this->request->query['redirect']));?>
    <div class ="span4">
        <br>
          <button type="submit" class="btn btn-primary" 
              onclick="history.go(-1);"> Back
          </button>
    </div>

	</div>
  </div>