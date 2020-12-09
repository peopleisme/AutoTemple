$(".loader-container").css("display", "none");

function logout() {
  $.ajax({
    type: 'POST',
    url: 'functions.php',
    data: {
      action: 'logout'
    },
  }).done(function (result) {

    if (result = "done") {
      window.location.href = "index";

    }
  })

};
const fileinput = document.querySelector("#file");
if (fileinput) {
  fileinput.onchange = () => {
    console.log(fileinput.files)
    if (fileinput.files.length) {
      const xhr = new XMLHttpRequest();
      const formularz = new FormData()
      const filesLength = fileinput.files.length;
      for (let i = 0; i < filesLength; i++) {
        formularz.append("temporaryImage[]", fileinput.files[i]);
      }
      formularz.append("function", "temporaryFileUpload");
      xhr.upload.onprogress = (event) => {
        console.log(`Upload: ${(event.loaded / event.total) * 100 } % complete`);
      }
      xhr.open("POST", "functions.php", true);
      xhr.send(formularz);
      xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          const status = xhr.status;
          if (status === 0 || (status >= 200 && status < 400)) {
            var ImageArray = JSON.parse(xhr.responseText);
            console.log(ImageArray)
            ImageArray.forEach(element => {
              document.querySelector('.Setting__box--gallery_box').insertAdjacentHTML('beforeend', `<div class="Setting__box--gallery_item"><img src=temporary/${element}> <span class="removeFromGallery">×</span></div>`);
            });
            document.querySelectorAll('.removeFromGallery').forEach((item) => {
              item.addEventListener('click', (event) => {
                const xhr = new XMLHttpRequest();
                const usuwanie = new FormData();
                usuwanie.append("function", "temporaryFileDelete")
                usuwanie.append("deleteFile", event.target.parentElement.children[0].getAttribute('src'))
                xhr.open("POST", "functions.php", true);
                xhr.send(usuwanie)
                xhr.onreadystatechange = () => {
                  if (xhr.readyState == XMLHttpRequest.DONE) {
                    event.target.parentElement.remove();
                  }
                }
              })
            })
          }
        } else {
          // Obsługa błędu jakby sie nie wysłało
        }
      }
    }
    //resetowanie input type file żeby można było wysłać ponownie to samo zdjęcie po usunięciu
    fileinput.type = ""
    fileinput.type = "file"
  }
}
if(document.querySelector('.addProduct')){
  document.querySelector('.addProduct').onsubmit = (form) => {  
    form.preventDefault()
    const xhr = new XMLHttpRequest();
    const formularz = new FormData();
    formularz.append("function", "addProduct")
    formularz.append("title", document.querySelector('.addProduct .Setting__box--component--input[name=title]').value)
    formularz.append("description", document.querySelector('.addProduct .Setting__box--component--input[name=description]').value)
    formularz.append("quantity", document.querySelector('.addProduct .Setting__box--component--input[name=quantity]').value)
    formularz.append("price", document.querySelector('.addProduct .Setting__box--component--input[name=price]').value)
    formularz.append("category", document.querySelector('.addProduct .Setting__box--component--input[name=category]').value)
    const pictures = Array();
    document.querySelectorAll('.Setting__box--gallery_item>img').forEach(element => {
      console.log(element.getAttribute('src'))
      pictures.push(element.getAttribute('src'))
    });
    formularz.append("imageArray", JSON.stringify(pictures))
    xhr.open('POST', 'functions.php', true)
    xhr.send(formularz)
    document.querySelector('.addProduct').reset()
    document.querySelector('.Setting__box--gallery_box').innerHTML=''
  }
}
if(document.querySelector(".shopItem__box")){
  document.querySelectorAll(".shopItem__box").forEach((item) =>{
    item.addEventListener('click',(event)=>{
      window.location.href = `p?id=${item.id}`;
    })

  })


}






