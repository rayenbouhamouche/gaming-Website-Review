<?php
require_once ("oo_bll.inc.php");
require_once ("oo_pl.inc.php");



// ----------GamesList/Game RENDERING---------------------------------------
function renderGamesTable(BLLGames $pgames)
{
    $trowdata = "";
    foreach ($pgames->gameslist as $tp) {
        $tformat = $pgames->mostLovedGame == $tp->gameno ? " class=\"success\"" : "";
        if (empty($tformat))
            $tformat = $pgames->mostHatedGame == $tp->gameno ? " class=\"danger\"" : "";
            $trowdata .= <<<ROW
  <tr{$tformat}>
   <td>{$tp->gameno}</td>
   <td>{$tp->gamename}</td>
   <td> </td>
   <td>{$tp->genre}</td>
   <td>{$tp->platforms}</td>
   <td> {$tp->ranking}</td>

   <td><a class="btn btn-info" href="gameOverview.php?id={$tp->id}">More...</a></td>
</tr>
ROW;
    }
    $ttable = <<<TABLE
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th id="sort-gano">#</th>
			<th id="sort-name">Name</th>
            <td> </td>
			<th id="sort-genre">Genre</th>
            <th id="sort-platforms">Platforms</th>
            <th id="sort-ranking">Ranking</th>
			<th> </th>
		</tr>
	</thead>
	<tbody>
	{$trowdata}
	</tbody>
</table>
TABLE;
	return $ttable;
}



function renderGameOverview(BLLGameOverview $pp)
{
    $timgref = "img/gamepic/{$pp->gameno}.jpg";
    $timg = file_exists($timgref)? $timgref : img/gamepic/blank.png;
    $toverview = <<<OV
    <article class="row marketing">
        <h2>Game Details</h2>
        <div class="media-left">
            <img src="$timg" width="256" />
        </div>
        <div class="media-body">
            <div class="well">
                <h1> <strong> {$pp->gameno} {$pp->gamename} </strong></h1>
            </div>
            <h3>Genre: {$pp->genre}</h3>
            <h3>Platform: {$pp->platforms}</h3>
            <h3>First Release: {$pp->release}</h3>
            <h3>Price: {$pp->price}</h3>
            <h3>Ranking: {$pp->ranking}</h3>
        </div>
 
    </article>
OV;
    return $toverview;
}

// ----------EXECUTIVE RENDERING------------------------------------------
function renderExecutiveTable(array $pmanlist)
{
    $trowdata = "";
    foreach ($pmanlist as $tman) {
        $tlink = "<a class=\"btn btn-info\" href=\"staff.php?type=exec&id={$tman->id}\">More...</a>";
        $trowdata .= <<<ROW
            <tr>
    		    <td>{$tman->name}</td>
    		    <td>{$tman->role}</td>
    		    <td>{$tlink}</td>
			</tr>
ROW;
    }
    $ttable = <<<TABLE
<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Role</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
					{$trowdata}
					</tbody>
</table>
TABLE;
    return $ttable;
}


// ----------FIXTURE RENDERING--------------------------------------------

function renderConsoleSummary(BLLConsole $ps)
{
    $tshtml = <<<OVERVIEW
    <div class="well">
            <ul class="list-group">
                <li class="list-group-item">
                    Console Name: <strong>{$ps->name}</strong>
                </li>
                <li class="list-group-item">
                    Descriptiom: <strong>{$ps->description}</strong>
                </li>
                <li class="list-group-item">
                    Capacity: <strong>{$ps->capacity}</strong>
                </li>
                <li class="list-group-item">
                    <img src={$ps->imgsrc} height=200, width=200>
                </li>
                <li class="list-group-item">
                    Release: <strong>{$ps->release}</strong>
                </li>
                <li class="list-group-item">
                    Memory: <strong>{$ps->memory}</strong>
                </li>
                <li class="list-group-item">
                    Price: <strong>{$ps->price}</strong>
                </li>
            </ul>
    </div>
OVERVIEW;
    return $tshtml;
}



