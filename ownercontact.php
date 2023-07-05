
<?php

require_once 'config.php';
if(isset($_POST['submit'])) 
{

    if(!empty($_POST['name'])    && !empty($_POST['email'])   && !empty($_POST['subject'])  && !empty($_POST['message'])     ){
        
        $fullname = $_POST['name'];
        $phonenumber = $_POST['email'];
        $date = $_POST['subject'];
        $text= $_POST['message'];
        
        
        




        //var_dump($fullname,$email,$phonenumber);

        //Insert Data to database 
        $query = "insert into carowners(name,email,subject,message) values('$fullname' ,'$phonenumber','$date', '$text')"; 
     
       //run query
       $run = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));;

       //check if our query runs
       if ($run) {

        echo "<script>alert('your message has been sent successfully!.');</script>";
 
       }
       else {
        echo 'Data not  submitted';
       }
    }

    else {
        echo 'All fields are required';
    }

}


?>
    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">06</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Car Owner review</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                    <form method="post">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4 "name="name" placeholder="Your Name"  required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4"  name="email" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name="subject"  placeholder="Subject"  required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" name="message" placeholder="Message"   required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" name="submit" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Head Office</h5>
                                <p>Kimathi, Nairobi, Kenya</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Branch Office</h5>
                                <p>kimathi street, Nairobi, Kenya</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Customer Service</h5>
                                <p>customer@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Return & Refund</h5>
                                <p class="m-0">refund@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->