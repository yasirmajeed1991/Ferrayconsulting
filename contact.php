<?php include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required ";
} else {
    $msg_subject = $_POST["msg_subject"];
}

// Phone Number
if (empty($_POST["phone_number"])) {
    $errorMSG .= "Number is required ";
} else {
    $phone_number = $_POST["phone_number"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "info@ferrayconsulting.com";

$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Subject: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Phone Number: ";
$Body .= $phone_number;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body);

// Update success message
    if ($success) {
      
        $errorMSG = '<h2 style="color:green">Your Query has been sent succesfully!</h2>';
    } else {
       
         $errorMSG = '<h2 style="color:red">There is a problem in sending query please try again later!</h2>';
    }


}




?>
        <!-- Start Page Title Area -->
        <div class="page-title-area item-bg-1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Contact</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Contact Area -->
        <section class="contact-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <span>Let's discuss</span>
                    <h2>Whatever question you have, please feel free to ask.</h2>
                    <h3><?php if(!empty($errorMSG)){echo $errorMSG;} ?></h3>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <div class="title">
                                <h3>Write Us</h3>
                            </div>
        
                            <form  Method="POST" action="contact.php">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Send message
                                            <span></span>
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="contact-side-box">
                            <div class="title">
                                <h3>Contact <?php echo $company?></h3>
                            </div>
        
                            

                            <div class="info-box">
                                <div class="icon">
                                    <i class="flaticon-pin"></i>
                                </div>
                                <h4>Address</h4>
                                <span><?php echo $address?></span>
                            </div>

                            <div class="info-box">
                                <div class="icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <h4>Phone</h4>
                                <span>
                                <a href="tel:<?php echo $phone?>"><?php echo $phone?></a>
                                </span>
                                
                            </div>

                            <div class="info-box">
                                <div class="icon">
                                    <i class="flaticon-email"></i>
                                </div>
                                <h4>Email</h4>
                                <span>
                                    <a href="mailto:<?php echo $email?>"><?php echo $email?></a>
                                </span>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->

        <!-- Start Map Area -->
        <div class="map">
            <div class="container-fluid">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.937741309466!2d-73.58669192349372!3d40.71938703716268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c27d95235ace57%3A0x30332ffdc330a34f!2s626%20RXR%20Plaza%2C%20Uniondale%2C%20NY%2011556%2C%20USA!5e0!3m2!1sen!2s!4v1692198481190!5m2!1sen!2s"></iframe>
            </div>
        </div>
        <!-- End Map Area -->
        
        <?php include 'footer.php';?>