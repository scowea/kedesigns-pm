<?php    
    ################################################################################   
    ## +---------------------------------------------------------------------------+
    ## | 1. Creating & Calling:                                                    | 
    ## +---------------------------------------------------------------------------+
    $global_code = '';

	##  *** only relative (virtual) path (to the current document)
	//header("Content-type: text/html; charset=ISO-8859-1");
	  ini_set('allow_call_time_pass_reference', TRUE);
	  //ini_set('error_reporting', E_ALL);
	  
      define ("DATAGRID_DIR", "./apphp_datagrid/");
      define ("PEAR_DIR", "./apphp_datagrid/pear/");
      
      require_once(DATAGRID_DIR.'datagrid.class.php');
      require_once(PEAR_DIR.'PEAR.php');
      require_once(PEAR_DIR.'DB.php');
    

include ('creds.php');
    
    //ob_start();
      $db_conn = DB::factory('mysql'); 
      $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
    
    ##  *** put a primary key on the first place 
      $sql=" SELECT *, project_id, IF(qb = 1, 'X', '') as qb_translated, IF(deposit = 1, 'X', '') as deposit_translated, IF(final = 1, 'X', '') as final_translated  FROM projects ";
       
    ##  *** set needed options
      $debug_mode = false;
      $messaging = true;
      $unique_prefix = "f_";  
      $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
    ##  *** set data source with needed options
      $default_order_field = "priority";
      $default_order_type = "ASC";
      $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
    
	
		
	// set priveledges accordingly..
	$modes = array(
		  "add"     =>array("view"=>true, "edit"=>false, "type"=>"link"),
		  "edit"    =>array("view"=>true, "edit"=>true, "type"=>"link",  "byFieldValue"=>""),
		  "cancel"  =>array("view"=>true, "edit"=>true, "type"=>"link"),
		  //"details" =>array("view"=>true, "edit"=>false, "type"=>"link"),
		  "delete"  =>array("view"=>true, "edit"=>true, "type"=>"image")
		  
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
//$dgrid->SetPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);

	
	//***************************
	
	
## +-- AJAX -------------------------------------------------------------------+
## *** enable or disable using of AJAX (for sorting and paging ONLY)
//$ajax_option = true;
//$dgrid->AllowAjax($ajax_option);

## *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
$http_get_vars = array("q");
$dgrid->SetHttpGetVars($http_get_vars);
	
## +---------------------------------------------------------------------------+
    ## | 5. Filtering Settings:  (search)                                          | 
    ## +---------------------------------------------------------------------------+
	
	$filtering_option = true;
##  *** filter layouts: "0" - tabular(horizontal) - default, "1" - columnar(vertical), "2" - advanced(inline)
//$layouts = array("view"=>"0", "edit"=>"1", "details"=>"1", "filter"=>"2"); 
$show_search_type = false;
	$dgrid->AllowFiltering($filtering_option, $show_search_type);
	
	// arrays to build dropdowns or radio buttons.
	$translate_credit_check_response = array("Approved"=>"Approved", "Declined"=>"Declined", "N/A"=>"N/A");
	$translate_boolean = array(0=>"No", 1=>"Yes");
	
	//..................
	// this code builds the dependent dropdown country-state

	// create the state filter condition..

	
	//................................................	
		
	//..............
	
	$filtering_fields = array(
	

				
		"Status"=>array(
			"type"=>"dropdownlist", 
			"table"=>"projects",
			"field"=>"status",
			"filter_condition"=>"",
			"show_operator"=>false,
			"default_operator"=>"like",
			"case_sensitive"=>false,
			"comparison_type"=>"string",
			"width"=>"",
			"on_js_event"=>""),
								
	);
	$dgrid->SetFieldsFiltering($filtering_fields);

	
	
  
    ## +---------------------------------------------------------------------------+
    ## | 6. View Mode Settings:                                                    | 
    ## +---------------------------------------------------------------------------+
    ##  *** set columns in view mode
	
$vm_columns = array(
    	"project_id"  =>array(	"header"=>"id", 
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
				
    
	
						
    	"client"  =>array("header"=>"Name", 
						"type"=>"link",    
						"field_key"=>"project_id", 
						"field_data"=>"project_id", 
					//	"rel"=>"", 
					//	"title"=>"", 
					//	"target"=>"", 
						"href"=>"http://kedesigns-pm.eweaversolutions.com/node/1?project_id={0}",


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
										
					
    	"status"  =>array("header"=>"Status", 
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
  	
	"priority"  =>array("header"=>"Priority", 
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
						"on_item_created"=>"set_row_color_for_priority",
						"on_js_event"=>""),

		
    
		"project_type"  =>array("header"=>"Project Type", 
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
						
    	
										

    	"description"  =>array("header"=>"Description/PO", 				
                				"type"=>"link",
                                                "field_key"=>"project_id",
                                                "field_data"=>"project_id",
                                        //      "rel"=>"", 
                                        //      "title"=>"", 
                                        //      "target"=>"", 
                                                "href"=>"http://kedesigns-pm.eweaversolutions.com/?q=node/1&project_id={0}"),


    	"cabinetry"  =>array("header"=>"Cabinetry", 
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

    	"progress_notes"  =>array("header"=>"Progress Notes", 
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
	
        "qb_translated"  =>array("header"=>"QB?",
                                                "type"=>"label",
                                                //"req_type"=>"rt",
						"align"=>"center",
                                                //"width"=>"210px", 
                                                //"title"=>"",
                                                //"readonly"=>"false",
                                                //"maxlength"=>"-1",
                                                //"default"=>"",
                                                //"unique"=>"false",
                                                //"unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),   


        "deposit_translated"  =>array("header"=>"Deposit?",
                                                "type"=>"label",
						"align"=>"center",
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

        "final_translated"  =>array("header"=>"Final?",
                                                "type"=>"label",
                                                "align"=>"center",
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
    
	##  preedfiled values:	
	$status_field_dropdown_options = array("Active"=>"Active", "Bid/Estimate"=>"Bid/Estimate", "Complete"=> "Complete");  /* as "value"=>"option" */
	$priority_field_dropdown_options = array("1"=>"Todays Tasks", "2"=>"Requires Attention", "3"=> "Requires No Attention", "4"=>"Waiting");  /* as "value"=>"option" */
	
	$em_columns = array(	
	

	
		
								
    	"client"  =>array("header"=>"Client", 
				  		"type"=>"textbox",    
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
																																			
    	"status"  =>array("header"=>"Status", 
				  		"type"=>"enum",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true",
  	  					"source"=>$status_field_dropdown_options, 
						"on_js_event"=>""),
		
		
    	"priority"  =>array("header"=>"Priority", 
				  		"type"=>"enum",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"source"=>$priority_field_dropdown_options,
						"on_js_event"=>""),
						
    	"project_type"  =>array("header"=>"Project Type", 
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
						
		"description"  =>array("header"=>"Description/PO", 
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
					
    	"cabinetry"  =>array("header"=>"Cabinetry", 
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
						
    	"progress_notes"  =>array("header"=>"Progress Notes", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						"width"=>"100%", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true", 
						"on_js_event"=>""),												
						
    	"qb"  =>array("header"=>"QB?", 
				  		"type"=>"checkbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true",
 						"true_value"=>1, 
   						"false_value"=>0,
						"on_js_event"=>""),
						


    	"deposit"  =>array("header"=>"Deposit?", 
				  		"type"=>"checkbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"true",
 						"true_value"=>1, 
   						"false_value"=>0,
						"on_js_event"=>""),	
		
        "final"  =>array("header"=>"Final?",       
                                                "type"=>"checkbox",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>"",
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
 						"true_value"=>1, 
   						"false_value"=>0,
                                                "on_js_event"=>""),

						
	); // end $em_columns = array(

	//$auto_column_in_edit_mode =true;
	//$dgrid->SetAutoColumnsInEditMode($auto_column_in_edit_mode);

	$dgrid->SetColumnsInEditMode($em_columns);
	
      $table_name = "projects";
      $primary_key = "project_id";
      $condition = "";
      $dgrid->setTableEdit($table_name, $primary_key, $condition);
     // $dgrid->setAutoColumnsInEditMode(true);
    
function set_row_color_for_priority($priority, $row)
{
        global $global_code;


	echo 'set_row_color_for_priority function got fired; priority='.$priority . '; ind=' . $ind . '; row=' . $row;
        echo print_r($row, true);
	if ($priority == 1)
        {
                echo '<script>document.getElementById("f_row_"+'.$row[0].').style.backgroundColor = "#ff0000";</script>'; // red background
                
        }
	
        return $priority;

                //echo '<script>document.getElementById("'.$unique_prefix.'row_"+'.$r.').style.backgroundColor = "#ffff00";</script>'; // yellow background
}
echo 'GLOBAL CODE IS HERE: '. $global_code;







  
    ## +---------------------------------------------------------------------------+
    ## | 8. Bind the DataGrid:                                                     | 
    ## +---------------------------------------------------------------------------+
    ##  *** set debug mode & messaging options
        $dgrid->bind();        
        //ob_end_flush();
    ################################################################################    

?>
