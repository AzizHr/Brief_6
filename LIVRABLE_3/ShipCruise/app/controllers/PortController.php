<?php


class PortController extends Port
{

    public function index()
    {

        $db = new Port();
        $data['ports'] = $db->getAllPorts();
        View::load('port/index', $data);
    }

    public function add()
    {
        View::load('port/add');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'name' => $_POST['name'],
                'country' => $_POST['country']
            );

            $db = new Port();
            if ($db->addPort($data)) {
                $dataa['done'] = $db->addPort($data);
                View::load('port/index', $dataa);
            }
        }
    }
    public function edit($id)
    {
        $db = new Port();
        $data['port'] = $db->getPort($id);
        View::load('port/edit', $data);
    }

    public function delete($id)
    {
        $db = new Port();
        if ($db->getPort($id)) {
            $dataa['done'] = $db->deletePort($id);
            View::load('port/index', $dataa);
        }
    }

    public function update($id)
    {

        if (isset($_POST['submit'])) {

            $data = array(
                'name' => $_POST['name'],
                'country' => $_POST['country']
            );

            $db = new Port();
            if ($db->editPort($id, $data)) {
                $dataa['done'] = $db->editPort($id, $data);
                $dataa['port'] = $db->getPort($id);
                View::load('port/edit', $dataa);
            }
        }
    }
}
