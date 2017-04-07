
<header>
  <div class="container">
    <h3><?php echo $parky['Parky']['name']; ?></h3>
  </div>
</header>
<div class="row-fluid">
    <div class="profileselecttime">
      <div class="span4 offset4 aligncenter pl20">
        <div class="selecttimedropdown">
      Reservation:
       <?php 

                  $start = strtotime($parky['Parky']['start']);
                  $end = strtotime($parky['Parky']['end']);

                  $startimes = array();
                  $index;

                  for($i = $start; $i<=$end; $i+=3600)
                  {
                    $index=date("H:i", $i);
                    $display=date("h:i A", $i);
                    $startimes[$index] = $display;  
                  }
                  
                  $endtimes = $startimes;
                  array_pop($startimes);
                  array_shift($endtimes);

                  echo $this->Form->create('Parky');
                   if($userid==$parky['Parky']['reserver']){
                    $res_start = strtotime($parky['Parky']['reservation_start']);
                    $res_end = strtotime($parky['Parky']['reservation_end']);

                    $res_start = date("H:i", $res_start);
                    $res_end = date("H:i", $res_end);


                    echo $this->Form->input('reservation_start', array('id'=> 'start', "label"=>false, 'options' => $startimes, 'empty' => 'Start Time', 'default'=>$res_start)); 
                    echo $this->Form->input('reservation_end', array('id' =>'end',"label"=>false, 'options' => $endtimes, 'empty' => 'End Time', 'default'=>$res_end));
                   }else{
                      echo $this->Form->input('reservation_start', array('id'=> 'start', "label"=>false, 'options' => $startimes, 'empty' => 'Start Time')); 
                      echo $this->Form->input('reservation_end', array('id' =>'end',"label"=>false, 'options' => $endtimes, 'empty' => 'End Time')); 
                  }
                  echo $this->Form->input('total_price', array("id"=>"totalcost","type"=>"hidden"));

                ?>
              </div>
              <div class="totalcost">
                Total Cost:
                <h4><span id="totalcostview">
                  <?php

                  if(isset($res_start)){
                    echo "$".$parky['Parky']['total_price'];
                  } else{
                    echo "--";
                  }

                  ?>
                </span></h4>
              <?php echo $this->Form->button('Go', array('type' => 'submit', 'style'=>'margin-top:10px', 'class' => 'btn btn-primary'));?>

              </div>
    </div>
    </div>
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

              <?php  $time2 = strtotime($parky['Parky']['end']);
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
