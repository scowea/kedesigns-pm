<?php    
    ################################################################################   
    ## +---------------------------------------------------------------------------+
    ## | 1. Creating & Calling:                                                    | 
    ## +---------------------------------------------------------------------------+
    ##  *** only relative (virtual) path (to the current document)
	//header("Content-type: text/html; charset=ISO-8859-1");
	  ini_set('allow_call_time_pass_reference', TRUE);
	  //ini_set('error_reporting', E_ALL);
	  
      define ("DATAGRID_DIR", "./apphp_datagrid/");
      define ("PEAR_DIR", "./apphp_datagrid/pear/");
      
      require_once(DATAGRID_DIR.'datagrid.class.php');
      require_once(PEAR_DIR.'PEAR.php');
      require_once(PEAR_DIR.'DB.php');
    

    ##  *** creating variables that we need for database connection 
      $DB_USER='sinkspots';            /* usually like this: prefix_name             */
      $DB_PASS='slink2Sink!';           /* must be already encrypted (recommended)   */
      $DB_HOST='sinkspots.db.10211257.hostedresource.com';               /* usually localhost                          */
      $DB_NAME='sinkspots';                /* usually like this: prefix_dbName           */
    
    //ob_start();
      $db_conn = DB::factory('mysql'); 
      $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
    
    ##  *** put a primary key on the first place 
      $sql=" SELECT *, spot_id, mystery_spot_name  FROM mystery_spots ";
       
    ##  *** set needed options
      $debug_mode = true;
      $messaging = true;
      $unique_prefix = "f_";  
      $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
    ##  *** set data source with needed options
      $default_order_field = "mystery_spot_name";
      $default_order_type = "ASC";
      $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
    
	
		
	// set priveledges accordingly..
	$modes = array(
		  //"add"     =>array("view"=>true, "edit"=>false, "type"=>"link"),
		  //"edit"    =>array("view"=>true, "edit"=>true, "type"=>"link",  "byFieldValue"=>""),
		  "cancel"  =>array("view"=>true, "edit"=>true, "type"=>"link"),
		//  "details" =>array("view"=>true, "edit"=>false, "type"=>"link"),
		 // "delete"  =>array("view"=>true, "edit"=>true, "type"=>"image")
		  
	);	
		
	$dgrid->SetModes($modes);
	
	//*******************************************
	
$bottom_paging = array(
         "results"=>true, "results_align"=>"left", 
         "pages"=>true, "pages_align"=>"center", 
         "page_size"=>true, "page_size_align"=>"right");
$top_paging = array(
         "results"=>true, "results_align"=>"left",
         "pages"=>true, "pages_align"=>"center",
         "page_size"=>true, "page_size_align"=>"right");
$pages_array = array("10"=>"10", "25"=>"25", "50"=>"50", "100"=>"100", "250"=>"250", "500"=>"500", "1000"=>"1000");
$default_page_size = 250;
$paging_arrows = array("first"=>"|<<", "previous"=>"<<", "next"=>">>", "last"=>">>|");
$dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);

	
	//***************************
	
	
## +-- AJAX -------------------------------------------------------------------+
## *** enable or disable using of AJAX (for sorting and paging ONLY)
//$ajax_option = true;
//$dgrid->AllowAjax($ajax_option);
	
## +---------------------------------------------------------------------------+
    ## | 5. Filtering Settings:  (search)                                          | 
    ## +---------------------------------------------------------------------------+
	
	$filtering_option = true;
	$dgrid->AllowFiltering($filtering_option);
	
	// arrays to build dropdowns or radio buttons.
	$translate_credit_check_response = array("Approved"=>"Approved", "Declined"=>"Declined", "N/A"=>"N/A");
	$translate_boolean = array(0=>"No", 1=>"Yes");
	
	//..................
	// this code builds the dependent dropdown country-state
	$country_name = (isset($_REQUEST['f__ff_mystery_spots_country']) ? $_REQUEST['f__ff_mystery_spots_country'] : "");
	$state_name = (isset($_REQUEST['f__ff_mystery_spots_state']) ? $_REQUEST['f__ff_mystery_spots_state'] : "");
	$city_name = (isset($_REQUEST['f__ff_mystery_spots_city']) ? $_REQUEST['f__ff_mystery_spots_city'] : "");
	$river_name = (isset($_REQUEST['f__ff_mystery_spots_river']) ? $_REQUEST['f__ff_mystery_spots_river'] : "");

	// create the state filter condition..
	$state_filter_condition = "";
