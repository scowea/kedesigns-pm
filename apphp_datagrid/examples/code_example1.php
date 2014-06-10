<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>PHP DataGrid :: Sample #1 (code)</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name='keywords' content='datagridview, adminpanel, gridview, datalist, datagrid paging, programming, php, free script, free download, trial soft, datagrid, script, freeware, software, download, MySQL, database, web '/>
    <meta name='description' content='Advanced Power of PHP - best solutions for web developers' />
    <meta content='ApPHP' name='author'></meta>
    <link href="../css/datagrid_style_x-blue.css" type="text/css" rel="stylesheet" />
  </head>

<body>


<table width="70%" align="center">
<tr>
<td align="left"  height="100px"><pre>
    <h3>
    Sample 1. Simplest PHP DG code </h3><h4>
        1. All modes (Add/Edit/Details/Delete/View).
        2. Auto-Genereted colimns.</h4>    
    
    
</pre>    
</td>
</tr>
</table>


<?    
    ################################################################################   
    ## +---------------------------------------------------------------------------+
    ## | 1. Creating & Calling:                                                    | 
    ## +---------------------------------------------------------------------------+
    ##  *** only relative (virtual) path (to the current document)
      define ("DATAGRID_DIR", "datagrid/");
      define ("PEAR_DIR", "datagrid/pear/");
      
      require_once(DATAGRID_DIR.'datagrid.class.php');
      require_once(PEAR_DIR.'PEAR.php');
      require_once(PEAR_DIR.'DB.php');
    
    ##  *** creating variables that we need for database connection 
      $DB_USER='username';            
      $DB_PASS='password';           
      $DB_HOST='localhost';       
      $DB_NAME='database_name';    
    
    ob_start();
      $db_conn = DB::factory('mysql'); 
      $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
    
    ##  *** put a primary key on the first place 
      $sql=" SELECT "  
       ." demo_countries.id, "
       ." demo_countries.name, "
       ." demo_countries.description, "
       ." demo_countries.picture_url, "
       ." FORMAT(demo_countries.population, 0) as population, "   
       ." CASE WHEN demo_countries.is_democracy = 1 THEN 'Yes' ELSE 'No' END as is_democracy "
       ."FROM demo_countries ";
       
    ##  *** set needed options
      $debug_mode = false;
      $messaging = true;
      $unique_prefix = "f_";  
      $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
    ##  *** set data source with needed options
      $default_order_field = "name";
      $default_order_type = "ASC";
      $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
    
    ## +---------------------------------------------------------------------------+
    ## | 6. View Mode Settings:                                                    | 
    ## +---------------------------------------------------------------------------+
    ##  *** set columns in view mode
       $dgrid->setAutoColumnsInViewMode(true);  
    
    ## +---------------------------------------------------------------------------+
    ## | 7. Add/Edit/Details Mode settings:                                        | 
    ## +---------------------------------------------------------------------------+
    ##  ***  set settings for edit/details mode
      $table_name = "demo_countries";
      $primary_key = "id";
      $condition = "";
      $dgrid->setTableEdit($table_name, $primary_key, $condition);
      $dgrid->setAutoColumnsInEditMode(true);
      
    ## +---------------------------------------------------------------------------+
    ## | 8. Bind the DataGrid:                                                     | 
    ## +---------------------------------------------------------------------------+
    ##  *** set debug mode & messaging options
        $dgrid->bind();        
        ob_end_flush();
    ################################################################################    
?>

</body>
</html>