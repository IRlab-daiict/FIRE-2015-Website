<!--#include virtual="./start.txt" -->

 <script type="text/javascript">
   var str_ = /^[A-Za-z0-9 ]{3,30}$/;
   var email_ = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   
   function check() {
    var v = true;
    var errors = [];
    var name    = document.RegistrationW.Name.value;
    var country = document.RegistrationW.Nationality.value;
    var affil   = document.RegistrationW.Affiliation.value;
    var addr    = document.RegistrationW.Address.value;
    var email   = document.RegistrationW.Email.value;
    var phone   = document.RegistrationW.Phone.value;
    var food    = document.RegistrationW.Food.checked;

    if (!str_.test(name)) {
     errors[errors.length] = "Bad Name string."; v = false;
    }
    if (!str_.test(affil)) {
     errors[errors.length] = "Bad Affiliation string."; v = false;
    }
    if (addr == "") {
     errors[errors.length] = "Empty Address box."; v = false;
    }
    if (!email_.test(email)) {
     errors[errors.length] = "Bad Email."; v = false;
    }
    if (phone == "") {
     errors[errors.length] = "Missing Phone number."; v = false;
    }
    if (v == false)
     show(errors);
    return v;
   }

   function show(errors) {
    var msg = "Please fix these :\n";
    for (var i = 0; i<errors.length; i++) {
      var numError = i + 1;
      msg += "\n" + numError + ". " + errors[i];
    }
    alert(msg);
   }
 </script>

 <script type= "text/javascript">
   var RecaptchaOptions = {
   theme: 'clean'
   };
 </script>
 
<!--#include virtual="./head.html" -->
<!--**********************************************************-->

<!--**********************************************************-->
<!--starts content of the page-->
      

<div class="right">
<h2>Workshop Registration</h2>

<br/>

<!-- <p> -->
<!--   <b>Notes</b></br> -->
<!-- </p> -->

<FORM name="RegistrationW" method="post" action="verifyw.php" onsubmit="return check();">

<TABLE WIDTH="100%" BORDER="0">
  <TR>
    <TD colspan="2">
       <i>General information</i><br/><br/>
    </TD>
  </TR>
  <TR>
    <TD>
    Name
    </TD>
    <TD>
     <INPUT TYPE="Text" NAME="Name" SIZE="30">
    </TD>
  </TR>
  <TR>
    <TD>
    Nationality
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="Nationality" SIZE="30">
    </TD>
  </TR>
  <TR>
    <TD>
    Affiliation
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="Affiliation" SIZE="30">
    </TD>
  </TR>
  <TR>
    <TD valign="top">
    Address
    </TD>
    <TD>
    <TEXTAREA NAME="Address" ROWS="3" WRAP="off" SIZE="40">
    </TEXTAREA>
    </TD>
  </TR>
  <TR>
    <TD>
    Email
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="Email" SIZE="30">
    </TD>
  </TR>
  <TR>
    <TD>
      Phone
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="Phone" SIZE="30">
    </TD>
  </TR>
<TR>
  <TD>
    Food preference
  </TD>
  <TD>
    <input type="radio" name="Food" value="Non-Veg" checked/>Non-Veg
    <input type="radio" name="Food" value="Veg"/> Veg<br/>
  </TD>
</TR>
</table>

<br/><br/>
<hr/>

<!-------------------------- Registration Rates --------------------------->

<i>Registration Rates</i> (Values in INR, unless otherwise specified.)
<br/><br/>
  
<table width="75%" border="0">
<tr>
  <td><i>Participants from India</i></td>
  <td>Early*</td>
  <td>Spot</td>
</tr>
<tr>
  <td><br/>Full-time registered students</td>
  <td><br/>1000</td>
  <td><br/>2000</td>
</tr>
<tr>
  <td>Academia, non-profit R&D</td>
  <td>3500</td>
  <td>4500</td>
</tr>
<tr>
  <td>Industry</td>
  <td>7500</td>
  <td>10000</td>
</tr>
<!--
<tr>
  <td>Consortium</td>
  <td>3000</td>
  <td>4000</td>
