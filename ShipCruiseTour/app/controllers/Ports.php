<?php
class Ports extends Controller
{
    private $portModel;
    public function __construct()
    {
        $this->portModel = $this->model('Port');
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        $ports = $this->portModel->getPorts();
        $data['ports'] = $ports;
        $this->view('ports/index', $data);
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
                'country' => $_POST['country'],
                'name_err' => '',
                'country_err' => ''
            ];

            // move_uploaded_file($data['cruise_img'], URLROOT . 'img/');

            // Validate Email
            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            // Validate Name
            if (empty($data['country'])) {
                $data['country'] = 'Pleae enter a country';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['country_err'])) {

                // Register User
                if ($this->portModel->addPort($data)) {
                    flash('message', 'Added With Success');
                    redirect('ports/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('ports/add', $data);
            }
        } else {
            $data = [
                'name' => '',
                'country' => '',
                'name_err' => '',
                'country_err' => ''
            ];

            // Load view
            $this->view('ports/add', $data);
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
                'country' => trim($_POST['country']),
                'name_err' => '',
                'country_err' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Pleae enter a name';
            }

            // Validate Counrty
            if (empty($data['country'])) {
                $data['country'] = 'Pleae enter a country';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['country_err'])) {


                if ($this->portModel->editPort($id, $data)) {
                    flash('message', 'Edited With Success');
                    redirect('ports/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('ports/edit', $data);
            }
        } else {
            $port = $this->portModel->getPort($id);
            $data = [
                'name' => '',
                'country' => '',
                'name_err' => '',
                'country_err' => '',
                'port' => $port
            ];

            // Load view
            $this->view('ports/edit', $data);
        }
    }
    public function get($id)
    {
        $port = $this->portModel->getPort($id);
        $data = [
            'port' => $port
        ];

        $this->view('ports/edit', $data);
    }

    public function delete($id)
    {

        if ($this->portModel->deletePort($id)) {
            flash('message', 'Deleted With Success');
            redirect('ports/index');
        } else {
            redirect('ports/index');
        }
    }
}
