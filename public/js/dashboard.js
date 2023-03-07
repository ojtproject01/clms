$('document').ready(function () {
  $.ajax({
    type: "POST",
    url: 'api/pc-items.php',
    dataType: 'JSON',
    data: JSON.stringify({
        mode: "display_pc"
    }),
    success: function (result) {
      console.log(result)
       result.forEach(item => {
        if(item.status === "available"){
          let stringNum = item.pc_number.toString();
            $('#pc-card-container').append('<div class="pc-card">'+
                '<div class="blob"></div>'+
                '<span class="img"> <i class="fa-solid fa-desktop"></i>'+
                    '<span>This PC is </br> <span class="text-primary">Available</span>'+
                    '</span>'+
                '</span>'+
                '<div class="button-container">'+
                    '<button data-bs-toggle="modal" onClick="timeInClick(' + stringNum +')" data-bs-target="#timeInModal"> Time IN </button>'+
                '</div>'+
                '<h2>PC <span>'+ item.pc_number +'</span></h2>'+
            '</div>')
        }else if(item.status === "occupied"){
            $('#pc-card-container').append('<div class="occupied pc-card">'+
                '<div class="blob"></div>'+
                '<span class="img"> <i class="fa-solid fa-desktop"></i>'+
                    '<span>Occupied by: </br>'+
                        '<span class="text-primary">Firstname Fullname</span>'+
                    '</span>'+
                    '<span>Time Usage: </br>'+
                        '<span class="text-primary">1 hr</span>'+
                    '</span>'+
                '</span>'+
                '<div class="button-container">'+
                    '<button> Time OUT </button>'+
                '</div>'+
                '<h2>PC <span>'+ item.pc_number +'</span></h2>'+
            '</div>')
        }
            
       });
       
    },
    error: function (error) {
        console.log(error)
    }

});

$.ajax({
    type: "POST",
    url: 'api/pc-items.php',
    dataType: 'JSON',
    data: JSON.stringify({
        mode: "count_pc"
    }),
    success: function (result) {
      $("#totalcomputer").html(result[0].total);
      $("#availablecomputer").html(result[0].available);
      $("#occupiedcomputer").html(result[0].occupied);
       
    },
    error: function (error) {
        console.log(error)
    }

});


    
});


function timeInClick(pc_num){
  var pc_id = document.getElementById('pc_id');
  if(pc_num < 10){
    pc_num = "0" + pc_num;
  }else{
    pc_num = pc_num;
  }

  var pc_num = pc_num.toString();
  pc_id.innerHTML = pc_num;
}
// $('#timeInClick').on('click', function () {
//   // $('#timeInModal').modal('show');
  
// });