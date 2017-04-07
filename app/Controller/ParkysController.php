<?php 

class ParkysController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('session',$this->Session);
    	$this->set('title_for_layout', 'Parky: Find a Parking Space');
        $this->set('parkys', $this->Parky->find('all', array('conditions' => array('Parky.reserver =' => -1))));
    }
    
    public function about() {
    	$this->set('session',$this->Session);
    	$this->set('title_for_layout', 'About Parky');
        $this->set('parkys', $this->Parky->find('all'));
    }

    public function mydriveways() {
        $this->set('session',$this->Session);
        $userid = $this->Auth->user('id');
        $this->set('title_for_layout', 'View My Driveways');
        $this->set('parkys', $this->Parky->findAllByOwner($userid));
        $reservers = ClassRegistry::init('User')->find('all', array('fields'=>array('id','username','email')));
        $reservers = Set::combine($reservers, '{n}.User.id', '{n}.User');
        $this->set('reservers', $reservers);
    }

    public function myreservations() {
        $this->set('session',$this->Session);
        $userid = $this->Auth->user('id');
        $this->set('title_for_layout', 'View My Reservations');
        $this->set('parkys', $this->Parky->findAllByReserver($userid));
    }

    public function selecttime($id = null) {
        $this->set('session',$this->Session);
    	$this->set('title_for_layout', 'Select a Reservation Time');
        if (!$id) {
            throw new NotFoundException(__('Invalid post lol'));
        }

        $parky = $this->Parky->findById($id);
        if (!$parky) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $this->set('parky', $parky);
        $this->Session->write('parkyid', $parky['Parky']['id']);
        $userid = $this->Auth->user('id');
        $this->set('userid', $userid);
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Parky->id = $id;
            if ($this->Parky->save($this->request->data)) {
                $this->redirect(array('controller' => 'parkys', 'action' => 'confirm', $parky['Parky']['id']));
            } else {
                $this->Session->setFlash('Please select a reservation time range', "flash_error");
            }
        }
        
    }   


    public function confirm($id = null) {
        $this->loadModel('User');
        $this->set('title_for_layout', 'Confirm Reservation');
        $this->set('userid', $this->Auth->user('id'));
        $this->set('currentuser', $this->User->find('first', array('conditions' => array('User.id'=> $this->Auth->user('id'))))); 
        $this->set('session',$this->Session);
        if (!$id) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $parky = $this->Parky->findById($id);

        if (!$parky) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $this->set('parky', $parky);
        $this->set('session',$this->Session);
        if (empty($this->request->data)) {
            $this->request->data = $this->Parky->findById($id);
        }else{
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Parky->id = $id;
            if ($this->Parky->save($this->request->data)) {
                
                $this->redirect(array('controller' => 'parkys', 'action' => 'thankyou', $parky['Parky']['id']));
            } else {
                $this->Session->setFlash('Unable to update your post.', "flash_error");
            }
        }
    }
}


    public function thankyou($id = null) {
    	$this->set('title_for_layout', 'Reservation Complete');
        if (!$id) {
            throw new NotFoundException(__('Invalid post lol'));
        }

        $parky = $this->Parky->findById($id);
        if (!$parky) {
            throw new NotFoundException(__('Invalid post lol'));
        }
        $this->set('parky', $parky);

    }

    public function my() {
        $this->set('title_for_layout', 'View My Parkys');
        $this->set('parkys', $this->Parky->find('all'));
    }



    public function add() {
        $this->set('title_for_layout', 'Add a Parky');
        $this->set('session',$this->Session);
        $this->set('userid', $this->Auth->user('id'));
        if ($this->request->is('post')) {
            $this->Parky->create();
            if ($this->Parky->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.', 'flash_add');
                $this->redirect(array('action' => 'mydriveways'));
            } else {
                $this->Session->setFlash('Unable to add your post.', "flash_error");
            }
        }

    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Parky->delete($id)) {
            $this->Session->setFlash('The driveway with id: ' . $id . ' has been deleted.', 'flash_delete');
            $this->redirect(array('action' => 'mydriveways'));
        }  
    }

    public function cancel($id) {

        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Parky->id = $id;
        $this->Parky->saveField('reserver', -1);
        $this->Session->setFlash($this->Parky->field('name') . ' has been canceled.', 'flash_delete');
        $this->redirect(array('action' => 'myreservations'));
    }

    public function search() {
        $this->set('title_for_layout', 'Search Parkys');
        $this->set('parkys', $this->Parky->find('all'));
        $this->set('session',$this->Session);

    }
    
    public function login() {
        $this->set('title_for_layout', 'Log In');
        $this->set('parkys', $this->Parky->find('all'));
        //$this->set('parkyusers', $this->Parky->find('all'));

    }

    public function edit($id = null) {
        $this->set('userid', $this->Auth->user('id'));
        $this->set('session',$this->Session);
        $this->set('title_for_layout', 'Edit Your Parky');
        if (empty($this->request->data)) {
			$this->request->data = $this->Parky->findById($id);
        }else{
			if ($this->request->is('post')||$this->request->is('put')) {
				$this->Parky->id = $id;
				if ($this->Parky->save($this->request->data)) {
					$this->Session->setFlash('Your post has been edited.', "flash_add");
					$this->redirect(array('action' => 'mydriveways'));
				} else {
					$this->Session->setFlash('Unable to edit your post.', "flash_error");
				}
			}
		}


    }
    
	public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('*', 'about', 'about2');

    }

}