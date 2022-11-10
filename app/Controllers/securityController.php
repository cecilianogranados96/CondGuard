<?php

namespace App\Controllers;

class securityController extends BaseController
{
    //contactos
    public function contacts()
    {
        //Connect / models
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        $authorizedModel = model('authorizedModel', true, $db);
        //Get-fill data 
        $id = $this->request->getPostGet('land_number');
        $items['condo_owner'] =  $condo_ownerModel->where('land_number', $id)->first();
        $items['items'] = $authorizedModel->where('condo_owner_id', $items['condo_owner']['condo_owner_id'])->findAll();
        //Views
        return
            view('templates/header') .
            view('security/contacts', $items) .
            view('templates/footer');
    }
    //formulario de ingreso
    public function entries()
    {
        //Connect / models
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $condo_ownerModel->findAll();

        //Views
        return
            view('templates/header') .
            view('security/entries', $items) .
            view('templates/footer');
    }
    //verificar ingreso
    public function verify()
    {
        //Views
        return redirect()->to(
            '/contacts?'
                . 'identity=' . $this->request->getPostGet('identity')
                . '&vehicle_plate=' . $this->request->getPostGet('vehicle_plate')
                . '&name=' . $this->request->getPostGet('name')
                . '&land_number=' . $this->request->getPostGet('land_number')
                . '&phone=' . $this->request->getPostGet('phone')
                . '&reason=, por motivo de ' . $this->request->getPostGet('reason')
        );
    }
    //Registrar ingreso
    public function save()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        //Get-fill data
        $data = array(
            'identity' => $this->request->getPostGet('identity'),
            'vehicle_plate' => $this->request->getPostGet('vehicle_plate'),
            'name' => $this->request->getPostGet('name'),
            'land_number' => $this->request->getPostGet('land_number'),
            'phone' => $this->request->getPostGet('phone'),
            'entry_at' => date('Y-m-d H:i:s')
        );

        //Save
        $relative_vehicleModel->save($data);

        //Sweetalert flash params
        session()->setFlashdata("message_icon", "success");
        session()->setFlashdata("message", "Proceso exitoso");

        //Redirect
        return $this->response->redirect(base_url('entries'));
    }
    //Lista de salidas
    public function exits()
    {
        //Connect / models
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);
        $condo_ownerModel = model('condo_ownerModel', true, $db);
        //Get-fill data 
        $items['items'] = $relative_vehicleModel->where('out_at', null)->findAll();
        $items['relations'] =  $condo_ownerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('security/exits', $items) .
            view('templates/footer');
    }
    //Marcar salida
    public function quit()
    {
        //Connect / models
        $db        = db_connect('default');
        $relative_vehicleModel = model('relative_vehicleModel', true, $db);

        //Timezone
        date_default_timezone_set('America/Costa_Rica');

        //Get-fill data
        $data = array(
            'relative_vehicle_id' => $this->request->getPostGet('id'),
            'out_at' => date('Y-m-d H:i:s')
        );

        //Save
        $relative_vehicleModel->save($data);
        //Sweetalert flash params
        session()->setFlashdata("message_icon", "success");
        session()->setFlashdata("message", "Proceso exitoso");
        //Redirect
        return $this->response->redirect(base_url('/exits'));
    }
    //Patrulla
    public function officerlog()
    {
        //Connect / models
        $officerModel = model('officerModel', true, $db);
        //Get-fill data 
        $items['relations'] =  $officerModel->findAll();
        //Views
        return
            view('templates/header') .
            view('security/officerlog', $items) .
            view('templates/footer');
    }
}