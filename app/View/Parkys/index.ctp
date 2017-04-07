
    <header>
        <div class="container">
        <h3>Find a parking space</h3>

        </div>
      </header>

      <div class="filtermenu">
        <div class="aligncenter">
            <button type="button" class="btn" data-toggle="collapse" data-target="#search" onclick="$('.searcharrow').toggle();">
  Search: Nearby <span class="searcharrow">↓</span><span class="searcharrow" style="display:none;">↑</span>
</button>
      <button type="button" class="btn" data-toggle="collapse" data-target="#filter" onclick="$('.filterarrow').toggle();">
  filter results <span class="filterarrow">↓</span><span class="filterarrow" style="display:none;">↑</span>
</button>


<div id="search" class="collapse">
  <div class="pt15">
     <form class="form-search" action="javascript:$('#parkieslist').slideDown('slow');">
            <input id="searchinput" type="text" class="search-query inline" placeholder="Enter Address of Your Destination">
            <button id = "searchby" type="button" class="btn">Go</button>
            <button id="nearby" type="button" class="btn active">Use Current Location</button>
          </form>
        </div>
</div>
<div id="filter" class="collapse"> 


    <div class="container pt15">
            <div class="row">
        <div class="span3 pt15">
        </div>
        <div class="span6" style="text-align:center">
          Car Size:
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
      </div>
      <div class="row">
        <div class="span3">
        </div>
        <div class="span6" style="text-align:center">
            Sort By: 
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
</div></div>
    <div id="parkieslist" class="shownow">
      <div class="row-fluid">
      <div class="span4 offset4">
        <?php echo $this->Session->flash(); ?>
      <?php foreach ($parkys as $parky): ?>
      <?php echo $this->Html->div('row',null,array("id"=>"listing", "data-distance"=> $parky['Parky']['distance'], "data-price"=> $parky['Parky']['price'], "data-start"=> $parky['Parky']['start'], "data-end"=> $parky['Parky']['end'], "data-size"=> $parky['Parky']['carsize'])); ?>

           <?php 

            $nextURL = "window.location='parkys/selecttime/".$parky['Parky']['id']."'";
            echo $this->Html->div('profileparky',null, array('onclick' =>$nextURL)); 

            ?>
              <div class="p10">
                    <?php 

                          $address = $parky['Parky']['address'];
                          $city = $parky['Parky']['city'];
                          $state = $parky['Parky']['state'];

                          $mapURL = "http://maps.googleapis.com/maps/api/staticmap?center=".$address.",".$city.",".$state."&zoom=14&scale=1&size=100x100&sensor=false&markers=color:gray|".$address.",".$city.",".$state;

                          $googleLink = "http://maps.google.com/?q=".$address.", ".$city.", ".$state."";
                          echo '<a style="float:left" target="_blank" href="javascript:abcd = 1;"><img class="parky" src="'.$mapURL.'" alt="'.$address.", ".$city.", ".$state.'"></a>';

                          ?>
         
                
                              <h4><?php echo $parky['Parky']['name'] ?></h4>
                                 <strong><?php echo $parky['Parky']['distance']." miles" ?></strong> from me<br>
                                  Free from <?php 
                                  $time = strtotime($parky['Parky']['start']);
                                  $time = date("h:i A", $time);
                                  echo $time
                                  ?> until <?php $time2 = strtotime($parky['Parky']['end']);
                                  $time2 = date("h:i A", $time2);
                                  echo $time2 ?>
                                </div>
                 <span class="parkyprice">
                  <strong>$<?php echo $parky['Parky']['price']?>/hr</strong>
                </span>
    </div>
  </div>
        <?php endforeach; ?>
    <?php unset($parky); ?>
        </div>
</div>
</div>
