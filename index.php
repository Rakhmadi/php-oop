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

App::parameterRoute('echo','App::echo');

App::parameterRoute('show',function(){
	foreach(App::show() as $x){
		echo $x['destination'] . $x['departure'] . $x['flight_duration'];
		echo '<br>';
	}
});

App::parameterRoute('save','App::save');

?>
<h1>Hello</h1>
<form action="index.php?action=save" method="post">
	<input type="text" name="departure" require>
	<input type="text" name="destination" require>
	<input type="number" name="f_" require>
	<input type="submit">
</form>