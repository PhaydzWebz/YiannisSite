<?php
require ("templates/header.htm");   
// Set the default name 
$action = 'index'; 
// Specify some disallowed paths 
$disallowed_paths = array('header', 'footer'); 
if (!empty($_GET['action'])) { 
    $tmp_action = basename($_GET['action']); 
}

try 
{
    //check for both htm and phtml file extensions
    if (file_exists("templates/{$tmp_action}.htm"))
    {
        $ftyp = "htm";
    }
    if (file_exists("templates/($tmp_action).phtml"))
    {
        $ftyp = "phtml";
    }
    // If it's not a disallowed path, and if the file exists, update $action    
    if (!in_array($tmp_action, $disallowed_paths))
    {
        $action = $tmp_action;
        require ("templates/$action.$ftyp");
    }
} catch (Exception $exc) 
{
    echo $exc->getTraceAsString();
}
// Include $action 
require("templates/$action.htm"); 
require("templates/footer.htm");
?>