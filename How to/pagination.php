<?php 

	$persons_json = file_get_contents("example_persons.json");
	$persons = json_decode($persons_json);	
	$URL_PAGE = "pagination.php?page=";
	$limit = 10;

	$length = count($persons->personas);
	$pages = $length / $limit;
	$pages = ($length % $limit) != 0 ? $pages + 1 : $pages;

	for ($i = 1; $i < $pages; $i++) {
    	echo "<a href='".$URL_PAGE.$i."'>[".$i."]</a> ";
    }

	$number_page = $_GET['page'];
	$offset = ($number_page - 1) * $limit;
	$init = 0;

	while ($init < $limit) {
        if ($init + $offset < $length) 
    		echo "<br>".$persons->personas[$init+$offset]->nombre;
            
        $init++;
    }

//echo "Longuitud: " . count($persons->personas);


//var_dump($persons->personas);
//print_r($persons['personas'][0]);

 ?>