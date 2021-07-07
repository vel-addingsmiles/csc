<br><br><br><br>
<br><br><br><br>

<center><h5>loging into google.....Please wait.......</h5></center>
<br><br><br><br>
<?= $this->Form->create('googlelogin',['url' => '/social-auth/login/google','id' => 'googleForm']) ?>

<?= $this->Form->end() ?>

<script language='javascript'>
	
	$(document).ready(function(){
		$("#googleForm").submit();
	})

</script>