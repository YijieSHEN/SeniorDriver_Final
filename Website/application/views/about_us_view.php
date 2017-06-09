<div style="padding-top:30px; padding-left: 3%; padding-right: 3%">

<style type="text/css">
	@import url(//fonts.googleapis.com/css?family=Lato:400,900);
    @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
    body {
		padding: 60px 0px;
	}
	.animate {
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		-ms-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}
	.info-card {
		width: 100%;
		border: 1px solid rgb(215, 215, 215);
		position: relative;
		font-family: 'Lato', sans-serif;
		margin-bottom: 20px;
		overflow: hidden;
	}
	.info-card > img {
		width: 100px;
		margin-bottom: 60px;
	}
	.info-card .info-card-details,
	.info-card .info-card-details .info-card-header  {
		width: 100%;
		height: 100%;
		position: absolute;
		bottom: -100%;
		left: 0;
		padding: 0 0;
		background: rgb(255, 255, 255);
		text-align: center;
	}
	.info-card .info-card-details::-webkit-scrollbar {
		width: 8px;
	}
	.info-card .info-card-details::-webkit-scrollbar-button {
		width: 8px;
		height: 0px;
	}
	.info-card .info-card-details::-webkit-scrollbar-track {
		background: transparent;
	}
	.info-card .info-card-details::-webkit-scrollbar-thumb {
		background: rgb(160, 160, 160);
	}
	.info-card .info-card-details::-webkit-scrollbar-thumb:hover {
		background: rgb(130, 130, 130);
	}           

	.info-card .info-card-details .info-card-header {
		height: auto;		
		bottom: 100%;
		padding: 0px 0px;
	}
	.info-card:hover .info-card-details {
		bottom: 0px;
		overflow: auto;
		padding-bottom: 25px;
	}
	.info-card:hover .info-card-details .info-card-header {
		position: relative;
		bottom: 0px;
		padding-top: 45px;
		padding-bottom: 25px;
	}
	.info-card .info-card-details .info-card-header h1,	
	.info-card .info-card-details .info-card-header h3 {
		color: rgb(62, 62, 62);
		font-size: 22px;
		font-weight: 900;
		text-transform: uppercase;
		margin: 0 !important;
		padding: 0 !important;
	}
	.info-card .info-card-details .info-card-header h3 {
		color: rgb(142, 182, 52);
		font-size: 15px;
		font-weight: 400;
		margin-top: 5px;
	}
	.info-card .info-card-details .info-card-detail .social {
		list-style: none;
		padding: 0px;
		margin-top: 25px;
		text-align: center;
	}
	.info-card .info-card-details .info-card-detail .social a {
		position: relative;
		display: inline-block;
		min-width: 40px;
		padding: 10px 0px;
		margin: 0px 5px;
		overflow: hidden;
		text-align: center;
		background-color: rgb(215, 215, 215);
		border-radius: 40px;
	}

	a.social-icon {
		text-decoration: none !important;
		box-shadow: 0px 0px 1px rgb(51, 51, 51);
		box-shadow: 0px 0px 1px rgba(51, 51, 51, 0.7);
	}
	a.social-icon:hover {
		color: rgb(255, 255, 255) !important;
	}
	a.facebook {
		color: rgb(59, 90, 154) !important;
	}
	a.facebook:hover {		
		background-color: rgb(59, 90, 154) !important;
	}
	a.twitter {
		color: rgb(45, 168, 225) !important;
	}
	a.twitter:hover {
		background-color: rgb(45, 168, 225) !important;
	}
	a.github {
		color: rgb(51, 51, 51) !important;
	}
	a.github:hover {
		background-color: rgb(51, 51, 51) !important;
	}
	a.google-plus {
		color: rgb(244, 94, 75) !important;
	}
	a.google-plus:hover {
		background-color: rgb(244, 94, 75) !important;
	}
	a.linkedin {
		color: rgb(1, 116, 179) !important;
	}
	a.linkedin:hover {
		background-color: rgb(1, 116, 179) !important;
	}

</style>


<h3 class="text-center">About Us</h3>
<br/>
<h4 class="text-center">MISSION AND VISION</h4>
<p class="text-center" style="font-size: 130%;">We at SeniorDriver aim at providing the Carer/Family member of the elderly with certain educational tools and functionalities to help combat elderly driving accidents on the road including crash statistics, black spot detection as well as real time tracking.<br/> Once implemented this project could be a step towards significantly reducing the number of accidents on Victorian roads for elderly drivers over the age of 65 years.
</p>
<br/>

<h4 class="text-center">The Team</h4>
<p class="text-center" style="font-size: 130%;">Team Geeked comprises of four members coming together from various branches of Information technology with each possessing their own unique sets of soft skills and technical abilities.</p>
<br/>
<div class="container marketing" >
      <div class="row">
        <div class="span3">
          <div class="[ info-card ]">
					<img style="width: 100%" src="<?php echo asset_url(); ?>img/team/luis.png" />
					<div class="[ info-card-details ] animate">
						<div class="[ info-card-header ]">
							<h2 class="text-center"> Luis </h2>
							<h3> Ecuador </h3>
						</div>
						<div class="[ info-card-detail ]">
							<!-- Description -->
							<p>With a background in networking, server administration and security Luis is our network guy.<br/> He is determined at providing top notch security to the website.</p>
						</div>
					</div>
				</div>
        </div>
        <div class="span3">
          <div class="[ info-card ]">
					<img style="width: 100%" src="<?php echo asset_url(); ?>img/team/maiman.jpg" />
					<div class="[ info-card-details ] animate">
						<div class="[ info-card-header ]">
							<h2 class="text-center"> Maiman </h2>
							<h3> Bangladesh </h3>
						</div>
						<div class="[ info-card-detail ]">
							<!-- Description -->
							<p>Maiman holds an interesting mix of both business and IT. <br/>Never shy from coming up with new ideas he is our main Data person.</p>
						</div>
					</div>
				</div>
        </div>
        <div class="span3">
          <div class="[ info-card ]">
					<img style="width: 100%" src="<?php echo asset_url(); ?>img/team/neal.jpg" />
					<div class="[ info-card-details ] animate">
						<div class="[ info-card-header ]">
							<h2 class="text-center"> Neal </h2>
							<h3> China </h3>
						</div>
						<div class="[ info-card-detail ]">
							<!-- Description -->
							<p>From a pure IT background Neal is a seasoned Web developer and Programmer. <br/>He is the technical backbone of the team and in charge of the technical aspects.</p>
						</div>
					</div>
				</div>
        </div>
        <div class="span3">
          <div class="[ info-card ]">
					<img style="width: 100%" src="<?php echo asset_url(); ?>img/team/emma.jpg" />
					<div class="[ info-card-details ] animate">
						<div class="[ info-card-header ]">
							<h2 class="text-center"> Emma </h2>
							<h3> China </h3>
						</div>
						<div class="[ info-card-detail ]">
							<!-- Description -->
							<p>Emma is a full stack developer and brings developing skills including web application and mobile application.<br/> She keeps raising the bar and is the main brain behind our tracking function and mobile application.</p>
						</div>
					</div>
				</div>
        </div>
      </div>
              <h4 class="text-center">Contact us: <a href="mailto:info.seniordriver@gmail.com">info.seniordriver@gmail.com</a></h4>

</div>
<br/>
</div>