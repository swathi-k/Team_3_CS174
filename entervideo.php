<?php
/* File   : sign.php
   Subject: Bonus Homework
   Authors: Swathi Kotturu
   Version: 1.0.2
   Date   : Nov 9, 2014
   Description: A web form that collects users' data to write into the guestbook database table
*/
include("dbconnect.php"); ?>

<h2>Enter a video into the Database!!</h2>

 <form method=post action="verify_input.php">

   Video Title: <input type="text" size="25" min="1" maxlength="50" name="vtitle">
   <br><br>

   Video Link: <input type="text" size="25" name="vlink">
   <br><br>

   Video Length: <input type="text" size="6" maxlength="6" name="vlength"> mins
   <br><br>

   Highest Resolution: 
   <select name="hresolution">
   <option value="144" selected>144p</option>
   <option value="240">240p</option>
   <option value="360">360p</option>
   <option value="480">480p</option>
   <option value="720">720p</option>
   <option value="1080">1080p</option>
   </select>
   (select one)
   <br><br>
   
   Video Description: <textarea rows="4" cols="25" maxlength="1000" name="vdescr"> </textarea>
   <br><br>
   
   Language: 
   <select name="language">
   <option value="English" selected>English</option>
   <option value="Non-English">Non-English</option>
   </select>
   <br><br>
   
   View Count: <input type="text" size="8" maxlength="8" name="vcount">
   <br><br>
   
   Video type: 
   <input type='checkbox' name='vtypes[]' value='Tutorial'>Tutorial
   <input type='checkbox' name='vtypes[]' value='Entertainment'>Entertainment
   <input type='checkbox' name='vtypes[]' value='Application'>Application
   <input type='checkbox' name='vtypes[]' value='Weapon'>Weapon
   <input type='checkbox' name='vtypes[]' value='Group demo'>Group demo
   <input type='checkbox' name='vtypes[]' value='Others'>Others
   <br><br>
   
   Video icon image link:
   <input type="text" name="iconimg">
   <br><br>
   
   Tags (keywords about the site separated by commas):
   <input type="text" name="vtags">
   <br><br>
   
   <input type="submit" name="submit" value="Enter"> 
   <br><br>

</form>
<input type='button' value='Go back'
                      onclick='self.history.back()' />