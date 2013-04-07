<?
include("classes/class.phpmailer.php");
include("classes/class.smtp.php");
$name = $_POST['name'];
$lname = $_POST['last_name'];
$mailx = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$ocupation = $_POST['ocupation'];
$nationality = $_POST['nationality'];
$gender = $_POST['gender'];
$relationship = $_POST['relationship'];

foreach($_POST as $k => $v){
	print "$k ---> $v<br>";
}
///////////
include "CoockAPI/coock.sqlbuilder.basic.php";
include "CoockAPI/coock.users.php";

$userx = new User();
$userx->setUsername($username);
$userx->setName($name);
$userx->setLastName($lname);
$userx->setEmail($mailx);
$userx->setPassword(sha1(md5($password)));
$userx->setAddress("");
$userx->setIdOcupation($ocupation);
$userx->setIdNationality($nationality);
$userx->setIdGender($gender);
$userx->setIdRelationship($relationship);

$builder = new SQLBuilderBasic("users");
$users = new Users($builder);
$users->addUser($userx);
// print $builder->insert($userx->getParameters1())."<br>";
// print $builder->insert($userx->getParameters2())."<br>";

//print "o";
///////////
// print $mailx;


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "npthbot@gmail.com";
$mail->Password = "seriusly123botx";

$mail->From = "noreply@coockle.com";
$mail->FromName = "Coockle";
$mail->Subject = "Registro Exitoso";
$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
$html = <<<AAA
<body>
<div style="color : black ; font-size : 30px ;">Coockle</div>
<div style="color : black ; font-size : 14px ;">Hola $name $lname.</div>
<div style="color : black ; font-size : 14px ;">Se te ha registrado en el Sistema Coockle exitosamente, apartir de este momento puede iniciar sesion el <a href='http://coockle.rs.af.cm/login.php'>desde Aqui</a> con los datos que diste previamente.</div>
<div style="color : black ; font-size : 14px ;">Recuerda tus datos y de ser posible cambia tu password cada cierto tiempo para evitar problemas de seguridad, tambien se te recuerda que recibiras notificaciones por correo sobre lo sucesos importantes en el sistema.</div></body>
</body>
AAA;
$mail->MsgHTML($html);
$mail->AddAttachment("files/files.zip");
$mail->AddAttachment("files/img03.jpg");
$mail->AddAddress($mailx, "$name $lname");
$mail->IsHTML(true);
 
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "<script>window.location='login.php';</script>";
}

?>