/*	
	$country_sql =
	"SELECT *
	FROM mystery_spots
	WHERE country = '".strip_invalid_chars($country_name)."'";
	
	$result = mysql_query($country_sql);
	//echo '<br>sql: ' . $country_sql;
	//echo '<br>num rows:' . mysql_num_rows($result);
	
	if(mysql_num_rows($result) > 0)
	{
		$state_filter_condition .= " spot_id IN (-1";
		
		while($row = mysql_fetch_array($result))
		{
			$state_filter_condition .= ", ".$row[0];
		}
		$state_filter_condition .= ")";
	}
	else 
	{ 
		$state_filter_condition = ""; 
	}
*/
	
	//................................................	
		
	//..............
	
	$filtering_fields = array(
	
		"Name"=>array(
			"type"=>"textbox",
			"table"=>"mystery_spots",
			"field"=>"mystery_spot_name",
			"filter_condition"=>"",
			"show_operator"=>false|true,
			"default_operator"=>"like",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>""),
				
		"Region"=>array(
			"type"=>"dropdownlist", 
			"table"=>"mystery_spots",
			"field"=>"region",
			"filter_condition"=>"",
			"show_operator"=>false,
			"default_operator"=>"like",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>""),				
					
		"Country"=>array(
			"type"=>"dropdownlist", 
			"table"=>"mystery_spots",
			"field"=>"country",
			"filter_condition"=>"",
			"show_operator"=>false,
			"default_operator"=>"like",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			//"on_js_event"=>""
			"on_js_event"=>"onchange=\"reload(this.form);\"",
			),
			
		"State"=>array(
			"type"=>"dropdownlist", 
			"table"=>"mystery_spots",
			"field"=>"state",
			"filter_condition"=>"",
			"condition"=>$state_filter_condition,
			"show_operator"=>false,
			"default_operator"=>"=",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>"onchange=\"reload(this.form);\""),
			
		"City"=>array(
			"type"=>"dropdownlist", 
			"table"=>"mystery_spots",
			"field"=>"city",
			"filter_condition"=>"",
			//"condition"=>$city_filter_condition,
			"show_operator"=>false,
			"default_operator"=>"=",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>"onchange=\"reload(this.form);\""),

		"River"=>array(
			"type"=>"dropdownlist", 
			"table"=>"mystery_spots",
			"field"=>"river",
			"filter_condition"=>"",
			//"condition"=>$river_filter_condition,
			"show_operator"=>false,
			"default_operator"=>"like",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>""),			
			
		"Spot Quality"=>array(
			"type"=>"dropdownlist", 
			//"type"=>"textbox",
			"table"=>"mystery_spots",
			"field"=>"spot_quality",
			"filter_condition"=>"",
			"show_operator"=>false,
			"default_operator"=>"=",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			//"on_js_event"=>"onchange=\"reload(this.form);\""),
			//"condition"=>$dd2_condition,
			//"on_js_event"=>""
			),
			
						
			
	);
	$dgrid->SetFieldsFiltering($filtering_fields);

	
	
  
    ## +---------------------------------------------------------------------------+
    ## | 6. View Mode Settings:                                                    | 
    ## +---------------------------------------------------------------------------+
    ##  *** set columns in view mode
	
	
		$vm_columns = array(
    	"spot_id"  =>array(	"header"=>"id", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false",  
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"false",  // NOT VISIBLE
						"on_js_event"=>""),
				
    
	/* "FieldName_8"=>array("header"=>"Name_H", 
	"type"=>"link",   
    "align"=>"left", 
	"width"=>"X%|Xpx", 
	"wrap"=>"wrap|nowrap",
	 "text_length"=>"-1", 
	"tooltip"=>"false",
	 "tooltip_type"=>"floating|simple",
	 "case"=>"normal|upper|lower|camel", 
	 "summarize"=>"false",
	  "sort_type"=>"string|numeric", 
	 "sort_by"=>"", 
	 "visible"=>"true",
	  "on_js_event"=>"", 
	  "field_key"=>"field_name_0"|"field_key_1"=>"field_name_1"|..., 
	  "field_data"=>"field_name_2", 
	  "rel"=>"", "title"=>"", 
	"target"=>"_new", 
	"href"=>"http://mydomain.com?act={0}&act={1}&code=ABC"),
*/
						
    	"mystery_spot_name"  =>array("header"=>"Name", 
						"type"=>"link",    
						"field_key"=>"spot_id", 
						"field_data"=>"spot_id", 
					//	"rel"=>"", 
					//	"title"=>"", 
					//	"target"=>"", 
						"href"=>"http://sinkspots.org/index.php?spot_id={0}",


						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),					
					
    	"river"  =>array("header"=>"River", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),					
  	
	"region"  =>array("header"=>"Region", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),

		
    
		"country"  =>array("header"=>"Country", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),		
						
    	
										

    	"state"  =>array("header"=>"State", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),					

    	"city"  =>array("header"=>"City", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),					

    	"spot_quality"  =>array("header"=>"Quality", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),																		
											
	); // end $em_columns = array(
	
	$dgrid->SetColumnsInViewMode($vm_columns);  
	  
	  //$dgrid->setAutoColumnsInViewMode(true);  
    
    ## +---------------------------------------------------------------------------+
    ## | 7. Add/Edit/Details Mode settings:                                        | 
    ## +---------------------------------------------------------------------------+
    ##  ***  set settings for edit/details mode
	    ##  ***  set settings for edit/details mode	
