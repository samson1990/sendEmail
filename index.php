
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>

    <link rel="stylesheet" href="./Bootstrap-4/CSS/bootstrap.min.css">
</head>
<body>

    <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
        <h2 class="footer-heading">SEND A MESSAGE</h2><hr>
        <form action="index.php" method="POST" class="contact-form">
            <div class="form-group">
                <input type="text" class="form-control" name="txt_name" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div class="form-group">
                <textarea id="" cols="30" name="body" rows="3" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" onclick="sendEmail()" name="btnSend" class="form-control btn-success btn submit px-3">Send</button>
            </div>
        </form>
    </div>
    
    <script src="./Bootstrap-4/J_query/jquery-3.5.1.js"></script>
    <script src="./Bootstrap-4/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function sendEmail() {
            // console.log('sending ...');
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");
    
            if (isNotEmpty(name) ** isNotEmpty(email) && isNotEmpty($subject) && isNotEmpty(body)){
                $.ajax ({
                    url: 'sendmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        body: body.val(),
                    }, success: function (response){
                        console.log(response);
                    }
                });
            }
    
            function isNotEmpty(caller){
                if  (caller.val() == "") {
                    caller.css('border', '1px solid red');
                    return false;
                }else {
                    caller.css ('border', '1px solid green');
                    return true;
                }  
            } 
        }
      </script>
      
</body>
</html>