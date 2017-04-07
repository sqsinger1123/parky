<?php
App::uses('Component', 'Controller');
class DrivewayComponent extends Component {
public function fetchDriveway($model) {
    return $model->find('all');
}

?>