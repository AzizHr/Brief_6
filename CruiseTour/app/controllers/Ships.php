<?php

class Ships extends Controller
{
    private $ship;

    public function __construct()
    {
        if(!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        $this->ship = $this->model('Ship');
    }

    public function index()
    {
        $data = [
            'ships' => $this->ship->allShips()
        ];

        return $this->view('admin/dashboard/ships/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ship_name' => $_POST['ship_name'],
                'number_of_rooms' => $_POST['number_of_rooms'],
                'number_of_places' => $_POST['number_of_places']
            ];

            if ($this->ship->store($data)) {
                flash('message', 'New ship created with success');
                redirect('ships');
            }
        } else {
            return $this->view('admin/dashboard/ships/create');
        }
    }

    public function update($ship_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ship_id' => $ship_id,
                'ship_name' => $_POST['ship_name'],
                'number_of_rooms' => $_POST['number_of_rooms'],
                'number_of_places' => $_POST['number_of_places']
            ];

            if ($this->ship->update($data)) {
                flash('message', 'updated with success');
                redirect('ships');
            }
        } else {
            echo json_encode(['page' => 'Editing a Ship Page']);
        }
    }

    public function show($ship_id)
    {
        if ($this->ship->find($ship_id)) {
            $data = [
                'ship' => $this->ship->find($ship_id)
            ];
            return $this->view('admin/dashboard/ships/edit', $data);
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }

    public function destroy($ship_id)
    {
        if ($this->ship->destroy($ship_id)) {
            flash('message', 'deleted with success');
            redirect('ships');
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }
}
