<?php
require_once('config.php');
require_once('core/controller.Class.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to my app</title>



    <link href="assets/css/client-area.css" rel="stylesheet" type="text/css">
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://www.paypal.com/sdk/js?client-id=ASXOxT_QYitJ7b_XGNwbkDxO2mut8E5ufZR6K_5-xZ50PKM9C3Tp0wDdEF0a48JSWpaMy_gUbhnSv7Jd"></script>
</head>

<body style="background-color:#1b2a2f; height:100vh;" class=" preloader cursor-anim-enable landing-page">


    <!-- preloader-loading start -->
    <div class="preloader__logoload-box">
        <img class="preloader__logo" src="assets/images/global-images/logo/logo-white.svg" alt="logo">
        <div class="preloader__pulse"></div>
    </div>
    <!-- preloader-loading end -->


    <!-- pointer start -->
    <div class="pointer js-pointer" id="js-pointer">
        <i class="pointer__inner fas fa-long-arrow-alt-right"></i>
        <i class="pointer__inner fas fa-search"></i>
        <i class="pointer__inner fas fa-link"></i>
    </div><!-- pointer end -->

    <!-- header start -->
    <header class="fixed-header">

        <!-- logo start -->
        <div class="header-logo js-midnight-color js-headroom">
            <div class="hidden-box">
                <a href="/" class="header-logo__box js-pointer-large js-animsition-link">
                    <img class="header-logo__img white" src="assets/images/global-images/logo/logo-white.svg" alt="logo">

                    <img class="header-logo__img black" src="assets/images/global-images/logo/logo-black.svg" alt="logo">

                </a>
            </div>
        </div><!-- logo end -->

        <!-- menu-icon start -->
        <div class="menu-icon js-menu-open-close js-pointer-large js-midnight-color js-headroom">
            <div class="menu-icon__box">
                <span class="menu-icon__inner"></span>
                <span class="menu-icon__close"></span>
            </div>
        </div><!-- menu-icon end -->

    </header><!-- header end -->

    <!-- landing-nav start -->
    <nav class="landing-nav js-midnight-color" id="normal-nav">
        <ul class="landing-nav__flex">
            <li class="landing-nav__btn">
                <a href="/" class="landing-nav__inner js-smooth-scroll js-pointer-large">Home Page</a>
            </li>


            <li class="landing-nav__btn">
                <a href="our-blog" class="landing-nav__inner js-smooth-scroll js-pointer-large">Our blog</a>
            </li>


            <li class="landing-nav__btn">
                <a href="contact-us" class="landing-nav__inner js-smooth-scroll js-pointer-large">Contact Page</a>
            </li>
        </ul>
    </nav><!-- landing-nav end -->

    <!-- main start -->
    <main class="js-animsition-overlay" data-animsition-overlay="true">



        <div>
            <?php if(isset($_COOKIE['id']) && isset($_COOKIE['sess'])){
    
            $Controller = new Controller;
            if($Controller -> checkUserStatus($_COOKIE['id'], $_COOKIE['sess'])){
                
                echo $Controller -> printNavBar(intval($_COOKIE['id']));
                echo $Controller -> printPackageInfo(intval($_COOKIE['id']));
            }
            
        }else{ ?>


            <!-- pos-rel start -->
            <section id="up" class="pos-rel js-parallax-bg" style="background-image:url(assets/images/contact-us/header/header-1.jpg)">
                <!-- bg-overlay -->
                <div class="bg-overlay-black"></div>
                <!-- pos-rel start -->
                <div class="pos-rel flex-min-height-100vh">
                    <div class="padding-top-bottom-120 container small after-preloader-anim">


                        <form class="section-bg-dark-2" action='' method="POST">
                            <img src="assets/images/global-images/logo/logo-white.svg" alt="Brilliant Web Design Logo" class="js-pointer-large" style="max-width: 250px; margin: 0 auto; display: table;" />
                            <p id="incorrect-password">The email or password you entered<br /> is not correct, please try again.</p>
                            <div class="form-group">
                                <input class="js-pointer-large" required type="email" placeholder="Enter email" style="color:white; padding-left:8px;">
                                <br />
                                <input class="js-pointer-large" required type="password" placeholder="Enter your password" style="color:white; padding-left:8px;">
                            </div>

                            <br />

                            <br />
                            <div>
                                <a style="width:240px; height:40px;" class="border-btn js-pointer-large log-in-red-button">
                                    <span onclick="showDiv()" class="border-btn__inner" style=" display: flex; align-items: center; margin-left:35px; margin-top:-6px;">Sign in</span>
                                    <span class="border-btn__lines-1"></span>
                                    <span class="border-btn__lines-2"></span>
                                </a>
                            </div>



                            <div class="google-btn js-pointer-large margin-top-20" onclick="window.location = '<?php echo $login_url; ?>'">
                                <div class="google-icon-wrapper">
                                    <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                </div>
                                <div class="div-text">
                                    <p class="btn-text">Sign in with Google</p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div><!-- pos-rel end -->
            </section><!-- pos-rel end -->



        </div>
        <?php } ?>
    </main>
    <!-- scripts -->



    <script>
        const showDiv = async () => {
            setTimeout(function() {
                document.getElementById('incorrect-password').style.display = "block"
            }, 1000);
        }

    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=ASXOxT_QYitJ7b_XGNwbkDxO2mut8E5ufZR6K_5-xZ50PKM9C3Tp0wDdEF0a48JSWpaMy_gUbhnSv7Jd&currency=GBP" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            var shipping = 0;
            var itemOptions = document.querySelector("#smart-button-container #item-options");
            var quantity = parseInt();
            var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
            if (!isNaN(quantity)) {
                quantitySelect.style.visibility = "visible";
            }
            var orderDescription = 'Website Design & Development';
            if (orderDescription === '') {
                orderDescription = 'Item';
            }
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'blue',
                    layout: 'vertical',
                    label: 'checkout',

                },
                createOrder: function(data, actions) {
                    var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
                    var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
                    var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0) / 100));
                    if (quantitySelect.options.length > 0) {
                        quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
                    } else {
                        quantity = 1;
                    }

                    tax *= quantity;
                    tax = Math.round(tax * 100) / 100;
                    var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
                    priceTotal = Math.round(priceTotal * 100) / 100;
                    var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

                    return actions.order.create({
                        purchase_units: [{
                            description: orderDescription,
                            amount: {
                                currency_code: 'GBP',
                                value: priceTotal,
                                breakdown: {
                                    item_total: {
                                        currency_code: 'GBP',
                                        value: itemTotalValue,
                                    },
                                    shipping: {
                                        currency_code: 'GBP',
                                        value: shipping,
                                    },
                                    tax_total: {
                                        currency_code: 'GBP',
                                        value: tax,
                                    }
                                }
                            },
                            items: [{
                                name: selectedItemDescription,
                                unit_amount: {
                                    currency_code: 'GBP',
                                    value: selectedItemPrice,
                                },
                                quantity: quantity
                            }]
                        }]
                    });
                },
                onApprove: function(data) {
                    return fetch('/core/get-paypal-transaction', {
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    }).then(function(res) {
                        return res.json();
                    }).then(function(details) {
                        alert('Transaction approved by ' + details.payer_given_name);

                    });
                },
                onError: function(err) {
                    console.log(err);
                },
            }).render('#paypal-button-container ');
        }
        initPayPalButton();
    

    </script>


    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
