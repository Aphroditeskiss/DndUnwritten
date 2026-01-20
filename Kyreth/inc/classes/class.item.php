<?php

class Item {
    protected $db;

    public function __construct() {
        $this->db = Database::instance();
    }

    public function addItem() {
        
    }
}