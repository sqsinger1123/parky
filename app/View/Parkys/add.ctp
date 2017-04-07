<header>
        <div class="container">
        <h3>Add a Driveway</h3>
        </div>
      </header>
 <div class="filtermenu">
        <div class="aligncenter">
          Use the area below to post a new space for others to park. Your information is <span class="orange">safe</span> and <span class="orange">secure</span>.
        </div>
      </div>
<div class="row-fluid">
  <div class="span4 offset4">
    <div class="profilemap pl10 pr10 pb10">
          <h3>Driveway Information</h3>
          <?php echo $this->Form->create('Parky');?>

          <?php echo $this->Form->input('name', array('label' => 'Parky Name','placeholder' => 'E.g. Parky Koolness', 'class' => 'input-medium input-block-level input-medium-big')); ?>
          <?php echo $this->Form->input('price', array('type' => 'number', 'min' => 1, 'max' => 10, 'value' => 1,'label' => 'Desired Price ($USD/hour)', 'class' => 'input-medium input-block-level input-medium-big')); ?>
          <?php echo $this->Form->input('address', array('label' => 'Street Address','placeholder' => 'E.g. 56 Linnaean Street', 'class' => 'input-medium input-block-level input-medium-big')); ?>

          <?php echo $this->Form->input('city', array('label' => 'City','placeholder' => 'E.g. Cambridge', 'class' => 'input-medium input-block-level input-medium-big')); ?>
          <?php echo $this->Form->input('state', array('class' => 'input-medium input-block-level input-medium-big', 'options' => array('empty' => 'Select a State', 'AK' => 'AK', 'AL' => 'AL', 'AR' => 'AR', 'AZ' => 'AZ', 'CA' => 'CA', 'CO' => 'CO', 'CT' => 'CT', 'DC' => 'DC', 'DE' => 'DE', 'FL' => 'FL', 'GA' => 'GA', 'HI' => 'HI', 'IA' => 'IA', 'ID' => 'ID', 'IL' => 'IL', 'IN' => 'IN', 'KS' => 'KS', 'KY' => 'KY', 'LA' => 'LA', 'MA' => 'MA', 'MD' => 'MD', 'ME' => 'ME', 'MI' => 'MI', 'MN' => 'MN', 'MO' => 'MO', 'MS' => 'MS', 'MT' => 'MT', 'NC' => 'NC', 'ND' => 'ND', 'NE' => 'NE', 'NH' => 'NH', 'NJ' => 'NJ', 'NM' => 'NM', 'NV' => 'NV', 'NY' => 'NY', 'OH' => 'OH', 'OK' => 'OK', 'OR' => 'OR', 'PA' => 'PA', 'RI' => 'RI', 'SC' => 'SC', 'SD' => 'SD', 'TN' => 'TN', 'TX' => 'TX', 'UT' => 'UT', 'VA' => 'VA', 'VT' => 'VT', 'WA' => 'WA', 'WI' => 'WI', 'WV' => 'WV', 'WY' => 'WY'))); ?>

          <?php echo $this->Form->input('zipcode', array('type' => 'tel', 'label' => 'Zip Code','placeholder' => 'E.g. 02138', 'class' => 'input-medium input-block-level input-medium-big')); ?>
          <?php echo $this->Form->input('description', array('label' => 'Parky Description', 'class' => 'span12', 'placeholder' => 'E.g. Beautiful driveway with flowers in the springtime', 'rows' => '3'));?>
          <?php echo $this->Form->input('instructions', array('label' => 'Instructions for Drivers', 'class' => 'span12', 'placeholder' => 'E.g. Park next to the rosebushes', 'rows' => '3'));?>


              <?php 

            $today = date(" D, F j");
            $today = strtotime($today);

            $holder = new SplFixedArray(14);

            foreach($holder as $i)
            {
              $today = date("D, F j", $today);
              $datesshown[$today] = $today;  
              $today = strtotime($today."+1 day");
              $i++;
            }

            $start = strtotime("00:00");
            $end = strtotime("24:00");

            $startimes = array();
            $index;

            for($i = $start; $i<=$end; $i+=3600)
              {
                $index=date("H:i", $i);
                $display=date("h:i A", $i);
                $startimes[$index] = $display;  
              }
              
              $endtimes = $startimes;
              array_shift($endtimes);

            echo $this->Form->input('date', array('class' => 'input-medium input-block-level input-medium-big', 'id'=> 'date', 'label' => 'Date of Availability', 'options' => $datesshown, 'empty' => 'Choose a Date')); 

            echo $this->Form->input('start', array('class' => 'input-medium input-block-level input-medium-big', 'id'=> 'start', 'options' => $startimes, 'label' => 'Start Time of Availability', 'empty' => 'Select Start Time'));

            echo $this->Form->input('end', array('class' => 'input-medium input-block-level input-medium-big', 'id' =>'end','options' => $endtimes, 'label' => 'End Time of Availability', 'empty' => 'Select End Time'));
            ?>
            <?php echo $this->Form->input('owner', array("value"=>$userid,"type"=>"hidden")); ?>
            <?php echo $this->Form->input('reserver', array("value"=>-1,"type"=>"hidden")); ?>

            <h4><?php echo $this->Form->button('Add Parking Space', array('type' => 'submit', 'class' => 'mt20 btn btn-primary btn-large btn-block'));?></h4>

    
  </div>
</div>

