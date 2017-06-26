
$(document).ready(function(){


function hide_form(){
  var  newdiv = document.getElementById('main_section');
  $(newdiv).fadeOut(1000);
};
// var array = [];
hide_form();
// newdiv.style.display = 'none';
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

// console.log(array);

});
