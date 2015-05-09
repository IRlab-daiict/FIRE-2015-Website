<?php
?>
<!--**********************************************************-->
<?php
include("./start.txt");
?>
<!--**********************************************************-->
         
<link rev="made" href="mailto:clia@isical.ac.in">
<script type="text/javascript">
</script><span id="err_msg" style="color: red;"></span>


<!--**********************************************************-->
<?php
include("./head.txt");
?>
<!--**********************************************************-->
 	<h2>Test Data 2008 Download</h2>
<!--**********************************************************-->
<!--starts content of the page-->

      <div id="welcome">
       <table border=0><tr><td height=50 width=1000></td></tr><!--tr><td-->
      <form method="post" action="">               <!-- action="password_protect.php" -->

<?php


##################################################################
#  SETTINGS START
##################################################################

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', '/fire/');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 0);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

   if(isset($_GET['help'])) {
  die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt;');
}
   

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("verify", '', $timeout, '/'); // clear password;
  header('Location: ' . LOGOUT_URL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>
<!--   ***************************************************************      -->


<tr><td height=40 width=1000></td></tr><tr><td>
<table border=0><tbody>
   <tr>
    <td width=130 height=50 align=left><font size="2" style="color:gray" ><b>
    User Name:</b></font>
    </td>
    <td >
     <input name="access_login" id="access_login" size="30" style="color:#666699" type="text">
    </td>
  </tr>
  
  <tr>
    <td><font size="2" style="color:gray" ><b>
    Password:</b></font>
    </td>
    <td >
     <input type="password" name="access_password" id="access_password" size="30" style="color:#666699" type="text">
    </td>
  </tr>


   <tr>
    <td height="20"></td><td ></td></tr>
  <tr>
	<td><font size="2" style="color:gray" ><b>Select any one option: </b></font></td>
            <td>
                <select name="mydropdown" align="center">
                <option>----Select Any One ----</option>
                <option value="Bengali">Ad-hoc Bengali Data </option>
                <option value="English">Ad-hoc English Data </option>
                <option value="Hindi">Ad-hoc Hindi Data </option>
		<option value="Marathi">Ad-hoc Marathi Data </option>
                <option value="Malyalam">Ad-hoc Malyalam Data (only topics are available)</option>
                <option value="Punjabi">Ad-hoc Punjabi Data (only topics are available)</option>
                <option value="Tamil">Ad-hoc Tamil Data (only topics are available)</option>
                <option value="Telugu">Ad-hoc Telugu Data (only topics are available)</option>
                </select>   
</td>
  </tr>
        
      </tbody></table>
<hr>
<table><tbody>
	<tr><td height=20></td></tr>
	<tr><td width=250></td><td>
   	<input name="submit" title="Must select atleast one language" value="Submit" type="submit">

	<input name="reset" value="Clear" type="reset">
	</td></tr>
 </tbody></table>

</form>
    </td></tr></table>

<!--ends content of the page-->
<!--**********************************************************-->
<!--**********************************************************-->
<?php
include("./foot.txt");
?>

<!--**********************************************************-->
<?php
include("./end.txt");
?>
<!--    *******************************************************************        -->
<?php
  // stop at this point
  die();
}
}
  $$url2="/fire/test.html";
  $url1="/fire/";
  //$url3="clia-stemmer.tgz";                     /*  to be changed  */
  $url3="ABP_training_data.tgz";
  $url4="/fire/download.php";
// user provided password
$userid=$_POST['access_login'];
for($i=0;$i<strlen($_POST['access_login']);$i=$i+1)
	{
	$_POST['access_login'][$i]=chr(ord($_POST['access_login'][$i])-11);
	//print $_POST['access_login'][$i];	
	}

for($i=0;$i<strlen($_POST['access_password']);$i=$i+1)
	{
	$_POST['access_password'][$i]=chr(ord($_POST['access_password'][$i])-13);
	//print $_POST['access_password'][$i];
	}


$filename = "/user1/project/clia/.userid_password.info";
//$filename = "../.userid_password.info";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
  
while(!feof($fp))
{
$line = fgets($fp);
$temp=explode(" ",$line);
if(($temp[0]== $_POST['access_login']))
	break;
}
fclose($fp);
$temp1=explode("\n",$temp[1]);
	
	

