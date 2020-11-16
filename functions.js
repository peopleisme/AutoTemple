function logout() {
  $.ajax({
    type: 'POST',
    url: 'functions.php',
    data: {
      action: 'logout'
    },
  }).done(function (result) {

    if (result = "done") {
      window.location.href = "index.php";

    }
  })

}




//dropdown modularny
var dropdown
$('.dropdownButton').click(function (event) {
  dropdown = event.target.dataset.dropdowntarget;
  $(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").toggleClass("show");
});
$(window).click(function (event) {
  if (!event.target.matches(".dropdownButton[data-dropdowntarget~=" + dropdown + "]")) {
    if ($(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").hasClass('show')) {

      console.log(dropdown)
      $(".dropdown-menu[data-dropdowntarget~=" + dropdown + "]").removeClass("show");
    }
  }
})

$(".shopItemsList > .dropdown-item").click(function (event) {
  $(".dropdownButton[data-dropdowntarget~=d43jk]")[0].innerHTML = event.target.innerHTML;
})

$(".loader-container").css("display", "none");


function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}





$(".form_register").on("submit", function (form) {
  console.log("D")

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
  console.log("D")

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
  console.log("D")

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
    }else if (result.length == 0) {
      console.log("gites")
      $(".successfully_done").addClass("show");
    }
  })
})



$(".form_change_password").on("submit", function (form) {
  console.log("D")
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