
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
					<button type="submit" class="btn btn-primary" 
					    onclick="window.location='/login';">Submit
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
				<a href="/users/add">
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
					<label>Credit Card Type</label>
					 <select class="span12" id="cctype" name="cctype">
					<option>Select a Type</option>
				  <option value="Visa">Visa</option>
				  <option value="MasterCard">Mastercard</option>
				  <option value="AmericanExpress">American Express</option>
				  <option value="Other">Other</option>
				</select>
			  </div>
			  <div class="span6">
				<label>Credit Card Number</label>
					<input name="ccnumber" type="text" class="span12">
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
        <div class="well">
          <button type="submit" class="btn btn-primary" onclick="window.location='/login';">Submit</button> 
          <input type="reset" class="btn" value="Reset"> 
        </div>
    </div>

    </div>
    <div class="row-fluid">
    <div class ="span4">
        <br>
          <button type="submit" class="btn btn-primary" 
              onclick="window.location='/browse/selecttime';"> Back
          </button>
    </div>

	</div>
  </div>