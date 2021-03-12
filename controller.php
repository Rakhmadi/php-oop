<?php
class App{
	static function DB(){
        $conn = new PDO("mysql:host=localhost;dbname=volca", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

	static function parameterRoute($action,$callback){
		if(isset($_GET["action"])){
			$action_ = $_GET["action"];
			if($action_ == $action){
			  return $callback();
		    }
		}
	}

    static function show(){
        $query = App::DB()->prepare("SELECT * FROM flights");
        $query->execute();
        $data = $query->fetchAll();
		return $data;
    }
	static function save(){
		$x='sdsadsad';
		$statm = App::DB()->prepare("INSERT INTO flights (departure,destination,flight_duration) values ('$x','sadfa',0.9)");
		$statm->execute();
	}
}