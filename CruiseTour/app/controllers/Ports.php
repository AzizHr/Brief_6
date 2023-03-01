<?php

class Ports extends Controller
{
    private $port;

    public function __construct()
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        $this->port = $this->model('Port');
    }

    public function index()
    {
        $data = [
            'ports' => $this->port->allPorts()
        ];

        return $this->view('admin/dashboard/ports/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'port_name' => $_POST['port_name'],
                'country' => $_POST['country']
            ];

            if ($this->port->store($data)) {
                flash('message', 'New port created with success');
                redirect('ports');
            }
        } else {
            return $this->view('admin/dashboard/ports/create');
        }
    }

    public function update($port_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'port_id' => $port_id,
                'port_name' => $_POST['port_name'],
                'country' => $_POST['country'],
            ];

            if ($this->port->update($data)) {
                flash('message', 'updated with success');
                redirect('ports');
            }
        } else {
            echo json_encode(['page' => 'Editing a Port Page']);
        }
    }

    public function show($port_id)
    {
        if ($this->port->find($port_id)) {
            $data = [
                'port' => $this->port->find($port_id)
            ];
            return $this->view('admin/dashboard/ports/edit', $data);
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }

    public function destroy($port_id)
    {
        if ($this->port->destroy($port_id)) {
            flash('message', 'deleted with success');
            redirect('ports');
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }
}
