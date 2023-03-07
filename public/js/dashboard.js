
let displayPC;
let count_pc;
$('document').ready(function () {

    //Function to fetch the list of PC Items
    displayPC = function (){
        $('#pc-card-container').html('');
        $.ajax({
            type: "POST",
            url: 'api/pc-items.php',
            dataType: 'JSON',
            data: JSON.stringify({
                mode: "display_pc"
            }),
            success: function (result) {

                //Map the data to the element
               result.forEach(item => {
                //Available PC (Green UI design)
                if(item.status === "available"){
                  let stringNum = item.pc_number.toString();
                  //display
                    $('#pc-card-container').append('<div class="pc-card">'+
                        '<div class="blob"></div>'+
                        '<span class="img"> <i class="fa-solid fa-desktop"></i>'+
                            '<span>This PC is </br> <span class="text-primary">Available</span>'+
                            '</span>'+
                        '</span>'+
                        '<div class="button-container">'+
                            '<button data-bs-toggle="modal" onClick="timeInClick(' + stringNum +')" data-bs-target="#timeInModal"> Time IN </button>'+ //button for Tme in Modal ---> modals.php
                        '</div>'+
                        '<h2>PC <span>'+ item.pc_number +'</span></h2>'+
                    '</div>')
                //Occupied PC (Red UI design)
                }else if(item.status === "occupied"){
        
                    // Get the current time
                    const currentTime = moment();
        
                    // Subtract a specific time from the current time
                    const specificTime = moment(item.datetime);
                    const timeDiff = moment.duration(currentTime.diff(specificTime));
        
                    // Get the time usage in hours and minutes
                    const hours = timeDiff.hours();
                    const minutes = timeDiff.minutes();
                    //display
                    $('#pc-card-container').append('<div class="occupied pc-card">'+
                        '<div class="blob"></div>'+
                        '<span class="img"> <i class="fa-solid fa-desktop"></i>'+
                            '<span>Occupied by: </br>'+
                                '<span class="text-primary">'+ item.firstname + ' '+ item.lastname +'</span>'+ //display the Fullname of the user
                            '</span>'+
                            '<span>Time Usage: </br>'+
                                '<span class="text-primary">'+ hours + 'h' + ' '+  minutes + 'm' +'</span>'+ //display the time usage in hours and minutes
                            '</span>'+
                        '</span>'+
                        '<div class="button-container">'+
                            '<button onClick="timeoutButtonClick('+item.id+')"> Time OUT </button>'+ //button for Tme OUT Modal (confirmation first)
                        '</div>'+
                        '<h2>PC <span>'+ item.pc_number +'</span></h2>'+
                    '</div>')
                }
                    
               });
               
            },
            error: function (error) {
                alertCenter(somethingWentWrongContactIT, icon_error);
            }
        
        });
    }


    displayPC(); //----------------------call the function to display the PC items
  
    count_pc = function () {
//Fetch the number of totalcomputer, available and occupied pc
$.ajax({
    type: "POST",
    url: 'api/pc-items.php',
    dataType: 'JSON',
    data: JSON.stringify({
        mode: "count_pc"
    }),
    success: function (result) {
      $("#totalcomputer").html(result[0].total); //Total computer display in HTML
      $("#availablecomputer").html(result[0].available); //Available Computer display in HTML
      $("#occupiedcomputer").html(result[0].occupied); //Occupied Computer display in HTML
       
    },
    error: function (error) {
        alertCenter(somethingWentWrongContactIT, icon_error);
    }

});
}

count_pc(); //----------------------call the function to display the PC items
 

//function upon clicking add PC Button (add record to database)
$("#addPCButton").click(function (){
    var pc_number = $("#pcnumber").val(); 

    $.ajax({
        type: "POST",
        url: 'api/pc-items.php',
        dataType: 'TEXT',
        data: JSON.stringify({
            mode: "add_pc",
            pc_number: pc_number
        }),
        success: function (result) {
            if(result === "Success"){ //if success in adding new record
                alertTopEnd(addedOneRecord, icon_success); //alert message
                displayPC(); //update the display
                count_pc();
                pc_number = $("#pcnumber").val(''); //clear the input field in modal
            }else{
                alertTopEnd(addedFailed, icon_error)
            }
           
        },
        error: function (error) {
            alertTopEnd(somethingWentWrongContactIT, icon_error)
        }
    });
})



//function upon clicking add PC Button (fetching data of users)
$("#search-srcode-button").click(function (){
    var srcodeid = $("#srcodeid").val();
    if(srcodeid === ''){
        $("#alertTimeIn").removeClass("hidden");
    }
    $.ajax({
        type: "POST",
        url: 'api/users.php',
        dataType: 'JSON',
        data: JSON.stringify({
            mode: "search_user",
            srcodeid: srcodeid
        }),
        success: function (result) {
            if(result.length > 0){

                //DISPLAY THE RESULT IN THESE IDS
                $("#timein-lastname").val(result[0].lastname);
                $("#timein-firstname").val(result[0].firstname);
                $("#timein-department").val(result[0].department);
                $("#timein-course").val(result[0].course);

                //HIDE THE ERROR MESSAGE
                $("#alertTimeIn").addClass("hidden");
                $("#alertTimeInInputFields").addClass("hidden");
            }else{
                //DISPLAY THE ERROR MESSAGE
                $("#alertTimeIn").removeClass("hidden");

                //CLEAR THE INPUT FIELD
                $("#timein-lastname").val('');
                $("#timein-firstname").val('');
                $("#timein-department").val('');
                $("#timein-course").val('');
            }
            
        },
        error: function (error) {
            alertCenter(somethingWentWrongContactIT, icon_error)
        }
    });
});


//function upon clicking Time IN Button (Update the clms_pc table and add to clms_logs)
$("#timeInButton").click(function (){
    var firstname = $("#timein-firstname").val();
    var lastname = $("#timein-lastname").val();
    var department = $("#timein-department").val();
    var course = $("#timein-course").val();
    var srcodeid = $("#srcodeid").val();
    var pc_id = $("#pc_id").val();

    const currentDateTime = moment().format('YYYY-MM-DD HH:mm:ss');

    if(firstname === '' || lastname === '' || department === '' || course === '' ){
        $("#alertTimeInInputFields").removeClass("hidden");
    }else{
        $("#alertTimeInInputFields").addClass("hidden");
        $.ajax({
            type: "POST",
            url: 'api/logs.php',
            dataType: 'TEXT',
            data: JSON.stringify({
                mode: "timein_logs",
                srcodeid: srcodeid,
                pc_id: pc_id,
                currentDateTime: currentDateTime
            }),
            success: function (result) {
                if(result === "Success"){ //if success in adding new record
                    alertTopEnd(addedOneRecord, icon_success); //alert message
                    displayPC(); //update the display
                    count_pc();
                    pcmanagementtable.ajax.reload();
                    $("#timein-firstname").val('');
                     $("#timein-lastname").val('');
                     $("#timein-department").val('');
                     $("#timein-course").val('');
                     $("#srcodeid").val('');
                     $("#pc_id").val('');

                     $("#timeInModal").modal('toggle')
                }else{
                    alertCenter(addedFailed, icon_error)
                }

            },
            error: function (error) {
                alertCenter(somethingWentWrongContactIT, icon_error)
            }

        })
    }

})



    
});

function timeoutButtonClick(pc_id){
    Swal.fire({
        title: 'Confirmation',
        text: "Are you sure you want to timeout this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
       
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: 'api/logs.php',
                dataType: 'TEXT',
                data: JSON.stringify({
                    mode: "timeout_logs",
                    pc_id: pc_id
                }),
                success: function (result) {
                    if(result === "Success"){ //if success in adding new record
                        alertTopEnd(addedOneRecord, icon_success); //alert message
                        displayPC(); //update the display
                        count_pc();
                        pcmanagementtable.ajax.reload();
                    }

                },
                error: function (error) {
                    alertTopEnd(somethingWentWrongContactIT, icon_error)
                }

            })
        }
      });
}

//function to display the number of pc
function timeInClick(pc_num){
  var pc_id = document.getElementById('pc_id');
  var pc_number = document.getElementById('pc_id_name');

  //ADD "0" if less than 10
  if(pc_num < 10){
    pc_num = "0" + pc_num;
  }else{
    pc_num = pc_num;
  }

  var pc_num = pc_num.toString(); //convert into string
  pc_id.value = pc_num;
  pc_number.innerHTML = pc_num;
}