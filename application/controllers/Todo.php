<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** @property TodoModel $TodoModel Description
 * 
 */
class Todo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TodoModel');
        $this->load->helper('url');
    }

    public function index() {
        //charger données
        $all_todo = $this->TodoModel->get_all();
        $compl = $this->TodoModel->count(1);
        //preparer les données pour la vue
        $data = array();
        $data['title'] = "au boulot !";
        $data['todos'] = $all_todo;
        $data['compl'] = $compl;
        //view
        $this->load->view('TodoIndex', $data);
        
    }

    public function fait($id) {
        $params = array('completed' => 1);
        $this->TodoModel->update($id, $params);
        redirect('Todo/index');
    }
    
    public function supprimer($id){
        $this->TodoModel->delete($id);
        redirect('Todo/index');
    }
    
    public function modifier($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tache','tache', 'max_length[255]');
        $this->form_validation->set_rules('ordre','ordre', 'integer');
        $data['id']= $this->TodoModel->get_By_Id($id);
         if($this->form_validation->run() == TRUE) {
            $params=array('ordre'=> $this->input->post('ordre'),
                    'task'=>$this->input->post('tache'));
                    $this->TodoModel->update($id, $params);
                    redirect('Todo/index');
        }
        else {
            $this->load->view('TodoModifier', $data);
        }
    }
    
    public function Reordonner(){
        $data['todos'] = $this->TodoModel->get_all();
        $this->load->library('form_validation');
        $count = 0;
        
        $this->form_validation->set_rules('ordre[]','ordre', 'required|numeric');
         if($this->form_validation->run() == TRUE) {
            
            foreach ($data['todos'] as $todo){
                    $ordre = $this->input->post('ordre[]');
                    $nouvelordre = $ordre;
                    $params = array('ordre' => $nouvelordre[$count]);
                    $id = $todo->id;
                    $this->TodoModel->update($id, $params);
                    $count = $count + 1;
                    
         
         }
         redirect('Todo/index');
         }

        else {
            $this->load->view('TodoReordonner', $data);
        }
    
    }
    
    
    public function Add() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tache','tache', 'required|max_length[255]');
        $this->form_validation->set_rules('ordre','ordre', 'required|integer');
        
        if($this->form_validation->run() == TRUE) {
            $params=array('ordre'=> $this->input->post('ordre'),
                    'task'=>$this->input->post('tache'));
                    $LastId = $this->TodoModel->add($params);
                    redirect('Todo/index');
        }
        else {
            $this->load->view('TodoAdd');
        }
                    
        
    }
    

}
