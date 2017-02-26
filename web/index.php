<?php
//Include FB config file && User class
require_once '../fb/fbConfig.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>GiftWrappd - get gifted from your desired wish list for any occasion.</title>
	<!-- <meta name="description" content="Create wish lists for your Birthday, Anniversary, Christmas, Eid, Diwali, or any occasion. Add item from any retailer as desired gifts to your wish list. Share wish list with friend and relatives. Get your gifts.">
	<meta name="keywords" content=“wish list, wish lists, kids wish list, wedding gifts, wedding registry, baby registry, baby shower, new born gifts, gift ideas, gift registry, celebrate, occasion, event, special gifts, gifts, get gifted, birthday gifts, anniversary gifts, christmas gifts, eid gifts, diwali gifts, desired gifts, duplicate gifts, unwanted gifts">
	<link rel="canonical" href="http://www.giftwrappd.com> -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<script src="js/validate.config.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
		<header>
		  <div id="menuMobile" style="display:none;">
			<img src="images/GW_menu.png">
			<ul class="menuOptions" style="display:none;">
				<li><a href="signInModal" class="findList mobile openModal">Find a wish list</a></li>
				<li><a href="signInModal" class="createList mobile openModal">CREATE A WISH LIST</a></li>
			</ul>
		  </div>
		  <div class="logo">
			<img src="images/logo/GW_montez_BLUE.png" alt="Logo">
		  </div>
		  <div class="menuBar">
			<a href="signInModal" class="w-button menuDesktop but-2 findList openModal"  style="display:none;">FIND A WISH LIST</a>
			<a href="signInModal" class="w-button menuDesktop but-1 createList openModal" style="display:none;">CREATE A WISH LIST</a>
			<a href="signInModal" class="manageIn openModal">SIGN IN / SIGN UP</a>
		  </div>
		</header>	
		<section id="banner">
			<div class="content">
				<h1>GiftWrappd - get gifted from your desired wish list for any occasion.</h1>
				<div class="">Tired of getting unwanted gifts on your favorite occasion? our Wishlist experience will solve your problem</div>	
			</div>
			<div class="imgSec">
				<img src="images/banner.jpg">
			</div>
		</section>
		
		<section id="howItWorks">
			<h2 class="heading">How it works</h2>
			<div class="steps">
				<div class="step" id="step1">
					<div class="stepNum">1</div>
					<img src="images/GW_1_add.png">
					<div class="stepTitle">create a wish list</div>
				</div>
				<div class="stepArrow"><img src="images/arrow.png"></div>
				<div class="step" id="step2">
					<div class="stepNum">2</div>
					<img src="images/GW_2_add.png">
					<div class="stepTitle">add items to wish list from any website</div>
				</div>
				<div class="stepArrow"><img src="images/arrow.png"></div>
				<div class="step" id="step3">
					<div class="stepNum">3</div>
					<img src="images/GW_3_share.png">
					<div class="stepTitle">share your wish list with friends/family members</div>
				</div>
				<div class="stepArrow"><img src="images/arrow.png"></div>
				<div class="step last" id="step4">
					<div class="stepNum">4</div>
					<img src="images/GW_4_gift.png">
					<div class="stepTitle">get your gift</div>
				</div>
			</div>
			<div class="stepSelection">
				<div class="stepSel selected" data-id="step1"></div>
				<div class="stepSel" data-id="step2"></div>
				<div class="stepSel" data-id="step3"></div>
				<div class="stepSel" data-id="step4"></div>
			</div>
			<a href="#" class="w-button but-2 getStarted">GET STARTED</a>
		</section>
		<div class="seperator"></div>
		<footer>
			<div class="wrapper">
				<div class="logo">
					<img src="images/logo/GW_montez_deep_pink.png" alt="Logo">
			    </div>	
				<div class="content">			
					<div class="floatLeft">Follow us</div>
					<div class="contact floatLeft">
						<a href="#" class="in-blc">Feedback</a>
						<a href="#" class="in-blc">Contact us</a>
					</div>
				</div>
				<ul class="ws-socail-content">
					<li><a href="#" target="_blank" title="twitter"><svg class="svg-icon" viewBox="0 0 20 20"><path fill="#fff" d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266"></path></svg></a></li>
					<li><a href="#" target="_blank" title="facebook"><svg class="svg-icon" viewBox="0 0 20 20"><path fill="#fff" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path></svg></a></li>
					<li><a href="#" target="_blank" title="google plus"><svg class="svg-icon" viewBox="0 0 20 20"><path fill="#fff" d="M8.937,10.603c-0.383-0.284-0.741-0.706-0.754-0.837c0-0.223,0-0.326,0.526-0.758c0.684-0.56,1.062-1.297,1.062-2.076c0-0.672-0.188-1.273-0.512-1.71h0.286l1.58-1.196h-4.28c-1.717,0-3.222,1.348-3.222,2.885c0,1.587,1.162,2.794,2.726,2.858c-0.024,0.113-0.037,0.225-0.037,0.334c0,0.229,0.052,0.448,0.157,0.659c-1.938,0.013-3.569,1.309-3.569,2.84c0,1.375,1.571,2.373,3.735,2.373c2.338,0,3.599-1.463,3.599-2.84C10.233,11.99,9.882,11.303,8.937,10.603 M5.443,6.864C5.371,6.291,5.491,5.761,5.766,5.444c0.167-0.192,0.383-0.293,0.623-0.293l0,0h0.028c0.717,0.022,1.405,0.871,1.532,1.89c0.073,0.583-0.052,1.127-0.333,1.451c-0.167,0.192-0.378,0.293-0.64,0.292h0C6.273,8.765,5.571,7.883,5.443,6.864 M6.628,14.786c-1.066,0-1.902-0.687-1.902-1.562c0-0.803,0.978-1.508,2.093-1.508l0,0l0,0h0.029c0.241,0.003,0.474,0.04,0.695,0.109l0.221,0.158c0.567,0.405,0.866,0.634,0.956,1.003c0.022,0.097,0.033,0.194,0.033,0.291C8.752,14.278,8.038,14.786,6.628,14.786 M14.85,4.765h-1.493v2.242h-2.249v1.495h2.249v2.233h1.493V8.502h2.252V7.007H14.85V4.765z"></path></svg></a></li>
				</ul>
			</div>
		</footer>
    <div class="w-backdrop"></div>
    <div class="w-modal">
      <div class="w-modal-container">
        <div class="w-modal-header">
          <img src="images/logo/GW_montez_BLUE.png" alt="Logo">
        </div>
        <div class="w-modal-body">
		  <div class="otherSignIn">
		  	<?php 
				if(!$fbUser){
					$fbUser = NULL;
					$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
				}
			?>
			<div><a href="<?php echo $loginURL ?>" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 216 216" class="otherIcon"><path fill="#ffffff" d="M204.1 0H11.9C5.3 0 0 5.3 0 11.9v192.2c0 6.6 5.3 11.9 11.9 11.9h103.5v-83.6H87.2V99.8h28.1v-24c0-27.9 17-43.1 41.9-43.1 11.9 0 22.2.9 25.2 1.3v29.2h-17.3c-13.5 0-16.2 6.4-16.2 15.9v20.8h32.3l-4.2 32.6h-28V216h55c6.6 0 11.9-5.3 11.9-11.9V11.9C216 5.3 210.7 0 204.1 0z"></path></svg><span class="otherTxt">Sign Up With Facebook</span></a></div>
			<div>
			
			<a href="" class="google"><svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="otherIcon"><g fill="none" fill-rule="evenodd"><path d="M482.56 261.36c0-16.73-1.5-32.83-4.29-48.27H256v91.29h127.01c-5.47 29.5-22.1 54.49-47.09 71.23v59.21h76.27c44.63-41.09 70.37-101.59 70.37-173.46z" fill="#4285f4"></path><path d="M256 492c63.72 0 117.14-21.13 156.19-57.18l-76.27-59.21c-21.13 14.16-48.17 22.53-79.92 22.53-61.47 0-113.49-41.51-132.05-97.3H45.1v61.15c38.83 77.13 118.64 130.01 210.9 130.01z" fill="#34a853"></path><path d="M123.95 300.84c-4.72-14.16-7.4-29.29-7.4-44.84s2.68-30.68 7.4-44.84V150.01H45.1C29.12 181.87 20 217.92 20 256c0 38.08 9.12 74.13 25.1 105.99l78.85-61.15z" fill="#fbbc05"></path><path d="M256 113.86c34.65 0 65.76 11.91 90.22 35.29l67.69-67.69C373.03 43.39 319.61 20 256 20c-92.25 0-172.07 52.89-210.9 130.01l78.85 61.15c18.56-55.78 70.59-97.3 132.05-97.3z" fill="#ea4335"></path><path d="M20 20h472v472H20V20z"></path></g></svg><span class="otherTxt">Login With Google</span></a></div>
			<div>OR</div>
		  </div>
          <div id="createProfile">
            <h2>Create a profile</h2>
            <form id="signUpForm">
              <div class="signUpDet">
                <div class="form-input">
                  <input type="text" name="firstName" id="firstName" placeholder="First Name" id="firstName">
                </div>
                <div class="form-input">
                  <input type="text" name="lastName" id="lastName" placeholder="Last Name" id="lastName">
                </div>
                <div class="form-input">
                  <input type="email" name="emailId" id="emailId" placeholder="Email" id="emailId">
                </div>
                <div class="form-input">
                  <input type="password" name="password" placeholder="Password" id="password">
                </div>
              </div>
              <div class="form-button">
                <button class="w-button but-1 create" type="submit">CREATE</button>
				<button class="w-button but-2 closeModal" type="button">CANCEL</button>
              </div>
            </form>
          </div>
          <div id="userLogin" style="display:none">
            <h2>Login</h2>
            <form id="signUpForm">
              <div class="signUpDet">
                <div class="form-input">
                  <input type="email" name="emailId" placeholder="Email" id="emailId">
                </div>
                <div class="form-input">
                  <input type="password" name="password" placeholder="Password" id="password">
                </div>
              </div>
              <div class="form-button">
                <button class="w-button but-1 logIn" type="submit">LOGIN</button>
				<button class="w-button but-2 closeModal" type="button">CANCEL</button>
              </div>
            </form>
          </div>
          <div class="showOptions">
            <span class="showSignInSec">Already have an account?
              <a href="#" class="showSignIn showLoginForm">Sign in
              </a>
            </span>
            <span class="showSignUpSec" style="display:none">Don't have an account?
              <a href="#" class="showSignUp showLoginForm">Sign up
              </a>
            </span>
          </div>
        </div>
        <a href="javascript:void(0)" class="closeModal closeIcon">X
        </a>
      </div>
    </div>
    <script src="js/script.js" type="text/javascript"></script>
  </body>	
</html>