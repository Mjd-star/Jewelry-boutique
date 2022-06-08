<?php
require_once './include/header_control.php';
require_once './include/header.php';
require_once './vendor/autoload.php';

$quantity = (isset($_SESSION['cart_items']['quantity']) &&  !empty($_SESSION['cart_items']['quantity']) ) ? $_SESSION['cart_items']['quantity']: 0;
?>

<section class="faq-section">
    <div class="container">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-md-6 offset-md-3">

                <div class="faq-title text-center pb-3">
                    <h2>Help Center</h2>
                </div>
            </div>

            <div class="col-md-6 offset-md-3">
                <div class="faq" id="accordion">
                    <div class="card">
                        <div class="card-header" id="faqHeading-1">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="true" aria-controls="faqCollapse-1">
                                    <span class="badge">1</span>How to sign up?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                            <div class="card-body">
                                <p>Go to the home page, then you will find a registration link,
                                    once you open it, it will show you a page with sign up, enter then
                                    your information. </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-2">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                                    <span class="badge">2</span> How to make the website remember me always?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                            <div class="card-body">
                                <p>Go to the log in page and enter your username and password, before clicking log in, check the box for remember me, by checking
                                    this box you will not need to enter your username and password
                                    everytime you visit our website.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-3">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                                    <span class="badge">3</span>How to ensure successful payment?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                            <div class="card-body">
                                <p>Once you are ready to pay and added your items to cart, choose the payment method and if a confirmation payment page popped up, that means you have payed successfully.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-4">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                                    <span class="badge">4</span> How many purchases I can make per a day?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                            <div class="card-body">
                                <p>Unlimited purchases per a day.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-5">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                                    <span class="badge">5</span> I couldn't receive my order code?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                            <div class="card-body">
                                <p> If you faced this issue, please contact our team ASAP.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-6">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                                    <span class="badge">6</span> How to contact Jewelry website?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-6" class="collapse" aria-labelledby="faqHeading-6" data-parent="#accordion">
                            <div class="card-body">
                                <p>Through the Contact Us page, you will find all of our contact information.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faqHeading-7">
                            <div class="mb-0">
                                <h5 class="faq-title" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                                    <span class="badge">7</span> It says that my E-mail is used even though it's the first time I sign up with this E-mail with the website?
                                </h5>
                            </div>
                        </div>
                        <div id="faqCollapse-7" class="collapse" aria-labelledby="faqHeading-7" data-parent="#accordion">
                            <div class="card-body">
                                <p>Make sure that your E-mail is not leaked first, then contact our team.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require_once './include/footer_control.php';
?>
