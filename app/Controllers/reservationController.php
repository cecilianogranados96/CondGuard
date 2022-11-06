<?php

namespace App\Controllers;

class reservationController extends BaseController
{
    public function index()
    {
        //Connect / models
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['items'] = $reservationModel->findAll();
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/list', $items) .
            view('templates/footer');
    }
    public function common_areas()
    {
        //Connect / models
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data 
        $items['items'] = $common_areaModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/common_areas', $items) .
            view('templates/footer');
    }
    public function request($data = null)
    {
        //Connect / models
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        $id = $this->request->getPostGet('id');
        //Get-fill data 
        if ($data != null) {
            $items['error'] = $data['error'];
            $id = $data['common_area_id'];
        } else {
            $id = $this->request->getPostGet('id');
        }
        $items['item'] = $common_areaModel->find($id);
        $items['reservations'] =  $reservationModel->findAll();
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();

        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/request', $items) .
            view('templates/footer');
    }
    public function ajaxschedule()
    {
        //Connect / models
        $reservationModel = model('reservationModel', true, $db);

        ////GetPost data 
        $id = $_POST['id'];
        $date = $_POST['date'];
        $reservations =  $reservationModel->findAll();
        //Convert date
        $time_input = strtotime($date);
        $date_input = getDate($time_input);
        //schedules to add
        $schedules = array('7 am - 11 am', '11 am - 3 pm', '3 pm - 7 pm');
        foreach ($reservations as $reservation) {
            if ($reservation['common_area_id'] == $id) {
                $time_entry = strtotime($reservation['entry_at']);
                $date_entry = getDate($time_entry);
                //schedules reserved
                if ($date_entry['year'] == $date_input['year'] && $date_entry['mon'] == $date_input['mon'] && $date_entry['mday'] == $date_input['mday']) {
                    if ($date_entry['hours'] == '07') {
                        unset($schedules[0]);
                    }
                    if ($date_entry['hours'] == '11') {
                        unset($schedules[1]);
                    }
                    if ($date_entry['hours'] == '15') {
                        unset($schedules[2]);
                    }
                }
            }
        }
        return json_encode($schedules);
    }
    public function reserve()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);

        //Get-fill data
        $data = array(
            'common_area_id' => $this->request->getPostGet('common_area_id'),
            'status' => 'reservado'
        );
        $schedule = $this->request->getPostGet('schedule');
        switch ($schedule) {
            case '7 am - 11 am':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 07:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 11:00:00';
                break;
            case '11 am - 3 pm':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 11:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 15:00:00';
                break;
            case '3 pm - 7 pm':
                $data['entry_at'] = $this->request->getPostGet('entry_at') . ' 15:00:00';
                $data['out_at'] = $this->request->getPostGet('entry_at') . ' 19:00:00';
                break;
        }
        if (session()->get('type') == 'condo_owner') {
            $data['condo_owner_id'] = session()->get('condo_owner_id');
            $user = $condo_ownerModel->find($data['condo_owner_id']);
            if ($user['payment'] == 0) {
                $data['error'] = "No puede reservar hasta estar al día con los pagos del condominio.";
                return $this->request($data);
            }
        } else {
            $data['relative_id'] = session()->get('relative_id');
            $user = $condo_ownerModel->find(session()->get('condo_owner_id'));
            if ($user['payment'] == 0) {
                $data['error'] = "No puede reservar hasta estar al día con los pagos del condominio.";
                return $this->request($data);
            }
        }
        //Email to client
        $to = 'juanjo20-1998@outlook.com'; //session()->get('email');
        $subject = "This is subject";

        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";

        $header = "From:juanjo20-1998@outlook.com \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);



        //Save
        $reservationModel->save($data);
        //Redirect
        return redirect()->to('/reservation/common_areas');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $items['item'] = $reservationModel->find($id);
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('templates/maintenance_begin') .
            view('reservation/detail', $items) .
            view('templates/maintenance_end') .
            view('templates/footer');
    }
    public function new()
    {
        //Connect / models
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/form', $items) .
            view('templates/footer');
    }
    public function edit()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $common_areaModel = model('common_areaModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $relativeModel = model('relativeModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('id');
        $items['item'] = $reservationModel->find($id);
        $items['relations'] =  $common_areaModel->findAll();
        $items['relations2'] =  $condo_ownerModel->findAll();
        $items['relations3'] =  $relativeModel->findAll();
        //Enable edit
        $items['edit_enabled'] = true;
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('reservation/form', $items) .
            view('templates/footer');
    }
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Get-fill data
        $data = array(
            'common_area_id' => $this->request->getPostGet('common_area_id'),
            'entry_at' => $this->request->getPostGet('entry_at'),
            'out_at' => $this->request->getPostGet('out_at'),
            'status' => $this->request->getPostGet('status')
        );
        if ($this->request->getPostGet('relative_id')) {
            $data['relative_id'] = $this->request->getPostGet('relative_id');
        }
        if ($this->request->getPostGet('condo_owner_id')) {
            $data['condo_owner_id'] = $this->request->getPostGet('condo_owner_id');
        }
        //Validate to edit or create and lookup for existing fields on the data base
        if ($this->request->getPostGet('reservation_id')) {
            $data['reservation_id'] = $this->request->getPostGet('reservation_id');
        }
        //Save
        $reservationModel->save($data);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('reservation_id')) {
                $log['operation'] = 'Edición de reserva - id: ' . $data['reservation_id'];
            } else {
                $log['operation'] = 'Creación de reserva';
            }
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('reservation'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $reservationModel = model('reservationModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $reservationModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de reserva - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('reservation'));
    }
}