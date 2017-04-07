
    <header>
        <div class="container">
        <h3>My Driveways</h3>
        </div>
      </header>
      <div class="row-fluid">
      <div class="span4 offset4 pt15">
                <?php echo $this->Session->flash(); ?>
              </div>
            </div>
      <?php if ($parkys == []): ?>
      <div class="row-fluid">
        <div class="span4  offset4">
          <center><h4>You have no posted driveways! <br>Click below to get started.</h4></center>  
        </div>
      </div>
    <?php endif ?>

<?php $counter = 0; ?>

   <div id="parkieslist">
      <div class="row-fluid">
      <div class="span4 offset4 pt15">
      <?php $parkycounter = 0; foreach ($parkys as $parky): ?>
      <?php $counter = $counter +1;?>
      <?php echo $this->Html->div('row',null,array("id"=>"listing", "data-distance"=> $parky['Parky']['distance'], "data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'], "data-size"=> $parky['Parky']['carsize'])); ?>
   
           <div class="myreservations" data-toggle="collapse" data-target="#reservationinfo<?php echo $counter?>"> 
               <span class="pull-right mr10 mt10">

            <?php echo $this->Html->link('Edit', array('controller' => 'parkys', 'action' => 'edit', $parky['Parky']['id'])); ?> | <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $parky['Parky']['id']),
                array('confirm' => 'Are you sure you would like to delete ' . $parky['Parky']['name'] .'? This action cannot be undone.'));
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
                                 <strong>Price: </strong>$<?php echo $parky['Parky']['price']?>/hr<br>
                                 
                                 <?php

                                 $reserverID = $parky['Parky']['reserver'];
                                 $start = strtotime($parky['Parky']['reservation_start']);
                                 $start = date("h:i A", $start);
                                  $end = strtotime($parky['Parky']['reservation_end']);
                                  $end = date("h:i A", $end);

                                  if($reserverID==-1){
                                    echo "No one has reserved your Parky!";
                                  } else if($reserverID==0){
                                    echo "<strong>Reserved by: </strong>"."Guest user";
                                     echo "<strong>For:</strong>".$parky['Parky']['date'].": ".$start."-".$end;
                                  }else{
                                    echo "<strong>Reserved by: </strong>".$reservers[$reserverID]['username'];
                                     echo "<br><strong>For: </strong>".$parky['Parky']['date'].": ".$start."-".$end;
                                  }
                                  ?>
                                  <br>
                                 <br>
                                 <center>
                                  <a <?php echo "href='javascript:$(\".viewmoreless" . $parkycounter . "\").toggle();'"; ?> class = "center" data-toggle="collapse" data-target="#reservationinfo<?php echo $counter?>">Click to view 
                                  <?php echo '<span class="viewmoreless' . $parkycounter . '">more ▼</span><span class="viewmoreless' . $parkycounter . '" style="display:none;">less &Delta;</span>'; $parkycounter++ ?> </a>
                                </center>
                                </div>
       <div id="reservationinfo<?php echo $counter?>" class="collapse ml10 mr10 mb10">
                    <?php echo $parky['Parky']['description']?><br>
                              <b>Distance: </b><?php echo $parky['Parky']['distance']." miles" ?> from current location<br>
                        <b>Location:</b>
                    <?php echo $parky['Parky']['address'] ?>, <?php echo $parky['Parky']['city'] ?>, <?php echo $parky['Parky']['state'] ?> <?php echo $parky['Parky']['zipcode'] ?>
                    <br>
                    <b>Availability:</b>
                    From  <?php echo $parky['Parky']['start'] ?> to  <?php echo $parky['Parky']['end'] ?>
                      <br>
                  <b>Instructions to driver:</b>
                    <?php echo $parky['Parky']['instructions']?></div>
  </div>
                  
    </div>


        <?php endforeach; ?>
    <?php unset($parky); ?>

        </div>
</div>
      <div class="row-fluid pt15">
        <div class="span4 offset4">
          <?php echo $this->Session->flash(); ?>
            <button class="btn btn-large btn-primary btn-block" type="submit" onclick="window.location='/parkys/add'">
        <h4>+ Add another driveway</h4>
      </button>
    </div>  
  </div>

</div>
</div>






    