/*	
	$em_columns = array(	
	

	
		
						
		"picture_2_url"    =>array("header"=>"Picture 2", 
						"type"=>"image",     
						"req_type"=>"st", 
						"width"=>"220px", 
						"title"=>"", 
						"readonly"=>"false",
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"",
						"visible"=>"true", 
						"on_js_event"=>"",
						"target_path"=>"images/mystery_spots/", 
						"max_file_size"=>"5M", 
						"image_width"=>"170px",
						"image_height"=>"90px", 
						"resize_image"=>"false", 
						"resize_width"=>"", 
						"resize_height"=>"",
						"magnify"=>"true", 
						"magnify_type"=>"popup", 
						"magnify_power"=>"3", 
						"file_name"=>"",
						"host"=>"local|remote"),	
						
		"picture_3_url"    =>array("header"=>"Picture 3", 
						"type"=>"image",     
						"req_type"=>"st", 
						"width"=>"220px", 
						"title"=>"", 
						"readonly"=>"false",
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"",
						"visible"=>"true", 
						"on_js_event"=>"",
						"target_path"=>"images/mystery_spots/", 
						"max_file_size"=>"5M", 
						"image_width"=>"170px",
						"image_height"=>"90px", 
						"resize_image"=>"false", 
						"resize_width"=>"", 
						"resize_height"=>"",
						"magnify"=>"true", 
						"magnify_type"=>"popup", 
						"magnify_power"=>"3", 
						"file_name"=>"",
						"host"=>"local|remote"),	
						
		"picture_4_url"    =>array("header"=>"Picture 4", 
						"type"=>"image",     
						"req_type"=>"st", 
						"width"=>"220px", 
						"title"=>"", 
						"readonly"=>"false",
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"",
						"visible"=>"true", 
						"on_js_event"=>"",
						"target_path"=>"images/mystery_spots/", 
						"max_file_size"=>"5M", 
						"image_width"=>"170px",
						"image_height"=>"90px", 
						"resize_image"=>"false", 
						"resize_width"=>"", 
						"resize_height"=>"",
						"magnify"=>"true", 
						"magnify_type"=>"popup", 
						"magnify_power"=>"3", 
						"file_name"=>"",
						"host"=>"local|remote"),	
						
		"picture_5_url"    =>array("header"=>"Picture 5", 
						"type"=>"image",     
						"req_type"=>"st", 
						"width"=>"220px", 
						"title"=>"", 
						"readonly"=>"false",
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"",
						"visible"=>"true", 
						"on_js_event"=>"",
						"target_path"=>"images/mystery_spots/", 
						"max_file_size"=>"5M", 
						"image_width"=>"170px",
						"image_height"=>"90px", 
						"resize_image"=>"false", 
						"resize_width"=>"", 
						"resize_height"=>"",
						"magnify"=>"true", 
						"magnify_type"=>"popup", 
						"magnify_power"=>"3", 
						"file_name"=>"",
						"host"=>"local|remote"),	
						
		"picture_6_url"    =>array("header"=>"Picture 6", 
						"type"=>"image",     
						"req_type"=>"st", 
						"width"=>"220px", 
						"title"=>"", 
						"readonly"=>"false",
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"",
						"visible"=>"true", 
						"on_js_event"=>"",
						"target_path"=>"images/mystery_spots/", 
						"max_file_size"=>"5M", 
						"image_width"=>"170px",
						"image_height"=>"90px", 
						"resize_image"=>"false", 
						"resize_width"=>"", 
						"resize_height"=>"",
						"magnify"=>"true", 
						"magnify_type"=>"popup", 
						"magnify_power"=>"3", 
						"file_name"=>"",
						"host"=>"local|remote"),	
								
    	"owner"  =>array("header"=>"Owner", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),								
																																			
    	"status"  =>array("header"=>"Status", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),
		
		
    	"model"  =>array("header"=>"Model", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),
						
    	"cut_weight"  =>array("header"=>"Cut Weight", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),
						
		"cut_inseam"  =>array("header"=>"Cut Inseam", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),
					
    	"location_city"  =>array("header"=>"Location - City", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),		
						
    	"location_state"  =>array("header"=>"Location - State", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),												
						
    	"description"  =>array("header"=>"Description", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),
						

/*
    	"date_posted"  =>array("header"=>"Date Posted", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),	

								
	); // end $em_columns = array(
*/
	//$auto_column_in_edit_mode =true;
	//$dgrid->SetAutoColumnsInEditMode($auto_column_in_edit_mode);

	//$dgrid->SetColumnsInEditMode($em_columns);
	
      $table_name = "mystery_spots";
      $primary_key = "spot_id";
      $condition = "";
      $dgrid->setTableEdit($table_name, $primary_key, $condition);
     // $dgrid->setAutoColumnsInEditMode(true);
      
    ## +---------------------------------------------------------------------------+
    ## | 8. Bind the DataGrid:                                                     | 
    ## +---------------------------------------------------------------------------+
    ##  *** set debug mode & messaging options
        $dgrid->bind();        
        //ob_end_flush();
    ################################################################################    

?>
