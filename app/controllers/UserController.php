<?php

class UserController extends Controller {

    public function home() {
        // Fetch all active popups
        $popups = $this->model('Popup')->getAll();
        $activePopups = array_filter($popups, function($popup) {
            return $popup['is_active'] == 1;
        });

        // Pass active popups to the homepage view
        $this->view('user/homepage', ['popups' => $activePopups]);
    }

}