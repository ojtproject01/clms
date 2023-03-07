'use strict';
$('document').ready(function () {
  topbar.hide();
  // DataTable
  // -------------------------------------------------------------------
  var salaryHistoryTable = $('#salaryHistoryTable').DataTable({
    //AJAX CALLING
    ajax: {
      type: "GET",
      url: 'api/getData.php?mode=salaryHistory',
      dataType: "json",
      dataSrc: function (json) {

        return json;
      }
    },
    rowId: 'RecordID',
    columns: [
      { data: '' },
      { data: 'RecordID' },
      { data: 'Salary_Amount' },
      { data: 'Salary_Date' },
      { data: 'Expense_Balance' },
      { data: 'Desire_Budget' },
      { data: 'Savings_Total' },
      { data: 'Tithes' },
      { data: 'Debt_Deduction' },
      { data: 'RecordID' }
    ],
    columnDefs: [
      {
        // For Responsive
        className: 'control',
        orderable: false,
        responsivePriority: 2,
        searchable: false,
        targets: 0,
        render: function (data, type, full, meta) {
          return '';
        }
      },
      {
        // ID number
        targets: 1,
        searchable: false,
        visible: false
      },
      {
        // Salary Amount
        targets: 2,
        responsivePriority: 1,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        // Expense Balance
        targets: 4,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        //Desire Budget
        targets: 5,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        // Savings
        targets: 6,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        // Tithes
        targets: 7,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        // Debt deduction
        targets: 8,
        render: function (data, type, full, meta) {
          return '₱ ' + number_format(data, 2) + '';
        }
      },
      {
        // Actions
        targets: -1,
        title: 'Actions',
        orderable: false,
        searchable: false,
        render: function (data, type, full, meta) {
          return (
            '<div class="d-inline-block">' +
            '<a href="javascript:;" class="btn btn-sm text-primary btn-icon  hide-arrow" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></a>' +
            '<ul class="dropdown-menu dropdown-menu-end">' +
            '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
            '<li><a href="javascript:;" class="dropdown-item">Archive</a></li>' +
            '<div class="dropdown-divider"></div>' +
            '<li><a href="javascript:;" class="dropdown-item text-danger" onClick="deleteSalaryHistory(' + data + ')">Delete</a></li>' +
            '</ul>' +
            '</div>' +
            '<button class="btn btn-sm text-primary btn-icon item-edit" id="edit" onClick="editSalaryHistory(' + data + ')"><i class="fa-solid fa-pen-to-square"></i></button>'
          );
        }
      }
    ],
    //Order by the column date in descending
    order: [[3, 'desc']],
    dom:
      '<"card-header bg-light cardheader-dark-bg"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    displayLength: 10,
    lengthMenu: [10, 15, 25, 50, 75, 100],
    buttons: [
      {
        //dropdown button for export
        extend: 'collection',
        className: 'btn btn-label-primary dropdown-toggle me-2',
        text: '<i class="fa-solid fa-file-export"></i> Export',
        buttons: [
          {
            //print
            extend: 'print',
            text: '<i class="fa-solid fa-print"></i> Print',
            className: 'dropdown-item',
            exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] }
          },
          {
            //csv
            extend: 'csv',
            text: '<i class="fa-solid fa-file-csv"></i> Csv',
            className: 'dropdown-item',
            exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] }
          },
          {

            //excel
            extend: 'excel',
            text: '<i class="fa-solid fa-file-excel"></i> Excel',
            className: 'dropdown-item',
            exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] }
          },
          {
            //pdf
            extend: 'pdf',
            text: '<i class="fa-solid fa-file-pdf"></i> Pdf',
            className: 'dropdown-item',
            exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] }
          },
          {
            //copy
            extend: 'copy',
            text: '<i class="fa-solid fa-copy"></i> Copy',
            className: 'dropdown-item',
            exportOptions: { columns: [2, 3, 4, 5, 6, 7, 8] }
          }
        ]
      },
      {
        //Button for add new salary record
        html: '<button type="button" class="btn btn-primary" data-bs-toggle="modal" id="addSalaryModalButton" data-bs-target="#addSalary">  <i class="fa-solid fa-receipt"></i> <span>Add Salary</span></button>',
        className: 'create-new btn btn-primary',
      }
    ],
    //responsive function
    responsive: {
      details: {
        display: $.fn.dataTable.Responsive.display.modal({
          header: function (row) {
            var data = row.data();
            return 'Salary details of ' + data.Salary_Date;
          }
        }),
        type: 'column',
        renderer: function (api, rowIdx, columns) {
          var data = $.map(columns, function (col, i) {
            return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
              ? '<tr class="text-dark" data-dt-row="' +
              col.rowIndex +
              '" data-dt-column="' +
              col.columnIndex +
              '">' +
              '<td>' +
              col.title +
              ':' +
              '</td> ' +
              '<td>' +
              col.data +
              '</td>' +
              '</tr>'
              : '';
          }).join('');

          return data ? $('<table class="table"/><tbody />').append(data) : false;
        }
      }
    }
  });

  //header of the datatables
  $('div.head-label').html(' <h5 class="card-title mb-0"><i class="fa-solid fa-receipt me-2"></i> Salary History</h5>');


  //------------------------- INITIALIZATION FOR ADD SALARY

  //ALERT IDS
  var alertIncompleteFields = $("#alertIncompleteFields");
  var alertWrongPercent = $("#alertWrongPercent");
  var alertLargeAmount = $("#alertLargeAmount");

  //OTHER IDS
  var allTextBoxes = $('#addSalary input');
  var percentageContainer = $("#percentageContainer input");


  // submission of the form for adding new salary record
  $("#addSalaryModalButton").on("click", function () {
    //Remove error classes in input textboxes
    allTextBoxes.each(function () {
      $('#' + this.id + '').removeClass("error")
    });

    //REMOVING THE ERROR ALERT
    alertWrongPercent.addClass("hidden");
    alertLargeAmount.addClass("hidden");
    alertIncompleteFields.addClass("hidden");

    $("#salaryAmount").val('0');
    $("#debtDeduction").val('0');
    $("#salaryDate").val('');
    //THE VALUE OF THIS INPUT CAN BE FOUND IN js/custom/defaultvalue.js
    $("#expenseBalance").val(defaultexpenseBalance.value)
    $("#desireBudget").val(defaultdesireBudget.value)
    $("#savingsTotal").val(defaultsavingsTotals.value)
    $("#tithesAmount").val(defaulttithesAmount.value)

    let allowdebtDeduction = localStorage.getItem('allowdebtDeduction');
    if (allowdebtDeduction !== 'true') {
      $("#debtDeduction").prop('disabled', true);
      $("#statusAllowDebtDeduction").html('(Optional) <span class="text-danger"> -DISABLED</span></span> ')
    } else {
      $("#debtDeduction").prop('disabled', false);
      $("#statusAllowDebtDeduction").html('(Optional) <span class="text-success"> -ENABLED</span></span> ')
    }
  });

  percentageContainer.on("change", function () {
    const expenseBalance = Number($("#expenseBalance").val());
    const desireBudget = Number($("#desireBudget").val());
    const savingsTotal = Number($("#savingsTotal").val());
    const tithesAmount = Number($("#tithesAmount").val());
    const sumofpercent = expenseBalance + desireBudget + savingsTotal + tithesAmount;
    var totalPercent = $("#totalPercent");
    var textColor = "success";
    if (sumofpercent > 100) {
      textColor = "danger";
    } else if (sumofpercent < 100) {
      textColor = "warning";
    }
    //display sum of total percent
    totalPercent.html('<span class="text-' + textColor + ' fw-bold">(' + sumofpercent + '%/100%)</span>');
  });

  // submission of the form for adding new salary record
  $("#addsalarybutton").on("click", function () {
    //GET THE VALUE OF FIELDS AND CONVERT TO NUMBERS EXCEPT DATE
    const salaryAmount = Number($("#salaryAmount").val());
    const debtDeduction = Number($("#debtDeduction").val());
    const diffofsalary = salaryAmount - debtDeduction;

    const expenseBalance = Number($("#expenseBalance").val());
    const desireBudget = Number($("#desireBudget").val());
    const savingsTotal = Number($("#savingsTotal").val());
    const tithesAmount = Number($("#tithesAmount").val());
    const sumofpercent = expenseBalance + desireBudget + savingsTotal + tithesAmount;

    const salaryDate = $("#salaryDate").val();
    var errorcount = 0;

    //removing the alert upon clicking
    alertIncompleteFields.addClass("hidden");
    alertWrongPercent.addClass("hidden");
    alertLargeAmount.addClass("hidden");

    //Remove error classes in input textboxes
    allTextBoxes.each(function () {
      $('#' + this.id + '').removeClass("error")
    });

    //CHECK IF REQUIRED FIELDS ARE NULL/0
    if (salaryAmount === 0 || salaryDate === "") {
      //fetching empty textboxes
      var emptyTextBoxes = allTextBoxes.filter(function () { return this.value === "" || this.value == 0; });
      //loop to add error classes in empty textboxes
      emptyTextBoxes.each(function () {
        if (this.id == 'salaryAmount' || this.id == 'salaryDate') {
          $('#' + this.id + '').addClass("error")
        }
      });
      //show alert
      alertIncompleteFields.removeClass("hidden").html('<i class="fas fa-times-circle"></i> Please complete the required fields')
      $('.modal-body').animate({ scrollTop: 0 }, 'slow');
      errorcount = errorcount + 1;
    }
    //CHECK IF SUM OF PERCENT IS 100
    if (sumofpercent != 100) {
      //show alert
      percentageContainer.addClass("error")
      $('.modal-body').animate({ scrollTop: 0 }, 'slow');
      alertWrongPercent.removeClass("hidden").html('<i class="fas fa-times-circle"></i> Please check if the percentage total is 100%')
      errorcount = errorcount + 1;
    }
    //CHECK IF DEBT DEDUCTION IS LARGER THAN SALARY AMOUNT
    if (salaryAmount < debtDeduction) {
      $("#debtDeduction").addClass("error")
      $('.modal-body').animate({ scrollTop: 0 }, 'slow');
      alertLargeAmount.removeClass("hidden").html('<i class="fas fa-times-circle"></i> Make sure that debt deduction is not larger than salary amount');
      errorcount = errorcount + 1;
    }

    if (errorcount == 0) {
      // get the percentage of the items
      const finalExpenseBalance = getPercentage(expenseBalance, diffofsalary);
      const finalDesireBudget = getPercentage(desireBudget, diffofsalary);
      const finalSavingsTotal = getPercentage(savingsTotal, diffofsalary);
      const finalTithesAmount = getPercentage(tithesAmount, diffofsalary);


      //ajax call for inserting salary history
      $.ajax({
        type: "POST",
        url: "api/insertData.php?mode=insertsalaryhistory",
        data: JSON.stringify({
          salary_amount: salaryAmount,
          salary_date: salaryDate,
          expense_balance: finalExpenseBalance,
          desire_budget: finalDesireBudget,
          savings_total: finalSavingsTotal,
          tithes_amount: finalTithesAmount,
          debt_deduction: debtDeduction,
          user_id: $("#user_id").val()
        }),
        cache: false,
        dataType: "JSON",
        success: function (result) {
          salaryHistoryTable.ajax.reload();
          if (result === "success") {
            $("#salaryAmount").val('0');
            $("#debtDeduction").val('0');
            $("#salaryDate").val('');
            $("#addSalary").modal('toggle')
            alertCenter(addedOneRecord, icon_success, "Success")
          } else {
            alertCenter(result, icon_error, "Failed!")
          }
        },
        error: function () {

        }
      })
    }
  });
});

function deleteSalaryHistory(data) {
  Swal.fire({
    title: "Confirmation",
    icon: "warning",
    text: "Are you sure you want to delete this item?",
    showCancelButton: true,
    confirmButtonColor: '#dd3333',
    showCancelButton: true,
    confirmButtonText: 'Yes, Delete it'
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "api/deleteData.php?mode=salaryHistory",
        dataType: "text",
        data: JSON.stringify({ salaryhistoryid: data}),
        success: function (response) {
          alertTopEnd(downloadedOneFile, icon_success);
        },
        error: function () {
          $("#pleasewait").fadeOut();
          alertCenter(somethingWentWrongContactIT, icon_error);
        }
      });
    }
  }
  )
}

function test(data) {
  console.log(data)
}