<?php
	spl_autoload_register(function($getClassName){
    include "classes/".$getClassName.".php";
  });

$table = "mydolist";

	//addToList action ---------------
	if ($_POST['action']=='addToList') {
		//crate object
		$MyDoListObj = new MyDoList();
		//varable to insert into table
		$text = $_POST['text'];
		$valid = 0;
		//crate array of varable to insert
		$data = array(
			'text'=>$text,
			'rdate'=>date("Y-m-d H:i:s"),
			'valid'=>$valid
		);
		//insert to table
		$Result = $MyDoListObj->insert($table,$data);
		//crate massage back
		if ($Result) {
			$smg = "added";
		}else{
			$smg = "notadd";
		}
		$successData = array(
			'smg'=>$smg
		);
		echo json_encode($successData);
	}


	//all action ----------------
	if ($_POST['action']=='all') {
			//crate object
			$MyDoListObj = new MyDoList();
			//select from table
			$Result = $MyDoListObj->select($table,'rdate desc');
			//crate massage back
			$AllList='';
			if ($Result) {
			foreach ($Result as $value) {
				$check ='';
				if ($value['valid']) {
					$check = 'class="checked"';
				}
				$AllList .='<li  '.$check.'>'.$value['text'].' <span id='.$value['id'].' class="close">×</span></li>';
			}
			}else{
				$AllList = "empty tasks";
			}
			echo $AllList;
		}

		//delete action -----------------
		if ($_POST['action']=='delete') {
				//crate object
				$MyDoListObj = new MyDoList();
				$id = $_POST['id'];

				//delete from table
				$Result = $MyDoListObj->delete($table , $id);
				//crate massage back
				if ($Result) {
					$smg = "delete";
				}else{
					$smg = "notdelete";
				}
				$successData = array(
					'smg'=>$smg
				);
				echo json_encode($successData);
			}

			//addcheck action -----------------
			if ($_POST['action']=='addcheck') {
					//crate object
					$MyDoListObj = new MyDoList();
					$id = $_POST['id'];

					$data = array(
						'valid'=>1,
						'rdate'=>date("Y-m-d H:i:s")
					);
					$cond = array(
						'id'=>$id
					);
					//delete from table
					$Result = $MyDoListObj->update($table , $data,$cond);
					//crate massage back
					if ($Result) {
						$smg = "addcheck";
					}else{
						$smg = "notaddcheck";
					}
					$successData = array(
						'smg'=>$smg
					);
					echo json_encode($successData);
				}

				//removecheck action -----------------
				if ($_POST['action']=='removecheck') {
						//crate object
						$MyDoListObj = new MyDoList();
						$id = $_POST['id'];

						$data = array(
							'valid'=>0,
							'rdate'=>date("Y-m-d H:i:s")
						);
						$cond = array(
							'id'=>$id
						);
						//delete from table
						$Result = $MyDoListObj->update($table , $data,$cond);
						//crate massage back
						if ($Result) {
							$smg = "removecheck";
						}else{
							$smg = "notremovecheck";
						}
						$successData = array(
							'smg'=>$smg
						);
						echo json_encode($successData);
					}
