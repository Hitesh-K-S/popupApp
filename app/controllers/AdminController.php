<?php

class AdminController extends Controller {
    
    public function login() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
          
            $admin = $this->model('Admin')->getByUsername($username);
          
            
            if ($admin && password_verify($password, $admin['password_hash'])) {
             
              $_SESSION['admin_id'] = $admin['id'];
              header('Location: ' . BASE_URL . '/admin/dashboard');
              exit;
            } else {
            
              $data['error'] = 'Invalid username or password.';
              $this->view('admin/login', $data);
            }
          } else {
          
            $this->view('admin/login');
          }
    } 


    public function dashboard(){
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }
        $popups = $this->model('Popup')->getAll();
        $this->view('admin/dashboard', ['popups'=> $popups]);
    }

    public function store(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title'     => $_POST['title'] ?? '',
                'message'   => $_POST['message'] ?? '',
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
    
            $this->model('Popup')->create($data);
    
            header('Location: /admin/dashboard');
            exit;
        }

    }

    public function edit($id) {
        $popup = $this->model('Popup')->getById($id);

        if (!$popup) {
            http_response_code(404);
            echo 'Popup not found';
            return;
        }

        $popups = $this->model('Popup')->getAll();
        $this->view('admin/dashboard', ['popup' => $popup, 'popups' => $popups]);
    }

    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title'     => $_POST['title'] ?? '',
                'message'   => $_POST['message'] ?? '',
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];

            $this->model('Popup')->update($id, $data);

            header('Location: /admin/dashboard');
            exit;
        }
    }

    public function delete($id){
        $this->model('Popup')->delete($id);

        header('Location: /admin/dashboard');
        exit;
    }

}