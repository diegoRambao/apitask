<?php 

class Task extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getTasks()
    {

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tasks');

        foreach($query->result() as $row){
             
            $json [] = array(
                'id'        => $row->id,
                'name'      => $row->name,
                'description'  => $row->description,
                'date'     => $row->date
            );
        }

        echo json_encode($json);
    }

    public function addTask ($data)
    {
        $this->db->insert('tasks', $data);
    }
}

