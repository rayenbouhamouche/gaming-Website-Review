<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------

function createPage()
{
    //Get the Data we need for this page
    $tquotes    = xmlLoadAll("data/xml/quotes-any.xml","PLQuote","Quote");
    $tconsole   = jsonLoadOneConsole(1);
    
    //Build the UI Components
    $tconsolehtml   = renderConsoleSummary($tconsole);
   

    //Build UI Components with External HTML Loading
    $tquotehtml = "";
    
        $tq= $tquotes[1];
        $tq->quote= file_get_contents("data/html/{$tq->quote_href}");
        $tquotehtml .= renderUIQuote($tq);
    
    
    //Construct the Page
$tcontent = <<<PAGE
<section class="row details" id="Console-Summary">
    {$tquotehtml}
    </section>
    <div class="panel">
      <div class="panel-heading">
         <h3 class="panel-title">Console Information</h3>
      </div>
      <div class="panel-body">
        {$tconsolehtml}
       </div>
    </div>
</section>
     
PAGE;

return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Console Information";
$tpagelead  = "";
$tpagecontent = createPage();
$tpagefooter = "";

//----BUILD OUR HTML PAGE----------------------------
//Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
//Set the Three Dynamic Areas (1 and 3 have defaults)
if(!empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if(!empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
//Return the Dynamic Page to the user.    
$tpage->renderPage();
?>