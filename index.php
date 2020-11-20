<?php 
//----INCLUDE APIS------------------------------------
include("api/api.inc.php");

//----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    //Page-Specific Static Content
    $twelcome = file_get_contents("data/static/index_welcome.part.html");
    
$tcontent = <<<PAGE
        <div class="row">
            {$twelcome}
		</div>
        <div class="row">
           <h2><strong><italic>News Gaming Informer</italic></strong> </h2>
        </div>
       
       <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/assassin.jpg" width="300" />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading"><strong>Assassin's Creed Valhalla New Trailer 
                 Shows Assassin's Creed Valhalla In Action</strong></h4>
				
                 <p class="list-group-item-text">During today's Inside Xbox presentation, Ubisoft's newly announced 
		Viking game got a trailer focused on in-game footage (compared to the previous pre-rendered trailer).
		 You can see the impressive footage above, showcasing many of Valhalla's key elements, including
		  combat, raiding, longships, and more. </p>
		<p class="list-group-item-text">Though each Assassin's Creed title is traditionally approachable regardless of your history with
		 the series, fans may notice a couple details from the trailer stand out. First of all,
		  the hero Eivor has a raven instead of the traditional eagle. Second, as in the previous trailer,
		   we again see Eivor with a hidden blade (an iconic weapon you could not wield in Odyssey), 
		implying that the Assassins as an organization are likely to be more prominent in this entry. </p>
		<p class="list-group-item-text">To dive even deeper into Ubisoft Montreal's approach to Assassin's Creed Valhalla, 
		read our interview with creative director Ashraf Ismail.
		 You can also get a broader idea of what to expect by checking out
		  25 things we've learned about the game so far.</p>
             <p> by JOE JUBA on May 07, 2020 at 10:45 AM</p>
				
				</div>
			</section>
         
          <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/tokyoshow.jpg" width="300" />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading"><strong>Tokyo Game Show 2020 Canceled </strong></h4>
                <p class="list-group-item-text">Tokyo Game Show organizers, the Computer Entertainment Supplier's 
                  Association (CESA) in Japan have announced that there will be no physical event this year in 
                  Japan due to concerns regarding the coronavirus.</p>
                <p class="list-group-item-text"> Instead, an online event is planned for an unspecified date, 
                about which more details are coming in late May.</p>
                <p class="list-group-item-text">Games for both the PlayStation 5 and Xbox Series X were expected
                 to be showcased, and they likely still will be despite the format change.</p>
         </section>

           <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/clarity.jpg" width="300" height="300" />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading"><strong>We Need More Clarity From Sony And Microsoft's Next-Gen Plans</strong></h4>
                <p class="list-group-item-text">I don’t think we can blame the pandemic for Sony and Microsoft’s strange approach to the 
                     next-generation of gaming. The missteps began as soon as we learned new hardware was on the way. The confusion surrounding 
                     PlayStation 5 and Xbox Series X has only become more pronounced as we near their supposed launches.</p>
                <p class="list-group-item-text">If both consoles release this holiday season, you’d think we’d know why we should be excited.
                     At the very least, you’d think we’d know what a PlayStation 5 is. Microsoft has at least shown us the Xbox Series X is a real,
                     physical thing, and yesterday we saw some games running on it. Sony, on the other hand, has adopted a college lecture approach 
                     to teaching the masses about SSD performance and shoulder-button tension.</p>

                <p class="list-group-item-text"> When discussing PlayStation 5 and the oddly named Xbox Series X, both Sony and Microsoft have moved 
                    away from the huge showcases that provide full pictures of what to expect from the hardware, its performance, and the games you’ll
                    play on it on launch day and beyond, and are now feeding us a steady stream of crumbs. Here’s how load times are faster. 
                    Nibble nibble. Here’s what ray tracing looks like. Nibble nibble. Here’s something cryptic about enhanced rumble. Nibble nibble. 
                    Here's more 4k! Nibble nibble. Here’s an hour-long lecture about SSD.</p>
                <p class="list-group-item-text">I thought Microsoft’s showcase of third-party games would give us an idea of why we should be 
                   interested in Xbox Series X. While I walked away wanting to play most of the games that were shown during the stream 
                   (a credit to the vision of the devs), I didn’t learn why I should play them on Xbox Series X. 
                   The messaging tied to a lot of these new titles is something along the lines of, “You can play it on both Xbox One and Xbox Series X.”
                   Why should I buy new hardware if I can play it on the system I already own? Why is it better on Xbox Series X? 
                  What makes it different? We just keep hearing blanket statements that they will be enhanced on Xbox Series X. 
                  I spend enough time gaming that I definitely want to play in the best way possible, but I just don't have any demonstrative reasons 
                  as to why these new consoles will, in fact, be the best places to play. How big of a load time reduction are we looking at? 
                  How often will the resolution or framerate be better? Is ray tracing really a game changer?</p>
                <p class="list-group-item-text">And is Xbox Series X all I have to look forward to? Microsoft says the true name of its next-generation
                efforts is just “Xbox,” implying there will be other console options, perhaps like Xbox Series S.</p>

                <p class="list-group-item-text">Is there a game of chicken being played between Microsoft and Sony? 
                Outside of the price point and release date, I doubt it, but if you look back to the unveilings of Xbox One and PlayStation 4,
                Microsoft dropped the ball with its messaging and Sony mopped the floor with them. Xbox One had to always be online,
                couldn’t play used games, came packaged with Kinect, and was $100 more than PlayStation 4. From day one, Sony ran away with the 
                generation.</p>
         </section>

         <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/ps5controller.jpg" width="300" height="300" />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading"><strong>A First Look At The PlayStation 5 DualSense Controller</strong></h4>
                <p class="list-group-item-text">Sony has introduced its PlayStation 5 DualSense wireless controller. It's an evolution on the classic 
                PlayStation controller form we've seen over previous generations, with some new features.</p>
                <p class="list-group-item-text">The controller is slightly lighter, and Hideaki Nishino, Sony senior vice president, platform planning and management,
                 says the company wanted to "maintain a strong battery life" for the rechargeable controller.</p>

                <p class="list-group-item-text">"Based on our discussions with developers," Nishino said, "we concluded that the sense of touch within gameplay, 
                much like audio, hasn’t been a big focus for many games." Accordingly, the controller uses haptic feedback and has trigger tension. Overall,
                the angle of the hand triggers and the grip of the controller is different from previous ones. Nishino says the company tested the controller's 
                ergonomics with players of varying hand sizes, and wanted it to "feel smaller than it really looks."</p>

                <p class="list-group-item-text">In other changes, the Share button has been replaced by the Create button. The Share functionality is still there, but is being added on to,
                   with more in-depth details regarding the Create button coming later.</p>
                <p class="list-group-item-text">Like the PlayStation 5 itself, audio is also a point of emphasis with the DualSense controller. It features a built-in mic for game chat, 
                 although chat via a headset is still possible.</p>

                <p class="list-group-item-text">Nishino says this final form of the DualSense is currently being shipped out to developers, so perhaps we'll start hearing about how they 
                 are going to implement its features soon.</p>
                <p class="list-group-item-text">The PlayStation 5 releases this holiday season.</p>
         </section>

          <section class="list-group-item clearfix">
		        <div class="media-left media-top">
                    <img src="img/news/rainbowsix.jpg" width="300"  />
                </div>
                <div class="media-body">
				<h4 class="list-group-item-heading"><strong>Rainbow Six Siege: The Grand Larceny Event – New Gameplay Today</strong></h4>
                <p class="list-group-item-text">Ubisoft has released a new timed event for Rainbow Six Siege, called The Grand Larceny. 
                The goal? Crack three safes, if you're playing offense. On defense, you want to ... prevent the other
                 guys from cracking three safes. It's not complicated, OK?</p>

                <p class="list-group-item-text">Leo played a few rounds for today's episode, showing off the return of an old favorite location.
                 Unfortunately for the old Hereford map, time hasn't been kind to its structure.
                 How so? Well, in this mode, you can blow through the dang floor!
                  It's a great way to bring safes down a level, create new pathways, or to just blow off a little steam. Leo does it a bunch,
                  so take a look!</p>

                <p class="list-group-item-text">Also, just so you know, some guy in his match has a name that some people might find offensive.
                  We've blurred it out as best we could, but it's still legible in a few spots. Multiplayer games are fun!</p>
         </section>
                     
                                                                 
PAGE;
return $tcontent;
}

//----BUSINESS LOGIC---------------------------------
//Start up a PHP Session for this user.
session_start();

//Build up our Dynamic Content Items. 
$tpagetitle = "Home Page";
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