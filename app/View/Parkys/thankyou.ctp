<header>
  <div class="container">
    <h3>You have successfully reserved <span class="orange"><?php echo $parky['Parky']['name']; ?></span></h3>
  </div>
</header>

<div class="filtermenu">
  <div class="aligncenter">
    <button class="btn btn-primary btn-large"
            type="submit" onclick="window.location='http://maps.google.com/maps?saddr=Current%20Location&daddr=64 linnaean street, Cambridge MA ';">
              Get Directions with Google Maps
          </button><br/><br/>
<b>Reservation:</b>
              <span class="orange"><?php  $time = strtotime($parky['Parky']['reservation_start']);
              $time = date("h:i A", $time);
              echo $time?> - </span>
              <span class="orange"><?php $time2 = strtotime($parky['Parky']['end']);
              $time2 = date("h:i A", $time2);
              echo $time2 ?></span> | 
              <span class="orange">$<?php echo $parky['Parky']['total_price']?></span><br>
              A confirmation email has been sent to <span class="orange"><?php echo $parky['Parky']['reserveremail']?></span>.

  </div>
</div>
<div class="row-fluid">
  <div class="span4 offset4">
         <?php echo $this->Session->flash(); ?>
       <?php echo $this->Html->div('row',null,array("data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'])); ?>
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
    <div class="profilemap p10">
      <div class="fulldescription">

            <button class="btn btn-block" id="report_issue_button"
            type="submit" onclick="
              javascript:$('#report').slideDown('slow');
              $('#thankyou123').slideUp('slow');">
              Report An Issue
            </button>
        <div class="padding" id="thankyou123" style="display:none;">
          <h4>Thank you for reporting this issue! We are always working to update Parky and better serve your driving experience!</h4>
        </div>
      <div class="row-fluid" id="report" style="display:none;">
            <div class="span12 mt10">
              <label>Please report the issue here:</label>
              <textarea name="extras" class="span12" rows="4" placeholder="E.g. Car did not fit."></textarea>
              <button class="btn btn-primary" 
              onclick="
              $('#thankyou123').slideDown('slow');
              $('#report').slideUp('slow');
              $('#report_issue_button').html('Report Another Issue');">Submit</button>
            </div>

      </div>
    </div>

</div>
</div>

</div>


