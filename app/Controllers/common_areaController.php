<?php

namespace App\Controllers;

use CodeIgniter\Files\File;

class common_areaController extends BaseController
{
    public function index()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data
        $items['items'] = $common_areaModel->findAll();
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('common_area/list', $items) .
            view('templates/footer');
    }
    public function detail()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data
        $id = $this->request->getPostGet('id');
        $item['item'] = $common_areaModel->find($id);
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('common_area/detail', $item) .
            view('templates/footer');
    }
    public function new($data = null)
    {
        //Var fix
        $items['null'] = null;
        if ($data != null) {
            $items['item'] =  $data;
            $items['validation'] = $data['validation'];
        }
        //Views
        return
            view('templates/header') .
            view('templates/navbar') .
            view('common_area/form', $items) .
            view('templates/footer');
    }
    public function edit($data = null)
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        //Get-fill data 
        if ($data == null) {
            $id = $this->request->getPostGet('id');
            $items['item'] = $common_areaModel->find($id);
        } else {
            $items['item'] = $data;
            $items['validation'] = $data['validation'];
        }

        //Enable edit
        $items['edit_enabled'] = true;

        //Views 
        return
            view('templates/header') .
            view('templates/navbar') .
            view('common_area/form', $items) .
            view('templates/footer');
    }
    public function save()
    {

        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $logModel = model('logModel', true, $db);


        //Get-fill data
        $data = array(
            'name' => $this->request->getPostGet('name'),
            'address' => $this->request->getPostGet('address'),
            'condo_capacity' => $this->request->getPostGet('condo_capacity'),
            'people_capacity' => $this->request->getPostGet('people_capacity'),
            'status' => $this->request->getPostGet('status')
        );

        //Validate to edit or create for send id for update process
        if ($this->request->getPostGet('common_area_id')) {
            $data['common_area_id'] = $this->request->getPostGet('common_area_id');
        }


        //Save image only if user are inserting OR if user send image 
        if (!$this->request->getPostGet('common_area_id') || !empty($_FILES['image']['name'])) {
            //Validation rules
            $rules = [
                'image' => [
                    'rules'  => [
                        'uploaded[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/png]',
                        'max_size[image,4096]'
                    ],
                    'errors' => [
                        'uploaded' => 'Inválido, debe ingresar una imagen en formato jpg, jpeg o png (4MB peso maximo).',
                        'mime_in' => 'Inválido, debe añadir imagen en el formato jpg, jpeg o png.',
                        'max_size' => 'Inválido, la imagen supera el tamaño permitido.'
                    ],
                ],
            ];
            //Verify for edit or create process to redirect respective view with error (stop process)
            if ($this->request->getPostGet('common_area_id')) {
                //Validation error
                if (!$this->validate($rules)) {
                    $item = $common_areaModel->find($this->request->getPostGet('common_area_id'));
                    $data['image'] = $item['image'];
                    $data['validation'] = $this->validator;
                    return $this->edit($data);
                } else {
                    //On edit process if validation of image succedded successfully , then delete the old image
                    $item = $common_areaModel->find($this->request->getPostGet('common_area_id'));
                    unlink(FCPATH . 'assets/' . 'img/' . 'common_areas/' . $item['image']);
                }
            } else {
                //Validation error
                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                    return $this->new($data);
                }
            }
            //Save Image 
            $image = $this->request->getFile('image');
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'assets/' . 'img/' . 'common_areas/', $newName);
            $data['image'] = $newName;
        }
        //Save
        $common_areaModel->save($data);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');

            if ($this->request->getPostGet('common_area_id')) {
                $log['operation'] = 'Edición de área común - id: ' . $data['common_area_id'];
            } else {
                $log['operation'] = 'Creación de área común';
            }
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('common_area'));
    }
    public function delete()
    {
        //Connect / models
        $db        = db_connect('default');
        $common_areaModel = model('common_areaModel', true, $db);
        $logModel = model('logModel', true, $db);
        //Deactivate data
        $id = $this->request->getPostGet('id');
        $common_areaModel->delete($id);
        //Log
        if (session()->get('type') == 'administrator') {
            $log['administrator_id'] = session()->get('administrator_id');
            $log['operation'] = 'Eliminación de área común - id: ' . $id;
            //Save log
            $logModel->save($log);
        }
        //Redirect
        return $this->response->redirect(base_url('common_area'));
    }
}