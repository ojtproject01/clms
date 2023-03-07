'use strict';
$('document').ready(function () {
  topbar.hide();
  let deductionArray = ['expensededuct', 'desirededuct', 'savingsdeduct', 'excessdeduct']
  $(".test").hide()
  deductionArray.forEach(element => {
      $("."+element+"").on("click", function(){
    $("."+element+" > .btn-search").toggleClass("show")
    if($(".input-search").val() != "" || $(".input-search").val() != 0){
      console.log($(".input-search").val())
      $(".test").fadeIn()
    }else{
      $(".test").fadeOut()
    }
  })
  });

  $(".search-box").on("focusout", function(){
    $(".search-box > .btn-search").removeClass("show")
    $(".test").fadeOut()
  });


  $(".input-search").on("keyup", function(){
    
    if($(".input-search").val() != "" || $(".input-search").val() != 0){
      console.log($(".input-search").val())
      $(".test").fadeIn()
    }else{
      $(".test").fadeOut()
    }
  })

 
});