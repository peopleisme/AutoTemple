<?php
session_start();
require_once "config.php";
require_once "header.php";
require_once "functions.php";
  ?>

  
<div class="container-fluid">
  <div class="row">
    <div class="CMS_editingPart col-9">
      <div class="CMS_editingPart_title_container">
        <input class="col-12" type="text" name="title" placeholder="Tytuł">
      </div>
      <div class="CMS_editingPart_address_container">
        <span class="CMS_editingPart_address">Adres: </span><span class="CMS_editingPart_address_content">dasdasd </span>
      </div>
      <div class="CMS_editingPart_main_tools_container">
        <div class="col-12 CMS_editingPart_main_tools">
          <ul class="CMS_editingPart_main_tools_list">
            <a href="#"></a>
            <li id="bolding"><img src="img/b.svg" alt=""> </li>
            <li id="cusrive"><img src="img/cursive.svg" alt=""></li>
            <li id="line-through"><img src="img/line-through.svg" alt=""></li>
            <li id="unnumbered-list"><img src="img/unnumbered-list.svg" alt=""></li>
            <li id="numbered-list"><img src="img/numbered-list.svg" alt=""></li>
            <li id="left-align"><img src="img/left-align.svg" alt=""></li>
            <li id="center-align"><img src="img/center-align.svg" alt=""></li>
            <li id="right-align"><img src="img/right-align.svg" alt=""></li>
            <li id="link"><img src="img/chain-logo.svg" alt=""></li>
          </ul>
        </div>
      </div>
      <div class="CMS_editingPart_main">
        <textarea name="name"  class="col-12" id="workarea" type="text" name="content" placeholder="Treść"></textarea>
      </div>
    </div>
    <div class="CMS_managementPart col-3">
      <div class="CMS_managementPart_publikacja_container ">
        <span>Publikacja</span>
        <div class="CMS_managementPart_publikacja">
          <div class="CMS_managementPart_publikacja_status">
            <span>Status:</span><strong>Szkic</strong>
            <div class="dropdown show inlineblock">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Edytuj
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" >Szkic</a>
              <a class="dropdown-item" >Opublikowany</a>
              <a class="dropdown-item" >W trakcie</a>
              <a class="dropdown-item" >Archiwum</a>
            </div>
          </div>
          </div>
          <div class="CMS_managementPart_publikacja_data_publikacji">
            <span>Data publikacji:</span>
            <input type="datetime-local" name="publishing_date">

          </div>
          <div class="CMS_managementPart_publikacja_dostepnosc">
            <span>Dostępność:</span><strong>Publiczna</strong>
            <div class="dropdown show inlineblock">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Edytuj
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" >Publiczna</a>
              <a class="dropdown-item" >Prywatna</a>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="CMS_managementPart_kategoria_container">
          <span>Kategorie</span>
          <div class="CMS_managementPart_kategoria_box">
          <ul class="nav nav-pills " id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">wszystkie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">najczęściej używane</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <label class="checkmark_container">Jedzenie
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">ludzie
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">sport
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">moda
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">krajobraz
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">krajobraz
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">krajobraz
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">krajobraz
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <label class="checkmark_container">sport
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">moda
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="checkmark_container">krajobraz
                <input type="checkbox">
                <span class="checkmark"></span>
              </label></div>
          </div>
        </div>
      </div>
      <div class="CMS_managementPart_tag_container">
        <span>Słowa kluczowe</span>
          <textarea class="CMS_managementPart_tag_box w-100" name="tags" >  </textarea>
      </div>
    </div>
  </div>
</div>


<?php
//require_once "footer_html.php"; 
require_once "footer.php";
?>  
