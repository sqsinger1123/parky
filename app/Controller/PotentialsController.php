<?php

class PotentialusersController extends AppController {
	
    
    public function index() {
        $this->set('title_for_layout', 'Parky');
        $this->set('session',$this->Session);

        if ($this->User->save($this->request->data)) {
            $id = $this->User->id;
            $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
            $this->Auth->login($this->request->data['User']);
            $this->redirect('/parkys');
            $this->Session->setFlash(__('Account created and you are now signed in', "flash_add"));
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
}
