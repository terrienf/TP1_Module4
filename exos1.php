<?php
if (isset($_POST['btnValider'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $CP = htmlspecialchars($_POST['CP']);
    $ville = htmlspecialchars($_POST['ville']);


    if (!$nom or !$prenom or !$adresse or !$CP or !$ville) {
        $messageErreur = 'Tous les champs doivent être remplis';
    }


    echo 'Voici le paramètre NOM reçu: ' . $nom . '<br>';
    echo 'Voici le paramètre PRENOM reçu: ' . $prenom . '<br>';
    echo 'Voici le paramètre ADRESSE reçu : ' . $adresse . '<br>';
    echo 'Voici le paramètre CODE POSTAL reçu : ' . $CP . '<br>';
    echo 'Voici le paramètre VILLE reçu : ' . $ville . '<br>';


    $valeurRecues = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($_POST);

}
if (isset($_POST['btnValider2'])) {
    $mail = htmlspecialchars($_POST['mail']);

    echo 'Voici le paramètre MAIL reçu : ' . $mail . '<br>';

    $valeurRecues = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($_POST);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adresse Client</title>
</head>
<body>
<fieldset>
    <legend>Adresse Client</legend>
    <form action="exos1.php" method="post">
        <label>Nom : </label>
        <input type="text" id="idNom" name="nom"><br><br>


        <label>Prénom : </label>
        <input type="text" id="idPrenom" name="prenom"><br><br>


        <label>Adresse : </label>
        <input type="text" id="idAdresse" name="adresse"><br><br>


        <label>Code Postal : </label>
        <input type="text" id="idCP" name="CP"><br><br>


        <label>Ville : </label>
        <input type="text" id="idVille" name="ville"><br><br>


        <!--        --><?php //foreach ($langages as $indice => $valeur): ?>
        <!--            <option value="--><?php //=$indice?><!--">--><?php //=$valeur?><!--</option>-->
        <!---->
        <!--        --><?php //endforeach ;?>

        <input type="submit" value="Envoyer le formulaire" name="btnValider">
        <br>
        <br>
        <?= isset($messageErreur) ? '<script>alert("Tous les champs doivent être remplis")</script>' : '' ?>
    </form>
</fieldset>

<form action="exos1.php" method="post">
<fieldset>
    <legend>S'abonner</legend>
    <label>E-Mail : </label>
    <input type="text" id="idMail" name="mail"><input type="hidden" name="navigateur" value="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>"/><br><br>
    <input type="submit" value="Valider" name="btnValider2">
</fieldset

</form>
</body>
</html>
