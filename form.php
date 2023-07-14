<?php
// Initialise un tableau vide $errors pour stocker les éventuelles erreurs de validation
$errors = [];

// Contient les noms des champs du formulaire en tant que clés et leurs libellés correspondants en tant que valeurs
$fields = [
    "bdate" => "Date of Event",
    "event" => "Time of Event",
    "artist" => "Select Artist",
    "description" => "Description of Event",
    "promo" => "Promoter's Name",
    "venue_name" => "Venue Name",
    "venue_address" => "Venue Address (Street address)",
    "city" => "City",
    "region" => "Region",
    "postal" => "Postal / Zip code",
    "country" => "Country",
    "capacity" => "Venue Capacity",
    "attendance" => "Expected Attendance",
    "performance" => "Type of Performance",
    "time" => "Set Time (in minutes)",
    "contact_firstname" => "Contact Person's First Name",
    "contact_lastname" => "Contact Person's Last Name",
    "email" => "Contact Email",
    "number" => "Contact Number",
    "recorded" => "Recording Selection"
];

// Fonction pour nettoyer et sécuriser une chaîne de caractères
function sanitizeString($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Fonction pour nettoyer et valider une adresse e-mail
function sanitizeEmail($input)
{
    return filter_var(trim($input), FILTER_SANITIZE_EMAIL);
}

// Fonction pour valider un champ de formulaire et ajouter une éventuelle erreur
function validateField($field, $label, &$errors)
{
    // Nettoie la valeur du champ
    $value = sanitizeString($_POST[$field] ?? '');

    if (empty($value)) {
        // Ajoute une erreur si le champ est vide
        $errors[$field] = $label . " is required.";
    } else {
        // Retourne la valeur nettoyée
        return $value;
    }
}

// Fonction pour valider l'adresse du lieu de l'événement
function validateVenueAddress(&$errors)
{
    // Récupère le libellé correspondant au champ 'venue_address'
    $label = $GLOBALS['fields']['venue_address'];

    // Nettoie les valeurs des sous-champs 'venue_address_1' et 'venue_address_2'
    $venueAddress1 = sanitizeString($_POST['venue_address_1'] ?? '');
    $venueAddress2 = sanitizeString($_POST['venue_address_2'] ?? '');

    if (empty($venueAddress1)) {
        // Ajoute une erreur si le champ 'venue_address_1' est vide
        $errors['venue_address_1'] = $label . " is required.";
    } else if (!preg_match('/^[A-Za-z0-9\s]{1,50}$/', $venueAddress1)) {
        // Ajoute une erreur si le champ 'venue_address_1' ne correspond pas au format attendu
        $errors['venue_address_1'] = $label . " should only contain alphanumeric characters.";
    }

    if (!empty($venueAddress2) && !preg_match('/^[A-Za-z0-9\s]{0,50}$/', $venueAddress2)) {
        // Ajoute une erreur si le champ 'venue_address_2' ne correspond pas au format attendu
        $errors['venue_address_2'] = "Venue Address line 2 should only contain alphanumeric characters.";
    }
}

// Fonction pour valider le formulaire
function validateForm()
{
    global $errors, $fields;

    // Vérifie si le formulaire a été soumis via la méthode POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        foreach ($fields as $field => $label) {
            if ($field === 'venue_address') {
                // Appelle la fonction de validation spécifique pour l'adresse du lieu de l'événement
                validateVenueAddress($errors);
            } else {
                // Appelle la fonction de validation générique pour les autres champs
                validateField($field, $label, $errors);
            }
        }

        // Validation de l'adresse e-mail
        $email = sanitizeEmail($_POST['email'] ?? '');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Ajoute une erreur si l'adresse e-mail est invalide
            $errors["email"] = "Invalid email format.";
        }
    }
}

// Validation du fichier uploadé
$uploadedFile = $_FILES['fileToUpload']['tmp_name'];

if (!empty($uploadedFile)) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile);

    if (strpos($mimeType, 'image/') === 0 || $mimeType === 'application/pdf') {
        // Le fichier est une image ou un PDF, vous pouvez ajouter ici la sauvegarde du fichier.
    } else {
        $errors["file"] = "Invalid file format. Only images and PDFs are allowed.";
    }
}

// Appelle la fonction de validation du formulaire
validateForm();

if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($errors)) {
    // Si le formulaire a été soumis et s'il n'y a pas d'erreurs, inclut le fichier 'success.php' pour afficher le résumé des informations
    include 'success.php';
} else {
    // Si le formulaire n'a pas été soumis ou s'il y a des erreurs, inclut le fichier 'formulaire.php' pour afficher le formulaire avec les éventuelles erreurs
    include 'formulaire.php';
}
?>