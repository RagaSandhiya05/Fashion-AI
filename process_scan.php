// Email details
$designer_email = "designer@example.com"; // Replace with designer's email
$subject = "New User Measurement Scan Completed";
$body = "Hello Designer,\n\nUser $username has completed a new body scan.\nCheck the designer dashboard to view details.\n\nThanks,\nFashion Website";
$headers = "From: no-reply@fashionwebsite.com";

// Send email
mail($designer_email, $subject, $body, $headers);

