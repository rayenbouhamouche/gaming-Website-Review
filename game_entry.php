<?php
// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createFormPage()
{ 
    $tcontent = <<<PAGE
    <form class="form-horizontal">
	<fieldset>
		<!-- Form Name -->
		<legend>Enter new Game</legend>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="gameno">Games List</label>
			<div class="col-md-4">
				<input id="gameno" name="gameno" type="text" placeholder=""
					class="form-control input-md" required=""> <span class="help-block">Enter
					the Games list</span>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="name">Game Name</label>
			<div class="col-md-4">
				<input id="fname" name="fname" type="text" placeholder=""
					class="form-control input-md" required=""> <span class="help-block">Enter
					the Game Name</span>
			</div>
		</div>

	
        
        <!-- Text input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="role">Genre</label>
			<div class="col-md-4">
				<input id="genre" name="role" type="text" placeholder=""
					class="form-control input-md" > 
                <span class="help-block">Enter the Game's genre</span>
			</div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="pos">Platforms</label>
			<div class="col-md-4">
				<select id="plat" name="plat" class="form-control">
					<option value="PS4">Playstation 4</option>
					<option value="Xbox">Xbox One</option>
					<option value="Windows">Windows</option>
					<option value="Mobile">Mobile</option>
					<option value="Nintendo">Nintendo Switch</option>
				</select>
                <span class="help-block">Select the Game's Platform</span>
			</div>
		</div>


		</div>

		<!-- Textarea -->
		<div class="form-group">
			<label class="col-md-4 control-label" for="desc">Games Description</label>
			<div class="col-md-4">
				<textarea class="form-control" id="desc" name="desc"></textarea>
                <span class="help-block">Enter a Description for the game</span>
			</div>
		</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="form-sub">Submit Form</label>
  <div class="col-md-4">
    <button id="form-sub" name="form-sub" type="submit" class="btn btn-danger">Add New Game</button>
  </div>
</div>
	</fieldset>
</form>
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------

session_start();
$tpagecontent = "";

if(appFormMethodIsPost())
{
    //Capture the Bio Data
    $tbio = appFormProcessData($_REQUEST["bio"]  ?? "");
    //Map the Form Data
        
    $tvalid = true;
    //TODO:  PUT SERVER-SIDE VALIDATION HERE
    
    if($tvalid)
    {
        
    } 
    else 
    {
        $tdest = appFormActionSelf();
        $tpagecontent = <<<ERROR
                         <div class="well">
                            <h1>Form was Invalid</h1>
                            <a class="btn btn-warning" href="{$tdest}">Try Again</a>
                         </div>
ERROR;
    }
}
else
{
    //This page will be created by default.
    $tpagecontent = createFormPage();
}
$tpagetitle = "Game Entry Page";
$tpagelead = "";
$tpagefooter = "";

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
// Set the Three Dynamic Areas (1 and 3 have defaults)
if (! empty($tpagelead))
    $tpage->setDynamic1($tpagelead);
$tpage->setDynamic2($tpagecontent);
if (! empty($tpagefooter))
    $tpage->setDynamic3($tpagefooter);
    // Return the Dynamic Page to the user.
$tpage->renderPage();

?>