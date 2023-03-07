let pcmanagementtable;
$(document).ready( function() {
    pcmanagementtable = $('#pcmanagementtable').DataTable({
        //AJAX CALLING
        ajax: {
            type: "POST",
            url: "api/pc-items.php",
            dataType: "json",
            data: {
                mode: "display_list"
              },
            dataSrc: function (json) {
              return json;
            }
          },
        rowId: 'id',
        columns: [
          { data: 'id' },
          { data: 'pc_number' },
          { data: 'status' },
          { data: 'id' },
         
          
        ],
        columnDefs: [
          
          {
            // ID number

            searchable: false,
            visible: false
          },
          {
            // Salary Amount
            targets: 1,
            responsivePriority: 1,
            render: function (data, type, full, meta) {
              return data;
            }
          },
          {
            // Expense Balance
            targets: 2,
            responsivePriority: 3,
            render: function (data, type, full, meta) {
                if(data === 'available'){
                    return '<span class="badge badge-success">Available</span>';
                } else{
                    return '<span class="badge badge-danger">Occupied</span>';
                }
 
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
                exportOptions: { columns: [1, 2] }
              },
              {
                //csv
                extend: 'csv',
                text: '<i class="fa-solid fa-file-csv"></i> Csv',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2] }
              },
              {
    
                //excel
                extend: 'excel',
                text: '<i class="fa-solid fa-file-excel"></i> Excel',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2] }
              },
              {
                //pdf
                extend: 'pdf',
                text: '<i class="fa-solid fa-file-pdf"></i> Pdf',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2] }
              },
              {
                //copy
                extend: 'copy',
                text: '<i class="fa-solid fa-copy"></i> Copy',
                className: 'dropdown-item',
                exportOptions: { columns: [1, 2] }
              }
            ]
          }
        ],
      });
})