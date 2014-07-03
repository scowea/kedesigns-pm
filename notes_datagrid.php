<?php    
    ################################################################################   
    ## +---------------------------------------------------------------------------+
    ## | 1. Creating & Calling:                                                    | 
    ## +---------------------------------------------------------------------------+
    $global_code = '';

//echo"<h1>PLEASE DO NOT USE THIS SITE, FOR THE NEXT FEW MINUTES. MAJOR LIFTING IS HAPPENING AND MAY INTERFER WITH YOUR DATA ENTRY! <br> THANK YOU SIR.</h1>";

	##  *** only relative (virtual) path (to the current document)
	//header("Content-type: text/html; charset=ISO-8859-1");
	  ini_set('allow_call_time_pass_reference', TRUE);
	  //ini_set('error_reporting', E_ALL);
	  
      define ("DATAGRID_DIR", "./apphp_datagrid/");
      define ("PEAR_DIR", "./apphp_datagrid/pear/");
      
      require_once(DATAGRID_DIR.'datagrid.class.php');
      require_once(PEAR_DIR.'PEAR.php');
      require_once(PEAR_DIR.'DB.php');
    
	$project_id = $_GET['project_id'];
	if(trim($project_id) == '')
		die('There was an issue. <a href=http://kedesigns-pm.eweaversolutions.com >Please Try Again</a>');


	$project_sql = "SELECT * FROM projects where project_id = " . $project_id;

	
	include ('creds.php');
    
    //ob_start();
      $db_conn = DB::factory('mysql'); 
      $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
    
    ##  *** put a primary key on the first place 
      $sql=" SELECT note_id, project_id, DATE_FORMAT(time_stamp,'%c-%e-%Y' ) AS time_stamp, note  FROM project_notes where project_id = " . $project_id;
      //%c/%e/%Y 
    ##  *** set needed options
      $debug_mode = false;
      $messaging = true;
      $unique_prefix = "f_";  
      $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
    ##  *** set data source with needed options
      $default_order_field = "note_id";
      $default_order_type = "DESC";
      $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
    

//***************************************

$project_sql = "SELECT * FROM projects where project_id = " . $project_id;
$dSet = $dgrid->ExecuteSql($project_sql);

$row = $dSet->fetchRow();

//

//echo 'project array: ' . print_r($row,true);

// $row[0] // project_id
$pre_client = $row[1]; // client
$pre_status = $row[2];
$pre_priority = $row[3];
$pre_project_type = $row[4];
$pre_description = $row[5];
$pre_po_url = $row[6];
$pre_cabinetry = $row[7];
$pre_progress_notes = $row[8];
$pre_qb = $row[9];
$pre_deposit = $row[10];
$pre_final = $row[11];

//***************************************
// arrays to build dropdowns or radio buttons.

$translate_boolean = array(0=>"No", 1=>"Yes");
$cabinetry_field_dropdown_options = array("?"=>"?","CC-C"=>"CC-C","CC-M"=>"CC-M","CC-K"=>"CC-K","CC-N"=>"CC-N","CC-CP"=>"CC-CP","WP"=>"WP","MC"=>"MC","SM"=>"SM");
$status_field_dropdown_options = array("1"=>"Active", "2"=>"On Order","3"=>"Bid/Estimate", "4"=> "Complete");  /* as "value"=>"option" */
$priority_field_dropdown_options = array("1"=>"Today's Tasks", "2"=>"Requires Attention", "3"=> "Requires No Attention", "4"=>"Waiting");  /* as "value"=>"option" */


//echo print_r($priority_field_dropdown_options, true);
//echo "<br>";
//echo "1: " . $priority_field_dropdown_options[1];


function translate_status($status)
{
	if ($status == 1)
		return "Active";

	if ($status == 2)
		return "On Order";

	if ($status == 3)
		return "Bid/Estimate";

	if ($status == 4)
		return "Complete";
} // end function translate_status()

function translate_priority($priority)
{

 	if ($priority == 1)
		return "<font color=red>Today's Tasks</font>";

	if ($priority == 2)
		return "<font color=orange>Requires Attention</font>";

	if ($priority == 3)	
		return "<font color=green>Requires No Attention</font>";

	if ($priority == 4)
		return "Waiting";

	return priority;
} // end function translate_priority()

function translate_boolean($yes_no)
{
	if ($yes_no == 1)
		return 'YES';

	if ($yes_no == 0)
		return 'NO';

	return $yes_no;
}// end function translate_boolean()


//echo 'Project ID: '.$row[0].'<br>';	 
echo '<h2>Client: '.$row[1].'</h2>';
//echo '[<a href=http://kedesigns-pm.eweaversolutions.com/?q=node/1&f_mode=edit&f_rid='.$project_id.'&project_id='.$project_id.' >Edit Project Details</a>]';

