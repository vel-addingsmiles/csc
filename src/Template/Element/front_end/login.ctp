<div class="modal fade" id="login_register" tabindex="-1" role="dialog" aria-labelledby="login_registerLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span						aria-hidden="true">&times;</span></button>

				<!-- <button type="button" class="pull-right close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button> -->
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Nav tabs -->
						<div class="card form-content">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#register" aria-controls="home"
										role="tab" data-toggle="tab">Register</a></li>
								<li role="presentation"><a href="#login" aria-controls="profile" role="tab"
										data-toggle="tab">Login</a></li>
							</ul>
							<?php echo $this->Flash->render(); ?>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="register"> 
									<?= $this->Form->create('user',['novalidate' => false , 'url' => '/users/register' ]) ?>
										<div class="form_content">
											<div class="row">
												<div class="col-xs-12">
													<p class="m-0 register_txt">Register with us to get latest updates and manage your orders
													</p>
												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="text" class="form-control input_value"
															name="name" autocomplete="off" data-toggle="tooltip"
															data-placement="left" id="name" , required="" />											


														<label>Name <span class="important">*</span></label>
														<span class="border_bottom"></span>
													</div>
													<span class="d-none" id="name_error">Please enter your
														Name<span class="important">*</span></span>
												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="text" class="form-control input_value"
															name="mobile" autocomplete="off"
															data-toggle="tooltip" data-placement="left"
															id="mobile" , required="" />
														<label>Mobile Number<span class="important">*</span></label>
														<span class="border_bottom"></span>														
													</div>

												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="password" class="form-control input_value"
															name="password" autocomplete="off"
															data-toggle="tooltip" data-placement="left"
															id="password" , required="" />
														<label>Password <span class="important">*</span></label>
														<span class="border_bottom"></span>
													</div>
												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="email" class="form-control mY input_value"
															name="email" autocomplete="off"
															data-toggle="tooltip" data-placement="left"
															id="email" />
														<label>Email <span class="important">*</span></label>
														<span class="border_bottom"></span>
													</div>
													<span class="d-none" id="work_email_error">Please enter your
														Email</span>
												</div>
												<div class="col-xs-12 text-right">
													<button class="ibtn" type="submit">Register</button>
												</div>
											</div>
										</div>
									<?= $this->Form->end() ?>
								</div>
								<div role="tabpanel" class="tab-pane" id="login">
									<?= $this->Form->create('user',['novalidate' => false , 'url' => '/users/login' ]) ?>
									<?php if(isset($redirect)){ ?>
									<input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
									<?php } ?>
										<div class="form_content">
											<div class="row">
												<div class="col-xs-12">
													<p class="register_txt m-0 pb-20">Login with your registered Mobile number or Email
													</p>														
												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="email" class="form-control mY input_value"
															name="email" autocomplete="off"
															data-toggle="tooltip" data-placement="left"
															id="email" />
														<label>Email</label>
														<span class="border_bottom"></span>
													</div>
													<span class="d-none" id="work_email_error">Please enter your
														Email</span>
												</div>
												<div class="col-xs-12 mB">
													<div class="form_transition">
														<input type="password" class="form-control input_value"
															name="password" autocomplete="off"
															data-toggle="tooltip" data-placement="left"
															id="password" />
														<label>Password</label>
														<span class="border_bottom"></span>
													</div>
												</div>		
												<div class="col-xs-12" >
													<a href="<?php echo $this->Url->build('/users/forgot-password'); ?>">Forgot Password?</a>
												</div>
												<div class="col-xs-12 text-right">
													<button class="ibtn" type="submit">Login</button>
												</div>
											</div>
										</div>
									<?= $this->Form->end() ?>
								</div>
							</div>

								<div class="other-links">
		                            <span>Or register with</span> |
		                            <a href="<?php echo $this->Url->build('/users/facebook-login'); ?>"><i class="fa fa-facebook"></i></a> |
		                              <a href="<?php echo $this->Url->build('/users/google-login'); ?>"><i class="fa fa-google"></i></a>
		                        </div> 

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {

    $('.input_value').keyup(function () {
      if ($(this).val() != '') {
        $(this).addClass('valid');
        $(this).find('~ .border_bottom').addClass('valid');
      } else {
        $(this).removeClass('valid');
        $(this).find('~ .border_bottom').removeClass('valid');
      }
    });
    
  });
</script>