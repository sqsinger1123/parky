<header>
  <div class="container">
    <h3><?php echo $parky['Parky']['name']; ?></h3>
  </div>
</header>

<div class="filtermenu">
  <div class="aligncenter">
    <?php echo $this->Form->create('Parky'); ?>
<b>Reservation Start:</b>
              <span class="orange"><?php  $time = strtotime($parky['Parky']['reservation_start']);
              $time = date("h:i A", $time);
              echo $time?></span><br>
              <b>Reservation End:</b>
              <span class="orange"><?php $time2 = strtotime($parky['Parky']['end']);
              $time2 = date("h:i A", $time2);
              echo $time2 ?></span><Br>
              <b>Total Price: </b>
              <span class="orange">$<?php echo $parky['Parky']['total_price']?></span><br>
              <?php echo $this->Form->input('confirmed', array('value' => 1, 'type' => 'hidden'));?>


  </div>
</div>
<div class="row-fluid">
  <div class="span4 offset4">
         <?php echo $this->Session->flash(); ?>
       <?php echo $this->Html->div('row',null,array("data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'])); ?>
        <div class="profilemap p10">
          <div class="fulldescription">
                <h4>Credit Card Information</h4>
                <div class="row-fluid">
                  <div class="span9" align="left">
                <?php
                if ($session->read('Auth.User.cardtype') == null) {echo 'XXXX XXXX XXXX X892';} else echo $session->read('Auth.User.cardtype');
                ?>
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
                  </div>
                  <div class="span3" align="right">
                    <a href="javascript:$('#cc_info').slideDown('slow');
                        $('#currentCC').slideUp('slow');">
                      Or, Enter a New Credit Card
                    </a>    
                </div>
            </div>
          <div id="cc_info" style="display:none;">
<div>
  <h4>Enter New Credit Card Information</h4>
  <h6>(Demo note: it's ok, we do not save your data or process transactions. The default CC number will validate.)</h6>
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


            
            <a href="javascript:$('#cc_info').slideUp('slow');
                        $('#currentCC').slideDown('slow');">
              Nevermind! Use my card on file.</a> | 
              <a href="javascript:$('#cc_info').slideUp('slow');
                        $('#currentCC').slideDown('slow');">
              Use this card.</a><br>
          </div>


        </div>
      </div>

    <div class="profilemap p10">
      <div class="fulldescription">
        <h4>Confirmation</h4>
        <?php echo $this->Form->input('reserver', array('value' => $userid, 'type' => 'hidden'));?>
        <?php if($currentuser['User']['email'] == '') {
          echo 'Please provide a valid email address to complete your reservation.' . '<br>';
          echo $this->Form->input('reserveremail', array('label'=> false, 'placeholder' => 'example@domain.com'));
        } else {
          echo 'A confirmation email will be emailed to <strong>' . $currentuser['User']['email'] .'</strong>.<br>';
          echo $this->Form->input('reserveremail', array('value' => $currentuser['User']['email'], 'type' => 'hidden'));
        }

        ?>
Your reservation is from <b><?php  $time = strtotime($parky['Parky']['reservation_start']);
              $time = date("h:i A", $time);
              echo $time?></b> to <b><?php $time2 = strtotime($parky['Parky']['end']);
              $time2 = date("h:i A", $time2);
              echo $time2 ?></b>.<br>
              Your credit card will be charged <b>$<?php echo $parky['Parky']['total_price']?></b>.<br><br>
        <?php echo $this->Form->button('Confirm Payment', array('type' => 'submit', 'class' => 'btn btn-block btn-primary'));?>

      </div>
    </div>


        <div class="profilemap">
     <?php 

      $address = $parky['Parky']['address'];
      $city = $parky['Parky']['city'];
      $state = $parky['Parky']['state'];

      $mapURL = "http://maps.googleapis.com/maps/api/staticmap?center=".$address.",".$city.",".$state."&zoom=14&scale=2&size=300x150&sensor=false&markers=color:gray|".$address.",".$city.",".$state;

      $googleLink = "http://maps.google.com/?q=".$address.", ".$city.", ".$state."";
      echo '<a target="_blank" href="'.$googleLink.'"><img src="'.$mapURL.'" alt="'.$address.", ".$city.", ".$state.'"></a>';

      ?>
    </div>
    <div class="profilemap p10">
      <div class="fulldescription">

              <b>Description: </b><?php echo $parky['Parky']['description']?><br>
                        <b>Distance: </b><?php echo $parky['Parky']['distance']." miles" ?> from current location<br>
                  <b>Location:</b>
              <?php echo $parky['Parky']['address'] ?>, <?php echo $parky['Parky']['city'] ?>, <?php echo $parky['Parky']['state'] ?> <?php echo $parky['Parky']['zipcode'] ?>
              <br>
              <b>Availability:</b>
              From  <?php 
              $time = strtotime($parky['Parky']['start']);
              $time = date("h:i A", $time);
              echo $time
              ?> to  

              <?php               $time2 = strtotime($parky['Parky']['end']);
              $time2 = date("h:i A", $time2);
              echo $time2 ?>
                <br>
                  <b>Price:</b>
              $<?php echo $parky['Parky']['price']?></br>
            <b>Instructions to driver:</b>
              <?php echo $parky['Parky']['instructions']?>
                <br>

    </div>

  </div>
</div>
</div>
</div>
</div>