echo '<table>';
echo '<tr><th width=15%>Description: </th><td>'.$pre_description.'</td></tr>';

echo '<tr><th width=15%>Project Type: </th><td>'.$pre_project_type.'</td></tr>';
echo '<tr><th width=15%>Cabinetry:</th><td> '.$pre_cabinetry.'</td></tr>';
echo '<tr><th width=15%>Dropbox URL:</th><td><a target=_blank href="'.$pre_po_url.'"> '.$pre_po_url.'</a></td></tr>';
echo '<tr><th width=15%>Status:</th><td> '. translate_status($pre_status) .'</td></tr>';
echo '<tr><th>Priority:</th><td> '. translate_priority($pre_priority).'</td></tr>';

echo '</table>';
//echo 'Last Progress Note: '.$row[8].'<br>';
echo '(QB? '. translate_boolean($pre_qb).') ';
echo '~~ (Deposit? '.translate_boolean($pre_deposit).') ';
echo '~~ (Final? '.translate_boolean($pre_final).') ';
echo '<hr>';

echo '<a href=http://kedesigns-pm.eweaversolutions.com/?q=node/1><< Back to Project Dashboard</a>';
// f_sort_field=priority,status



//***********************************

	
		
	##Set layouts: "0" - tabular(horizontal) - default, "1" - columnar(vertical), "2" - customized 
	##  *** use "view"=>"0" and "edit"=>"0" only if you work on the same tables
	//$layouts = array("view"=>"0", "edit"=>"1", "details"=>"1", "filter"=>"1"); 
	//$dgrid->SetLayouts($layouts);

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
$http_get_vars = array("q","project_id");
$dgrid->SetHttpGetVars($http_get_vars);
	
## +---------------------------------------------------------------------------+
    ## | 5. Filtering Settings:  (search)                                          | 
    ## +---------------------------------------------------------------------------+
	
	$filtering_option = false;
