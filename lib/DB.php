<?php
/**
*  DB Class
*/
	    require_once "./config/config.php";

		class DB
		{
			public $DBConnect;
			private $HOSTName = HOSTName;
			private $USERName = USERName;
			private $USERpass = USERpass;
			private $DBname = DBname;
			function __construct()
			{
				$this->DBConnect();
			}

			public function DBConnect(){
				try{
				$this->DBConnect = new PDO('mysql:host='.$this->HOSTName.';dbname='.$this->DBname,$this->USERName,$this->USERpass);

				}catch(PDOException $e){
					echo "Connection Fail..".$e->getMessage();
				}
			}

			public function select($sql){
				$stmt = $this->DBConnect->prepare($sql);
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			public function insert($table,$data){
				$keys = implode(',', array_keys($data));
				$values = ":".implode(',:', array_keys($data));

				$sql = "INSERT INTO $table($keys) VALUES($values)";
				$stmt = $this->DBConnect->prepare($sql);
				foreach ($data as $key => $value) {
					$stmt->bindValue(":$key",$value);
				}
				return $stmt->execute();

				}

				public function update($table,$data,$cond){
					$getKeys ='';
					foreach ($data as $keys => $values) {
						$getKeys .="$keys=:$keys,";
					}
					$getKeys = rtrim($getKeys,",");

					$i = 0;
					$len = count($cond);
					$getKeys2 ='';
					foreach ($cond as $keys => $values) {

								if ($i == $len - 1) {
						 			$getKeys2 .="$keys=:$keys ";
							 } else  {
									 	$getKeys2 .="$keys=:$keys and";
							 }
							 $i++;
					}
					$getKeys2 = rtrim($getKeys2,",");

					$sql = "UPDATE $table SET  	$getKeys  WHERE  $getKeys2";

					$stmt = $this->DBConnect->prepare($sql);

					$ressarr = array_merge($data,$cond);

					foreach ($ressarr as $key => $value) {
						$stmt->bindValue(":$key",$value);
					}

					$stmt->execute();
					return $stmt->rowCount();

				}

				public function delete($table,$deleteid=0,$cond=0,$limit=1){
					if ($deleteid) {
						$sql = "DELETE FROM $table WHERE id=:deleteid";
						$stmt = $this->DBConnect->prepare($sql);
						$stmt->bindParam(':deleteid', $deleteid, PDO::PARAM_INT);
						$stmt->execute();
						return $stmt->rowCount();
					}else{
						$i = 0;
						$len = count($cond);
						$getKeys2 ='';
						foreach ($cond as $keys => $values) {

									if ($i == $len - 1) {
							 			$getKeys2 .="$keys=:$keys ";
								 } else  {
										 	$getKeys2 .="$keys=:$keys and";
								 }
								 $i++;
						}
						$getKeys2 = rtrim($getKeys2,",");
						$sql = "DELETE FROM $table WHERE $getKeys2 LIMIT $limit";
						$stmt = $this->DBConnect->prepare($sql);
						$stmt->execute();
					}

				}





		}