//dropdown modularny
var dropdown
//kliknięcie w przycisk
document.querySelectorAll(".dropdownButton").forEach((item) => {
  item.addEventListener('click', (event) => {
    dropdown = event.target.dataset.dropdowntarget;
    $(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").toggleClass("show");
  })
})


window.addEventListener('click', (event) => {
  if (!event.target.matches(".dropdownButton[data-dropdowntarget~=" + dropdown + "]")) {
    if ($(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").hasClass('show')) {
      $(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").removeClass("show");
    }
  }
})

document.querySelectorAll(".shopItemsList > .dropdown-item").forEach((item) => {
  item.addEventListener('click', (event) => {
    document.querySelector(".dropdownButton[data-dropdowntarget~=d43jk]").innerHTML = event.target.innerHTML
  })
})


window.addEventListener('click', (event) => {

  if (event.target.matches(".SettingsOption:not(.active) > .SettingsOption--header")) {
    document.querySelector(".SettingsOption.active").classList.remove("active")
    event.target.parentElement.classList.add("active")
    if (document.querySelector(".Setting__box.show"))
      document.querySelector(".Setting__box.show").classList.remove("show");
    if (document.querySelector(`[data-target~=${document.querySelector(".SettingsOption.active > .SettingsOption--option.selected").dataset.link}]`))
      document.querySelector(`[data-target~=${document.querySelector(".SettingsOption.active > .SettingsOption--option.selected").dataset.link   }]`).classList.add("show")
  } else if (event.target.matches(".SettingsOption.active > .SettingsOption--option")) {
    document.querySelector(".SettingsOption.active > .SettingsOption--option.selected").classList.remove("selected")
    event.target.classList.add("selected")
    if (document.querySelector(".Setting__box.show"))
      document.querySelector(".Setting__box.show").classList.remove("show");
    if (document.querySelector(`[data-target~=${event.target.dataset.link}]`))
      document.querySelector(`[data-target~=${event.target.dataset.link}]`).classList.add("show")

  }

})










function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

$(".form_register").on("submit", function (form) {
  form.preventDefault();

  $.ajax({
    type: "POST",
    url: "register.php",
    data: {
      input_login: $('input[name=input_login]').val(),
      input_email: $('input[name=input_email]').val(),
      input_password: $('input[name=input_password]').val(),
      input_password_check: $('input[name=input_password_check]').val(),
    }
  }).done(function (result) {
    console.log(result);
    $(".loginError").text("");
    $(".emailError").text("");
    $(".passwordError").text("");
    $(".password_checkError").text("");

    if (result.includes("login_exists")) {
      $(".loginError").append("Użytkownik z podaną nazwą lub adresem email już istnieje!");
    }
    if (result.includes("password_differ")) {
      $(".password_checkError").append("Hasła się różnią!");

    } else if (result.length == 0) {
      $(".successfully_done").addClass("show");

      console.log("gites")
    }

  })
})

$(".form_login").on("submit", function (form) {
  form.preventDefault();

  $.ajax({
    type: "POST",
    url: "login.php",
    data: {
      input_remember_me: $('input[name=input_remember_me]').prop('checked'),
      input_login: $('input[name=input_login]').val(),
      input_password: $('input[name=input_password]').val(),
    }
  }).done(function (result) {
    console.log(result);
    $(".loginError").text("");
    $(".passwordError").text("");
    if (result.includes("incorrect_login")) {
      $(".loginError").append("Użytkownik o podanej nazwie nie istnieje!");
    }
    if (result.includes("incorrect_password")) {
      $(".passwordError").append("Hasło nie prawidłowe!");
    } else if (result.length == 0) {
      console.log("gites")
      $(".successfully_done").addClass("show");
      setTimeout(function () {
        window.location.replace("index");
      }, 700);


    }

  })
})

$(".form_forgot_password").on("submit", function (form) {
  form.preventDefault();

  $.ajax({
    type: "POST",
    url: "change_password.php",
    data: {
      input_email: $('input[name=input_email]').val(),
    }
  }).done(function (result) {
    console.log(result)
    $(".emailError").text("");
    if (result.includes("email_not_exists")) {
      $(".emailError").append("Użytkownik o podanym adresie email nie istnieje!");
    } else if (result.length == 0) {
      console.log("gites")
      $(".successfully_done").addClass("show");
    }
  })
})

$(".form_change_password").on("submit", function (form) {
  form.preventDefault();
  $.ajax({
    type: "POST",
    url: "change_password.php",
    data: {
      input_password: $('input[name=input_password]').val(),
      input_password_check: $('input[name=input_password_check]').val(),
    }
  }).done(function (result) {
    console.log(result)
    $(".password_checkError").text("");
    if (result.includes("password_differ")) {
      $(".password_checkError").append("Hasła się różnią!");

    } else if (result.length == 0) {
      $(".successfully_done").addClass("show");

      setTimeout(function () {
        window.location.replace('logowanie');
      }, 700);

    }


  })
})



$(window).ready(function () {














  //dokument załadowany


  $("body").css("visibility", "visible")

  //badanie responsywności
  $(window).resize(function () {
    console.log($(window).width())
  })



});