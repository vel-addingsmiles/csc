<br><br><br><br>
<br><br><br><br>

<center><h5>loging into facebook.....Please wait.......</h5></center>
<br><br><br><br>
<?= $this->Form->create('fblogin',['url' => '/social-auth/login/facebook','id' => 'facebookForm']) ?>

<?= $this->Form->end() ?>

<script language='javascript'>
	
	$(document).ready(function(){
		$("#facebookForm").submit();
	})

</script>