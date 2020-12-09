<?php
require_once "config.php";
require_once "header.php";
require_once "functions.php";
require_once "connection.php";
?>
<div class="container-fluid displayFlex flexWrap">
    <?php
    $query = $conn->prepare("SELECT * FROM item left JOIN gallery ON item.id = gallery.item_id  where item.id=:id");
    $query->bindParam(":id", $_GET['id']);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);





    ?>

    <div class="productPage__container">
        <div class="productPage__container--image">
            <img src="<?= $result[0]['link'] ?? "productsImg/BlankProductImage.svg"; ?>" alt="">
        </div>
        <div class="productPage__container--content">
            <div class="productPage__container--header">
                <?= $result[0]['title'] ?? "Brak"; ?>
            </div>
            <div class="productPage__container--price">
                <?= $result[0]['price'].' ZŁ' ?? "Brak"; ?>
                
            </div>

            <div class="productPage__container--stock">

            </div>
            <button class="buyButton"> <img src="img/CartNavigationSketch.svg" alt=""> DODAJ </button>
        </div>
        <div class="productPage__container--description">
                <?= $result[0]['description'] ?? "Brak"; ?>
            </div>
    </div>
</div>




<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>