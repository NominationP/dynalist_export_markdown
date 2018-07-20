<?php

require_once "regulation.php";

class TransProcess{

	public $code_zone = false;

	function change_line($feature , $line){

		if(substr_count($line,"`") == 1){

			$line = ltrim(str_replace("`", Regulation::$ruler["`"], $line));

			if($this->code_zone){
				$this->code_zone = false;
			}else{

				$this->code_zone = true;
			}

			return ltrim($line);
			// echo date("H:i:s\n");print_r($line);echo "\n";
			// echo date("H:i:s\n");var_dump($this->code_zone);echo "\n";
		}

		if($this->code_zone){
			return $line;
		}

		/**
		 * filter special char
		 */
		if (strpos($line, '#') !== false) {
		    $line = str_replace("#", Regulation::$ruler["#"] , $line);
		}

		/**
		 * priority 1
		 */
		if(isset($feature['firstCharater']) && 
			( $feature['firstCharater']=="`" || $feature['firstCharater']=="!") ||	$feature['firstCharater']==">" )   {

			$line = ltrim(str_replace($feature['firstCharater'], Regulation::$ruler[$feature['firstCharater']], $line));
		}

		elseif(isset($feature['identSize'])){

			$line = Regulation::$ruler[$feature['identSize']]." ".ltrim($line);
		}


		return $line;
	}

	function count_begin_space($line){
		return $identSize = strlen($line)-strlen(ltrim($line));
	}

	function find_feature($line){

		return $feature = [

			"identSize" =>$this->count_begin_space($line),
			"firstCharater"=>ltrim($line)[0],
		];


	}



	function process_first($file_name){

		file_put_contents($file_name.".md","");

		$count_line = 0;
		if ($file = fopen("$file_name", "r")) {
		    while(!feof($file)) {
		    	$count_line++;

		        $line = fgets($file);
		        if($line == null) continue;

		        $feature = $this->find_feature($line);

		        $line = $this->change_line($feature,ltrim($line));



		        // print_r($line);echo "\n";
		        
		        file_put_contents($file_name.".md",ltrim($line)."\n",FILE_APPEND);

		        // if($count_line == 68){

		        // 	echo date("H:i:s\n");var_dump($this->code_zone);echo "\n";
		        // 	echo date("H:i:s\n");var_dump(ltrim($line));echo "\n";
		        // 	echo date("H:i:s\n");print_r($feature);echo "\n";die();
		        // }

		        # do same stuff with the $line
		    }
		    fclose($file);
		}
	}

}


