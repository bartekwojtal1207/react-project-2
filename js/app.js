$(document).ready(function(){

  // form login
  var btn_form = $("#basic-addon1");

  var form_login = $(".form_header");

  btn_form.on("click",function(){
    $(form_login).submit();

  });
  $.getJSON("newfile.JSON",function(){
   //JSON.parse($.this);
    }).done(function(response){
    // console.log(response)
    // console.log(array)
    var pobrane = response.name;
    console.log(pobrane)
  //  array.push(pobrane);
    return pobrane;

  }).fail(function(){
  //console.log(pobrane)
      console.log('nie pobrano');
  });
});
