<?php

class Parky extends AppModel {
	
 public $validate = array(
        'reservation_start' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please select a start time'
            )
        ),
        'reservation_end' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please select an end time'
            )
        ),
        'price' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a price'
            )
        ),
        'address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter an address'
            )
        ),
        'city' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a city'
            )
        ),
        'state' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a state'
            )
        ),
        'start' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a start time'
            )
        ),
        'end' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a end time'
            )
        ),
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a name for your Parky'
            )
        ),
        'zipcode' => array(
            'required' => array(
                'rule' => array('postal', null, "us"),
                'message' => '* Please enter a valid US zipcode'
            )
        ),
        'instructions' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter instructions'
            )
        ),
        'date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a date'
            )
        ),
        'car_descript' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a description of your car'
            )
        ),
        'reserveremail' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '* Please enter a valid email address'
            )
        ),
    ); 

}
