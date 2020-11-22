<?php
//Include the Other Layers Class Definitions
require_once("oo_bll.inc.php");
require_once("oo_pl.inc.php");

//---------JSON HELPER FUNCTIONS-------------------------------------------------------

function jsonOne($pfile,$pid)
{
    $tsplfile = new SplFileObject($pfile);
    $tsplfile->seek($pid-1);
    $tdata = json_decode($tsplfile->current());
    return $tdata;
}

function jsonAll($pfile)
{
    $tentries = file($pfile);
    $tarray = [];
    foreach($tentries as $tentry)
    {
        $tarray[] = json_decode($tentry);
    }
    return $tarray;
}

function jsonNextID($pfile)
{
    $tsplfile = new SplFileObject($pfile);
    $tsplfile->seek(PHP_INT_MAX);
    return $tsplfile->key() + 1;
}

//---------ID GENERATION FUNCTIONS-------------------------------------------------------

function jsonNextGameID()
{
    return jsonNextID("data/json/games.json");
}

//---------JSON-DRIVEN OBJECT CREATION FUNCTIONS-----------------------------------------


function jsonLoadOneGameOverview($pid) : BLLGameOverview
{
    $tgame = new BLLGameOverview();
    $tgame->fromArray(jsonOne("data/json/games.json",$pid));
    return $tgame;
}



function jsonLoadOneConsole($pid) : BLLConsole
{
    $tconsole = new BLLConsole();
    $tconsole->fromArray(jsonOne("data/json/console.json",$pid));
    return $tconsole;
}


//--------------MANY OBJECT IMPLEMENTATION--------------------------------------------------------



function jsonLoadAllGames() : array
{
    $tarray = jsonAll("data/json/games.json");
    return array_map(function($a){ $tc = new BLLGames(); $tc->fromArray($a); return $tc; },$tarray);
}


function jsonLoadAllConsole() : array
{
    $tarray = jsonAll("data/json/console.json");
    return array_map(function($a){ $tc = new BLLConsole(); $tc->fromArray($a); return $tc; },$tarray);
}

//---------XML HELPER FUNCTIONS--------------------------------------------------------

function xmlLoadAll($pxmlfile,$pclassname,$pelement)
{
    $txmldata = simplexml_load_file($pxmlfile,$pclassname);
    $tarray = [];
    foreach($txmldata->{$pelement} as $telement)
    {
        $tarray[] = $telement;
    }
    return $tarray;
}

function xmlLoadOne($pxmlfile,$pclassname)
{
    $txmldata = simplexml_load_file($pxmlfile,$pclassname);
    return $txmldata;
}

?>