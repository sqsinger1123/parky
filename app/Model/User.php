<?php

class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required',
            ),
            'unique' => array(
              'rule'    => 'isUnique',
              'message' => 'This username has already been taken.'   
            ),
        ),
    'passwd' => array(
      'required' => array(
        'rule' => 'notEmpty',
        'message'=>'Please enter a password.'
      ),
    ),
    'passwd_confirm' => array(
      'required'=>'notEmpty',
      'match'=>array(
        'rule' => 'validatePasswdConfirm',
        'message' => 'Passwords do not match'
      )
    ),
        'creditcards' => array(
            'required' => array(
                'rule' => array('cc', 'fast', false, null),
                'message' => '* Not a valid credit card number'
            )
        ),
    );

    /*public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }*/

    public function validatePasswdConfirm($data)
  {
    if ($this->data['User']['passwd'] !== $data['passwd_confirm'])
    {
      return false;
    }
    return true;
  }

  public function beforeSave($options = array())
  {
    if (isset($this->data['User']['passwd']))
    {
      $this->data['User']['password'] = Security::hash($this->data['User']['passwd'], null, true);
      unset($this->data['User']['passwd']);
    }

    if (isset($this->data['User']['passwd_confirm']))
    {
      unset($this->data['User']['passwd_confirm']);
    }

    return true;
}

public function beforeFind( $query ) {
  # Don't return the password field unless it's specified.
  $query['fields'] = empty( $query['fields'] )
    ? array_diff( array_keys( $this->schema() ), array( 'password' ) )
    : $query['fields'];

  return $query;
}



}
    
