<?php 
//load all wordpress functions
require_once( $_SERVER[ 'DOCUMENT_ROOT' ] . '/wp-load.php' );

//define global variables
// global $wpdb;
global $_POST;

//define variables
// $errorMSG = "";

//Sanitize Input Data
if ( isset( $_POST['dogname'] ) ) {
	$name1 = filter_input(INPUT_POST, 'dogname', FILTER_SANITIZE_STRING);
	// echo json_encode($name1);
};

if ( isset( $_POST['dogage'] ) ) {
	$YOB = filter_input(INPUT_POST, 'dogage', FILTER_SANITIZE_STRING);
	$current_year = date("Y");
	$age1 = $current_year - $YOB;
	// echo json_encode($age);
};

if ( isset( $_POST['dogweight'] ) ) {
	$weight1 = filter_input(INPUT_POST, 'dogweight', FILTER_SANITIZE_STRING);
	// echo json_encode($weight);
};


if ( isset( $_POST['mealplanSelected'] ) ) {
	$mealPlan1 = filter_input(INPUT_POST, 'mealplanSelected', FILTER_SANITIZE_STRING);
	// echo json_encode($mealPlan);
};

if ( isset( $_POST['dogname1'] ) ) {
	$name2 = filter_input(INPUT_POST, 'dogname1', FILTER_SANITIZE_STRING);
	// echo json_encode($name1);
};

if ( isset( $_POST['dogage1'] ) ) {
	$YOB2 = filter_input(INPUT_POST, 'dogage1', FILTER_SANITIZE_STRING);
	$current_year2 = date("Y");
	$age2 = $current_year2 - $YOB2;
	// echo json_encode($age);
};

if ( isset( $_POST['dogweight1'] ) ) {
	$weight2 = filter_input(INPUT_POST, 'dogweight1', FILTER_SANITIZE_STRING);
	// echo json_encode($weight);
};


if ( isset( $_POST['mealplanSelected1'] ) ) {
	$mealPlan2 = filter_input(INPUT_POST, 'mealplanSelected1', FILTER_SANITIZE_STRING);
	// echo json_encode($mealPlan);
};

if ( isset( $_POST['dogname2'] ) ) {
	$name3 = filter_input(INPUT_POST, 'dogname2', FILTER_SANITIZE_STRING);
	// echo json_encode($name1);
};

if ( isset( $_POST['dogage2'] ) ) {
	$YOB3 = filter_input(INPUT_POST, 'dogage2', FILTER_SANITIZE_STRING);
	$current_year3 = date("Y");
	$age3 = $current_year3 - $YOB3;
	// echo json_encode($age);
};

if ( isset( $_POST['dogweight2'] ) ) {
	$weight3 = filter_input(INPUT_POST, 'dogweight2', FILTER_SANITIZE_STRING);
	// echo json_encode($weight);
};


if ( isset( $_POST['mealplanSelected2'] ) ) {
	$mealPlan3 = filter_input(INPUT_POST, 'mealplanSelected2', FILTER_SANITIZE_STRING);
	// echo json_encode($mealPlan);
};

if ( isset( $_POST['dogname3'] ) ) {
	$name4 = filter_input(INPUT_POST, 'dogname3', FILTER_SANITIZE_STRING);
	// $name = stripslashes($_POST['dogname1']);
	// echo json_encode($name1);
};

if ( isset( $_POST['dogage3'] ) ) {
	$YOB4 = filter_input(INPUT_POST, 'dogage3', FILTER_SANITIZE_STRING);
	$current_year4 = date("Y");
	$age4 = $current_year4 - $YOB4;
	// echo json_encode($age);
};

if ( isset( $_POST['dogweight3'] ) ) {
	$weight4 = filter_input(INPUT_POST, 'dogweight3', FILTER_SANITIZE_STRING);
	// echo json_encode($weight);
};


if ( isset( $_POST['mealplanSelected3'] ) ) {
	$mealPlan4 = filter_input(INPUT_POST, 'mealplanSelected3', FILTER_SANITIZE_STRING);
	// echo json_encode($mealPlan);
};

//define classes 
class feed_schedule {
	public $pet_name; 
	public $pet_age;
	public $pet_weight;
	public $meal_plan;
	public $single_feed_schedule;

	public function calculator () {
		if ($this->pet_age == '1' && $this->pet_weight == '1' && $this->meal_plan == 'mp1') {
			$msg = 'We recommend monthly delivery for '.$this->pet_name;
			echo json_encode($msg);
		} else if ($this->pet_age == emtpy() && $this->pet_weight == emtpy() && $this->meal_plan == emtpy()) {
			$error = "oops, something broke.";
			echo json_encode($error);
			exit;
		}
		 else {
			$error = "oops, something broke.";
			echo json_encode($error);
			exit;
		}
	}

};

$pet1 = new feed_schedule();
$pet1->pet_name = $name1;
$pet1->pet_age = $age1;
$pet1->pet_weight = $weight1;
$pet1->meal_plan = $mealPlan1;

$pet2 = new feed_schedule();
$pet2->pet_name = $name2;
$pet2->pet_age = $age2;
$pet2->pet_weight = $weight2;
$pet2->meal_plan = $mealPlan2;

$pet3 = new feed_schedule();
$pet3->pet_name = $name3;
$pet3->pet_age = $age3;
$pet3->pet_weight = $weight3;
$pet3->meal_plan = $mealPlan3;

$pet4 = new feed_schedule();
$pet4->pet_name = $name4;
$pet4->pet_age = $age4;
$pet4->pet_weight = $weight4;
$pet4->meal_plan = $mealPlan4;

// class order {
// 	public $feed_schedules = [];
// };

$feed_schedules = [];

array_push($feed_schedules, $pet1, $pet2, $pet3, $pet4);

foreach($feed_schedules as $i => $schedule) {
	if ($schedule->pet_name ==! null) {
		echo "Pet schedule ". $i . ":" . " ";
		echo $schedule->calculator();
		echo "<br>";
	}
};
