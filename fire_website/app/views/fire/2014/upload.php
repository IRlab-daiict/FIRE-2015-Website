<?php
?>


<?php include 'head.html'; ?>
<div class="right">
<h2>Ad-Hoc Mono/Bi Lingual Run Submission</h2>


      <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

      
<!-- <form method="post" action="">               <!-- action="password_protect.php" -->

<!--------------------------------------------------------------------------------------->
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
    <td width=100 height=50 align=left><font size="2" style="color:gray" ><b>
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
</tbody></table>
<table><tbody>
<tr>
<td width=100 height=50 align=left><font size="2" style="color:gray" ><b>
File: </b></font>
</td>
    <td><font size="2" style="color:gray" ><b>

	<input type="hidden" name="MAX_FILE_SIZE" value="70480000">
	<input name="userfile" type="file" /><br />
</td>
  </tr>
        
</tbody></table>
<hr>
<table><tbody>
	<tr><td height=20><a href="/fire/upload_help.html"><font color="red"><b><blink>Help for Submission</blink></b></font></a></td><td></td></tr>
	<tr><td width=280></td><td></td><td>
	<input type="submit" value="Upload" />
	</td></tr>
</tbody></table>

<br/><br/>
To get user id and password please email following information to <b>fire@isical.ac.in.<br/><br/>

Full Name :<br/><br/>

Email Address:<br/><br/>

Institutional Affiliation:</b>

</form>
</td></tr></table>
<?php
/*if (@is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
echo $_FILES["userfile"]["tmp_name"];
echo $_FILES["userfile"]["name"];
if(copy($_FILES["userfile"]["tmp_name"], $_FILES["userfile"]["name"]))         //  move_uploaded_file
  echo "<p>File uploaded successfully.</p>";
else
  echo "<p>not uploaded</p>";*/
?> 
</div>
<?php include 'foot.html'; ?>
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
  $url4="/fire/upload.php";
