<?php
// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage($pgameoverview)
{
    $tgamedetails = "";
    foreach($pgameoverview as $tp)
    {
        $tgamedetails .= renderGameOverview($tp);
    }
    $tcontent = <<<PAGE
      {$tgamedetails}
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
// Start up a PHP Session for this user.
session_start();

$tgames = [];
$tname = $_REQUEST["name"] ?? "";
$tgameno = $_REQUEST["game number"] ?? -1;
$tid = $_REQUEST["id"] ?? -1;


//Handle our Requests and Search for Players using different methods
if (is_numeric($tid) && $tid > 0) 
{
    $tgame = jsonLoadOneGameOverview($tid);
    $tgames[] = $tgame;
} 
else if (!empty($tname)) 
{
    //Filter the name
    $tname = appFormProcessData($tname);
    $tgameslist = jsonLoadAllGames();
    foreach ($tgameslist as $tp)
    {
        if (strtolower($tp->gamename) === strtolower($tname)) 
        {
            $tgames[] = $tp;
        }
    }
}
else if($tgameno > 0)
{
    $tgameslist = jsonLoadAllGames();
    foreach ($tgameslist as $tp)
    {
        if ($tp->gameno === $tgameno)
        {
            $tgames[] = $tp;
            break;
        }
    }
}

//Page Decision Logic - Have we found a player?  
//Doesn't matter the route of finding them
if (count($tgames)===0) 
{
    appGoToError();
} 
else
{
    //We've found our player
    $tpagecontent = createPage($tgames);
    $tpagetitle = "Game Overview Page";

    // ----BUILD OUR HTML PAGE----------------------------
    // Create an instance of our Page class
    $tpage = new MasterPage($tpagetitle);
    $tpage->setDynamic2($tpagecontent);
    $tpage->renderPage();
}
?>