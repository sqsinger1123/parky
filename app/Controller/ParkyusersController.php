<?php

class ParkyusersController extends AppController {
	public function index() {
    	$this->set('title_for_layout', 'Parky Users');
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            $this->redirect('/myparkys/');
            $this->Session->setFlash('Signed-in!');
        } else {
            var_dump($this->data);
            $this->Session->setFlash('Invalid username or password, try again');
        }
    }
    }
    
    public function displayall() {
    	$this->set('title_for_layout', 'Users: Display');
        $this->set('parkyusers', $this->Parkyuser->find('all'));
    }
    
    public function add() {
        $this->set('title_for_layout', 'Create an Account');
        if ($this->request->is('post')) {
            $this->Parkyuser->create();
            if ($this->Parkyuser->save($this->request->data)) {
                $this->Session->setFlash('Your account has been created.', 'flash_add');
                $this->redirect(array('action' => 'displayall'));
            } else {
                $this->Session->setFlash('Unable to create your account.');
            }
        }

    }
    
    public function edit($id = null) {
        $this->Parkyuser->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }


public function logout() {
    $this->redirect($this->Auth->logout());
}
    
}