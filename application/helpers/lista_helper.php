<?php 	
	function helperLista($id) {
		$ci = get_instance();

	    $ci->db->cache_on();
	    $row = $ci->db->query("SELECT * FROM checklist c INNER JOIN sites s ON c.id_site = s.id_site WHERE c.id_site = $id")->result_array();
	    $ci->db->cache_off();

    	// return print_r($row);
    
        return $row;

	}