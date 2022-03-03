<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    header('Content-Type: text/html; charset=UTF-8');
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    $nomecompleto = htmlspecialchars(trim(strip_tags($_REQUEST['nomeCompleto'])), ENT_QUOTES, "ISO-8859-1");
    if ($nomecompleto == "")
        print "<p> O campo nome completo esta baleiro </p>";
    else
        print "<p> O campo nome completo é : $nomecompleto </p>";
    $nomeUsr = htmlspecialchars(trim(strip_tags($_REQUEST['nomeUsr'])), ENT_QUOTES, "ISO-8859-1");
    if ($nomeUsr == "")
        print "<p> O campo nome completo esta baleiro. e un campo obligatorio </p>";
    else
        print "<p> O campo nome usuario é : $nomeUsr </p>";


    $contrasinal = htmlspecialchars(trim(strip_tags($_REQUEST['contrasinal'])), ENT_QUOTES, "ISO-8859-1");
    if ($contrasinal == "") {
        print "<p> O campo ncontrasinal esta baleiro. e un campo obligatorio </p>";
    } else if (strlen($contrasinal) < 6) {
        print "<p> O campo contrasinal non ten o minimo de 6 caracteres </p>";
    } else {
        print "<p> O campo contrasinal é : $contrasinal </p>";
    }




    $idade = htmlspecialchars(trim(strip_tags($_REQUEST['idade'])), ENT_QUOTES, "ISO-8859-1");
    if ($idade == "") {
        print "<p> O campo idade esta baleiro.</p>";
    } else if ((int)$idade < 0 || (int)$idade > 130) {
        print "<p> O valor do campo idade non esta entre 0 e 130  </p>";
    } else {
        print "<p> O valor do campo idade e: $idade </p>";
    }



    $dNac = htmlspecialchars(trim(strip_tags($_REQUEST['dNac'])), ENT_QUOTES, "ISO-8859-1");
    if ($dNac == "") {

        print "<p> O campo data de nacemento esta baleiro.  </p>";
    } else {
        $partes_data = explode("/", $dNac);
        if (count($partes_data) == 3) {
            if (checkdate($partes_data[1], $partes_data[0], $partes_data[2])) {

                print "<p> O campo data nacemento é : $dNac </p>";
            } else {
                print "A data de nacemento non e valida </p>";
            }
        } else {

            print "<p> O campo nome usuario é : $dNac </p>";
        }
    }



    $email = htmlspecialchars(trim(strip_tags($_REQUEST['email'])), ENT_QUOTES, "ISO-8859-1");
    if ($email == "") {

        print "<p> O campo email esta baleiro. e un campo obligatorio </p>";
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        print "<p> O valor do campo email é : $nomeUsr </p>";
    } else {
        print "<p> O formato do email non e valido.  </p>";
    }






    $url = htmlspecialchars(trim(strip_tags($_REQUEST['url'])), ENT_QUOTES, "ISO-8859-1");
    if ($url == "") {

        print "<p> O url esta baleiro. e un campo obligatorio </p>";
    } else if (filter_var($url, FILTER_VALIDATE_URL)) {

        print "<p> O campo url é : $url </p>";
    } else {
        print "<p> O formato da URL non e valido.  </p>";
    }







    $ip = htmlspecialchars(trim(strip_tags($_REQUEST['ip'])), ENT_QUOTES, "ISO-8859-1");
    if ($ip == "") {

        print "<p> O campo ip esta baleiro. e un campo obligatorio </p>";
    } else if (filter_var($ip, FILTER_VALIDATE_IP)) {

        print "<p> O campo ip é : $nomeUsr </p>";
    } else {
        print "<p> O formato da IP non e valido.  </p>";
    }





    $hobbies = htmlspecialchars(trim(strip_tags($_REQUEST['hobbies'])), ENT_QUOTES, "ISO-8859-1");
    if ($hobbies == "")
        print "<p> O campo hobbies esta baleiro. e un campo obligatorio </p>";
    else
        print "<p> O campo hobbies é : $hobbies </p>";

    $rcbInfo = (isset($_REQUEST['rcbInfo']))
        ? htmlspecialchars(trim(strip_tags($_REQUEST['rcbInfo'])), ENT_QUOTES, "ISO-8859-1")
        : "";
    if ($rcbInfo == "")
        print "<p>Non se utilizou o control de recibir informacion </p>";
    else
        print "<p> O valor recibido do control de recibir informacion é : $rcbInfo </p>";

    $sexo = (isset($_REQUEST['sexos']))
        ? htmlspecialchars(trim(strip_tags($_REQUEST['sexos'])), ENT_QUOTES, "ISO-8859-1")
        : "";
    if ($sexo == "")
        print "<p>Non se utilizou o control sexo </p>";
    else
        print "<p> O valor recibido do control sexo é : $sexo </p>";

    $linguasEs = (isset($_REQUEST['linguasEs']))
        ? $_REQUEST['linguasEs']
        : "";
    if ($linguasEs == "")
        print "<p>Non se utilizou as linguas extranxeiras </p>";
    else {

        print "<p> Os valores recibidos do menu linguas extranxeiras é : <pre>";
        print_r($linguasEs);
        echo "</pre>";
    }

    $curriculo = (isset($_FILES['curriculo']))
        ? $_FILES['curriculo']
        : "";
    if ($curriculo == "")
        print "<p>Non se utilizou o control curriculo </p>";
    else {
        echo "<p> O nome e o tamaño do arquivo recibido no campo curriculo son: " . $curriculo["name"] . " e " . $curriculo["size"] . " bytes</p>";
        move_uploaded_file($curriculo["tmp_name"], "subidos/" . $curriculo["name"]);
    }






    ?>

</body>

</html>