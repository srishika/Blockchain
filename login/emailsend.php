                        
<?php 
include 'validate2.php';
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-6.0.3/src/Exception.php';
require 'PHPMailer-6.0.3/src/PHPMailer.php';
require 'PHPMailer-6.0.3/src/SMTP.php';
$Email=$_REQUEST['Email'];
echo $Email;

class VerificationCode
{
    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $Email;
    public $code;
    
 


    public function __construct($Email)
    {    
        /**
         * Your email id  
         * For example : johndoe@gmail.com
         * contact@johndoe.com
         * 
         */
       $this->sender = "hanutiwari1178@gmail.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "Kccemsr@123";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->Email = $Email;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="smtp.gmail.com ";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;

    }
    public function sendMail(){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->smtpHost;   
        $mail->Port = $this->smtpPort;    
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body=$this->getHTMLMessage();
        $mail->Subject = "Your verification code is {$this->code}";
        $mail->SetFrom($this->sender,"Verification Codes");
        $mail->AddAddress($this->Email);
        if($mail->send()){
            header("Location: otp.php");
          exit;  
        }
        echo "FAILED TO SEND MAIL";
        // return false;
           
        

    }
    public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    }
    


    public function getHTMLMessage(){
        $this->code=$this->getVerificationCode();  
        $servername = "localhost";
        $username = "testuser";
        $password = "testpassword";
        $dbname = "loginpage";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO otp_expiry (otp)
        VALUES ($this->code)";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo $Email;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
     
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your verification code is {$this->code}</h1>
            <p>Use this code to verify your account.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

}

// pass your recipient's email
$vc=new VerificationCode($Email); 
$vc->sendMail(); // MAIL SENT SUCCESSFULLY