##  *** filter layouts: "0" - tabular(horizontal) - default, "1" - columnar(vertical), "2" - advanced(inline)
//$layouts = array("view"=>"0", "edit"=>"1", "details"=>"1", "filter"=>"2"); 
$show_search_type = false;
	$dgrid->AllowFiltering($filtering_option, $show_search_type);
	
	// arrays to build dropdowns or radio buttons.

	$translate_boolean = array(0=>"No", 1=>"Yes");
	$cabinetry_field_dropdown_options = array("?"=>"?","CC-C"=>"CC-C","CC-M"=>"CC-M","CC-K"=>"CC-K","CC-N"=>"CC-N","CC-CP"=>"CC-CP","WP"=>"WP","MC"=>"MC","SM"=>"SM");
        $status_field_dropdown_options = array("1"=>"Active", "2"=>"On Order","3"=>"Bid/Estimate", "4"=> "Complete");  /* as "value"=>"option" */
        $priority_field_dropdown_options = array("1"=>"Todays Tasks", "2"=>"Requires Attention", "3"=> "Requires No Attention", "4"=>"Waiting");  /* as "value"=>"option" */


	
	//................................................	
		
	
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
    	"note_id"  =>array(	"header"=>"note_id", 
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
				
  "project_id"  =>array(     "header"=>"project_id",
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
   

  "time_stamp"  =>array(     "header"=>"Date Entered",
                                                "type"=>"label",
                                                "req_type"=>"rt",
                                                //"width"=>"15%", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>"",
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",  // NOT VISIBLE
                                                "on_js_event"=>""),


 
    	"note"  =>array("header"=>"Progress Notes", 
				  		"type"=>"label",    
						"req_type"=>"rt", 
						"width"=>"100%", 
						"title"=>"", 
						"readonly"=>"false", 
						"maxlength"=>"-1", 
						"default"=>"", 
						"unique"=>"false", 
						//"on_item_created"=>"set_row_color_for_priority",
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
    

	$em_columns = array(																																				
		"project_id"  =>array("header"=>"Project ID", 
				  		"type"=>"textbox",    
						"req_type"=>"st", 
						//"width"=>"210px", 
						"title"=>"", 
						"readonly"=>"true", 
						"maxlength"=>"-1",  
						"unique"=>"false", 
						"unique_condition"=>"", 
						"visible"=>"false",
						"default"=>$project_id, 
						"on_js_event"=>""),
					
           "time_stamp"  =>array("header"=>"Time Stamp",
                                                "type"=>"textbox",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"true",
                                                "maxlength"=>"-1",
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"false",
                                                "default"=> date("Y-m-d H:i:s"),
                                                "on_js_event"=>""),
						
	//.................................
	// virtual fields..					


   "client__nc"  =>array("header"=>"Client",
                                                "type"=>"textbox",
                                                "req_type"=>"rt", 
                                                //"width"=>"210px", 
                                                "title"=>"",
						"default"=>$pre_client, 
                                                "readonly"=>"false",
                                                "maxlength"=>"-1", 
                                                "default"=>$pre_client, 
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),
                                                                                                                                                              
        "status__nc"  =>array("header"=>"Status",
                                                "type"=>"enum",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"", 
                                                "readonly"=>"false",
                                                "maxlength"=>"-1", 
                                                "default"=>$pre_status, 
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "source"=>$status_field_dropdown_options,
                                                "on_js_event"=>""),


        "priority__nc"  =>array("header"=>"Priority",
                                                "type"=>"enum",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"", 
                                                "readonly"=>"false",
                                                "maxlength"=>"-1", 
                                                "default"=>$pre_priority, 
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "source"=>$priority_field_dropdown_options,
                                                "on_js_event"=>""),

   "project_type__nc"  =>array("header"=>"Project Type",
                                                "type"=>"textbox",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_project_type,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),

                "description__nc"  =>array("header"=>"Description/PO",
                                                "type"=>"textbox",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_description,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),



        "cabinetry__nc"  =>array("header"=>"Cabinetry",

                                                "source"=>$cabinetry_field_dropdown_options,
                                                "type"=>"enum",
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_cabinetry,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),

        "po_url__nc"  =>array("header"=>"Dropbox URL",
                                                "type"=>"textbox",
                                                "req_type"=>"st",
                                                "width"=>"100%",
                                                "title"=>"Find this link in Dropbox by selecting Share Link on the appropriate folder",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_po_url,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>""),                          


        "qb__nc"  =>array("header"=>"QB?",
                                                "type"=>"enum",
						"source"=>$translate_boolean,
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_qb,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "true_value"=>1,
                                                "false_value"=>0,
                                                "on_js_event"=>""),



        "deposit__nc"  =>array("header"=>"Deposit?",
                                                "type"=>"enum",
						"source"=>$translate_boolean,
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_deposit,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "true_value"=>1,
                                                "false_value"=>0,
                                                "on_js_event"=>""),

        "final__nc"  =>array("header"=>"Final?",
                                                "type"=>"enum",
						"source"=>$translate_boolean,
                                                "req_type"=>"st",
                                                //"width"=>"210px", 
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>$pre_final,
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "true_value"=>1,
                                                "false_value"=>0,
                                                "on_js_event"=>""),




	//..............................
	// real fields again..
	"note"  =>array("header"=>"New Progress Note",
                                                "type"=>"textbox",
                                                "req_type"=>"rt",
                                                "width"=>"100%",
                                                "title"=>"",
                                                "readonly"=>"false",
                                                "maxlength"=>"-1",
                                                "default"=>"",
                                                "unique"=>"false",
                                                "unique_condition"=>"",
                                                "visible"=>"true",
                                                "on_js_event"=>"")  






				      





	); // end $em_columns = array(

	//$auto_column_in_edit_mode =true;
	//$dgrid->SetAutoColumnsInEditMode($auto_column_in_edit_mode);

	$dgrid->SetColumnsInEditMode($em_columns);
	
      $table_name = "project_notes";
      $primary_key = "note_id";
      $condition = "";
      $dgrid->setTableEdit($table_name, $primary_key, $condition);
     // $dgrid->setAutoColumnsInEditMode(true);
    


// add new row into project_schedule table
$mode = (isset($_REQUEST[$unique_prefix.'mode'])) ? $_REQUEST[$unique_prefix.'mode'] : '';
$rid = (isset($_REQUEST[$unique_prefix.'rid'])) ? $_REQUEST[$unique_prefix.'rid'] : '';
$pid = (isset($_REQUEST[$unique_prefix.'pid'])) ? $_REQUEST[$unique_prefix.'pid'] : '';





  
    ## +---------------------------------------------------------------------------+
    ## | 8. Bind the DataGrid:                                                     | 
    ## +---------------------------------------------------------------------------+
    ##  *** set debug mode & messaging options
        $dgrid->bind();        
        //ob_end_flush();
    ################################################################################    


//echo 'rid:'. $rid . '<br>';
//echo 'pid:'. $pid . '<br>';
//echo 'dgrid:' . print_r($dgrid, true) . '<br>';

   // get the values that were just inserted.
   //$sql_select = 'SELECT * from project_notes where note_id = ' . $dgrid->rid;
   //$dSet = $dgrid->ExecuteSql($sql_select);
   //$row = $dSet->fetchRow();

//echo print_r($row,true)  . '<br>';
//echo '<br>today:' . date('m-d-Y');
//echo '<br>date:' . date('m-d-Y', strtotime($row[2]));

function safe($value){
   return mysql_real_escape_string($value);
} 


/////////////////////////////////////////////////////
// AFTER AN ADD, DO THE FOLLOWING ADDITIONAL TASKS:
if(($mode == "update") && ($rid == "-1") && $dgrid->IsOperationCompleted()){
	
   // get the values that were just inserted.
   $sql_select = 'SELECT * from project_notes where note_id = ' . $dgrid->rid;
   $dSet = $dgrid->ExecuteSql($sql_select);
   $row = $dSet->fetchRow();
  
   // put the data into temp vars so its not so confusing
   $this_project_id = $row[1];
   $this_timestamp = $row[2];
   $this_date = date('n-j-Y', strtotime($this_timestamp)); // format the timestamp into just a date
   $this_progress_note = $row[3];	

   //get the rest of the project data that may have been updated
   $this_client = isset($_POST['rtyclient__nc']) ? $_POST['rtyclient__nc'] : "";                                               	
   $this_description = isset($_POST['stydescription__nc']) ? $_POST['stydescription__nc'] : "";                                               	
   $this_project_type = isset($_POST['styproject_type__nc']) ? $_POST['styproject_type__nc'] : "";                                               	
   $this_cabinetry = isset($_POST['stycabinetry__nc']) ? $_POST['stycabinetry__nc'] : "";                                               	
   $this_po_url = isset($_POST['stypo_url__nc']) ? $_POST['stypo_url__nc'] : "";                                               	
   $this_status = isset($_POST['stystatus__nc']) ? $_POST['stystatus__nc'] : "";                                               	
   $this_priority = isset($_POST['stypriority__nc']) ? $_POST['stypriority__nc'] : "";                                               	
   $this_qb = isset($_POST['styqb__nc']) ? $_POST['styqb__nc'] : "";                                               	
   $this_deposit = isset($_POST['stydeposit__nc']) ? $_POST['stydeposit__nc'] : "";                                               	
   $this_final = isset($_POST['styfinal__nc']) ? $_POST['styfinal__nc'] : "";                                               	
   
   // build the sql...
   $sql_set  = " SET progress_notes = '<b>"	.safe($this_date).":</b> ".safe($this_progress_note)."', ";	
   $sql_set .= "client = '"			.safe($this_client)		."', ";
   $sql_set .= "description = '"		.safe($this_description)	."', ";
   $sql_set .= "project_type = '"		.safe($this_project_type)	."', ";
   $sql_set .= "cabinetry = '"			.safe($this_cabinetry)		."', ";
   $sql_set .= "po_url = '"			.safe($this_po_url)		."', ";
   $sql_set .= "status = '"			.safe($this_status)		."', ";
   $sql_set .= "priority = '"			.safe($this_priority)		."', ";
   $sql_set .= "qb = '"				.safe($this_qb)			."', ";
   $sql_set .= "deposit = '"			.safe($this_deposit)		."', ";
   $sql_set .= "final = '"			.safe($this_final)		."' "; // no comma on the last one
	
   //echo '<br>sql set: '.$sql_set . '<br>';

   $new_sql_update = 'UPDATE projects ' . $sql_set . ' WHERE project_id = ' . $this_project_id;	
   //echo 'NEW SQL:' .  $new_sql_update;
	
   // update the project record
   //$sql_update = "UPDATE projects SET progress_notes = '<b>" .$this_date. ":</b> " .$this_progress_note. "' WHERE project_id = ".$this_project_id;  
   $dSet = $dgrid->ExecuteSql($new_sql_update);
   //echo 'sql_update: '. $sql_update;	

   // refresh the page so the project details/info at the top reflects the new changed values..
   echo '<meta http-equiv="refresh" content="2;url=http://kedesigns-pm.eweaversolutions.com/?q=node/4&project_id='.$this_project_id.'">';

}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// AFTER AN UPDATE.. DO THE FOLLOWING ADDITIONAL TASKS:
if(($mode == "update") && ($rid != "-1") && $dgrid->IsOperationCompleted()){
     
   // get the values that were just updated
   $sql_select = 'SELECT * from project_notes where note_id = ' . $dgrid->rid;
   $dSet = $dgrid->ExecuteSql($sql_select);
   $updated_row = $dSet->fetchRow();
   //echo print_r($updated_row, true);


   // format the datetime
   $this_date = date('n-j-Y', strtotime($updated_row[2]));
   
// get the most recently added note.. .maybe this isnt what was just updated..
   $sql_select = 'SELECT max(note_id) from project_notes where project_id = ' . $updated_row[1];
   $dSet = $dgrid->ExecuteSql($sql_select);
   $last_row = $dSet->fetchRow();
   //echo print_r($last_row, true);

   if ($updated_row[0] == $last_row[0])
   {
      // update the project record
      $sql_update = "UPDATE projects SET progress_notes = '<b>" .$this_date. ":</b> " .$updated_row[3]. "' WHERE project_id = ".$updated_row[1];
      $dSet = $dgrid->ExecuteSql($sql_update);
      //echo 'sql_update: '. $sql_update;  

   }





}


?>
