<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link href="<?= base_url(); ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>css/privacy.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

    
        <? $this->load->view("header_view"); ?>

		<div class="container">
			<div class="row">
				<div class="span10 offset1">
					<h2>Legal</h2>
					<p>Last Updated: May 21, 2012, 03:31PM EDT
				</div>
			</div>
			
			<div class="row">
				<div class="span10 offset1">
					<h5>Acceptance</h5>
                    <p>This site is operated by The Brigade. The Brigade is committed to protecting your privacy. Please read this Privacy Policy carefully. By submitting information, creating an account (an “Account”), utilizing our services (the “Services”) or otherwise accessing or using the The Brigade website (the “Website”), you acknowledge that you have read, accepted and consented to be bound by the practices and policies outlined herein. Our Privacy Policy is subject to change at any time. We will post any changes here, and any changes will become effective immediately upon being posted. Use of information we collect is subject to the Privacy Policy in effect at the time such information is collected. It is your responsibility to check periodically for any changes we may make to this Privacy Policy. Your continued use of the Website following the posting of any changes constitutes your unconditional acceptance of any such changes.</p>
                    <h5>What Personal Information is Collected by The Brigade?</h5>
                    <p>The types of Personal Information collected include, without limitation, your full name, address, phone number, website URL, e-mail address, blog or other personal website URL, your nickname or screen name, and any other information that would allow The Brigade to identify you or contact you if needed. We also may collect information you provide us when signing up for an Account and/or the Services, and information you provide when you contact us online (i.e., providing feedback, support queries, sales questions, etc.) or offline (i.e., phone or mail). The Personal Information you provide may be used: 
                        <br />
                        <br />• to provide you with requested information, content or the Services; 
                        <br />• to notify you about new product and service offerings; 
                        <br />• to enforce the Terms of Use of this Website and to address any problems or concerns we have regarding your use of the Website; 
                        <br />• to provide attribution to comments you post; and 
                        <br />• for internal purposes, such as system administration, marketing analysis, and to better operate the Website and deliver the Services.
                        <br />
                    <br />In addition, we may ask you to provide certain other information such as general demographic information, including, without limitation, age,gender, ZIP code, preferences and interests. The information we gather from our users enables us to personalize and improve the Services.</p>
                    <h5>Information Collected Automatically</h5>
                    <p>The Brigade may receive and store certain types of information whenever you use the Website and/or the Services. We may choose to automatically receive and record information on our server logs from your browser including your IP address, “cookies”, and the page you requested. We use “cookies” to store session information, for keeping your login/password information live (if you so choose) for your account, to limit multiple responses and registrations, to enhance website navigation, and to track and analyze usage patterns on the Website. Cookies are small text files a website uses to recognize repeat users, which are typically placed on your hard disk by a web page server. Cookies contain information that can later be read by a web server in the domain that issued the cookie to you. The way cookies function is by assigning a number to the user that has no meaning outside of the assigning website. The Brigade cannot control the use of cookies (or the resulting information) by our third-party partners or advertisers. Most web browsers automatically accept cookies, but you can usually modify your browser settings to decline cookies if you prefer. If you choose to decline cookies, you may not be able to sign in or use other interactive features of the Website and the Service that depend on cookies.</p>
                    <h5>Sharing of Personal Information</h5>
                    <p>Except as otherwise provided in this Privacy Policy, your personal information will be used only by The Brigade and its controlled subsidiaries and affiliates, and your Personal Information will not be disclosed to any other third party without your consent. The Brigade occasionally hires other companies to provide limited administrative and communication services on our behalf, such as hosting websites, the processing and delivery of mailings, providing customer support, or performing statistical analysis. Those companies will be permitted to obtain only such Personal Information as necessary for them to deliver the their services. Those companies are required to maintain the confidentiality of the Personal Information and are prohibited from using it for any other purpose. You hereby consent to our sharing of Personal Information for such purposes. The Brigade (or substantially all of its assets) may be acquired by, sold to, consolidated or merged with another entity. In such an event, user information is typically one of the business assets that is transferred. You acknowledge that such transfers may occur, and that such successor entities may continue to use your Personal Information as set forth in this Privacy Policy.</p>
                    <h5>E-mail Communications</h5>
                    <p>Upon registration for events and/or the Services provided by The Brigade, we may send you daily or weekly e-mails. If you do not wish to receive e-mail from us, please notify us by e-mail, including your full name, e-mail address and the specifics of your request. The Brigade may still contact you via e-mail for administrative or informational purposes, including messages regarding the administration of your account or regarding any events or Services for which you may have registered.</p>
                    <h5>Questions or Comments Regarding this Privacy Policy</h5>
                    <p>The Brigade welcomes any questions or comments you may have regarding this Privacy Policy, including questions about how we collect, maintain, use, or share your Personal Information. Any such questions or comments should be directed by e-mail to privacy@brigade.tv, or by mail to: 900 Broadway, Suite 805 New York NY, 10003.</p> 
                </div>
			</div>
		</div>

        <? $this->load->view("footer_view"); ?>

        <script>
            var _gaq=[['_setAccount','<?php echo GA_ACCOUNT; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