</tr>
-->
<tr>
  <td><br/><i>Participants from abroad</i></td>
  <td colspan="2"><br/>100 USD</td>
</tr>
</table>  
<br/>
* Deadline for early registration: 18th November, 2011 <br/>
<br/><br/>
<hr/>

<!------------------------------------------------------------------------->


<table width="100%" border="0">
  <TR>
    <TD colspan="2">
       <i>Payment details</i><br/><br/>
    </TD>
  </TR>
  <TR><TD>Mode<sup>&dagger;</sup></TD><TD>&nbsp;</TD></TR>
  <TR>
    <TD>&nbsp;</TD>
    <TD>
     <input type="radio" name="Mode" value="DD" checked> Demand draft<br/>
     <input type="radio" name="Mode" value="CC"> Cashier's cheque<br/>
     <input type="radio" name="Mode" value="Ch"> Cheque<br/>
     <input type="radio" name="Mode" value="ET"> Electronic transfer<br/>
     <input type="radio" name="Mode" value="Sponsor"> None. I am from a sponsoring organization.<br/>
    </TD>
  </TR>
   <TR>
    <TD>
    Bank<sup>*</sup>
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="DDBank" SIZE="20">
    </TD>
    </TR>
   <TR>
    <TD>
    Number<sup>*</sup>
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="DDNumber" SIZE="20">
    </TD>
    </TR>
    <TR>
    <TD>
    Issuing Date<sup>*</sup>
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="DDDate" SIZE="20">
     </TD>
     </TR>
    <TR>
     <TD>
     Amount(INR / USD)<sup>*</sup>
    </TD>
    <TD>
    <INPUT TYPE="Text" NAME="DDSum" SIZE="20">
    </TD>
  </TR>
</TABLE>

<br/><hr/>

<table width="100%" border="0">
<tr>
  <td>
    <sup>&dagger;</sup> Please issue the draft / cheque favouring
    <b>"INFORMATION RETRIEVAL SOCIETY OF INDIA"</b>, payable
    at <b>Kolkata</b>, and mail it to:
<br/><br/>
<pre>
Information Retrieval Lab
CVPR Unit
Indian Statistical Institute
203 BT Road
Kolkata 700108
</pre>
<br/>
  </td>
</tr>

<tr>
  <td>
    <sup>*</sup> If any of these fields do not apply to you, please
    write "NA" in them (without the quotes).
  </td>
</tr>
</table>

<br/><hr/>

<table width="100%" border="0">
  <TR>
    <TD colspan="2">
      If you prefer to pay by electronic transfer, please use the following information:
    </TD>
  </TR>
  <TR>
    <TD>Bank:</TD>
    <TD>State Bank of India</TD>
  </TR>
  <TR>
    <TD>Account Name:</TD>
    <TD>INFORMATION RETRIEVAL SOCIETY OF INDIA</TD>
  </TR>
  <TR>
    <TD>Account #:</TD>
    <TD>31013519454</TD>
  </TR>
  <TR>
    <TD>Branch:</TD>
    <TD>Indl Estate, Bonhoogly (Kolkata)</TD>
  </TR>
  <TR>
    <TD>Branch Code:</TD>
    <TD>2029</TD>
  </TR>
  <TR>
    <TD>IFSC:</TD>
    <TD>SBIN0002029</TD>
  </TR>
  <TR>
    <TD>Swift Code:</TD>
    <TD>SBININBB106</TD>
  </TR>
</table>

<br/><br/>

<?php
   require_once('recaptchalib.php');
   $publickey = "6Ldp48kSAAAAAFy-5nVU_KSk7wAlyjWmB5zAwkFY";
   echo recaptcha_get_html($publickey);
?>

<br/><br/>

<INPUT TYPE="Submit" NAME="submit" VALUE="Submit">
<INPUT TYPE="Reset" NAME="reset" VALUE="Clear">

</FORM>
</div>
<!--ends content of the page-->
<!--**********************************************************-->

<!--**********************************************************-->
<!--#include virtual="./foot.html" -->
<!--**********************************************************-->
<!--#include virtual="./script.txt" -->
<!--#include virtual="./end.txt" -->
