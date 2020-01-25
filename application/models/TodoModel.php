<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');


/** @property  CI_DB $db Description
 * 
 */

    class TodoModel extends CI_Model {
        function __construct() {
            parent::__construct();
        }
        function get_By_Id($id) {
            return $this->db->get_where('TableTodo', array('id'=>$id))-> row_array();
        }
        
        function get_all() {
            $this->db->order_by("ordre", 'ASC');
            return $this->db->get('TableTodo')->result_object(); 
            
        }
        
        function update($id, $params) {
            $this->db->where('id', $id);
            $this->db->update('TableTodo', $params);
            
        }
        
        function add($params){
            $this->db->insert('TableTodo', $params);
            return $this->db->insert_id();
        }
        
        function delete($id) {
            $this->db->delete('TableTodo', array('id'=>$id));
            
        }
       
        function count($completed=null) {
            if($completed==null){
                return $this->db->count_all('TableTodo');
                
            }
            else {
                if($completed==1){
                    return $this->db->get_where('TableTodo', array('completed'=>0))->num_rows();
                }
 
                else {
                    return $this->db->get_where('TableTodo', array('completed'=>1))->num_rows();
                }
            }
        }
    }



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

