
    <header>
        <div class="container">
        <h3>My Parkys</h3>
        </div>
      </header>


    <div class="container">


      <div class="row">
        <div class="span3">
        </div>
        <div class="span6">
          <?php echo $this->Session->flash(); ?>
            <button class="btn btn-large btn-primary btn-block" type="submit" onclick="window.location='/parkys/add'">
        <h4>+ Add a Parky</h4>
      </button>




        </div>
        <div class="span3">
        </div>
    </div>  
  </div>
    <br>
    <div class="container">
      <?php foreach ($parkys as $parky): ?>
      <div class="row">
        <div class="span3">
        </div>
        <div class="span6">
          <div class="profile">
            <div class="profile_header">
              <span class="pull-right mr20 mt10">

            <?php echo $this->Html->link('Edit', array('controller' => 'parkys', 'action' => 'edit', $parky['Parky']['id'])); ?> | <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $parky['Parky']['id']),
                array('confirm' => 'Are you sure?'));
            ?>

              </span>
              <h2><?php echo $parky['Parky']['name'] ?></h2>

            </div>

            <div class="profile_body">
              <?php 

              $address = $parky['Parky']['address'];
              $city = $parky['Parky']['city'];
              $state = $parky['Parky']['state'];

              $mapURL = "http://maps.googleapis.com/maps/api/staticmap?center=".$address.",".$city.",".$state."&zoom=14&size=300x150&sensor=false&markers=color:gray|".$address.",".$city.",".$state;

              echo '<img src="'.$mapURL.'" alt="'.$address.", ".$city.", ".$state.'">';

              ?>
            </div>
            <div class="profile_footer">

               <div class="padding">
              <?php echo $parky['Parky']['description']?><br>
                  <b>Location:</b>
              <?php echo $parky['Parky']['address'] ?>, <?php echo $parky['Parky']['city'] ?>, <?php echo $parky['Parky']['state'] ?> <?php echo $parky['Parky']['zipcode'] ?>
              <br>
              <b>Available:</b>
              From  <?php echo $parky['Parky']['start'] ?> to  <?php echo $parky['Parky']['end'] ?>
                <br>
                  <b>Price:</b>
              $<?php echo $parky['Parky']['price']?>/hr
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














    