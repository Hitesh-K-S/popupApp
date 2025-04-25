<?php



class Controller {

    protected function model($modelName) {
        $file = __DIR__ . '/../app/models/' . $modelName . '.php';
    
        if (!file_exists($file)) {
            die("Model file not found: {$file}");
        }
        require_once $file;
    
        if (!class_exists($modelName)) {
            die("Model class not found: {$modelName}");
        }
    
        return new $modelName();
    }
    

    protected function view($viewPath, $data = []) {
        extract($data);
        require_once __DIR__ . '/../app/views/' . $viewPath . '.php';
    }
}