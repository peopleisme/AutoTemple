<?php
require_once "config.php";
require_once "header.php";
require_once "functions.php";
require_once "connection.php";
?>
<div class="container-fluid displayFlex flexWrap">
    <div class="shopSearchResult__container">
        <p class="shopSearchResult">Kategoria/wyszukiwanie</p>
    </div>

    <div class="shopFilters__container">
        <span class="shopFilters__container--results"><?php 
        $results= $conn->prepare('Select Count(*) From item'); 
        $results->execute();
        echo $results->fetch()[0];
        ?> produkty</span>
        <div class="dropdown">
            <div class="shopFilters__dropdown--button dropdownButton" data-dropdowntarget="bvdfg3">
                Pokaż filtry
            </div>
        </div>
        <div class="dropdown-menu shopFiltersDropdown" data-dropdowntarget="bvdfg3">

        </div>
        <div class="CollapsableMenu__container">
            <div class="CollapsableMenu__option ">
                <p class="CollapsableMenu--header">Rozmiar</p>
                <div class="CollapsableMenu--content">
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto, nesciunt nihil? Hic neque odio quis velit quas autem vel error minus aliquam dicta quaerat in, deserunt, fugit ab voluptates quam!</span>
                    <span>XD</span>
                    <span>XD</span>
                </div>
            </div>
            <div class="CollapsableMenu__option ">
                <p class="CollapsableMenu--header">Kategorie</p>
                <div class="CollapsableMenu--content">
                    <span>XD</span>
                    <span>XD</span>
                    <span>XD</span>
                </div>
            </div>
            <div class="CollapsableMenu__option">
                <p class="CollapsableMenu--header ">Cena</p>
                <div class="CollapsableMenu--content">
                    <div class="shopFilters_priceRange__container">
                        <div class="priceRangeBox priceFrom">
                            <input class="priceRangeBox--input" type="text" name="priceFrom">
                        </div>
                        <div class="priceRangeBox priceTo">
                            <input class="priceRangeBox--input" type="text" name="priceTo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopContent__container">
        <div class="shopDisplaySettingsBar width100 ">
            <div class="shopDisplaySettingsBar--item barSorting__container dropdown-menu" data-dropdowntarget="d43jk">
                <p data-dropdowntarget="d43jk" class=" dropdownButton">Sortuj</p>
                <div class=" shopItemsList">
                    <a class="dropdown-item" >Nazwa: A-Z</a>
                    <a class="dropdown-item" >Nazwa: Z-A</a>
                    <a class="dropdown-item" >Cena: rosnąco</a>
                    <a class="dropdown-item" >Cena: malejąco</a>
                </div>
            </div>
        </div>
        <div class="shopItems__container">

            <?php
            $itemQuery = $conn->prepare('SELECT *  FROM item  inner join (
                SELECT item_id,CONCAT("[\"" ,GROUP_CONCAT(link SEPARATOR"\" , \"" ),"\"]") as link
                from gallery
                WHERE link like "%image0%"
                OR  link like "%image1%"
                GROUP by item_id
                ) as galeria on item.id=galeria.item_id 
                order by title');
            $itemQuery->execute();
            $result = $itemQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as &$row) {
                $imageArray = json_decode($row["link"]);
                $Image2 = $imageArray[1] ?? $imageArray[0];
                echo "
            <div class='shopItem__box' id={$row["id"]} >
                <div class='shopItem__Image' style='background-image:url({$Image2})' >
                    <img src='{$imageArray[0]}' alt=''>
                </div>
                <div class='shopItem__content'>
                    <p class='shopItem--header'> {$row["title"]}</p>
                </div>
                <div class='shopItem__priceContainer'>
                    <p class='shopItem_price'>{$row["price"]} zł</p>
                </div>
            </div>
                    ";
            }
            ?>
        </div>
    </div>
</div>




<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>