<?php 

class SigninController extends AppController {

    public function index() {
        $this->set('title_for_layout', 'Account');
        $this->set('activelink', 'account');
    }
}

?>