<?php

class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=brilliant_web_design", 'root', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}


class Controller {
    
            // Print nav and my details to the screen
    function printNavBar($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT f_name,l_name,avatar,email FROM users WHERE id=:id");
        $user -> execute([
            ':id'=> intval($id)
        ]);

        $content = '';

        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
            $content .= '
            <nav class="sidenav">
                <section>
                    <img class="js-pointer-large" src="'.$userInfo["avatar"].'" alt="User Avatar" />
                    <h3>Hi, <br />  '.$userInfo["f_name"].' '.$userInfo["l_name"].'</h3>
                    <a href="http://localhost/good-website-login/log-in.php" class="js-pointer-large">My details</a>
                    <a href="http://localhost/good-website-login/my-payments.php" class="js-pointer-large">My package</a>
                    <a href="http://localhost/good-website-login/website-content.php" class="js-pointer-large">My content</a>
                    <a href="logout.php" class="js-pointer-large">Log Out</a>
                </section>
            </nav>';
        }
        $content .= '';
        return $content;
    }
    
    
    
    
    
        // Print nav and my details to the screen
    function printUserDetails($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT f_name,l_name,avatar,email,contact_number FROM users WHERE id=:id");
        $user -> execute([
            ':id'=> intval($id)
        ]);
        

        $content = '<section>';
        
        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
             $content .= ' 
            <section id="my-details">
            
            			<!-- pricing start -->
			<section class="pos-rel section-bg-dark-2" style="margin-top:100px;margin-bottom:250px;">
            
				<!-- pos-rel start -->
				<div class="pos-rel padding-top-bottom-40">
					<!-- title start -->
					<h2 class="headline-xxl text-center js-scrollanim">
						<span class="anim-text-double-fill invert" data-text="My">My</span>
						<span class="anim-text-double-fill tr-delay-02" data-text="Details">Details</span>
					</h2><!-- title end -->

					<!-- container start -->
					<div class="container small padding-top-30">
                    
						<!-- price start -->
						<div class="padding-top-60">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">First name:</h2>
									</div>
								</div>
								<div class="six-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["f_name"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>
							</div>
						</div><!-- price end -->

						<!-- price start -->
						<div class="padding-top-60">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Last name:</h2>
									</div>
								</div>
								<div class="six-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["l_name"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>

							</div>
						</div>
                        <!-- price end -->

						<!-- price start -->
						<div class="padding-top-60">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Email address:</h2>
									</div>
								</div>
								<div class="six-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["email"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>

							</div>
						</div>
                        <!-- price end -->
                        
                        <!-- price start -->
						<div class="padding-top-60">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Contact number:</h2>
									</div>
								</div>
								<div class="six-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["contact_number"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>

							</div>
						</div><!-- price end -->
                        
                        
                        
                        <form  action="add-contact-number.php" method="POST">
                            <!-- price start -->
                            <div class="padding-top-60">
                                <div class="flex-container border-box border-radius-10px hidden-box">
                                        <div class="three-columns content-bg-red d-flex flex-center-center">

                                            <div class="text-center padding-top-bottom-20">
                                                <h2 class="subhead-m">Update contact number:</h2>
                                            </div>
                                        </div>

                                        <div class="six-columns d-flex flex-align-center">
                                            <div class="width-100perc padding-top-bottom-20">
                                                <!-- list start -->
                                                <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
                                                    <li class="list__item">
                                                        <input id="contact_number" name="contact_number" style="height:40px; width:70%;font-family: "Montserrat", sans-serif; font-weight: 700; color:white;" class="js-pointer-large" required type="text" placeholder="Enter your contact number"/>
                                                        <input type="hidden" id="email" name="email" value="'.$userInfo["email"].'">
                                                    </li>

                                                </ul><!-- list end -->
                                            </div>
                                        </div>

                                        <div class="three-columns d-flex flex-center-center">
                                            <div class="price-btn-offset text-center">
                                                <button type="submit" class="skew-btn js-pointer-large">
                                                     <span class="skew-btn__box">
                                                        <span class="skew-btn__content">Update number</span>
                                                        <span class="skew-btn__arrow"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- price end -->
                        </form>
                        </div>
                        </div>
            </section>
        </section>
            ';
        }
        return $content;
    }
    
    
    
    // Print nav and my details to the screen
    function printPackageInfo($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT package_name,package_cost,deposit,left_to_pay FROM users WHERE id=:id");
        $user -> execute([
            ':id'       => intval($id)]);
        $content = '<table style="margin-left:300px;">';

        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
            
            $content .= '<section id="my-details">
            			<!-- pricing start -->
			<section class="pos-rel section-bg-dark-2" style="margin-top:100px;">
            
				<!-- pos-rel start -->
				<div class="pos-rel padding-top-bottom-40">
					<!-- title start -->
					<h2 class="headline-xxl text-center js-scrollanim">
						<span class="anim-text-double-fill invert" data-text="My">My</span>
						<span class="anim-text-double-fill tr-delay-02" data-text="Package">Package</span>
					</h2><!-- title end -->

					<!-- container start -->
					<div class="container small padding-top-30">
                    
						<!-- price start -->
						<div class="padding-top-60 twelve-columns flex-align-center">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">My package:</h2>
									</div>
								</div>
								<div class="nine-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["package_name"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>
							</div>
						</div><!-- price end -->

						<!-- price start -->
						<div class="padding-top-60 twelve-columns flex-align-center">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Package cost:</h2>
									</div>
								</div>
								<div class="nine-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["package_cost"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>

							</div>
						</div><!-- price end -->
                        
						<!-- price start -->
						<div class="padding-top-60 twelve-columns flex-align-center">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
                                
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Paid so far:</h2>
									</div>
								</div>
								<div class="nine-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-20">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											<li class="list__item"><h3>'.$userInfo["deposit"].'</h3></li>
										</ul><!-- list end -->
									</div>
								</div>

							</div>
						</div><!-- price end -->
                        
						<!-- price start -->
						<div class="padding-top-60 twelve-columns flex-align-center">

							<div class="flex-container border-box border-radius-10px hidden-box">
                            
								<div class="three-columns content-bg-red d-flex flex-center-center">
									<div class="text-center padding-top-bottom-20">
										<h2 class="subhead-m">Pay with PayPal:</h2>
									</div>
								</div>
                                
								<div class="nine-columns flex-align-center">
									<div class=" padding-top-bottom-20">

                                            
									</div>
								</div>
                                
							</div>

						</div><!-- price end -->
            </section>';
        }
        $content .= '</table>';
        
        $content .= '
                <!-- pricing start -->
        <section id="pricing" class="pos-rel section-bg-dark-2">
            <!-- pos-rel start -->
            <div class="pos-rel padding-top-bottom-120">
                <!-- title start -->
                <h2 class="headline-xxl text-center js-scrollanim">
                    <span class="anim-text-double-fill invert" data-text="Pricing">Pricing</span>
                    <span class="anim-text-double-fill tr-delay-02" data-text="Table">Table</span>
                </h2><!-- title end -->

                <!-- flex-container start -->
                <div class="container flex-container flex-justify-center padding-top-30">
                    <!-- column start -->
                    <div class="three-columns column-50-100 padding-top-60">
                        <div class="column-l-r-margin-10 price-top-offset content-bg-dark-2 border-box border-radius-10px hidden-box">
                            <div class="text-center content-bg-red">
                                <h3 class="subhead-m padding-top-bottom-20">Basic</h3>
                            </div>
                            <h4 class="text-center padding-top-20">
                                <span class="headline-l"> &pound;375</span><br>
                            </h4>
                            <!-- accordion start -->
                            <div class="accordion accordion_underline js-accordion js-accordion-first-active margin-left-right-20 margin-top-bottom-50">

                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Website Design</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">1 - 3 pages </li>
                                            <li class="list__item check red">Responsive web design</li>
                                            <li class="list__item check red">Slideshow animation </li>
                                            <li class="list__item check red">Simple and clean website design</li>
                                            <li class="list__item check red">Secure contact form</li>
                                            <li class="list__item x opacity-05">Testimonial carousel</li>
                                            <li class="list__item x opacity-05">Modern animations</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Hosting &amp; Domain</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">12 months FREE hosting</li>
                                            <li class="list__item check red">FREE domain name .co.uk</li>
                                            <li class="list__item check red">FREE SSL Certificate included</li>
                                            <li class="list__item check red">1 business emails</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Search Engine Optimisation</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Page submission to Google &amp; Bing</li>
                                            <li class="list__item check red">Links to social media</li>
                                            <li class="list__item x opacity-05">Premium on-page SEO optimisation</li>
                                            <li class="list__item x opacity-05">Google Analytics</li>
                                            <li class="list__item x opacity-05">Google Maps Listing</li>
                                            <li class="list__item x opacity-05">First page of Google for local search</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Content &amp; Branding</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Main page 500 words</li>
                                            <li class="list__item check red">10 FREE pictures</li>
                                            <li class="list__item x opacity-05">Logo design</li>
                                            <li class="list__item x opacity-05">Social Covers with Logo</li>
                                            <li class="list__item x opacity-05">Email Signature with Logo</li>
                                            <li class="list__item x opacity-05">PDF invoice with Logo</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                            </div><!-- accordion end -->

                        </div>
                    </div><!-- column end -->

                    <!-- column start -->
                    <div class="three-columns column-50-100 padding-top-40">
                        <div class="column-l-r-margin-10 border-box content-bg-dark-2 border-radius-10px hidden-box">
                            <div class="text-center content-bg-red">
                                <h3 class="subhead-s padding-top-bottom-20">Premium</h3>
                            </div>
                            <h4 class="text-center padding-top-20">
                                <span class="headline-l"> &pound;575</span><br>
                            </h4>
                            <!-- accordion start -->
                            <div class="accordion accordion_underline js-accordion js-accordion-first-active margin-left-right-20 margin-top-bottom-50">
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Website Design</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">1 - 6 pages </li>
                                            <li class="list__item check red">Responsive web design</li>
                                            <li class="list__item check red">Slideshow animation </li>
                                            <li class="list__item check red">Eye-catching modern design</li>
                                            <li class="list__item check red">Secure Contact Form</li>
                                            <li class="list__item check red">Testimonial carousel</li>
                                            <li class="list__item check red">Modern animations</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Hosting &amp; Domain</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">12 months FREE hosting</li>
                                            <li class="list__item check red">FREE domain name .co.uk</li>
                                            <li class="list__item check red">FREE SSL Certificate included</li>
                                            <li class="list__item check red">Up to 10 business emails</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Search Engine Optimisation</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Page submission to Google &amp; Bing</li>
                                            <li class="list__item check red">Links to social media</li>
                                            <li class="list__item check red">Premium on-page SEO optimisation</li>
                                            <li class="list__item check red">Google Analytics</li>
                                            <li class="list__item check red">Google Maps Listing</li>
                                            <li class="list__item check red">First page of Google for local search</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Content &amp; Branding</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Main page 1000 words</li>
                                            <li class="list__item check red">20 FREE pictures</li>
                                            <li class="list__item check red">Logo design</li>
                                            <li class="list__item check red">Social Covers with Logo</li>
                                            <li class="list__item check red">Email Signature with Logo</li>
                                            <li class="list__item check red">PDF invoice with Logo</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->

                            </div><!-- accordion end -->

                        </div>
                    </div><!-- column end -->
                    
                    
                    
                    
                    
                            
                            
                    
                    
                    <!-- column start -->
                    <div class="three-columns column-50-100 padding-top-60">
                        <div class="column-l-r-margin-10  content-bg-dark-2 price-top-offset border-box border-radius-10px hidden-box">
                            <div class="text-center content-bg-red">
                                <h3 class="subhead-m padding-top-bottom-20">E-commerce</h3>
                            </div>
                            <h4 class="text-center padding-top-bottom-20">
                                <span class="headline-l"> &pound;975</span><br>
                            </h4>
                            <!-- accordion start -->
                            <div class="accordion accordion_underline js-accordion js-accordion-first-active margin-left-right-20 margin-top-bottom-50">
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Web Design</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">1 - 3 pages </li>
                                            <li class="list__item check red">Up to 30 products </li>
                                            <li class="list__item check red">Responsive web design</li>
                                            <li class="list__item check red">Slideshow animation </li>
                                            <li class="list__item check red">Eye-catching modern design</li>
                                            <li class="list__item check red">Testimonial carousel</li>
                                            <li class="list__item check red">Modern animations</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Hosting &amp; Domain</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">24 months FREE hosting</li>
                                            <li class="list__item check red">FREE domain name .co.uk</li>
                                            <li class="list__item check red">FREE SSL Certificate included</li>
                                            <li class="list__item check red">Up to 10 business emails</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Search Engine Optimisation</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Page submission to Google &amp; Bing</li>
                                            <li class="list__item check red">Links to social media</li>
                                            <li class="list__item check red">Premium on-page SEO optimisation</li>
                                            <li class="list__item check red">Google Analytics</li>
                                            <li class="list__item check red">Listing Google Maps</li>
                                            <li class="list__item check red">Digital Visibility</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h6 class="accordion__btn-title headline-xxxxs">Content &amp; Branding</h6>
                                    </div>
                                    <div class="accordion__content js-accordion-content">
                                        <!-- list start -->
                                        <ul class="list list_center subhead-xxs text-color-b0b0b0 margin-top-10">
                                            <li class="list__item check red">Main page 1000 words</li>
                                            <li class="list__item check red">20 FREE pictures</li>
                                            <li class="list__item check red">Logo design</li>
                                            <li class="list__item check red">Social Covers with Logo</li>
                                            <li class="list__item check red">Email Signature with Logo</li>
                                            <li class="list__item check red">PDF invoice with Logo</li>
                                        </ul><!-- list end -->
                                    </div>
                                </div><!-- accordion__tab end -->
                            </div><!-- accordion end -->

                        </div>
                    </div><!-- column end -->
                    
                     <!-- Checkout start -->
                    <div class="three-columns column-50-100 padding-top-60">
                        <div class="column-l-r-margin-10 content-bg-dark-2 price-top-offset border-box border-radius-10px hidden-box">
                            <div class="text-center content-bg-red">
                                <h3 class="subhead-m padding-top-bottom-20">Checkout</h3>
                            </div>
                            <h4 style="padding:20px;">
                               Order Summary
                            </h4>
                            <!-- accordion start -->
                            <div class="accordion accordion_underline js-accordion js-accordion-first-active margin-left-right-20 margin-top-bottom-50">
                            
                            <h5 style="padding:10px;">Package name: Premium </h5>
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h5>Package cost: £475 </h5>
                                    </div>

                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">
                                        <h5>SSL Certifiacte: Included </h5>
                                    </div>

                                </div><!-- accordion__tab end -->
                                <!-- accordion__tab start -->
                                <div class="accordion__tab js-accordion-tab">
                                    <div class="accordion__btn js-accordion-btn js-pointer-large">

                                    </div>

                                  
                                                <div style="text-align: center;">
                                                    <div style="margin-bottom: 0.9rem;">
                                                        <p style="margin-bottom: 0.5rem;">Website Design & Development</p>
                                                        <select class="js-pointer-large" id="item-options" style="padding:10px;">
                                                            <option value="Basic" price="375">Basic - 375 GBP</option>
                                                            <option value="Premium" price="575">Premium - 575 GBP</option>
                                                            <option value="Gold" price="775">Gold - 775 GBP</option>
                                                        </select>
                                                        <select style="visibility: hidden" id="quantitySelect"></select>
                                                    </div>
                                                    <div class="js-pointer-large" id="paypal-button-container"></div>
                                                </div>
                                     

                        </div>
                    </div><!-- column end -->
                    
                    
                    
                    

                </div><!-- flex-container end -->


            </div><!-- pos-rel end -->
        </section><!-- pricing end -->
        ';
        return $content;
    }
    
    // Print nav and my details to the screen
    function printBusinessInfo($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT * FROM users WHERE id=:id");
        $user -> execute([':id'=> intval($id)]);
        $content = '<table class="table" style="margin-left:300px;">';
        
        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
            $content .= '<section style="margin-left:300px;">
            </section>

            <section id="my-business-info">
            
            <!-- pricing start -->
			<section class="pos-rel section-bg-dark-2" style="margin-top:100px; ">
				<!-- pos-rel start -->
				<div class="pos-rel padding-top-bottom-20">
					<!-- title start -->
					<h2 class="headline-xxl text-center js-scrollanim">
						<span class="anim-text-double-fill invert" data-text="Submit ">Submit </span>
						<span class="anim-text-double-fill tr-delay-02" data-text="Content">Content</span>
					</h2><!-- title end -->

					<!-- container start -->
					<div class="container small padding-top-10">
                                
                    <form action="create.php" method="POST" class="flex-container padding-top-10" >
                    
                        <!-- column start -->
                        <div class="four-columns">
                            <div class="column-r-margin-10 padding-top-90">
                                <input type="text" id="section_title" name="section_title" placeholder="Enter section title" required class="form-input padding-top-90 js-pointer-large">
                            </div>
                        </div><!-- column end -->
                        

                        <!-- column start -->
                        <div class="twelve-columns">
                            <textarea type="text" id="section_text" name="section_text" placeholder="Enter section content" required class="form-input js-pointer-large"></textarea>
                            
                            <input type="hidden" id="f_name" name="f_name" value="'.$userInfo["f_name"].'">
                            <input type="hidden" id="l_name" name="l_name" value="'.$userInfo["l_name"].'">
                            <input type="hidden" id="email" name="email" value="'.$userInfo["email"].'">
                        </div><!-- column end -->
                        
                        <!-- column start -->
                        <div class="twelve-columns text-center padding-top-90">
                            <button type="submit" class="border-btn js-pointer-large">
                                <span class="border-btn__inner">add content</span>
                                <span class="border-btn__lines-1"></span>
                                <span class="border-btn__lines-2"></span>
                            </button>
                        </div><!-- column end -->
                    </form><!-- flex-container end -->
                    
            </section>
             <section style="margin-top:700px;margin-left:300px;">
      
             </section>';
        }
        $content .= '</table>';
        return $content;
    }
    
            // Print content to the screen
    function printContent($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT section_title,section_text FROM content INNER JOIN users ON content.email=users.email");
        $user -> execute([]);

        $content = ' <!-- pricing start -->
			<section class="pos-rel section-bg-dark-2" style="margin-top:-500px;margin-bottom:300px;">
            				<!-- pos-rel start -->
				
					<!-- title start -->
					<h2 class="headline-xxl text-center js-scrollanim">
						<span class="anim-text-double-fill invert" data-text="Website">Website</span>
						<span class="anim-text-double-fill tr-delay-02" data-text="Content">Content</span>
					</h2><!-- title end -->
            ';

        while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
            
            $content .= '
                <div class="pos-rel padding-top-bottom-20">
                    <!-- container start -->
					<div class="container small padding-top-bottom-60 flex-center-center ">
						<!-- js-scrollanim start -->
						<div class="js-scrollanim">
							<h3 class="headline-xs hidden-box text-color-red padding-top-bottom-20" style="text-transform: uppercase;">
								<span class="anim-slide tr-delay-02">'.$userInfo["section_title"].'</span>
							</h3>
							<p class="body-text-m margin-top-20 anim-text-reveal tr-delay-04">'.$userInfo["section_text"].'</p>
						</div><!-- js-scrollanim end -->
					</div><!-- container end -->';
        }
        return $content;
    }
    
    
    
       function makeDatabaseName($id){
        $db = new Connect;
        $user = $db -> prepare("SELECT f_name,l_name FROM users WHERE id=:id");
        $user -> execute([':id'=> intval($id)]);
           
        // needs modified if two people with the same name then it will create problems
         while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
         $name = ''.$userInfo["f_name"].''.$userInfo["l_name"].'';
         }

       return $name;
   }
    
        // check if user is logged in
    function checkUserStatus($id, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT id FROM users WHERE id=:id AND session=:session");
        $user -> execute([':id'       => intval($id),
                          ':session'  => $sess]);
        
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
        if(!$userInfo["id"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    

    
    
        // function for generating password and login session
    function generateCode($length){
		$chars = "vwhgtsABCD02837";
		$code = ""; 
		$clean = strlen($chars) - 1;
		while (strlen($code) < $length){ 
			$code .= $chars[mt_rand(0,$clean)];
		}
		return $code;
    }
    
    function orderData($orderdetails){
        console.log($orderdetails);
    }
    
    
    
    
    // insert data in database
        function insertData($data){
        $db = new Connect;
        $checkUser = $db -> prepare("SELECT * FROM users WHERE email=:email");
        $checkUser -> execute(['email' => $data['email']]);

        $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
                                       
        if(!$info["id"]){
            $session = $this->generateCode(10);
            $insertUser = $db -> prepare("INSERT INTO users (f_name, l_name, avatar, email, password, session) VALUES (:f_name, :l_name, :avatar, :email, :password, :session)");
            $insertUser -> execute([
                ':f_name'   => $data["givenName"],
                ':l_name'   => $data["familyName"],
                ':avatar'   => $data["avatar"],
                ':email'    => $data["email"],
                ':password' => $this->generateCode(5),
                ':session'  => $session
            ]);
            
            if($insertUser){
                setcookie("id", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);
                header('Location: log-in.php');
                exit();

            }else{
                return "Error inserting user!";
                            header('Location: log-in.php');
            exit();
            }
        }else{
            setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info["session"], time()+60*60*24*30, "/", NULL);
            header('Location: log-in.php');
            exit();
        }
    }
}
?>
