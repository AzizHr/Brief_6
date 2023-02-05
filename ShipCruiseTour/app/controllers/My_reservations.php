<?php
class My_reservations extends Controller
{
    private $reservationModel;
    public function __construct()
    {
        $this->reservationModel = $this->model('Reservation');
    }

    public function index()
    {
        $my_reservations = $this->reservationModel->getUserReservations($_SESSION['user_id']);
        $data['my_reservations'] = $my_reservations;
        $this->view('users/my_reservations/index', $data);
    }
    

    public function cancel($reservationId) {

        if($this->reservationModel->cancelReservation($reservationId)) {
            redirect('my_reservations/index');
        } else {
            redirect('my_reservations/index');
        }
    }
}
