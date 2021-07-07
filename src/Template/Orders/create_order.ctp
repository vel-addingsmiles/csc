<br><br><br><br>
<br><br><br><br>

<center><h5>Redirecting you to payment gateway.....<br><br>Please wait.......</h5></center>
<br><br><br><br>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
        <?php
           echo "<input type=hidden name=encRequest value=$encrypted_data>";
           echo "<input type=hidden name=access_code value=$access_code>";
        ?>
     </form>

<script language='javascript'>document.redirect.submit();</script>