if (isset($_POST['access_password'])) 
	{

	$login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
	$pass = $_POST['access_password'];
	
	$temp1=explode("\n",$temp[1]);
	

 	/* if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  	 || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION	[$login] != $pass ) )  */

   if(($temp[0]!= $_POST['access_login']) || ($temp1[0]!= $_POST['access_password'])) 
	{   
	//error message if user id or password is invalid.
         
	echo '<script type="text/javascript"> alert("Invalid User id or Password !!");</script>';
        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url4.'">';
         
	exit;
  	}
 else  if(($temp[0]== $_POST['access_login']) && ($temp1[0]== $_POST['access_password']))
	{
    	
	if($_POST['mydropdown']=="----Select Any One ----")
		echo '<font size=2 ><b>  Select any language !!</b></font>';
	else 
		{
		//if($_POST['mydropdown']!="Tamil")
		//	{
			echo '<font size=2 ><b>Thank you for downloading </b></font>';
			echo $_POST['mydropdown'];
		//	}
/*		 if($_POST['mydropdown']=="Hindi")
	                //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.$url3.'">';
        	        echo '<font size=2 ><b>Please contact the<br>respective language Co-ordinator.</b></font>';
	        if($_POST['mydropdown']=="Marathi")
        	        //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.$url3.'">';
                	echo '<font size=2 ><b>Please contact the<br>respective language Co-ordinator.</b></font>';
	        if($_POST['mydropdown']=="Punjabi")
        	        //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.$url3.'">';
                	echo '<font size=2 ><b>Please contact the<br>respective language Co-ordinator.</b></font>';*/
	        //if($_POST['mydropdown']=="Tamil")
        	        //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.$url3.'">';
                //	echo '<font size=2 ><b>Please contact the<br>respective language Co-ordinator.</b></font>';
	       // if($_POST['mydropdown']=="Telugu")
        	        //echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.$url3.'">';
                //	echo '<font size=2 ><b>Please contact the<br>respective language Co-ordinator.</b></font>';

		}

    	unset($_POST['access_login']);
   	unset($_POST['access_password']);
    	unset($_POST['Submit']);
    
         
       /*          lang            $_POST['mydropdown']   */   

    	echo '<tr><td height=10 width=1000></td></tr><tr><td>
	<table border=0><tbody>
	<tr>
	    <td width=130 height=50 align=left><font size="2" style="color:gray" ><b>
	    User Name:</b></font>
	    </td>
	    <td >
	     <input name="access_login" id="access_login" size="30" style="color:#666699" type="text">
	    </td>
	  </tr>
	  
	  <tr>
	    <td><font size="2" style="color:gray" ><b>
	    Password:</b></font>
	    </td>
	    <td >
	     <input type="password" name="access_password" id="access_password" size="30" 	style="color:#666699" type="text">
	    </td>
	  </tr>


	   <tr>
	    <td height="20"></td><td ></td></tr>
	  <tr>
	    <td><font size="2" style="color:gray" ><b>Select any one option: </b></font></td>
	    <td>
		<select name="mydropdown" align="center">
		<option>----Select Any One ----</option>
	        <option value="Bengali">Ad-hoc Bengali Data </option>
		<option value="English">Ad-hoc English Data </option>
		<option value="Hindi">Ad-hoc Hindi Data </option>
		<option value="Marathi">Ad-hoc Marathi Data </option>
		<option value="Malyalam">Ad-hoc Malyalam Data (only topics are available)</option>
		<option value="Punjabi">Ad-hoc Punjabi Data (only topics are available)</option>
	        <option value="Tamil">Ad-hoc Tamil Data (only topics are available)</option>
		<option value="Telugu">Ad-hoc Telugu Data (only topics are available)</option>
	        </select>
	   </td>
	  </tr>
	        
	      </tbody></table>
	<hr>
	<table><tbody>
		<tr><td height=20></td></tr>
		<tr><td width=250></td><td>
	   	<input name="submit" title="Must select atleast one language" value="Submit" 	type="submit">
	
	<input name="reset" value="Clear" type="reset">
	</td></tr>
	 </tbody></table>

	</form>
	   </td></tr></table>';
         
    if($_POST['mydropdown']!="----Select Any One Language----")
       {  
        if($_POST['mydropdown']=="Bengali")  
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_bengali_training_corpus_query.tgz">';
        if($_POST['mydropdown']=="Hindi")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_hindi_training_corpus_query.tgz">';
	if($_POST['mydropdown']=="Malyalam")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_malyalam_training_query.tgz">';
	if($_POST['mydropdown']=="English")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_english_training_corpus_query.tgz">';
	if($_POST['mydropdown']=="Marathi")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_marathi_training_corpus_query.tgz">';
	if($_POST['mydropdown']=="Punjabi")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_punjabi_training_query.tgz">';
	if($_POST['mydropdown']=="Tamil")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_tamil_training_query.tgz">';
	if($_POST['mydropdown']=="Telugu")
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url1.'Corpus_query_rel/adhoc_telugu_training_query.tgz">';
	}
	echo '</div>
    </div><div class="clear"> </div>
    <div id="spacer"> </div>
    <div id="footer">
      <div id="copyright">
        Copyright &copy; 2007 FIRE All rights reserved.
      </div>
          <div id="footerline"></div>
    </div>
        
  </div>'; 

      
 /* ************ */
  }
     echo '   </body>
</html>';
}

else 
	{

  	// check if password cookie is set
  	if (!isset($_COOKIE['verify'])) 
		{
    		showLoginPasswordProtect("");
  		}

  	// check if cookie is good
 	 $found = false;
  
   /*   foreach($LOGIN_INFORMATION as $key=>$val) 
		{   */
              $key=$line;
              $val=$line;   
   	 	$lp = (USE_USERNAME ? $key : '') .'%'.$val;
	    	if ($_COOKIE['verify'] == md5($lp)) 
			{
      			$found = true;
      			// prolong timeout
      			if (TIMEOUT_CHECK_ACTIVITY) 
				{
        			setcookie("verify", md5($lp), $timeout, '/');
      				}
      		/*	break;  */
    			}
  	/*	}   */
  	if (!$found) 
		{
    		showLoginPasswordProtect("");
  		}

	}

?>
  

