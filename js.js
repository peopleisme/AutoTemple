var CMS_managementPart_publikacja_status = document.querySelectorAll(".CMS_managementPart_publikacja_status .dropdown-item");
var CMS_managementPart_publikacja_dostepnosc = document.querySelectorAll(".CMS_managementPart_publikacja_dostepnosc .dropdown-item");
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
//document.getElementById("bolding").addEventListener("mouseup",bolding);
//document.getElementById("cusrive").addEventListener("mouseup",cursive);
//CMS_managementPart_publikacja_status[0].addEventListener("click",function(){CMS_status(0)});
//CMS_managementPart_publikacja_status[1].addEventListener("click",function(){CMS_status(1)});
//CMS_managementPart_publikacja_status[2].addEventListener("click",function(){CMS_status(2)});
//CMS_managementPart_publikacja_status[3].addEventListener("click",function(){CMS_status(3)});
//CMS_managementPart_publikacja_dostepnosc[0].addEventListener("click",function(){CMS_accesability(0)});
//CMS_managementPart_publikacja_dostepnosc[1].addEventListener("click",function(){CMS_accesability(1)});
function getSelectionText() {
      if (window.getSelection) {
        try {
            var ta = $('#workarea').get(0);
            return [ta.value.substring(ta.selectionStart, ta.selectionEnd),ta.selectionStart,ta.selectionEnd];
        } catch (e) {
            console.log('Cant get selection text')
        }
    }
    // For IE
    if (document.selection && document.selection.type != "Control") {
        return document.selection.createRange().text;
    }
}
function bolding() {
    getSelectionText();
    let selectiontext = getSelectionText()[0];
    let start_index = getSelectionText()[1];
    let end_index = getSelectionText()[2];
    let workarea_content = $('#workarea').get(0).value;
    let workarea_box = $('#workarea').get(0);
    let firt_part = workarea_content.slice(0,start_index)
    let last_part = workarea_content.slice(end_index,workarea_content.length)
    console.log("przed: |"+getSelectionText());
    if((workarea_content[start_index-1]=="*")&&(workarea_content[start_index-2]=="*")&&(workarea_content[end_index]=="*")&&(workarea_content[end_index+1]=="*"))
    {
      console.log("jest git");
      workarea_content=workarea_content.slice(0,start_index-2)+selectiontext+workarea_content.slice(end_index+2,workarea_content.length);
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index-2, start_index+selectiontext.length-2);
    }

    else if(selectiontext)
    {
      console.log("jest");
      workarea_content=firt_part+"**"+selectiontext+"**"+last_part
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index+2, start_index+selectiontext.length+2);
      console.log("selectiontext.length: "+selectiontext.length)
    }
    else
    {
      console.log("nie ma")
      workarea_content=firt_part+"**strong text**"+last_part
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index+2, end_index+13);
    }

    console.log("po: |"+getSelectionText());
    console.log("workarea_content: \n"+workarea_content)
}
function cursive() {
    getSelectionText();
    let selectiontext = getSelectionText()[0];
    let start_index = getSelectionText()[1];
    let end_index = getSelectionText()[2];
    let workarea_content = $('#workarea').get(0).value;
    let workarea_box = $('#workarea').get(0);
    let firt_part = workarea_content.slice(0,start_index)
    let last_part = workarea_content.slice(end_index,workarea_content.length)
    console.log("working_area.slice(start_index-3,start_index): |"+workarea_content.slice(end_index,end_index+3));
    if(((workarea_content[start_index-1]=="*")&&(workarea_content[start_index-2]!="*")&&(workarea_content[end_index]=="*")&&(workarea_content[end_index+1]!="*"))||(workarea_content.slice(start_index-3,start_index)=="***"&&workarea_content.slice(end_index,end_index+3)=="***")){
      console.log("jest git");
      workarea_content=workarea_content.slice(0,start_index-1)+selectiontext+workarea_content.slice(end_index+1,workarea_content.length);
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index-1, start_index+selectiontext.length-1);
    }

    else if(selectiontext){
      console.log("jest");
      workarea_content=firt_part+"*"+selectiontext+"*"+last_part
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index+1, start_index+selectiontext.length+1);
      console.log("selectiontext.length: "+selectiontext.length)
    }
    else{
      console.log("nie ma")
      workarea_content=firt_part+"*emphasized text*"+last_part
      $('#workarea').get(0).value=workarea_content;
      workarea_box.focus();
      workarea_box.setSelectionRange(start_index+1, end_index+16);
    }

    console.log("po: |"+getSelectionText());
    console.log("workarea_content: \n"+workarea_content)
}
function CMS_status(index){
  switch (index) {
    case 0:
    document.querySelector(".CMS_managementPart_publikacja_status strong").innerHTML="Szkic";
      break;
    case 1:
    document.querySelector(".CMS_managementPart_publikacja_status strong").innerHTML="Opublikowany";
      break;
    case 2:
    document.querySelector(".CMS_managementPart_publikacja_status strong").innerHTML="W trakcie";
      break;
    case 3:
    document.querySelector(".CMS_managementPart_publikacja_status strong").innerHTML="Archiwum";
      break;
    default:

  }
}
function CMS_accesability(index){
  switch (index) {
    case 0:
    document.querySelector(".CMS_managementPart_publikacja_dostepnosc strong").innerHTML="Publiczna";
      break;
    case 1:
    document.querySelector(".CMS_managementPart_publikacja_dostepnosc strong").innerHTML="Prywatna";
      break;
    default:

  }
}