// user provided password
/*
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
*/
$filename = "../.upload_uid_pass.info";
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
        echo $_POST['access_login']." =xx= ".$_POST['access_password']." =aaa= ".$temp[0]." =bbb= ".$temp[1]; 
	echo '<script type="text/javascript"> alert("Invalid User id or Password !!");</script>';
        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url4.'">';
         
	exit;
  	}
 else  if(($temp[0]== $_POST['access_login']) && ($temp1[0]== $_POST['access_password']))
	{
    	
							////////////////////////////// upload function
		
	     if (@is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
//		echo $_FILES["userfile"]["tmp_name"];
//		echo $_FILES["userfile"]["name"];
			
	       if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $_FILES["userfile"]["name"]))         //copy  move_uploaded_file
		{
		if($_FILES["userfile"]["type"]=="application/x-gzip")
                {
			$i=0;
			while($i!=1)
			{
        	        system("/bin/gunzip ".$_FILES["userfile"]["name"],$retval);
                	if($retval != "FALSE")
				{
				$x= str_replace(".gz","",$_FILES["userfile"]["name"]);
				$i=2;
				}
			if($i==2)
				{
				system("/bin/mv ".$x."  ".$_POST['access_login']."_".$x,$retval);
				if($retval != "FALSE")
				$i=1;
				}
			}
			
		system("/bin/sed -e 's/test.res/".$_POST['access_login']."_".$x."/g' ./.cheak_upload.sh | /bin/sed -e 's/result.txt/result_".$_POST['access_login']."_".$x.".txt/g' | /bin/sed -e 's/xxx.txt/".$_FILES["userfile"]["name"]."/g'  > cheak_".$_POST['access_login']."_".$x.".sh",$retval);
		if($retval != "FALSE")system("/bin/chmod +x cheak_".$_POST['access_login']."_".$x.".sh",$retval1);
		if($retval1 != "FALSE")system("/bin/sh cheak_".$_POST['access_login']."_".$x.".sh ".$_POST['access_login']." ".$x."  > result_".$_POST['access_login']."_".$x.".txt",$retval2);
		if($retval2 != "FALSE")system("/bin/rm -f cheak_".$_POST['access_login']."_".$x.".sh",$retval3);
		///////////////////////////////////////////////////////////////
		$line = " ";
		$filename = "result_".$_POST['access_login']."_".$x.".txt";
		$fp = fopen($filename, "r") or die("Could not open file  "); //  .$filename);	
		$line_no =0;
		while(!feof($fp))
		{
		$line = $line.fgets($fp);
		$line_no++;
		}
		fclose($fp);
		
		////////////////////////////////////////////////////////////
	        echo $line;
		$line1= str_replace("\n","",$line);
		$suss="file uploaded successfully."; 
		$i=0;
//		echo "i=".$i."line".$line[$i+1]."suss".$suss[$i];
		while(($i < 25) && (ord($line[$i+1])==ord($suss[$i]))){$i=$i+1;
		//echo " i=".$i." line=".$line[$i+1]." suss=".$suss[$i];}
		}

		if($i == 25)$line_no=3;
		if($line1=="file uploaded successfully." || $line_no > 2)
			{
			$emailadd = 'clia@isical.ac.in';
			//$emailadd = 'bandyopadhyay.ayan@gmail.com';
			$subject = 'FIRE 2012: Run submitted successfully';
			mail($_POST['access_login'], $subject, $line, 'From: '.$emailadd.'');	
			///////////////////////////////////////////////////////////////////////////////
			$date_time_array = getdate(time());
			$fp1 = fopen("upload.info", "a") or die("Could not open file  ");
			fwrite($fp1, "Time:".$date_time_array["hours"].":".$date_time_array["minutes"].":".$date_time_array["seconds"]."Hours.\n");
			fwrite($fp1, "Date:".$date_time_array["mday"]."/".$date_time_array["mon"]."/".$date_time_array["year"]."\n\n");
			fwrite($fp1, "Uploaded :".$_FILES["userfile"]["name"]."\nBy ".$_POST['access_login']."\n");
			fwrite($fp1, "\n******************************************************************\n");
			fclose($fp1);
			} 
		else 
			{
			$emailadd = 'clia@isical.ac.in';
                        //$emailadd = 'bandyopadhyay.ayan@gmail.com';
			$subject = 'FIRE 2012: Run submission Error';
			mail($_POST['access_login'], $subject, $line, 'From: '.$emailadd.'');
			}
               
		 if($retval2 != "FALSE")system("/bin/rm -f cheak_".$_POST['access_login']."_".$x.".sh",$retval3);
		echo '<script type="text/javascript"> alert("'.$line1.'");</script>';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url4.'">';  
		if($retval3 != "FALSE")system("/bin/rm -f ".$filename, $retval4);
		}
		else
		{
		echo '<script type="text/javascript"> alert("File Format not Correct!!\nuse only .gz file.");</script>';
                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url4.'">';
		}
	       }
	       else
	       {
 		 echo '<script type="text/javascript"> alert("File not Uploaded");</script>';
                 echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url4.'">';
             	}
		
	     }

    	unset($_POST['access_login']);
   	unset($_POST['access_password']);
    	unset($_POST['Upload']);
    
         
       /*          lang            $_POST['mydropdown']   */   

/*    	echo '<tr><td height=10 width=1000></td></tr><tr><td>
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
<td width=100 height=50 align=left><font size="2" style="color:gray" ><b>
File: </b></font>
</td>
    <td><font size="2" style="color:gray" ><b>

        <input type="hidden" name="MAX_FILE_SIZE" value="70480000">
        <input name="userfile" type="file" /><br />
</td>
  </tr>

</tbody></table>
	<hr>
	<table><tbody>
		<tr><td height=20></td></tr>
		<tr><td width=250></td><td>
	<input type="submit" value="Upload" />
	</td></tr>
	 </tbody></table>

	</form>
	   </td></tr></table>';
         
	echo '</div>
    </div><div class="clear"> </div>
    <div id="spacer"> </div>
    <div id="footer">
      <div id="copyright">
        Copyright &copy; 2007 FIRE All rights reserved.
      </div>
          <div id="footerline"></div>
    </div>
        
  </div>'; */

      
 /* ************ */
  }
    /* echo '   </body>
</html>';*/
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
  

