<?php 

class ParkysController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
    	$this->set('title_for_layout', 'Browse Parkys');
        $this->set('Parkys', $this->Parky->find('all'));


    }

    public function selecttime($id = null) {
    	$this->set('title_for_layout', 'Select a Reservation Time');
        if (!$id) {
            throw new NotFoundException(__('Invalid post lol'));
        }

        $parky = $this->Parky->findById($id);
        if (!$parky) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $this->set('parky', $parky);


        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Parky->id = $id;
            if ($this->Parky->save($this->request->data)) {
                $this->Session->setFlash('Your Parky has been updated.');
                $this->redirect(array('controller' => 'parky', 'action' => 'confirm', $parky['Parky']['id']));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $parky;
        }

    }


    public function confirm($id = null) {
    	$this->set('title_for_layout', 'Confirm Reservation');
        if (!$id) {
            throw new NotFoundException(__('Invalid post lol'));
        }

        $browse = $this->Browse->findById($id);
        if (!$browse) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $this->set('browse', $browse);


        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Browse->id = $id;
            if ($this->Browse->save($this->request->data)) {
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array('controller' => 'browse', 'action' => 'thankyou', $browse['Browse']['id']));
            } else {
                $this->Session->setFlash('Unable to update your post.');
            }
        }

        if (!$this->request->data) {
            $this->request->data = $browse;
        }




    }





    public function thankyou() {
    	$this->set('title_for_layout', 'Reservation Complete');
    	$this->set('activelink', 'browse');


    }
}