//=============RENDER PRESENTATION LOGIC OBJECTS==================================================================
function renderUICarousel(array $pimgs, $pimgdir,$pid = "mycarousel")
{
    $tci = "";
    $count = 0;
    
    // -------Build the Images---------------------------------------------------------
    foreach ($pimgs as $titem) {
        $tactive = $count === 0 ? " active" : "";
        $thtml = <<<ITEM
        <div class="item{$tactive}">
            <img class="img-responsive" src="{$pimgdir}/{$titem->img_href}">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{$titem->title}</h1>
                    <p class="lead">{$titem->lead}</p>
		        </div>
			</div>
	    </div>
ITEM;
        $tci .= $thtml;
        $count ++;
    }
    
    // --Build Navigation-------------------------
    $tdot = "";
    $tdotset = "";
    $tarrows = "";
    
    if ($count > 1) {
        for ($i = 0; $i < count($pimgs); $i ++) {
            if ($i === 0)
                $tdot .= "<li data-target=\"#{$pid}\" data-slide-to=\"$i\" class=\"active\"></li>";
            else
                $tdot .= "<li data-target=\"#{$pid}\" data-slide-to=\"$i\"></li>";
        }
        $tdotset = <<<INDICATOR
        <ol class="carousel-indicators">
        {$tdot}
        </ol>
INDICATOR;
    }
    if ($count > 1) {
        $tarrows = <<<ARROWS
		<a class="left carousel-control" href="#{$pid}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#{$pid}" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
ARROWS;
    }
    
    $tcarousel = <<<CAROUSEL
    <div class="carousel slide" id="{$pid}">
            {$tdotset}
			<div class="carousel-inner">
				{$tci}
			</div>
		    {$tarrows}
    </div>
CAROUSEL;
    return $tcarousel;
}



function renderUIQuote(PLQuote $pquote)
{
    $tquote = <<<QUOTE
    <blockquote>
    {$pquote->quote}
    <small>{$pquote->person} in <cite title="{$pquote->source}">{$pquote->pub}</cite></small>
	</blockquote>
QUOTE;
    return $tquote;
}



function renderUIKeyGamesList(array $pkeyGames)
{
    $tkeylist = "";
    foreach ($pkeyGames as $tkey) {
        $tli = <<<LI
        <section class="list-group-item">
            <h4 class="list-group-item-heading">
                <a href="player.php?name={$tkey->key_href}">{$tkey->name}</a>
            </h4>
            <p class="list-group-item-text">{$tkey->desc}</p>
        </section>            
LI;
        $tkeylist .= $tli;
    }
    
    $tpanel = <<<PANEL
    <div class="panel panel-default">
        <div class="panel-heading">Recent Updates for Games</div>
        <div class="panel-body">
        <div class="list-group">
        {$tkeylist}   
        </div>        
PANEL;
    return $tpanel;
}



function renderPagination($ppage,$pno,$pcurr)
{
    if($pno <= 1)
        return "";
        
        $titems = "";
        $tld= $pcurr == 1 ? " class=\"disabled\"" : "";
        $trd = $pcurr == $pno ? " class=\"disabled\"" : "";
        
        $tprev = $pcurr - 1;
        $tnext = $pcurr + 1;
        
        $titems .= "<li$tld><a href=\"{$ppage}?page={$tprev}\">&laquo;</a></li>";
        for($i = 1; $i <=$pno; $i++)
        {
            $ta = $pcurr == $i? " class=\"active\"" : "";
            $titems .= "<li$ta><a href=\"{$ppage}?page={$i}\">{$i}</a></li>";
        }
        $titems .= "<li$trd><a href=\"${ppage}?page={$tnext}\">&raquo;</a></li>";
        
        $tmarkup = <<<NAV
    <ul class="pagination pagination-sm">
        {$titems}
    </ul>
NAV;
        return $tmarkup;
}



?>