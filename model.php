<?php

class Model{

    static function DB(){
        $conn = new PDO("mysql:host=localhost;dbname=volca", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    static function show(){
        $query = Model::DB()->prepare("SELECT * FROM flights");
        $query->execute();
        $data = $query->fetchAll();
		return $data;
    }
}