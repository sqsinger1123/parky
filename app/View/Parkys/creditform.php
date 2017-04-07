<div>
  <h3>Enter New Credit Card Information</h3>
  <h6 style="background-color:">(Demo note: it's ok, we do not save your data or process transactions. The default CC number will validate.)</h6>
  <br/>
  <div class="row-fluid">
    <div class="span6">
        <label>First Name</label>
        <input name="first_name" type="text" class="span12">
    </div>
    <div class="span6">
        <label>Last Name</label>
        <input name="last_name" type="text" class="span12">
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
      <?php 
        $options = array(array('name'=>'Visa', 'value'=>'Visa'), array('name'=>'American Express', 'value'=>'American Express'), array('name'=>'Mastercard', 'value'=>'Mastercard'));
      echo $this->Form->input('cardtype', array("label"=>"Card Type",'options' => $options, 'empty' => 'Select Type',"style"=>'width:90%')); ?>
    </div>
    <div class="span6">
      <?php
        echo $this->Form->input('creditcards',array("label"=>"Credit Card Number", "style"=>"width:90%","value"=>"4716758877592824"));?>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6">
        <label>CCV Number</label>
        <input name="ccvnumber" class="span12" type="text">
    </div>
    <div class="span6">
      <div class="row-fluid">
        <label>Expiration Date</label>
        <div class="span12">
          <input name="expiration_month" placeholder="MM" maxlength="2" class="span5" type="text">
          <input name="expiration_year" placeholder="YYYY" maxlength="4" class="span5" type="text">
        </div>
      </div>
    </div>
  </div>
</div>