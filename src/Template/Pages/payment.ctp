<!-- <form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	<?php
		// echo '<input type=hidden name=encRequest value="'.$data.'"">';
		// echo '<input type=hidden name=Merchant_Id value="'.$merchant.'">';
	?>
</form>
 -->

<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
        <?php
           echo "<input type=hidden name=encRequest value=$encrypted_data>";
           echo "<input type=hidden name=access_code value=$access_code>";
        ?>
     </form>

<script language='javascript'>document.redirect.submit();</script>
