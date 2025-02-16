<?php 
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Charlie Chavez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Item</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Inventory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="items.php">Items</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['user_email']?>
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarUser">
                            <li><a class="dropdown-item" href="">Account</a></li>
                            <li><a class="dropdown-item" href="">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                        </ul>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container-fluid">
            <div class="row my-2">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
                        Add Item
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover" id="item-table" name="item-table" >
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>MAC</th>
                                <th>SN</th>
                                <th>Brand</th>
                            </tr>
                        </thead>

                        <tbody id="compute_table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- ADD Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddModallabel">Add Item</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="item_name" name="item_name">
                    </div>
                    <div class="mb-3">
                        <label for="item_mac" class="form-label">MAC</label>
                        <input type="mac" class="form-control" id="item_mac" name="item_mac">
                    </div>
                    <div class="mb-3">
                        <label for="item_sn" class="form-label">Serial Number</label>
                        <input type="serialNumber" class="form-control" id="item_sn" name="item_sn">
                    </div>
                    <div class="mb-3">
                        <label for="item_brand" class="form-label">Brand</label>
                        <input type="brand" class="form-control" id="item_brand" name="item_brand">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit_item" name="submit_item">Submit Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- fetch Modal -->
<div class="modal fade" id="Fetchmodal" tabindex="-1" aria-labelledby="Fetchmodallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Fetchmodallabel">Item</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fetch_name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="fetch_name" name="fetch_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fetch_mac" class="form-label">MAC</label>
                        <input type="mac" class="form-control" id="fetch_mac" name="fetch_mac" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fetch_sn" class="form-label">Serial Number</label>
                        <input type="serialNumber" class="form-control" id="fetch_sn" name="fetch_sn" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fetch_brand" class="form-label">Brand</label>
                        <input type="brand" class="form-control" id="fetch_brand" name="fetch_brand" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="delete_item" name="delete_item" >Delete</button>
                        <button type="button" class="btn btn-primary" id="edit_item" name="edit_item">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
       $(document).ready(function() {
            // Initialize the DataTable
            let fetchId = "";

            function LoadTable(){
                $.ajax({
                    url: "fetch_table.php",  // URL to fetch data via JSON
                    method: "GET",
                    dataType: "json",  // Ensure the response is parsed as JSON
                    success: function(response) {
                        let tableBody = $('#compute_table');
                        tableBody.empty();
                        response.forEach(function(item) {
                            // Add each row to the table
                                let row = "<tr data-bs-toggle='modal' data-bs-target='#Fetchmodal' data-id='" + item.item_id +"'>" +
                                    "<td>" + item.item_id + "</td>" +
                                    "<td>" + item.item_name + "</td>" +
                                    "<td>" + item.item_mac + "</td>" +
                                    "<td>" + item.item_sn + "</td>" +
                                    "<td>" + item.item_brand + "</td>" +
                                    "</tr>";
                            tableBody.append(row);     
                        });
                        
                        $('#item-table').show();
                        // Clear The config
                        if ($.fn.DataTable.isDataTable('#item-table')) {
                            $('#item-table').DataTable().destroy();
                        }

                        var table = $('#item-table').DataTable({
                            searching: true,
                            responsive: true,
                            autoWidth: false,
                            lengthChange: false,
                            paging: true,
                            info: true,
                            order: [[0, 'asc']],
                            lengthMenu: [20, 50, 100, 200],
                            pageLength: 20
                            });
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while fetching the data: " + xhr.responseText);
                    }
                });
            }
            LoadTable();
            $('#submit_item').click(function() {
                let item_name = $('#item_name').val();
                let item_mac = $('#item_mac').val();
                let item_sn = $('#item_sn').val();
                let item_brand = $('#item_brand').val();
                $.ajax({
                    url: "add_item.php",  // URL to fetch data via JSON
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        item_name: item_name,
                        item_mac: item_mac,
                        item_sn: item_sn,
                        item_brand: item_brand
                    }),    
                    success: function(response) {
                        alert(response);
                        $('#AddModal').modal('hide'); //hide the modal after submission
                        setTimeout(() => { 
                            LoadTable();
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while fetching the data: " + xhr.responseText);
                     }
                    });
            });

            $('#delete_item').click(function (){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
                }).then((result) => {
                // If they press yes, delete it 
                if (result.isConfirmed) {
                    $.ajax({
                        
                        url: "delete_item.php",
                        method: "POST",
                        data: {id: fetchId},
                        success: function(response){
                            swalWithBootstrapButtons.fire({
                            title: "Deleted!",
                            text: "Your data has been deleted.",
                            icon: "success"
                            });
                            $('#Fetchmodal').modal('hide');
                            setTimeout(() => { 
                                    LoadTable();
                                }, 2000);
                        },
                        error: function(xhr, status, error) {
                            swalWithBootstrapButtons.fire({
                            title: "Deleted!",
                            text: "Your data has been deleted.",
                            icon: "success"
                            });
                        }
                    })
                   
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "An error occurred while fetching the data: " + xhr.responseText,
                    icon: "error"
                    });
                }
                });
                
            });
            //Edit Items
            let isEditMode = false; //Flag
            function toggleEditMode (){
                const fields = ['#fetch_name', '#fetch_mac', '#fetch_sn', '#fetch_brand'];
            
                // Update read-only status based on edit mode
                fields.forEach(selector => {
                    $(selector).prop('readonly', !isEditMode);
                });
                
                // Update button text based on the current mode
                $('#edit_item').text(isEditMode ? 'Save' : 'Edit');
                // if (isEditMode == true){
                //     $('#edit_item').text('Save');
                // }else{
                //     $('#edit_item').text('Edit');
                // }
            }
            function saveEdit(){
                console.log(fetchId);
                let fetch_id = fetchId;
                let fetch_name = $('#fetch_name').val();
                let fetch_mac = $('#fetch_mac').val();
                let fetch_sn = $('#fetch_sn').val();
                let fetch_brand = $('#fetch_brand').val();
                $.ajax({
                    url: "edit_item.php",
                    method: "POST",
                    contentType: "json",
                    data: JSON.stringify({
                        id:fetch_id,
                        name: fetch_name,
                        mac: fetch_mac,
                        sn: fetch_sn,
                        brand: fetch_brand
                    }),
                    success: function(response){
                        isEditMode = !isEditMode; // Toggle the flag
                        toggleEditMode();
                        $('#Fetchmodal').modal('hide');
                        
                        Swal.fire({
                        title: "Successfully Update!",
                        icon: "success",
                        });
                        LoadTable();
                        

                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while fetching the data: " + xhr.responseText);
                    }
                })

            }
            $('#edit_item').click(function(){
                if(isEditMode){
                    saveEdit();
                }else{
                    isEditMode = !isEditMode; // Toggle the flag
                    toggleEditMode(); // Update the fields based on the new mode
                }
            });
            $('#item-table tbody').on('click', 'tr', function(){
                fetchId = $(this).data('id');
                $.ajax({
                    url: "fetch_item.php",  // URL to fetch data via JSON
                    method: "GET",
                    data: { id: fetchId},   // Ensure the response is parsed as JSON
                    success: function(response) {
                        //show the modal
                        $('#Fetchmodal').modal('show');
                        let obj =JSON.parse(response);
                        console.log(response);
                        console.log(obj);

                        //fill in the modal with the item details
                        $('#fetch_name').val(obj.item_name);
                        $('#fetch_mac').val(obj.item_mac);
                        $('#fetch_sn').val(obj.item_sn);
                        $('#fetch_brand').val(obj.item_brand);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while fetching the data: " + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>