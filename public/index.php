<?php include '../controller/session.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="fr, en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Activation de l'indicatif spécial TM24H par le club de radio amateurs de la Sarthe ARAS-REF 72 dans le cadre de la course des 24 h du Mans chaque année.">
    <meta name="og: title" property="og: title" content="ARAS-REF 72 - Activation TM24H">
    <meta name="og: image" property="og: image" content="LogoTM24H.png">
    <title>ARAS-REF72 club radio amateur de la Sarthe - Activation TM24H</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="password.js" defer></script>
</head>
<body>
    <div class="container-grid">
        <div>
            <button class="button" onclick="window.location.href = 'https://aras72.r-e-f.org/';"><< Accueil / <em>Welcome</em></button>
            <button class="button" onclick="window.location.href ='index.php';">Rafraichir / <em>Refresh</em></button>
        </div>
        <div><h1>Activation TM24H</h1></div>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="form-activation" target="_top">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'];?>">
                <label for="callsign" class="labelform">Indicatif / <em>Call sign</em> : </label>
                <span><?php echo generateList("om_tm24h", "omtm24h", "callsign");?></span><br>
                <label for="pwd" class="labelform">Mot de passe / <em>Pwd</em> : </label>
                <span class="pwd-container">
                    <input type="password" name="pwd" id="pwd" class="input-form" value="<?php echo $_SESSION['pwd'];?>" required minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Minimum 8 caractères incluant : 1 majuscule + 1 minuscule + 1 chiffre + 1 caractère special (#?!@$%^&*-)." autocomplete="off">
                    <span class="password-icon">
                        <i data-feather="eye"></i>
                        <i data-feather="eye-off"></i>
                    </span>
                    <script src="https://unpkg.com/feather-icons"></script>
                    <script>feather.replace();</script>
                </span><br>
                <label for="band" class="labelform">Bande / <em>Band</em> : </label>
                <span><?php echo generateList("band_tm24h", "bandtm24h", "band");?></span><br>
                <label for="mode" class="labelform">Mode / <em>Mode</em> : </label>
                <span><?php echo generateList("mode_tm24h", "modetm24h", "mode");?></span><br>
                <label for="frequence" class="labelform">Fréquence / <em>Frequence</em> (MHz) : </label>
                <span><input type="number" step="0.0001" name="frequence" id="frequence" class="input-form" value="<?php echo $_SESSION['frequence'];?>" maxlength="9" pattern="^(?!)[0-9]{0,4}([\.,][0-9]{0,4}$"></span><br>
                <label for="status" class="labelform">Etat / <em>Status</em> : </label>
                <span><?php echo generateHtmlOptionList($liststatus, "status", "status", "input-form", "status");?></span><br>
                <label for="action" class="labelform">Action : </label>
                <span><?php echo generateHtmlOptionList($listaction, "action", "action", "input-form", "action");?></span><br>
                <input type="submit" class="button" value="Action"/>
            </form>
        </div>
        <div>
            <img src="LogoRadio.png" alt="Radio" class="pictures">
            <img src="LogoTM24H.png" alt="TM24H" class="pictures">
        </div>
    </div>
    <div>
        <h2>Liste des opérateurs autorisés à activer / <em>authorized operators list</em> (locator : JN07CX) : <br>
        <?php echo implode(", ", DataBaseTM24h::GetListBD("om_tm24h", "omtm24h"));?></h2><br>
        <?php include '../controller/action.php';?><br>
    </div>
</body>
<Footer>
    <p><a href="mailto:f4lucfr@gmail.com" >Contact IT : F4LUC</a><br>
    <a href="mailto:f5nyy1@gmail.com" >Responsable activation : F5NYY</a><br>
    Tous droits réservés ARAS-REF 72 ® / All rights reserved ARAS-REF 72 ©</p>
</Footer>
</html>