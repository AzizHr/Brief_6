<?php
class Cruises extends Controller
{
    private $cruiseModel;
    private $shipModel;
    private $portModel;
    public function __construct()
    {
        $this->cruiseModel = $this->model('Cruise');
        $this->shipModel = $this->model('Ship');
        $this->portModel = $this->model('Port');
    }

    public function index()
    {
        $cruises = $this->cruiseModel->getCruises();
        $data = [
            'cruises' => $cruises 
        ];
        $this->view('cruises/index', $data);
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
                'price' => trim($_POST['price']),
                'cruise_img' => $_FILES['cruise_img']['name'],
                'nights_number' => trim($_POST['nights_number']),
                'starting_date' => trim($_POST['starting_date']),
                'ship_id' => $_POST['ship_id'],
                'price_err' => '',
                'cruise_img_err' => '',
                'nights_number_err' => '',
                'starting_date_err' => ''

            ];

            move_uploaded_file($_FILES['cruise_img']['tmp_name'] , 'uploads/'.$data['cruise_img']);

            // Validate Email
            if (empty($data['price'])) {
                $data['price_err'] = 'Pleae enter a price';
            }

            // Validate Name
            if (empty($data['cruise_img'])) {
                $data['cruise_img_err'] = 'Pleae pick an image';
            }

            if (empty($data['nights_number'])) {
                $data['nights_number_err'] = 'Pleae enter nights number';
            }

            if (empty($data['starting_date'])) {
                $data['starting_date_err'] = 'Pleae pick a date';
            }

            // Make sure errors are empty
            if (empty($data['price_err']) && empty($data['image_err']) && empty($data['nights_number_err']) && empty($data['starting_date_err'])) {

                // Register User
                if ($this->cruiseModel->addCruise($data)) {
                    redirect('cruises/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('cruises/add', $data);
            }
        } else {
            // Init data
            $ships = $this->shipModel->getShips();
            $data = [
                'price' => '',
                'cruise_img' => '',
                'nights_number' => '',
                'starting_date' => '',
                'price_err' => '',
                'cruise_img_err' => '',
                'nights_number_err' => '',
                'starting_date_err' => '',
                'ships' => $ships
            ];

            // Load view
            $this->view('cruises/add', $data);
        }
    }

    public function edit($id)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);

            // Init data
            $data = [
                'price' => trim($_POST['price']),
                'cruise_img' => $_POST['cruise_img'],
                'nights_number' => trim($_POST['nights_number']),
                'starting_date' => trim($_POST['starting_date']),
                'ship_id' => !empty($_POST['ship_id']) ? $_POST['ship_id'] : '',
                'price_err' => '',
                'cruise_img_err' => '',
                'nights_number_err' => '',
                'starting_date_err' => ''

            ];

            // move_uploaded_file($data['cruise_img'], URLROOT . 'img/');

            // Validate Email
            if (empty($data['price'])) {
                $data['price_err'] = 'Pleae enter a price';
            }

            // Validate Name
            if (empty($data['cruise_img'])) {
                $data['cruise_img_err'] = 'Pleae pick an image';
            }

            if (empty($data['nights_number'])) {
                $data['nights_number_err'] = 'Pleae enter nights number';
            }

            if (empty($data['starting_date'])) {
                $data['starting_date_err'] = 'Pleae pick a date';
            }

            // Make sure errors are empty
            if (empty($data['price_err']) && empty($data['image_err']) && empty($data['nights_number_err']) && empty($data['starting_date_err'])) {


                if ($this->cruiseModel->editCruise($id, $data)) {
                    redirect('cruises/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('cruises/edit', $data);
            }
        } else {
            // Init data
            $ships = $this->shipModel->getShips();
            $data = [
                'price' => '',
                'cruise_img' => '',
                'nights_number' => '',
                'starting_date' => '',
                'price_err' => '',
                'cruise_img_err' => '',
                'nights_number_err' => '',
                'starting_date_err' => '',
                'ships' => $ships
            ];

            // Load view
            $this->view('cruises/edit', $data);
        }
    }
    
    public function get($id)
    {
        $cruise = $this->cruiseModel->getCruise($id);
        $ships = $this->shipModel->getShips();
        $data = [
            'cruise' => $cruise,
            'ships' => $ships
        ];

        $this->view('cruises/edit', $data);
    }

    public function delete($id)
    {

        if ($this->cruiseModel->deleteCruise($id)) {
            redirect('cruises/index');
        } else {
            redirect('cruises/index');
        }
    }

    public function filterCruiseByPort($portName) {
        if($this->cruiseModel->filterByPort($portName)) {
            $cruises = $this->cruiseModel->filterByPort($portName);
            
    $ports = $this->portModel->getPorts();
    $ships = $this->shipModel->getShips();
    $data = [
      'cruises' => $cruises,
      'ports' => $ports ,
      'ships' => $ships
    ];

            $this->view('pages/cruises', $data);
        }
    }

    public function filterCruiseByShip($shipName) {
        if($this->cruiseModel->filterByShip($shipName)) {
            $cruises = $this->cruiseModel->filterByShip($shipName);
            
    $ports = $this->portModel->getPorts();
    $ships = $this->shipModel->getShips();
    $data = [
      'cruises' => $cruises,
      'ports' => $ports ,
      'ships' => $ships
    ];

            $this->view('pages/cruises', $data);
        }
    }

    public function filterCruiseByMonth($month) {
        if($this->cruiseModel->filterByMonth($month)) {
            $cruises = $this->cruiseModel->filterByMonth($month);
          
    $ports = $this->portModel->getPorts();
    $ships = $this->shipModel->getShips();
    $data = [
      'cruises' => $cruises,
      'ports' => $ports ,
      'ships' => $ships
    ];

            $this->view('pages/cruises', $data);
        }
    }
}
