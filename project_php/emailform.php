<?php 

    $error = "";
    
    $success = "";

    if($_POST) {
        if(!$_POST["user"]) {
            $error .= "Name is Required <br>";
        }

        if(!$_POST["ph"]) {
            $error .= "Phone Number is Required  <br>";
        }

        if(!$_POST["email"]) {
            $error .= "Email address is Required <br>";
        }

        if(!$_POST["subject"]) {
            $error .= " The Subject is  Required <br>";
        }

        if(!$_POST["content"]) {
            $error .= " The Content is  Required <br>";
        }

        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "The email address is invalid.<br>";
        }

        if($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        }
        else {  
            $emailTo = "codestarsjpbaugh@gmail.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: " . $_POST['email'];

           
            if(mail($emailTo, $subject, $content, $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' . 
                                'we\'ll get back to you ASAP!</div>';
            }
            else {
                $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - try again later</div>';
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
          crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <H1>Lets Get to Know</H1>
        <div id="error"> <?php echo $error.$success;?> </div>
        
            <form method="post">
                <fieldset class="form-group">
                    <label for="Name">Enter your Name:</label>
                    <input type="text" class="form-control" style="display: inline-block; width: auto;" placeholder="Name" id="user">
                </fielset>

                <fieldset class="form-group">
                    <label for="Phone No">Your Contact Number:</label>
                    
                    <input type="text" class="form-control" style="display: inline-block; width: auto; margin-top: 5px;" placeholder="Enter Your Mobile Number" id="ph"><br>
                    <small class="text-muted">Enter a valid contact number</small>

                </fielset>

                <fieldset class="form-group">
                    <label for="email">Enter Email Address: </label>
                    <input type="text" class="form-control" placeholder="Enter your email address" name="email" id="email" >
                    <small class="text-muted">Enter a valid email </small>
                </fielset>

                <fieldset class="form-group">
                    <label for="email">Subject:</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </fielset>

                <fieldset class="form-group">
                    <label for="email">Content: </label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </fielset><br>

                <button class="btn btn-primary" id="submit" type="submit">Submit</button>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
                    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" 
                    crossorigin="anonymous">
            </script>
   
            <script type="text/javascript">

                $('form').submit(function(e){

                    let error="";

                    if($("#user").val() == ""){
                        error += "Enter Your Name and Submit <br>";
                    }

                    if($("#ph").val() == ""){
                        error += "Enter Your Contact Number and Submit <br>";
                    }

                    if($("#email").val() == ""){
                        error += "Enter Your Email id and Submit <br>";
                    }

                    if($("#subject").val() == ""){
                        error += "Enter the Subject and Submit <br>";
                    }

                    if($("#content").val() == ""){
                        error += "Enter the Content and Submit <br>";
                    }

                    if(error != ""){
                        $("#error").html('<div class = "alert alert-danger"' + 
                        'role="alert"><p><strong> There where Error(s) in your Form:</strong></p>' + error +'</div>');

                        return false;
                    }

                    else{
                        return true;
                    }

                });

            </script>
    </div>
    
</body>
</html>