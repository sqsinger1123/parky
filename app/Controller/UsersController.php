<?php

class UsersController extends AppController {
	
    public function index(){
        $topuser = $this->User->find('first', array('order'=>'User.Id DESC')); 
        $guestnumber = $topuser['User']['id'] + 1;
        $guest = array('username' => 'guest' . $guestnumber, 'password' => 'guestpassword' . $guestnumber, 'firstname' => 'Guest', 'guest' => 1);

        if ($this->User->save($guest)) {
            // $id = $this->User->id;
            // $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
            $id = $this->User->id;
            $guest = array_merge($guest, array('id' => $id));
            $this->Auth->login($guest);
            $this->set('session',$this->Session);
            $this->Session->setFlash('You are logged in as Guest ' . $guestnumber . '.', "flash_add");
            // $this->Session->setFlash($this->User->getLastInsertId(), "flash_add");
            $confirmURL = "/parkys/confirm/".$this->Session->read('parkyid');
            $this->redirect($confirmURL);            

        }
        //else $this->Session->setFlash(__('Account creation fail'));

            // $confirmURL = "/parkys/confirm/".$this->Session->read('parkyid');
            // $this->redirect($confirmURL);
    }


    public function login() {

        $this->set('title_for_layout', 'Parky Users');
        $this->Auth->fields = array('username' => 'username', 'password' => 'password');
        $this->set('session',$this->Session);

        if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            if ($this->Session->read('redirect')!="") {
                $this->Session->setFlash('Successfully signed in!', "flash_add");
                $this->redirect($this->Session->read('redirect'));
            } else {
                $this->Session->setFlash('Successfully signed in!', "flash_add");
                $confirmURL = "/parkys/confirm/".$this->Session->read('parkyid');
                $this->redirect($confirmURL);
            }
            $this->Session->setFlash('Successfully signed in!', "flash_add");

        } else {
            $this->Session->setFlash('Invalid username or password, try again', "flash_error");
        }
    }
    }
    
    
    public function add() {
        $this->set('title_for_layout', 'Create an Account');
        $this->set('session',$this->Session);


        if ($this->User->save($this->request->data)) {
            $id = $this->User->id;
            $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
            $this->Auth->login($this->request->data['User']);
             if (!empty($this->request->data['User']['redirect'])) {
                $this->Session->setFlash('Account created and you are now signed in', "flash_add");
                $this->redirect( $this->request->data['User']['redirect'] );
            } else {
                $this->Session->setFlash('Account created and you are now signed in', "flash_add");
                $confirmURL = "/parkys/confirm/".$this->Session->read('parkyid');
                $this->redirect($confirmURL);
            }
        }
        //else $this->Session->setFlash(__('Account creation fail'));
}

    //     if ($this->request->is('post')) {
    //         $this->User->create();
    //         if ($this->User->save($this->request->data)) {
    //             $this->Session->setFlash(__('The user has been saved'));
    //              $this->Auth->login($this->request->data['User']);
    //             if (!empty($this->request->data['User']['redirect'])) {
    //                 $this->redirect( $this->request->data['User']['redirect'] );
    //             } else {
                
    //             $this->redirect( $this->Auth->redirectUrl() );
    //         } 
    //     }else {
    //             $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
    //         }
    //     }
    // }
    
    public function edit($id = null) {
        $id=$this->Auth->user('id');
        $this->set('session',$this->Session);
        $showDiv = "none";
        $this->set('showDiv', $showDiv);
        if (empty($this->request->data)) {
            $this->request->data = $this->User->findById($id);
            }
        else
        {
            if ($this->request->is('post')||$this->request->is('put')) {
                 $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $id = $this->User->id;
                    $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
                    $this->Auth->login($this->request->data['User']);
                    $this->Session->setFlash('Your account has been edited.', "flash_add");
                    $this->redirect('edit');
                } 
                else {
                    $this->Session->setFlash('Unable to edit your account', "flash_error");
                    $showDiv = "true";
                    $this->set('showDiv', $showDiv);
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
        $this->Session->destroy(); 
        $this->Session->setFlash('You have successfully logged out!', "flash_add");
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->set('refer',$this->referer());
    }

}
