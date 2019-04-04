<?php

namespace application\controllers;

use application\core\Controller;
use PDO;
use application\lib\Encoder;

class MainController extends Controller {

	public function indexAction() {
		$this->view->render('Главная страница');
	}

	//encoder
    public function encodeAction(){

        //default values
        $encoder = new Encoder($_REQUEST['input_number']);
        $result = $encoder -> encode();

        $this -> saveToDatabase($_REQUEST['input_number'], $result);

        //output
        echo $result;

    }

    //database
    public function saveToDatabase($input_value, $output_value){

        $pdo = new PDO("mysql:host=localhost;dbname=numbers","root","password");
        $sql = "INSERT INTO numbers (input_number, output_number) VALUES (:input_number, :output_number)";
        $statement = $pdo->prepare($sql);
        $statement -> bindParam(":input_number", $input_value);
        $statement -> bindParam(":output_number", $output_value);
        $statement -> execute();

    }

}