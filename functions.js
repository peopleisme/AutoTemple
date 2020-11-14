function logout(){
    $.ajax({
        url:'functions.php?action=logout',
        type:'get',
        //data: {action:'logout'},
        dataType: 'json',
        success: function(data) {
            console.log(data);

        }
   })
   window.location.href = "index.php";

}




//dropdown modularny
var dropdown
  $('.dropdownButton').click(function(event){
     dropdown=event.target.dataset.dropdowntarget;
    $(".dropdown-menu[data-dropdowntarget~="+dropdown+"]").toggleClass("show");
});
$(window).click(function(event) {
    if (!event.target.matches(".dropdownButton[data-dropdowntarget~="+dropdown+"]")) {
        if($(".dropdown-menu[data-dropdowntarget~="+dropdown+"]").hasClass('show')){
            
            console.log(dropdown)
            $(".dropdown-menu[data-dropdowntarget~="+dropdown+"]").removeClass("show");
        } 
    }
  })

  $(".shopItemsList > .dropdown-item").click(function(event){
    $(".dropdownButton[data-dropdowntarget~=d43jk]")[0].innerHTML=event.target.innerHTML;
  })

$(".loader-container").css("display","none");


function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}





$(".form_register").on("submit",function(form){
    console.log("D")

    form.preventDefault();

    $.ajax({
        type: "POST",
        url: "register.php",
        data: { 
        input_login:  $('input[name=input_login]').val(),
        input_email:  $('input[name=input_email]').val(),
        input_password:  $('input[name=input_password]').val(),
        input_password_check:  $('input[name=input_password_check]').val(),
      }
      }).done(function(result) {
        console.log(result);
        $(".RegisterErrorTooltip").text("");
      if(result.includes("login_exists")){
        console.log("login_exists");
        $(".RegisterErrorTooltip").append("<li>Użytkownik z podaną nazwą lub adresem email już istnieje!</li>");
        $(".input_login").effect( "shake", {times:2}, 600 );

      }
      if(result.includes("password_differ")){
        $(".RegisterErrorTooltip").append("<li>Hasła się różnią!</li>");

      }
      else if(result.length==0){
        $(".successfully_added").addClass("show");
        
        console.log("gites")
      }
        
      })
  })


      $(window).ready(function(){

       

        //setTimeout(function(){  $(".logowanie_container").addClass("show");}, 1000);

        

    



 
    
  
//dokument załadowany

    
$("body").css("visibility","visible")

//badanie responsywności
$(window).resize(function(){ console.log($( window ).width())})



});









 