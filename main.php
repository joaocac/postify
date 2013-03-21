		
		<!-- Start : Login area --> 
		<div id="login_area" class="container_24 clearfix content" style='display: none;'>
			<div class="grid_12">
				<h2 title="Access you area here!">Access you area here!</h2>
				<p>Please enter your user access infromation as requested in order to see your private area.</p>
				<p>If you don't have created your account, please do by pressing "Register" options in the main menu.</p>
				<p>Thank you for your time.</p>
				<p>&nbsp;</p>
			</div> <!-- /.grid_12 -->
			<div class="grid_12">
				<div class='gf_browser_unknown  panel_wrapper' id='gform_wrapper_1' ><a id='gf_1' name='gf_1' class='gform_anchor' ></a>
					<form method='post' enctype='multipart/form-data' target='gform_ajax_frame_1' id='sigin_form' class='panel' action='index.html#gf_1'>
						<div class='form_heading'>
							<h3 class='gform_title'>Sign in</h3>
						</div>
						<div class='gform_body'>
							<ul id='gform_fields' class='gform_fields top_label description_below'>
								<li id='email_li' class='gfield gfield_contains_required'>
									<label class='gfield_label' for='email_id' style="display: inline;">E-mail</label>
									<div class='ginput_container'><input name='email' id='email_id' type='text' value='' class='medium' /></div>
								</li>
								<li id='password_li' class='gfield gfield_contains_required'>
									<label class='gfield_label' for='password_id' style="display: inline;">Password</label>
									<div class='ginput_container'><input name='password' id='password_id' type='password' value='' class='medium' /></div>
								</li>
							</ul>
						</div>
						<div class='gform_footer top_label' style='width: 100%; text-align: right;' nowrap>
							<input type='hidden' name='c' value='userSignIn' />
							<input type='submit' id='sigin_submit' class='button gform_button' value='Sign In' onclick="javascript: return false;" />
						</div>
	                </form>
                </div>
			</div> <!-- /.grid_12 -->
		</div> <!-- /.container_24 -->
		<!-- End : Login area --> 

		<div id="main_area" class="container_24 clearfix content" style='display: none;'>
			<div class="grid_24">
				<h2 title="Access you area here!">This is your home!</h2>
				<p>Dont forget to check out our latest offers!</p>
				<p>Thank you for visit us.</p>
				<p>&nbsp;</p>
			</div> <!-- /.grid_12 -->
		</div> <!-- /.container_24 -->

		<div id="register_area" class="container_24 clearfix content" style='display: none;'>
			<div class="grid_12">
				<h2 title="Access you area here!">Create your account</h2>
				<p>Please provide us with you email and password to register you on our system.</p>
				<p>Thank you.</p>
				<p>&nbsp;</p>
			</div> <!-- /.grid_12 -->
			<div class="grid_12">
				<div class='gf_browser_unknown  panel_wrapper' id='gform_wrapper_1' ><a id='gf_1' name='gf_1' class='gform_anchor' ></a>
					<form method='post' enctype='multipart/form-data' target='gform_ajax_frame_1' id='register_form' class='panel' action='index.html#gf_1' data-validate="parsley">
						<div class='form_heading'>
							<h3 class='gform_title'>Registration</h3>
						</div>
						<div class='gform_body'>
							<ul id='gform_fields' class='gform_fields top_label description_below'>
								<li id='email_li' class='gfield gfield_contains_required'>
									<label class='gfield_label' for='email_id' style="display: inline;">E-mail</label>
									<div class='ginput_container'><input name='email' id='crt_email_id' type='text' value='' class='medium' data-trigger="change" data-required="true" data-notblank="true" data-type="email"/></div>
								</li>
								<li id='password_li' class='gfield gfield_contains_required'>
									<label class='gfield_label' for='password_id' style="display: inline;">Password</label>
									<div class='ginput_container'><input name='password' id='crt_password_id' type='password' value='' class='medium' data-trigger="focusout" data-required="true"/></div>
								</li>
								<li id='passwordr_li' class='gfield gfield_contains_required'>
									<label class='gfield_label' for='passwordr_id' style="display: inline;">Password confirmation</label>
									<div class='ginput_container'><input name='passwordr' id='crt_passwordr_id' type='password' value='' class='medium' data-trigger="focusout" data-equalto="#crt_password_id" data-required="true"/></div>
								</li>
							</ul>
						</div>
						<div class='gform_footer top_label' style='width: 100%; text-align: right;' nowrap>
							<input type='hidden' name='c' value='userCreate' />
							<input type='submit' id='register_submit' class='button gform_button' value='Register' onclick="javascript: return false;"/>
						</div>
	                </form>
                </div>
			</div> <!-- /.grid_12 -->
		</div> <!-- /.container_24 -->
