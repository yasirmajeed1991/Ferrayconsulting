<style>
    
    .form-control {
        color:black !important;
    }
    
</style>
<?php include 'header.php';
error_reporting('0');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = "";
    
    // Collect form data
    $loanAmount = $_POST["loanAmount"];
    $firstName = $_POST["firstName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $address = $_POST["address"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber = $_POST["phoneNumber"];
    $designation = $_POST["designation"];
    $purposeOfLoan = $_POST["purposeOfLoan"];
    $annualIncome = $_POST["annualIncome"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $alternateEmail = $_POST["alternateEmail"];
    $companyName = $_POST["companyName"];
    $companyAddress = $_POST["companyAddress"];
    $loanType = $_POST["loanType"];
    
    $EmailTo = "info@ferrayconsulting.com";
    $Subject = "New Query Received";
    
    // Prepare email body text
    $Body = "Loan Application Form Submitted:\n\n";
    $Body .= "Loan Amount: $loanAmount\n";
    $Body .= "First Name: $firstName\n";
    $Body .= "Last Name: $lastName\n";
    $Body .= "Date of Birth: $dateOfBirth\n";
    $Body .= "Address: $address\n";
    $Body .= "Email Address: $emailAddress\n";
    $Body .= "Phone Number: $phoneNumber\n";
    $Body .= "Designation: $designation\n";
    $Body .= "Purpose of Loan: $purposeOfLoan\n";
    $Body .= "Annual Income: $annualIncome\n";
    $Body .= "Gender: $gender\n";
    $Body .= "Alternate Email: $alternateEmail\n";
    $Body .= "Company Name: $companyName\n";
    $Body .= "Company Address: $companyAddress\n";
    $Body .= "Loan Type: $loanType\n";
    
    // Send email
    $success = mail($EmailTo, $Subject, $Body);
    
    // Update success message
    if ($success) {
      
        $message = '<h2 style="color:green">Your Query has been sent succesfully!</h2>';
    } else {
       
         $message = '<h2 style="color:red">There is a problem in sending query please try again later!</h2>';
    }
}



?>


  <!-- Start Page Title Area -->
        <div class="page-title-area item-bg-1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Apply now</h2>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li>Apply now</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Apply Area -->
        <section class="apply-area ptb-100">
            <div class="container">
                <div class="apply-title">
                    <h3>Loan Application</h3>
                    <?php if(!empty($message)){echo $message;}?>
                </div>

                <div class="row apply-form" >
                    <div class="col-lg-6">
                        <form  Method="POST" action="apply-now.php">
                            <div class="form-group">
                                <label>Desired Loan Amount $</label>
                                <input type="text" name="loanAmount" placeholder="$" type="number" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" name="firstName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dateOfBirth" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="emailAddress" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phoneNumber" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Purpose of Loan</label>
                                <input type="text" name="purposeOfLoan" class="form-control">
                            </div>
                       
                    </div>

                    <div class="col-lg-6">
                        
                            <div class="form-group">
                                <label>Annual Income $</label>
                                <input type="text"  name="annualIncome" placeholder="$" type="number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" name="lastName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <div class="select-box">
                                    <select class="form-control" name="gender">
                                        <option value="5">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alternative Email Address</label>
                                <input type="text" name="alternateEmail" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" name="companyName" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Company Address</label>
                                <input type="text" name="companyAddress" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Choose here</label>
                                <div class="select-box">
                                    <select class="form-control" name="loanType">
                                        <option value="Business loan">Business loan</option>
                                        <option value="Unsecured Business Credit Card">Unsecured Business Credit Card</option>
                                        <option value="Fix and FLip Loan">Fix and FLip Loan</option>
                                        <option value="New construction">New construction</option>
                                        <option value="Rental">Rental</option>
                                        <option value="Multi-family">Multi-family</option>
                                    </select>
                                </div>
                            </div>
                       
                    </div>
                </div>

                <div class="apply-btn">
                    <button type="submit" class="default-btn">
                        Apply now
                        <span></span>
                    </button>
                </div>
                </form>
            </div> 
        </section>
        <!-- End Apply Area -->
        <?php include 'footer.php'?>