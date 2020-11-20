<?php 

require_once("api/api.inc.php");

function jsonCreateGameFormat($pfile)
{
    $tnewgame = new BLLGameOverview();
    $tnewgame->id = 1;
    $tnewgame->gameno = "";
    $tnewgame->gamename = "";
    $tnewgame->genre = "";
    $tnewgame->platforms = "";
    $tnewgame->release = 1;
    $tnewgame->price = "";
    $tnewgame->ranking = "";
    $tnewgame->role = "";
    $tdata = json_encode($tnewgame).PHP_EOL;
    file_put_contents($pfile,$tdata);
	return $tdata;
}

function jsonCreateConsoleFormat($pfile)
{
    $tconsole = new BLLConsole();
    $tconsole->id = 1;
    $tconsole->name = "";
    $tconsole->description = "";
    $tconsole->capacity = "";
    $tconsole->imgsrc = "def";
    $tconsole->release = "";
    $tconsole->memory = "";
    $tconsole->price  = "";
    $tdata = json_encode($tconsole).PHP_EOL;
    file_put_contents($pfile,$tdata);
	return $tdata;
}



function jsonCreateGamesFormat($pfile)
{
    $tgames = new BLLGames();
    $tgames->id = 1;
    $tgames->gameslist = "";
    $tgames->mostHatedGame = "";
    $tgames->mostHatedGame = "";
    $tgames->gameno = "";
    $tgames->gamename = "";
    $tgames->genre = "";
    $tgames->platforms = "";
    $tgames->role = "";
    $tgames->ranking = "";
    $tdata = json_encode($tgames).PHP_EOL;
    file_put_contents($pfile,$tdata);
	return $tdata;
}



//---------Create JSON Files---------------------------------------------
//UNCOMMENT TO CREATE A NEW FILE
//jsonCreateGameFormat("data/json/game1.json");
//jsonCreateConsoleFormat("data/json/console1.json");
//jsonCreateGamesFormat("data/json/games1.json");

?>