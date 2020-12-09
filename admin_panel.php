<?php
require_once "config.php";
require_once "connection.php";
require_once "header.php";
require_once "functions.php";

if (isset($_SESSION["user_permission"]) && $_SESSION["user_permission"] == 10) {
} else {
    header("Location:index");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="Settings__container">
        <div class="SettingsHeader__container">
            <p class="SettingsHeader">Panel Administracyjny</p>
        </div>
        <div class="SettingsOptions__container">
            <div class="SettingsOption active">
                <p class="SettingsOption--header ">Produkty</p>
                <p class="SettingsOption--option selected" data-link="product-all"> Wszystkie</p>
                <a class="SettingsOption--option" data-link="product-add"> Dodaj </a>
            </div>
            <div class="SettingsOption ">
                <p class="SettingsOption--header">Kategorie</p>
                <a class="SettingsOption--option selected" data-link="category-all"> Wszystkie </a>
                <a class="SettingsOption--option" data-link="category-add"> Dodaj </a>
            </div>
            <div class="SettingsOption ">
                <p class="SettingsOption--header">Media</p>
            </div>
        </div>
    </div>
    <div class="Setting__container">

        <div class="Setting__box show " data-target="product-all">
            <form action="">
                <p class="Setting__box--header">Produkty</p>
                <p class="Setting__box--component">

                    <div class="Setting__box--table">
                        <p>Obraz</p>
                        <p>Nazwa</p>
                        <p>Ilość</p>
                        <p>Kategoria</p>
                        <p>Cena</p>
                        <?php
                        $listQuery = $conn->prepare("SELECT * FROM item left outer join (
                            SELECT  item_id,link from gallery
                            GROUP by item_id
                            ) as glariea on item.id=glariea.item_id ");
                        $listQuery->execute();
                        $listResult = $listQuery->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($listResult as $row) {
                            if($row["link"]=='') $row["link"]="productsImg/BlankProductImage.svg";
                            echo '                      
                                <img src="'.$row["link"].'" alt="">
                                <p> ' . $row["title"] . '</p>
                                <p> ' . $row["quantity"] . '</p>
                                <p> ' . $row["categoryid"] . '</p>
                                <p> ' . $row["price"] . '</p>
                            ';
                        }

                        ?>

                    </div>
                </p>

            </form>
        </div>
        <div class="Setting__box " data-target="product-add">
            <form action="" class="addProduct">
                <p class="Setting__box--header">Dodaj przedmiot</p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Tytuł</span>
                    <input class="Setting__box--component--input" type="text" name="title" id="">
                </p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Opis</span>
                    <textarea class="Setting__box--component--input" name="description" id="" cols="30" rows="10"></textarea>
                </p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Cena</span>
                    <input class="Setting__box--component--input" type="text" name="price" id="">
                </p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Ilość</span>
                    <input class="Setting__box--component--input" type="text" name="quantity" id="">
                </p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Kategoria</span>
                    <input class="Setting__box--component--input" type="text" name="category" id="">
                </p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Galeria</span>
                    <div class="Setting__box--gallery_box">
                        
                    </div>
                    <div class="Setting__box--component--file">
                        <input type="file" name="" id="file" multiple>
                        <label for="file"></label>
                    </div>


                </p>
                <div class="width100"> <button class="settings_add--button" type="submit">dodaj</button></div>
            </form>
        </div>

        <div class="Setting__box" data-target="category-all">
            <form action="">
                <p class="Setting__box--header">Kategorie</p>
                <?php
                        $listQuery = $conn->prepare("SELECT * FROM item");
                        $listQuery->execute();
                        $listResult = $listQuery->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($listResult as $row) {
                            echo '                      
   
                            ';
                        }

                        ?>
            </form>
        </div>
        <div class="Setting__box" data-target="category-add">
            <form action="">
                <p class="Setting__box--header">Dodaj Kategorie</p>
                <p class="Setting__box--component">
                    <span class="Setting__box--component--header">Nazwa</span>
                    <input class="Setting__box--component--input" type="text" name="" id="">
            </form>
        </div>




    </div>
</body>
<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>

</html>