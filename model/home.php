<?php
class homeModel{
	function __construct(){
		try{
			$this->pdo = new PDO("mysql:host=localhost;dbname=job","root","");
		}catch(PDOExection $e){
			echo $e->getMessage();
		}
	}


	function home(){
		$arr=array('title'=>'Home','data'=>'Home Data');
		return $arr;
	}


	function about(){
		$arr=array('title'=>'About','data'=>'About Data');
		return $arr;
	}

	function apply(){
		$arr=array('title'=>'About','data'=>'About Data');
		return $arr;
	}


	function category($id){
		$stmt = $this->pdo->prepare("SELECT * FROM job WHERE categoryId = '$id' AND closingDate > :date");

		$date = new DateTime();

		$values = [
			'date' => $date->format('Y-m-d')
		];

		$stmt->execute($values);


		foreach ($stmt as $job) {
			echo '<li>';

			echo '<div class="details">';
			echo '<h2>' . $job['title'] . '</h2>';
			echo '<h3>' . $job['salary'] . '</h3>';
			echo '<p>' . nl2br($job['description']) . '</p>';

			echo '<a class="more" href="index.php?function=apply?id=' . $job['id'] . '">Apply for this job</a>';

			echo '</div>';
			echo '</li>';
		}


		$sql="SELECT name FROM category where id='$id'";
		$stmt2=$this->pdo->prepare($sql);
		$stmt2->execute();
		$data=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		$arr=$data['0'];
		return $arr;
	}
}
?>