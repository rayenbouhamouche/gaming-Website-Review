<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage($pimgdir,$pcurrpage,$psortmode,$psortorder)
{  
    //Get the Presentation Layer content
    $tkeylist = xmlLoadAll("data/xml/key-any.xml","PLUpdateGameItem","UpdateGame");
    $tci = xmlLoadAll("data/xml/carousel-games.xml","PLCarouselImage","Image");
   
    $tgames = new BLLGames();
    $tgames->mostLovedGame = 1;
    $tgames->mostHatedGame = 7;
    $tgames->gameslist = jsonLoadAllGames();
    
    //We need to sort the squad using our custom class-based sort function
    $tsortfunc = "";
    if($psortmode == "gameno")
        $tsortfunc = "gamessortbyno";
    else if($psortmode == "name")
        $tsortfunc = "gamessortbyname";

    //Only sort the array if we have a valid function name
    if(!empty($tsortfunc))
        usort($tgames->gameslist,$tsortfunc);

    
    //The pagination working out how many elements we need and
    $tnoitems  = sizeof($tgames->gameslist);
    $tperpage  = 5;
    $tnopages  = ceil($tnoitems/$tperpage);
    
    //Create a Pagniated Array based on the number of items and what page we want.
    $tfilterGames = appPaginateArray($tgames->gameslist,$pcurrpage,$tperpage);
    $tgames->gameslist = $tfilterGames;
    
    //Render the HTML for our Table and our Pagination Controls
    $tgamestable = renderGamesTable($tgames);
    $tpagination = renderPagination($_SERVER['PHP_SELF'],$tnopages,$pcurrpage);
    
    //Use the Presentation Layer to build the UI Elements
    $tcarousel   = renderUICarousel($tci,"{$pimgdir}/carousel");
    $tkeygames = renderUIKeyGamesList($tkeylist);
        
$tcontent = <<<PAGE
        {$tcarousel}
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Squad</li>
		</ul>
		
		<div class="row">
			<div class="panel panel-primary">
			<div class="panel-body">
				<h2>Games Available</h2>
				<p>{$tgames->gamename}</p>
				<div id="games-table">
			    {$tgamestable}
                {$tpagination}
		        </div>
		    </div>
			</div>
		</div>
		<div class="row">
            {$tkeygames}
		</div>
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();
$tcurrpage = $_REQUEST["page"] ?? 1;
$tcurrpage = is_numeric($tcurrpage) ? $tcurrpage: 1;
$tsortmode = $_REQUEST["sortmode"] ?? "";
$tsortorder = $_REQUEST["sortorder"] ?? "asc";

$tpagetitle = "Games Information";
$tpage = new MasterPage($tpagetitle);
$timgdir = $tpage->getPage()->getDirImages();

//Build up our Dynamic Content Items. 
$tpagelead  = "";
$tpagecontent = createPage($timgdir,$tcurrpage,$tsortmode,$tsortorder);
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user. 
$tpage->renderPage();
?>