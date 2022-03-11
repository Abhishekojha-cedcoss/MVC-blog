<?php
namespace App\Libraries;

//Load the model and the view
class Controller
{

    public function model($model)
    {
        // Require model files
        require_once(APPPATH . '/../private/models/' . $model . '.php');
        // Initiate new model
        return new $model;
    }

    public function view($view, $data = [])
    {
        // Require view files
        if (file_exists(APPPATH . '/../private/views/' . $view . '.php')) {
            require(APPPATH . '/../private/views/' . $view . '.php');
        } else {
            die("view does not exists");
        }
    }
}
