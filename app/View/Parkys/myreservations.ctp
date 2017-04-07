
    <header>
        <div class="container">
        <h3>My Reservations</h3>
        </div>
      </header>

      <?php if ($parkys == []): ?>
      <div class="row-fluid">
        <div class="span4 offset4 pt15">
          <?php echo $this->Session->flash(); ?>
          <center><h4>You have not made any reservations.</center><br>



        </div>
      </div>



    <?php endif ?>

  <?php if ($parkys != []): ?>
<?php $counter = 0; ?>

   <div id="parkieslist">
      <div class="row-fluid">
      <div class="span4 pt15 pl15 offset4">
        <?php echo $this->Session->flash(); ?>
      <?php $parkycounter = 0; 
        foreach ($parkys as $parky): ?>
      <?php $counter = $counter +1;?>
      <?php echo $this->Html->div('row',null,array("id"=>"listing", "data-distance"=> $parky['Parky']['distance'], "data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'], "data-size"=> $parky['Parky']['carsize'])); ?>
   
           <div class="myreservations"> 
               <span class="pull-right mr10 mt10">

          <a href="/parkys/selecttime/<?php echo $parky['Parky']['id'];?>">Change Reservation</a> |
                        <?php echo $this->Form->postLink(
                'Cancel ',
                array('action' => 'cancel', $parky['Parky']['id']),
                array('confirm' => 'Are you sure you would like to cancel ' . $parky['Parky']['name'] .'? This action cannot be undone.'));
            ?>

              </span>
              <div class="p10">

                    <?php 

                          $address = $parky['Parky']['address'];
                          $city = $parky['Parky']['city'];
                          $state = $parky['Parky']['state'];

                          $mapURL = "http://maps.googleapis.com/maps/api/staticmap?center=".$address.",".$city.",".$state."&zoom=14&scale=1&size=100x100&sensor=false&markers=color:gray|".$address.",".$city.",".$state;

                          $googleLink = "http://maps.google.com/?q=".$address.", ".$city.", ".$state."";
                          echo '<img class="parky" align="left" src="'.$mapURL.'" alt="'.$address.", ".$city.", ".$state.'">';

                          ?>
                              <h4><?php echo $parky['Parky']['name'] ?></h4>
                                 <strong><?php echo $parky['Parky']['distance']." miles" ?></strong> from me<br>
                                 <strong>Paid: </strong>$<?php echo $parky['Parky']['total_price']?><br>
                                 Reserved from <strong>
                                 <?php
                                    $start = strtotime($parky['Parky']['reservation_start']);
                                    $start = date("h:i A", $start);
                                    $end = strtotime($parky['Parky']['reservation_end']);
                                    $end = date("h:i A", $end);
                                    echo $start."-".$end;
                                 ?>
                               </strong>
                                 <br>

                                 <a <?php echo "href='javascript:$(\".viewmoreless" . $parkycounter . "\").toggle();'"; ?> data-toggle="collapse" data-target="#reservationinfo<?php echo $counter?>">Click to view 
                                  <?php echo '<span class="viewmoreless' . $parkycounter . '">more ▼</span><span class="viewmoreless' . $parkycounter . '" style="display:none;">less &Delta;</span>'; $parkycounter++ ?> </a>
                                </div>
       <div id="reservationinfo<?php echo $counter?>" class="collapse ml10 mr10 mb10">
                    <?php echo $parky['Parky']['description']?><br>
                              <b>Distance: </b><?php echo $parky['Parky']['distance']." miles" ?> from current location<br>
                        <b>Location:</b>
                    <?php echo $parky['Parky']['address'] ?>, <?php echo $parky['Parky']['city'] ?>, <?php echo $parky['Parky']['state'] ?> <?php echo $parky['Parky']['zipcode'] ?>
                    <br>
                    <b>Availability:</b>
                    From  <?php 
                                                     $start = strtotime($parky['Parky']['start']);
                                 $start = date("h:i A", $start);
                                  $end = strtotime($parky['Parky']['end']);
                                  $end = date("h:i A", $end);

                    echo $start." to ".$end; ?>
                      <br>
                        <b>Price:</b>
                    $<?php echo $parky['Parky']['price']?></br>
                  <b>Instructions to driver:</b>
                    <?php echo $parky['Parky']['instructions']?>
      </div>

      </div>
      </div>

        <?php endforeach; ?>
    <?php unset($parky); ?>

        </div>


</div>
<?php endif ?>
  <div class="row-fluid pt15">
        <div class="span4 offset4"><center>
          <?php echo $this->Session->flash(); ?>
            <button class="btn btn-large btn-primary btn-block" type="submit" onclick="window.location='/parkys'">
        <h4>Find another place to park!</h4>
      </button>
    </center>
    </div>  
  </div>






</div>
</div>







    