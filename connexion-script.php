<?php
require 'template/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = $database->prepare("SELECT * FROM user WHERE mail = :mail");
    
    $query->execute([
        "mail" => $mail
    ]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User found, verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_mail'] = $user['mail'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_date'] = $user['creation'];
            header("Location: index.php");
            exit(); 
        } else {
            // mot de passe invalide
            $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        }

    } else {
        // utilisateur non trouvé
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!-- Display the error message if it exists -->
<?php if (isset($error_message)): ?>
    <div><?php echo $error_message; ?></div>
<?php endif; ?>