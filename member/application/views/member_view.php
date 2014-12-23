	<html>

	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href="<?= base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="<?= base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url(); ?>css/member.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body >
		<div id="saved" class="animated profile-status"><p><i class="icon-ok icon"></i>Your profile has been saved.</p></div>
		<div id="unsaved" class="animated profile-status"><p><i class="icon-pencil icon"></i>You have un-saved changes.</p></div>

		<? $this->load->view("header_view"); ?>

		<div id="member-details" class="container">
			<div id="personal-info" class="row">
				<div class="span11 section-heading">
					<div class="popover-holder pull-right">
						<a data-toggle="popover" data-placement="left" data-content="Personal Information">Help <i class="icon-info-sign icon"></i></a>
					</div>
					<h3>PERSONAL INFORMATION</h3>
				</div>
				<div class="span4 section">
					<div class="section-inner">
						<div class="input-group">
			        		<input data-toggle="tooltip" title="First Name" data-id="FirstName" type="text" class="form-control" placeholder="First Name" value="<?= $member_data->FirstName; ?>">
			        		<input data-toggle="tooltip" title="Last Name" data-id="LastName" type="text" class="form-control" placeholder="Last Name" value="<?= $member_data->LastName; ?>">
			        	</div>
						<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Team Size</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="team_size_id">
			                	<? foreach ($menus->team_sizes as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
			        	<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Work Status</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="employment_status_id">
								<? foreach ($menus->work_statuses as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
					</div>
				</div>
				<div class="span3 section">
					<div class="section-inner">
			        	<div class="input-group">
							<input data-toggle="tooltip" title="Email" data-id="email" type="text" class="form-control" placeholder="Email" value="<?= $member_data->email; ?>">
						</div>
						<div class="input-group">
							<input data-toggle="tooltip" title="Skype Username" data-id="skype_username" type="text" class="form-control" placeholder="Skype Username" value="<?= $member_data->skype_username; ?>">
						</div>
						<p>Other IM Account</p>
						<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Type</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="im_account_type_id">
								<? foreach ($menus->im_account_types as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
			        	<div class="input-group">
							<input data-toggle="tooltip" title="Username" data-id="im_username" type="text" class="form-control" placeholder="Username" value="<?= $member_data->im_username; ?>">
						</div>
			        </div>
				</div>

				<div class="span4 section">
					<div class="section-inner">
			        	<div class="input-group">
							<input data-toggle="tooltip" title="Phone" data-id="phone" type="text" class="form-control" placeholder="Phone" value="<?= $member_data->phone; ?>">
							<input data-toggle="tooltip" title="Website" data-id="website" type="text" class="form-control" placeholder="Website" value="<?= $member_data->website; ?>">
							<input data-toggle="tooltip" title="Company" data-id="company" type="text" class="form-control" placeholder="Company" value="<?= $member_data->company; ?>">
						</div>
						
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="span11 section-heading">
					<h3>LOCATION</h3>
				</div>
				<div class="span5 section">
					<div class="section-inner">
						<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Country</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="country_id">
			                	<li data-id="230"><a>United States</a></li>
			                	<? foreach ($menus->countries as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
			        	<div class="btn-group" >
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>State</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="state_id">
								<? foreach ($menus->states as $key => $value): ?>
			                  	<li data-country-id="<?= $value->country_id; ?>" data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
					</div>
				</div>
				<div class="span5 section">
					<div class="section-inner">
        				<div id="events_container"></div>
						<div class="input-group">
		       				<input data-toggle="tooltip" title="City" data-id="city" type="text" class="form-control" placeholder="City" value="<?= $member_data->city; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span11 section-heading">
					<div class="popover-holder pull-right">
						<a data-toggle="popover" data-placement="left" data-content="Tell us about your professional background and where you have recently worked.">Help <i class="icon-info-sign icon"></i></a>
					</div>
					<h3>PROFILE</h3>
				</div>
				<div class="span5 section">
					<div class="section-inner">
						<p>Keywords</p>
			        	<div class="input-group">
			        		<ul id="keywordTags">
			        			<? foreach ($member_data->keywords as $key => $value): ?>
			        			<li><?= $value->keyword; ?></li>
			        			<? endforeach ?>
			        		</ul>
			        		<p>Ex. Design, Creative, Student</p>
						</div>
						<p>Recent Employers</p>
			        	<div class="input-group">
			        		<ul id="employerTags">
			        			<? foreach ($member_data->companies as $key => $value): ?>
			        			<li><?= $value->company; ?></li>
			        			<? endforeach ?>
			        		</ul>
			        		<p>Ex. Brigade, Google, Apple</p>
						</div>
					</div>
				</div>
				<div class="span6 section">
					<div class="section-inner">
			        	<div class="input-group">
							<textarea data-toggle="tooltip" title="Bio" data-id="bio_desc" class="form-control" placeholder="Bio" rows="8"><?= $member_data->bio_desc; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div id="specialty-section-row" class="row">
				<div class="span11 section-heading">
					<div class="popover-holder pull-right">
						<a data-toggle="popover" data-placement="left" data-content="This helps The Brigade match you with the right projects. Choose a creative field and add multiple specialties to 
your list. Include Details, Applications, Rate, and Experience information for each Specialty that you create.">Help <i class="icon-info-sign icon"></i></a>
					</div>
					<h3>SPECIALTIES</h3>
				</div>
				<div class="span5 section">
					<div class="section-inner">
						<ul id="specialtyTags">
			        		<? foreach ($member_data->specialties as $key => $value): ?>
		        			<li data-id="<?= $value->specialty_id; ?>"><?= $value->specialty_name; ?></li>
		        			<? endforeach ?>
			        	</ul>
			        	<p>Filter by:</p>
						<div class="btn-group">
			                <button data-id="industry" class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Industry</a><span class="val"></span><span class="caret"></span></button>
			                <ul data-id="industry" class="dropdown-menu">
			               		<? foreach ($menus->industries as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
		        		</div>
						<div class="btn-group">
			                <button data-id="creative_field" class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Creative Field</a><span class="val"></span><span class="caret"></span></button>
			                <ul data-id="creative_field" class="dropdown-menu">
			               		<? foreach ($menus->creative_fields as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>" data-industry="<?= $value->industry_id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
		        		</div>
		        		<div class="btn-group">
		        			<button data-id="specialty" class="btn btn-primary btn-lg add-button" data-toggle="dropdown"><i class="icon-plus icon-white"></i></button>
			                <h4>Add a Specialty</h4>
			                <ul data-id="specialty" class="dropdown-menu">
			               		<? foreach ($menus->specialties as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>" data-industry="<?= $value->industry_id; ?>" data-creative-field="<?= $value->creative_field_id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
		        		</div>
					</div>
				</div>
				<div class="span6 section specialty-details animated inactive">
					<div class="section-inner">
		        		<div class="btn-group">
			                <button data-id="details" class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Details</a><span class="val"></span><span class="caret"></span></button>
			                <ul data-id="details" class="dropdown-menu multi-select" data-category="specialty_details">
			                  	<? foreach ($menus->specialty_details as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>" data-specialty="<?= $value->specialty_id; ?>"><a><span class="checkbox-wrapper"><i class="icon-ok"></i></span><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
		        		</div>
		        		<div class="btn-group">
			                <button data-id="applications" class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Applications</a><span class="val"></span><span class="caret"></span></button>
			                <ul data-id="applications" class="dropdown-menu multi-select" data-category="specialty_details">
			                  	<? foreach ($menus->specialty_applications as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>" data-specialty="<?= $value->specialty_id; ?>"><a><span class="checkbox-wrapper"><i class="icon-ok"></i></span><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
		        		</div>
						<p>Years Experience</p>
					    <div data-id="years_experience" class="number-selector btn-large" data-category="specialty_details">
							<span class="icn-btn"><i class="icon-chevron-down icon-white"></i></span>
							<span class="icn-btn"><i class="icon-chevron-up icon-white"></i></span>
							<span class="pull-right" data-increment="1">10</span>				    
						</div>
						<p>Hourly Rate</p>
		        		<div data-id="hourly_rate" class="number-selector btn-large" data-category="specialty_details">
						   	<span class="icn-btn"><i class="icon-chevron-down icon-white"></i></span>
							<span class="icn-btn"><i class="icon-chevron-up icon-white"></i></span>
							<span class="pull-right" data-increment="10">100</span>
					    </div>
					    <p>Daily Rate</p>
					    <div data-id="day_rate" class="number-selector btn-large" data-category="specialty_details">
							<span class="icn-btn"><i class="icon-chevron-down icon-white"></i></span>
							<span class="icn-btn"><i class="icon-chevron-up icon-white"></i></span>
							<span class="pull-right" data-increment="100">1000</span>
 					    </div>
			        </div>
				</div>
				<div class="span3 section specialty-details animated inactive">
					
 				</div>
			</div>
			<div id="project-links-section-row" class="row">
				<div class="span11 section-heading">
					<div class="popover-holder pull-right">
						<a data-toggle="popover" data-placement="left" data-content="Do you and your work appear in other places on the internet? Link to any articles about you, other portfolios, your blogs, blog
                   reviews of you work, etc.">Help <i class="icon-info-sign icon"></i></a>
					</div>
					<h3>PROJECTS</h3>
					<p>Enter the title and link for web addresses that feature you and/or your work.</p>
				</div>
				<div class="span4 section">
					<div class="section-inner">
						<p>Prior Brigade Projects</p>
			        	<div class="input-group">
			        		<ul id="brigadeProjects">
			        			<? foreach ($member_data->prior_projects as $key => $value): ?>
			        			<li><?= $value->prior_project; ?></li>
			        			<? endforeach ?>
			        		</ul>
						</div>
					</div>
				</div>
				<div class="span4 section">
					<div class="section-inner">
						<p>Project Links</p>
			        	<ul id="projectLinks">
			        		<? foreach ($member_data->project_links as $key => $value): ?>
		        			<li data-id="<?= $value->member_project_links_id; ?>"><?= $value->project_title; ?></li>
		        			<? endforeach ?>
			        	</ul>
						<div id="project-links-menu" class="btn-group">
			                <button class="btn btn-primary btn-lg add-button" data-toggle="dropdown"><i class="icon-plus icon-white"></i></button>
			                <h4>Add a Link</h4>
			                <div class="dropdown-menu" roll="menu">
								<input type="text" class="form-control" placeholder="Title">
								<i class="icon-plus icon"></i>
			                </div>
		        		</div>
					</div>
				</div>
				<div class="span3 section project-links-details animated inactive">
					<div class="section-inner">
						<p>Title: <span data-id="title"></span></p>
						<div class="input-group" data-category="project_links">
							
							<input data-id="url" type="text" class="form-control" placeholder="Url">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="span11 section-heading">
					<div class="popover-holder pull-right">
						<a data-toggle="popover" data-placement="left" data-content="Tell us about your own work space and its capabilities. 
Write a few words describing how you prefer to work or what makes your setup unique.">Help <i class="icon-info-sign icon"></i></a>
					</div>
					<h3>HABITAT</h3>
				</div>
				<div class="span5 section">
					<div class="section-inner">
						<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Bandwidth Availability</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="bandwidth_id">
								<? foreach ($menus->bandwidths as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
			                </ul>
			        	</div>
						<div class="btn-group">
			                <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Working Style</a><span class="val"></span><span class="caret"></span></button>
			                <ul class="dropdown-menu" data-id="work_style_id">
								<? foreach ($menus->work_styles as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
							</ul>
			        	</div>
					</div>
				</div>
				<div class="span5 section">
					<div class="section-inner">
			        	<div class="btn-group">
							<button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Preferred Shift</a><span class="val"></span><span class="caret"></span></button>
							<ul class="dropdown-menu" data-id="preferred_shift_id">
								<? foreach ($menus->shifts as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
							</ul>
						</div>		
						<div class="btn-group">
							<button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><a>Preferred Platform</a><span class="val"></span><span class="caret"></span></button>
							<ul class="dropdown-menu multi-select" data-id="platform_id">
								<? foreach ($menus->platforms as $key => $value): ?>
			                  	<li data-id="<?= $value->id; ?>"><a><span class="checkbox-wrapper"><i class="icon-ok"></i></span><?= $value->name; ?></a></li>
			                  	<? endforeach ?>
							</ul>
						</div>			
					</div>
				</div>
				<div class="span6 section">
					<div class="section-inner">
			        	<div class="input-group">
							<textarea data-toggle="tooltip" title="Comments" data-id="comments" class="form-control" placeholder="Comments" rows="8"><?= $member_data->comments; ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="save-container" class="span11">
					<button onclick="main.submit()" type="button" class="btn btn-primary btn-lg btn-submit">Save</button>
				</div>
			</div>
		</div>
		<!-- end container -->

		 <? $this->load->view("footer_view"); ?>

		<script type="text/javascript">
			var user_id		= "<?= $user_id; ?>";
			var base_url	= "<?= base_url(); ?>";

			console.log("User Id : ", user_id);
			console.log("Base Url : ", base_url);
		</script>

		<script src="<?= base_url(); ?>js/vendor/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="<?= base_url(); ?>js/vendor/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" src="<?= base_url(); ?>js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>js/vendor/tag-it.js" charset="utf-8"></script>

		<script type="text/javascript" src="<?= base_url(); ?>js/member.js"></script>
		<script type="text/javascript">
			/*---------- Pre-populate data -------------------
			------------------------------------------------*/

			/* -- dropdown menus -- */

			data["country_id"] 				= {type:"dropdown-menu", value:"<?= $member_data->country_id; ?>"}; 
			data["state_id"] 				= {type:"dropdown-menu", value:"<?= $member_data->state_id; ?>"}; 
			data["team_size_id"] 			= {type:"dropdown-menu", value:"<?= $member_data->team_size_id; ?>"}; 
			data["work_style_id"] 			= {type:"dropdown-menu", value:"<?= $member_data->work_style_id; ?>"}; 
			data["bandwidth_id"] 			= {type:"dropdown-menu", value:"<?= $member_data->bandwidth_id; ?>"}; 
			data["preferred_shift_id"] 		= {type:"dropdown-menu", value:"<?= $member_data->preferred_shift_id; ?>"}; 
			data["employment_status_id"] 	= {type:"dropdown-menu", value:"<?= $member_data->employment_status_id; ?>"}; 
			data["im_account_type_id"] 		= {type:"dropdown-menu", value:"<?= $member_data->im_account_type_id; ?>"}; 

			/* -- multi-select -- */
			data["platform_id"]				= {type:"multi-select", value:String("<?= $member_data->platform_id; ?>").split(",")};

			/* -- specialties -- */
			<? foreach($member_data->specialties as $key=>$val): ?>
				var details = "<?=isset($val->details) ? $val->details : "";?>";
				var applications = "<?=isset($val->applications) ? $val->applications : "";?>";

				data["specialties"].value.push({
					id		:"<?=$val->specialty_id?>",
					fields	:{
						details: 			{type:"multi-select",value:details.split(",")},
						applications: 		{type:"multi-select",value:applications.split(",")},
						years_experience: 	{type:"number-selector",value:"<?=$val->years_experience;?>"},
						day_rate: 			{type:"number-selector",value:"<?=$val->day_rate;?>"},
						hourly_rate: 		{type:"number-selector",value:"<?=$val->hourly_rate;?>"}
					}
				});
			<? endforeach ?>

			/* -- project links -- */
			<? foreach($member_data->project_links as $key=>$val): ?>
				data["project_links"].value.push({
					id:'<?=$val->member_project_links_id?>',
					fields:{
						title: 	{type:"span",value:'<?=$val->project_title?>'},
						url: 	{type:"text-input",value:'<?=$val->project_url?>'}
					}
				});
			<? endforeach ?>
		</script>
	</body>
</html>
