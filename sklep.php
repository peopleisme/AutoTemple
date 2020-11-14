<?php
session_start();
require_once "config.php";
require_once "header.php";
require_once "functions.php";
?>
<div class="container-fluid displayFlex flexWrap">
    <div class="shopSearchResult__container">
        <p class="shopSearchResult">Kategoria/wyszukiwanie</p>
    </div>

    <div class="shopFilters__container">
        <form class="width100" action="">
        <div class="shopFilters__box">
            <div class="shopFilters__fieldset">
                <p class="shopFilters__fieldset--header shopBold">Cena</p>
                <div class="shopFilters_priceRange__container">
                    <div class="priceRangeBox priceFrom">
                        <input class="priceRangeBox--input" type="text" name="priceFrom">
                    </div>
                    <div class="priceRangeBox priceTo">
                        <input class="priceRangeBox--input" type="text" name="priceTo">
                    </div>
                </div>
            </div>
            <div class="shopFilters__fieldset">
                <p class="shopFilters__fieldset--header shopBold">Podkategorie</p>
                <div class="shopFilters_subcategory__container">
                    <p>ogród</p>
                    <p>komputery</p>
                    <p>części</p>
                    <p>ściany</p>
                </div>
            </div>
            <div class="shopFilters__fieldset">
                <p class="shopFilters__fieldset--header shopBold">Producent</p>
                <div class="shopFilters_manufacturer__container">
                <label class="checkmark_container">Bosch
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="checkmark_container">Milwaukee
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="checkmark_container">Makita
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                </div>
            </div> 
        </div>
        </form>
    </div>
    <div class="shopContent__container">
        <div class="shopDisplaySettingsBar width100 ">
            <div class="shopDisplaySettingsBar--item ">
                <div class="displayFlex"> <img src="img/DisplayListShop.svg" ></div>
            </div >
            <div class="shopDisplaySettingsBar--item barSorting__container">
                <p class=" shopBold">Sortowanie</p>

                <div class="dropdown" >
                    <a  >
                        <div class="barSorting " > 
                            <span class="dropdownButton" data-dropdowntarget="d43jk"  >nazwa A-Z</span>
                        </div>
                    </a>
                    <div class="dropdown-menu shopItemsList" data-dropdowntarget="d43jk"  >
                        <a class="dropdown-item" href="#">nazwa A-Z</a>
                        <a class="dropdown-item" href="#">nazwa Z-A</a>
                        <a class="dropdown-item" href="#">od najtańszych</a>
                        <a class="dropdown-item" href="#">od najdroższych</a>
                    </div>
                </div>
                            
            </div>
            <div class="shopDisplaySettingsBar--item ">
                <div class="displayFlex barPaginator" ><p class="shopBold marginCenter">2/10</p>
            </div>
        </div>
    </div>
    <div class="shopItems__container">
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>
        <div class="shopItem__box">
            <div class="shopItem__Image">
                <img src="img/BlankProductImage.svg" alt="">
            </div>
            <div class="shopItem__content">
                <p class="shopItem--header"> SanDiskdsasd SDHC Ultra Class10 80MB/s UHS‑I</p>
                <p class="shopItem--atribute">Słupek: tetrohydrokanabinol </p>
                <p class="shopItem--atribute">Wahacz: hydroksyzyna </p>
                <p class="shopItem--atribute">Kolumna: oksykodon </p>
            </div>
            <div class="shopItem__priceContainer">
                <p class="shopItem_price">1299.99 zł</p>
                <div class="shopItem_button"></div>
            </div>
        </div>

    </div>

</div>
</div>




<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>