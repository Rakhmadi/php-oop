<?php
include 'controller.php';
App::parameterRoute('tambah',function(){
	foreach(App::index() as $x => $v){
	    echo '<br>';
		echo $x;
		echo '=';
		echo $v;
    }
});

App::parameterRoute('echo',function(){
	echo 'biasa';
});

App::parameterRoute('show',function(){
	foreach(App::show() as $x){
		echo $x['destination']. ' sdf '. $x['flight_duration'];
		echo '<br>';
	}
	App::save();
})
?>
<h1>Hello</h1>
