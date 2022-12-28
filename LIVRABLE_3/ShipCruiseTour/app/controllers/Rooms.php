<?php
class Ships extends Controller
{
    public function __construct()
    {
        $this->shipModel = $this->model('Ship');
    }

    public function index()
    {
        $ships = $this->shipModel->getShips();
        $data['ships'] = $ships;
        $this->view('ships/index', $data);
    }
    public function add()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);


            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'rooms_number' => $_POST['rooms_number'],
                'places_number' => $_POST['places_number'],
                'name_err' => '',
                'rooms_number_err' => '',
                'places_number_err' => ''
            ];

            // move_uploaded_file($data['cruise_img'], URLROOT . 'img/');

            // Validate Email
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            // Validate Name
            if (empty($data['rooms_number'])) {
                $data['rooms_number_err'] = 'Pleae enter rooms number';
            }

            // Validate Name
            if (empty($data['places_number'])) {
                $data['places_number_err'] = 'Pleae enter places number';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['rooms_number_err']) && empty($data['places_number_err'])) {

                // Register User
                if ($this->shipModel->addShip($data)) {
                    redirect('ships/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('ships/add', $data);
            }
        } else {
            $data = [
                'name' => '',
                'rooms_number' => '',
                'places_number' => '',
                'name_err' => '',
                'rooms_number_err' => '',
                'places_number_err' => ''
            ];

            // Load view
            $this->view('ships/add', $data);
        }
    }

    public function edit($id)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);

            $data = [
                'name' => trim($_POST['name']),
                'rooms_number' => $_POST['rooms_number'],
                'places_number' => $_POST['places_number'],
                'name_err' => '',
                'rooms_number_err' => '',
                'places_number_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            // Validate Name
            if (empty($data['rooms_number'])) {
                $data['rooms_number_err'] = 'Pleae enter a country';
            }

            // Validate Name
            if (empty($data['places_number'])) {
                $data['places_number_err'] = 'Pleae enter a country';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['rooms_number_err']) && empty($data['places_number_err'])) {


                if ($this->shipModel->editShip($id, $data)) {
                    redirect('ships/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('ships/edit', $data);
            }
        } else {
            $data = [
                'name' => '',
                'rooms_number' => '',
                'places_number' => '',
                'name_err' => '',
                'rooms_number_err' => '',
                'places_number_err' => '',
            ];

            // Load view
            $this->view('ships/edit', $data);
        }
    }
    public function get($id)
    {
        $ship = $this->shipModel->getShip($id);
        $data = [
            'ship' => $ship
        ];

        $this->view('ships/edit', $data);
    }

    public function delete($id)
    {

        if ($this->shipModel->deleteShip($id)) {
            redirect('ships/index');
        } else {
            redirect('ships/index');
        }
    }
}
