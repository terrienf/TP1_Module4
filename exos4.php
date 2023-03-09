<?php
if (isset($_POST['btnCalculer'])) {
    $prixHT = htmlspecialchars($_POST['prixHT']);
    $TVA = htmlspecialchars($_POST['TVA']);

    if (!$prixHT or !$TVA) {
        $messageErreur = 'Tous les champs doivent être remplis';

    }
    if ($prixHT and $TVA) {
        $montantTVA = round($_POST['prixHT'] * $_POST['TVA'] / 100, 2) . '€';
        $PrixTTC = round($_POST['prixHT'] * (1 + $_POST['TVA'] / 100), 2) . '€';
    }

    echo 'Voici le paramètre PRIX HT reçu: ' . $prixHT . '<br>';
    echo 'Voici le paramètre TVA reçu: ' . $TVA . '<br>';

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
    <title>Calcul des taxes</title>
</head>
<body>
<fieldset>
    <legend>Calcul des taxes</legend>
    <form action="exos4.php" method="post">
        <label>Prix HT : </label>
        <input type="number" id="idprixHT" name="prixHT" placeholder="Votre prix..." value="<?= isset($prixHT) ? $prixHT : '' ?>"><br><br>


        <label>TVA : </label>
        <input type="number" id="idTVA" name="TVA" placeholder="Votre TVA..." value="<?= isset($TVA) ? $TVA : '' ?>"><br><br>


        <input type="submit" value="Calculer" name="btnCalculer">
        <br>
        <label>Montant de la TVA : </label>
        <input type="text" value="<?= isset($montantTVA) ? $montantTVA : '' ?>" readonly>
        <br>
        <label>Prix TTC : </label>
        <input type="text" value="<?= isset($PrixTTC) ? $PrixTTC : '' ?>" readonly>

        <br>
        <?= isset($messageErreur) ? '<script>alert("Tous les champs doivent être remplis")</script>' : '' ?>
    </form>
</fieldset>

</body>
</html>
