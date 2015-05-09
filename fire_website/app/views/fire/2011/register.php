<!--**********************************************************-->
<!--#include virtual="./start.txt" -->
<!--**********************************************************-->

 <script type="text/javascript">
   var str_ = /^[A-Za-z0-9 ]{3,30}$/;
   var email_ = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
   
   function check() {
    var v = true;
    var errors = [];
    var name  = document.Registration.Name.value;
    var affil = document.Registration.Affiliation.value;
    var addr  = document.Registration.Address.value;
    var email = document.Registration.Email.value;
    var phone = document.Registration.Phone.value;
    var A_BN  = document.Registration.A_BN.checked;
    var A_EN  = document.Registration.A_EN.checked;
    var A_GU  = document.Registration.A_GU.checked;
    var A_HI  = document.Registration.A_HI.checked;
    var A_MA  = document.Registration.A_MA.checked;
    var A_TA  = document.Registration.A_TA.checked;
    var CLTR  = document.Registration.CLTR.checked;
    var MLAF  = document.Registration.MLAF.checked;
    var PIR   = document.Registration.PIR.checked;
    var RISOT = document.Registration.RISOT.checked;
    var SMS   = document.Registration.SMS.checked;
    var WSD   = document.Registration.WSD.checked;

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
    if (!A_BN && !A_EN && !A_GU && !A_HI && !A_MA && !A_TA && 
        !CLTR && !MLAF && !PIR && !RISOT && !SMS && !WSD) {
     errors[errors.length] = "No Task selected."; v = false;
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

<!-- <span id="err_msg" style="color: red;"></span> -->
<!--**********************************************************-->
<!--#include virtual="./head.html" -->
<!--**********************************************************-->
<!--**********************************************************-->
<!--starts content of the page-->
 
<div class="right">
<h2>Registration</h2>

<br/>

<b>FORM</b><br/>
<hr/><br/>
<i>Step 1</i> : <br/>

<p>
Read, complete, sign and mail us the organisational-access form. The
mailing address is mentioned in the form. Organisations may use the
individual form to manage access rights internally. The
individual-access form need not be sent to us.
</p>

<br/>

<ul>
  <li>
    <a href="http://irsi.res.in/forms/organisational.pdf">Organisational
      Application to use the FIRE Information-Retrieval Text Research
      Collection.</a><br/>
  </li>
  <li>
    <a href="http://irsi.res.in/forms/individual.pdf">Individual
      Application to use the FIRE Information-Retrieval Text Research
      Collection.</a><br/>
  </li>
</ul>
<br/>
<i>Step 2</i> : <br/>
<form name="Registration" method="post" action="verify.php" onsubmit="return check();">
  <br/>
  <i>Participant</i><br/><hr/><br/>
  <table border="0">
  <tr><td>Name</td> <td><input name="Name" id="Name" type="text"/></td></tr>
  <tr><td>Affiliation</td> <td><input name="Affiliation" id="Affiliation" type="text"/></td></tr>
  <tr><td>Address</td> <td><textarea name="Address" id="Address"></textarea></td></tr>
  <tr><td>Email</td> <td><input name="Email" id="Email" type="text"/></td></tr>
  <tr><td>Phone</td> <td><input name="Phone" id="Phone" type="text"/></td></tr>
  </table>
  <br/>
  <i>Task</i><br/><hr/>
  <ul>
    <li>Adhoc</li>
    <ul>
      <li><input  type="checkbox" name="A_BN" value="Adhoc Bengali"/>&nbsp;Bengali</li>
      <li><input  type="checkbox" name="A_EN" value="Adhoc English"/>&nbsp;English</li>
      <li><input  type="checkbox" name="A_GU" value="Adhoc Gujarati"/>&nbsp;Gujarati</li>
      <li><input  type="checkbox" name="A_HI" value="Adhoc Hindi"/>&nbsp;Hindi</li>
      <li><input  type="checkbox" name="A_MA" value="Adhoc Marathi"/>&nbsp;Marathi</li>
      <li><input  type="checkbox" name="A_TA" value="Adhoc Tamil"/>&nbsp;Tamil</li>
    </ul>
    <li><input  type="checkbox" name="CLTR" value="CLTR"/>&nbsp;CL!TR : <i>Cross-Language !ndian Text Reuse</i></li>
    <li><input  type="checkbox" name="MLAF" value="MLAF"/>&nbsp;MLAF : <i>Mailing Lists and Forums</i></li>
    <li><input  type="checkbox" name="PIR" value="PIR"/>&nbsp;Personalised IR</li>
    <li><input  type="checkbox" name="RISOT" value="RISOT"/>&nbsp;RISOT : <i>Retrieval from Indic Script OCRed Text</i></li>
    <li><input  type="checkbox" name="SMS" value="SMS"/>&nbsp;SMS-based FAQ Retrieval</li>
    <li><input  type="checkbox" name="WSD" value="WSD"/>&nbsp;Word Sense Disambiguation for IR</li>
  </ul>
  <hr/><br/>
  <?php
     require_once('recaptchalib.php');
     $publickey = "6Ldp48kSAAAAAFy-5nVU_KSk7wAlyjWmB5zAwkFY";
     echo recaptcha_get_html($publickey);
  ?>
  <br/>
  <input name="submit" value="Submit" type="submit"/>
  <input name="reset"  value="Clear"  type="reset"/>
  <br/>
</form>
<br/>
<i>Step 3</i> : <br/>
On receving the forms we will respond to you by email with the
instructions for accessing the collections.
<hr/>
</div>

<!--ends content of the page-->
<!--**********************************************************-->

<!--**********************************************************-->
<!--#include virtual="./foot.html" -->
<!--**********************************************************-->
<!--#include virtual="./end.txt" -->
