<?php
db_host = "localhost";
db_user = "root";
db_pass = "motdepasse"; // change à ton mot de passe !
db_name = "globalauto";
admin_email = "contact@globalautoclub.fr";
header('Content-Type: application/json');
function get_post($key) { return isset($_POST[$key]) ? trim(htmlspecialchars($_POST[$key])) : ''; }
$errors = [];
inquiry_type = get_post('inquiry_type');
first_name = get_post('first_name');
last_name = get_post('last_name');
email = get_post('email');
phone = get_post('phone');
automotive_passion = get_post('automotive_passion');
message = get_post('message');
privacy_consent = isset($_POST['privacy_consent']) ? $_POST['privacy_consent'] : '';
if ($inquiry_type == '') $errors[] = "Type de demande requis.";
if ($first_name == '') $errors[] = "Prénom requis.";
if ($last_name == '') $errors[] = "Nom requis.";
if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email valide requis.";
if ($message == '') $errors[] = "Message requis.";
if (!$privacy_consent) $errors[] = "Consentement à la politique de confidentialité requis.";
if (count($errors)) { echo json_encode(["success"=>false,"errors"=>$errors]); exit; }
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) { echo json_encode(["success"=>false,"errors":["Erreur de connexion à la base de données."]]); exit; }
$stmt = $conn->prepare("INSERT INTO contact_inquiries (inquiry_type, first_name, last_name, email, phone, automotive_passion, message, consent, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("ssssssss", $inquiry_type, $first_name, $last_name, $email, $phone, $automotive_passion, $message, $privacy_consent);
if (!$stmt->execute()) { echo json_encode(["success"=>false,"errors":["Erreur lors de l'enregistrement du message."]]); $stmt->close(); $conn->close(); exit; }
$stmt->close();
$subject = "Nouvelle demande de contact/adhésion - Global Auto Club";
$body = "Type de demande: $inquiry_type\nPrénom: $first_name\nNom: $last_name\nEmail: $email\nTéléphone: $phone\nPassion auto: $automotive_passion\nMessage:\n$message\nConsentement: $privacy_consent";
@mail($admin_email, $subject, $body);
echo json_encode(["success"=>true]);
$conn->close();
?>