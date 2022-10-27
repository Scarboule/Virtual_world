<?php
require_once 'session.php';
if(!isset($_SESSION['user']) || !isset($_FILES['image']) || $_FILES['image']['error'] != 0){
    header('Location:admin.php?reg_err=error');
    die();
}
$new_article = [
    'title' => $_REQUEST['title'] ?? "article",
    'content' => $_REQUEST['content'] ?? "",
    'type' => $_REQUEST['type'] ?? 'red',
];
$new_image = [
    'raw' => $_FILES['image']['tmp_name'],
];
$new_image['file'] = file_get_contents($new_image['raw']);
if($new_image['file'] === false) die();

$new_image['base64'] = 'data: ' . $_FILES['image']['type'] . ';base64,' . base64_encode($new_image['file']) ;

$req = $bdd->prepare("INSERT INTO blog (title, `type`, content, `image`) VALUES (:title, :type, :content, :image)");
if(!$req){
    header('Location:admin.php?reg_err=error');
    die();
}
$req->execute([
    'title' => $new_article['title'],
    'type' => $new_article['type'],
    'content' => $new_article['content'],
    'image' => $new_image['base64'],
]);
header('Location:admin.php?reg_err=success');
die();

/*echo "<img src='$new_image[base64]'>";
e('INSERT INTO feedbacks(pseudo, rating, comment) VALUES(:pseudo, :rating, :comment)');
var_dump($new_image['base64']);


$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;

array(1) { ["image"]=> array(5) { ["name"]=> string(38) "beats-saber-pack-imagine-dragons-2.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(45) "C:\Users\pukuz\AppData\Local\Temp\phpB525.tmp" ["error"]=> int(0) ["size"]=> int(68227) } } array(4) { ["title"]=> string(10) "article 12" ["type"]=> string(3) "red" ["content"]=> string(41) "yuvezszcviezvzievyezovezyo_vzeoivzevzvzpz" ["PHPSESSID"]=> string(32) "b5181a3407ba0de6f64d3f75aeb21584" } array(1) { ["user"]=> string(128) "c632e78b094019cb9c632738d125fa28b5b1b05066d47aa4c8ab39c3049000d08ef45f16a89cf40f23a9597fabd7315985c832d464b1d6dd6978226e38f39d82" }*/