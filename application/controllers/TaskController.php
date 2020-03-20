<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');

class TaskController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->load->model('Task');
    }
    
	public function index()
	{
        $this->Task->getTasks();
        
    }
    
    public function store()
    {
        // $requestData = json_decode(file_get_contents('php://input'), true);

        // foreach ($requestData as $key => $val){
        //     $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
        //     $requestData[$key] = $val;
        // }

        $data =  array(
            'name'          => $this->input->post('name', false),
            'description'   => $this->input->post('description', false),
            'date'          => $this->input->post('date', false)
        );
        
        echo json_encode($data);
        $this->Task->addTask($data);
    }
}
