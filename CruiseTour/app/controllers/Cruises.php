<?php

class Cruises extends Controller
{
    private $cruise;
    private $port;
    private $ship;
    private $reservation;

    public function __construct()
    {
        $this->cruise = $this->model('Cruise');
        $this->port = $this->model('Port');
        $this->ship = $this->model('Ship');
        $this->reservation = $this->model('Reservation');
    }

    public function index()
    {
        $data = [
            'cruises' => $this->cruise->allCruises(),
        ];

        return $this->view('admin/dashboard/cruises/index', $data);
    }

    public function filterByPort()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $port_id = $_POST['port_id'];
            if ($this->cruise->filterByPort($port_id)) {
                $data = [
                    'cruises' => $this->cruise->filterByPort($port_id),
                    'dates_ids' => $this->cruise->dates_ids(),
                    'ports' => $this->port->allPorts(),
                    'ships' => $this->ship->allShips(),
                ];
                return $this->view('pages/cruises', $data);
            } else {
                redirect('pages/cruises');
            }
        } else {
            return $this->view('pages/404');
        }
    }

    public function filterByShip()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ship_id = $_POST['ship_id'];
            if ($this->cruise->filterByShip($ship_id)) {
                $data = [
                    'cruises' => $this->cruise->filterByShip($ship_id),
                    'dates_ids' => $this->cruise->dates_ids(),
                    'ships' => $this->ship->allShips(),
                    'ports' => $this->port->allPorts()
                ];
                return $this->view('pages/cruises', $data);
            } else {
                redirect('pages/cruises');
            }
        } else {
            return $this->view('pages/404');
        }
    }

    public function filterByMonth()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cruise_id = $_POST['cruise_id'];
            if ($this->cruise->filterByMonth($cruise_id)) {
                $data = [
                    'cruises' => $this->cruise->filterByMonth($cruise_id),
                    'dates_ids' => $this->cruise->dates_ids(),
                    'ships' => $this->ship->allShips(),
                    'ports' => $this->port->allPorts()
                ];
                return $this->view('pages/cruises', $data);
            } else {
                redirect('pages/cruises');
            }
        } else {
            return $this->view('pages/404');
        }
    }

    public function create()
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'],
                'cruise_price' => $_POST['cruise_price'],
                'image' => $_FILES['image']['name'],
                'number_of_nights' => $_POST['number_of_nights'],
                'starting_port' => $_POST['starting_port'],
                'ship_id' => $_POST['ship_id'],
                'itinerary' => $_POST['itinerary'],
                'starts_at' => $_POST['starts_at']
            ];

            move_uploaded_file($_FILES['image']['tmp_name'], './uploads/' . $data['image']);
            if ($this->cruise->store($data)) {
                flash('message', 'New cruise created with success');
                redirect('cruises');
            }
        } else {
            $data = [
                'ports' => $this->port->allPorts(),
                'ships' => $this->ship->allShips()
            ];
            return $this->view('admin/dashboard/cruises/create', $data);
        }
    }

    public function update($cruise_id)
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'cruise_id' => $cruise_id,
                'title' => $_POST['title'],
                'cruise_price' => $_POST['cruise_price'],
                'image' => $_FILES['image']['name'],
                'number_of_nights' => $_POST['number_of_nights'],
                'starting_port' => $_POST['starting_port'],
                'ship_id' => $_POST['ship_id'],
                'itinerary' => $_POST['itinerary'],
                'starts_at' => $_POST['starts_at']
            ];

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $data['image']);

            if (empty($data['image'])) {
                if ($this->cruise->updateWithoutImage($data)) {
                    flash('message', 'updated with success');
                    redirect('cruises');
                } else {
                    echo json_encode(['error' => 'There is some error']);
                }
            } else {
                if ($this->cruise->updateWithImage($data)) {
                    flash('message', 'updated with success');
                    redirect('cruises');
                } else {
                    echo json_encode(['error' => 'There is some error']);
                }
            }
        } else {
            return $this->view('admin/dashboard/cruises/edit');
        }
    }

    public function show($cruise_id)
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        if ($this->cruise->find($cruise_id)) {
            $data = [
                'cruise' => $this->cruise->find($cruise_id),
                'ports' => $this->port->allPorts(),
                'ships' => $this->ship->allShips()
            ];
            return $this->view('admin/dashboard/cruises/edit', $data);
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }

    public function show_to_reserve($cruise_id)
    {
        if ($this->cruise->find($cruise_id)) {
            $data = [
                'cruise' => $this->cruise->find($cruise_id),
                'room_types' => $this->reservation->getAllRoomTypes()
            ];
            return $this->view('clients/reserve', $data);
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }

    public function destroy($cruise_id)
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }
        if ($this->cruise->destroy($cruise_id)) {
            flash('message', 'deleted with success');
            redirect('cruises');
        } else {
            echo json_encode(['error' => 'There is some error']);
        }
    }
}
