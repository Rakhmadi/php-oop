<?php
class App{

	static function DB(){
        $conn = new PDO("mysql:host=localhost;dbname=volca", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

	static function Mysqli(){
		    $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "volca";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
		    return $conn;
	}

	static function redirect($p){
		return header("location:{$p}");
	}


	static function echo(){
		$x = App::Mysqli()->query('SELECT * FROM flights');
		foreach($x->fetch_all(MYSQLI_ASSOC) as $x){
			echo $x['destination'] .' || '. $x['departure'] .' || '. $x['flight_duration'];
			echo '<br>';
		}
	}

	static function parameterRoute($action,$callback){
		if(isset($_GET["action"])){
			$action_ = $_GET["action"];
			if($action_ == $action){
			  return call_user_func($callback);
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
		$dep= $_POST['departure'];
        $des= $_POST['destination'];
        $f_d= $_POST['f_'];
		$statm = App::DB()->prepare("INSERT INTO flights (departure,destination,flight_duration)
		 values ('$dep','$des','$f_d')");
		$statm->execute();
		return App::redirect("index.php?action=show");
	}
	static function delete($id){
		$x = App::DB()->prepare("DELETE FROM flights where id='$id'");
		return $x->execute();
	}

}