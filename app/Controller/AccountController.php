<?php 

class AccountController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    	$this->set('title_for_layout', 'Account');
    	$this->set('activelink', 'account');
    }

    public function edit() {
    	$this->set('title_for_layout', 'Account');
    	$this->set('activelink', 'account');
    }

}