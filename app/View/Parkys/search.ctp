
    <header>
        <div class="container" >
        <h3>Search All Parkys</h3>
        </div>
      </header>
    <div class="container">
      <div class="row">
        <div class="span12" align="center">
          <form class="form-search" action="javascript:$('#parkieslist').slideDown('slow');">
            <input type="text" class="input-large search-query" placeholder="Enter Address of Your Destination">
            <br>
            <br>
          </form>
        </div>
      </div> 
       <div class="container">
            <div class="row">
        <div class="span3">
        </div>
        <div class="span6" style="text-align:center">
          Filter Car Size:
          <div class="btn-group" data-toggle="buttons-radio" id="carsize">
          <button type="button" class="btn active" data-toggle="button">Sedan
          <input type="radio" name="size" value="0" /></button>

          <button type="button"class="btn" data-toggle="button">SUV
          <input type="radio" name="size" value="1" /></button>

          <button type="button" class="btn" data-toggle="button">Van
          <input type="radio" name="size" value="2" /></button>
          </div>
        </div>
        <div class="span3">
        </div>
        <br>
      </div>
      <div class="row">
        <div class="span3">
        </div>
        <div class="span6" style="text-align:center">
            Sort by: 
          <div class="btn-group" data-toggle="buttons-radio" id="sortby">
          <button type="button" class="btn active" data-toggle="button">Distance
          <input type="radio" name="sort" value="data-distance" /></button>

          <button type="button"class="btn" data-toggle="button">Price
          <input type="radio" name="sort" value="data-price" /></button>

          <button type="button" class="btn" data-toggle="button">End Time
          <input type="radio" name="sort" value="data-end" /></button>
          </div>
        </div>
        <div class="span3">
        </div>
      </div> 
    </div>

  </div>
    <br>
    <div class="container shownow" id="parkieslist" style="display:none">
      <div class="row"><?php echo $this->Session->flash(); ?></div>
      <?php foreach ($parkys as $parky): ?>
      <?php echo $this->Html->div('row',null,array("id"=>"listing", "data-distance"=> $parky['Parky']['distance'], "data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'], "data-size"=> $parky['Parky']['carsize'])); ?>
        <div class="span3">
        </div>
        <div class="span6">
           <?php 

            $nextURL = "window.location='/parkys/selecttime/".$parky['Parky']['id']."'";
            echo $this->Html->div('profile',null, array('onclick' =>$nextURL)); 

            ?>
            <div class="profile_header" style="text-align:center">
              <h2><?php echo $parky['Parky']['name'] ?></h2>
            </div>
            
            <div class="profile_footer">
               <div class="padding">
              <?php 

              $address = $parky['Parky']['address'];
              $city = $parky['Parky']['city'];
              $state = $parky['Parky']['state'];

              $mapURL = "http://maps.googleapis.com/maps/api/staticmap?center=".$address.",".$city.",".$state."&zoom=14&scale=1&size=75x75&sensor=false&markers=color:gray|".$address.",".$city.",".$state;

              $googleLink = "http://maps.google.com/?q=".$address.", ".$city.", ".$state."";
              echo '<a style="float:left" target="_blank" href="'.$googleLink.'"><img class="parky" src="'.$mapURL.'" alt="'.$address.", ".$city.", ".$state.'"></a>';

              ?>
                <strong>Distance: </strong><?php echo $parky['Parky']['distance']." miles" ?> from me<br>
                 <strong>Price:</strong>
              $<?php echo $parky['Parky']['price']?></br>

              <strong>Availability:</strong>
              <?php 
              $time = strtotime($parky['Parky']['start']);
              $time = date("h:i A", $time);
              echo $time
              ?>-<?php $time2 = strtotime($parky['Parky']['end']);
              $time2 = date("h:i A", $time2);
              echo $time2 ?>
                <br>
              </div>
            </div>
            </div>
          </div>
        <div class="span3">
        </div>
    </div>
        <?php endforeach; ?>
    <?php unset($parky); ?>
  </div>

  <script type="text/javascript">
        // hovercolor(".profile",'#C70','#F90'); // from helpers.js
  </script>
