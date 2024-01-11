<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

// if(!isset($_SESSION['id'])){
//     header('Location:connexion.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Accueil</title>
</head>
<body>
    <nav>
        <?php
        include('navbar.php');
        ?>
    </nav>
    <main>
    <div id="lorem">
        <p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra sed libero ac vulputate. Vestibulum lacus metus, porttitor vel maximus ac, accumsan id velit. Aenean a massa vitae purus dapibus feugiat at non urna. Vivamus nec nulla nec urna ullamcorper vulputate. Nulla facilisi. Integer porttitor aliquam ipsum, at elementum nunc tempor aliquam. Quisque et risus et eros porttitor ornare. Proin mattis ac purus viverra convallis. Sed sed tincidunt urna. Nam a lacus purus. In vel tortor finibus, elementum sem eu, lobortis ex.
Mauris libero ligula, dignissim sit amet convallis id, consequat at arcu. Donec rhoncus mauris in nibh finibus, nec placerat diam viverra. Morbi augue sapien, commodo in turpis eget, sollicitudin vehicula massa. Praesent suscipit enim in diam volutpat accumsan. Nulla iaculis rhoncus leo, ac ultrices lacus cursus ac. Nunc placerat semper velit eget convallis. Sed blandit elementum lacus, vel placerat tellus ornare id. Proin ut turpis blandit, imperdiet ligula nec, ultricies erat. Fusce massa odio, consequat ultricies justo non, feugiat pretium sem. In commodo nisl at malesuada sagittis. Ut sed sem magna. Aenean augue nisl, fermentum sit amet mauris nec, rhoncus pharetra nisl. Aenean vitae placerat tortor.
Vivamus id efficitur massa, ultricies hendrerit velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque efficitur risus et enim commodo, vel imperdiet libero ultrices. Etiam sed vulputate magna. In quis hendrerit sem, ut elementum ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse rhoncus magna ac nulla pretium tincidunt. Aenean imperdiet non lectus eget fermentum. Sed consequat tellus at justo condimentum euismod aliquet eu ante. Proin tincidunt mauris porttitor, lobortis augue vulputate, facilisis tellus. Donec lobortis est in mi pulvinar laoreet. Donec rutrum libero at arcu rhoncus, non imperdiet neque porta. Etiam id volutpat dolor, in pretium nisi. Suspendisse sit amet placerat metus, ut imperdiet ante.
Mauris sodales dapibus magna at imperdiet. Integer quis sem tempus, faucibus eros et, iaculis risus. Donec ultrices accumsan turpis ac hendrerit. Aenean et magna non tellus tristique imperdiet. Suspendisse nibh mi, porta et suscipit et, congue lacinia est. In sapien risus, pellentesque vitae lorem et, pellentesque convallis magna. Aliquam sed orci quam. Sed vel pharetra diam. Quisque vel magna nulla. Donec dui purus, semper id elit sed, efficitur maximus justo. Curabitur in lorem quis urna hendrerit efficitur non sodales diam. Suspendisse scelerisque pulvinar elit. Phasellus non nisi sed purus mollis vehicula. Ut a magna sit amet sem sodales consequat. Sed non eleifend urna. Aliquam erat volutpat.
Morbi et arcu maximus ante lobortis facilisis. Etiam tincidunt arcu sed nisi dictum maximus. Duis a mi turpis. Fusce id accumsan risus, at tempus ex. Pellentesque magna turpis, tempor eu faucibus ut, ultrices eu mi. Fusce ut dolor a sapien tincidunt auctor commodo ut mi. Pellentesque tempus maximus consectetur. Morbi sollicitudin nisi leo, nec aliquam neque egestas non. Fusce condimentum lorem nec nunc efficitur, sit amet mattis justo dictum. Donec bibendum eu ipsum et vestibulum. Donec vulputate ac urna hendrerit vestibulum. Donec non volutpat neque. Curabitur euismod arcu vitae malesuada egestas. Vestibulum tempus porta arcu in lacinia. Maecenas tristique non neque in euismod.
        </p>
    </div>
    </main>
    <footer>

    </footer>    
</body>
</html>