$(document).ready(function () {
    let mitraData = null;
    let selectedRowData = null;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function toggleCheckbox(row) {
        const checkbox = $(row).find('input[type="checkbox"]');
        checkbox.prop("checked", !checkbox.prop("checked"));
        checkbox.toggleClass("visible-checkbox");
    }

    $("tbody").on("click", "tr", function () {
        $(this).toggleClass("selected");
        toggleCheckbox(this);
        updateSelectedRowData(this);
        checkSelectedRows();
    });

    function fetchMitraData() {
        $.ajax({
            url: 'http://localhost:3001/api/refresh-mitra',
            method: 'GET',
            success: function (response) {
                mitraData = response.mitraData;
                const tbody = $("tbody");
                tbody.empty();

                if (mitraData && mitraData.mitra.length > 0) {
                    $.each(mitraData.mitra, function (index, mitra) {
                        const row = `
                            <tr data-id="${mitra.id}">
                                <th scope="row">${index + 1}</th>
                                <td>${mitra.nama}</td>
                                <td>${mitra.sejak}</td>
                                <td>
                                    <a href="${mitra.link}" target="_blank">
                                        <img src="/storage/${mitra.img_src}" class="logo-image" style="height: 40px;">
                                    </a>
                                </td>
                                <td><input type="checkbox" class="custom-checkbox" style="display: none;"></td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                } else {
                    console.log('No mitra data available');
                }
            },
            error: function () {
                console.error("Error loading data");
            }
        });
    }
    
    fetchMitraData();

    function updateSelectedRowData(row) {
        const isSelected = $(row).hasClass("selected");
        const rowId = $(row).data("id");

        if (isSelected) {
            selectedRowData = mitraData.mitra.find(item => item.id === rowId);
        } else {
            selectedRowData = null;
        }
    }

    function checkSelectedRows() {
        const selectedRows = $("tr.selected").length;
        if (selectedRows === 1) {
            $(".editBtn").removeClass("disabled").prop("disabled", false);
            $(".deleteBtn").removeClass("disabled").prop("disabled", false);
        } else if (selectedRows === 0) {
            $(".addBtn").removeClass("disabled").prop("disabled", false);
            $(".editBtn").addClass("disabled").prop("disabled", true);
            $(".deleteBtn").addClass("disabled").prop("disabled", true);
        }
    }

    $(".addBtn").on("click", function () {
        $("#modalLabel").text("Add Mitra");
        $("#modalSaveButton").text("Add Mitra").show();
        $("#modalUpdateButton").hide();
        $("#mitraForm")[0].reset();
        $("#imagePreview").hide();
        selectedRowData = null;
    });

    $(".editBtn").on("click", function () {
        $("#modalLabel").text("Edit Mitra");
        $("#modalSaveButton").hide();
        $("#modalUpdateButton").text("Update Mitra").show();

        if (selectedRowData) {
            $("#inputNamaMitra").val(selectedRowData.nama);
            $("#inputSejak").val(selectedRowData.sejak);
            $("#inputLink").val(selectedRowData.link);
            $("#imagePreview").attr("src", `/storage/${selectedRowData.logo}`).show();
        }
    });

    $("#imageUpload").on("change", function () {
        const reader = new FileReader();
        reader.onload = function (e) {
            $("#imagePreview").attr("src", e.target.result).show();
        };
        reader.readAsDataURL(this.files[0]);
    });

    $('#modalSaveButton').on('click', function(e) {
        e.preventDefault();

        const formData = new FormData($('#mitraForm')[0]);

        $.ajax({
            url: '/api/add-mitra',  
            type: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                console.log('Mitra added successfully!', response);
                $('#exampleModal').modal('hide');  
                fetchMitraData(); 
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                console.log('Error:', errors);
            }
        });
    });

    $('#modalUpdateButton').on('click', function(e) {
        e.preventDefault();

        const mitraId = selectedRowData.id; 
        const formData = new FormData($('#mitraForm')[0]);

     
        $.ajax({
            url: `/CRUDMitra/update/${mitraId}`, 
            type: 'POST', 
            headers: {
                'X-HTTP-Method-Override': 'PUT'
            },
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Mitra updated successfully!', response);
                $('#exampleModal').modal('hide');  
                fetchMitraData();  
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                console.log('Error:', errors);
               
            }
        });
    });

 
    $(".deleteBtn").on("click", function () {
        const mitraId = selectedRowData.id; 

        $.ajax({
            url: `/api/delete-mitra/${mitraId}`, 
            type: 'DELETE',
            success: function(response) {
                console.log('Mitra deleted successfully!', response);
                fetchMitraData();  
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                console.log('Error:', errors);
            }
        });
    });
});
