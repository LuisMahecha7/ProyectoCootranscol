$(document).ready(function () {
    $('#filtro').click(function () {
        var start_date = $('#star').val();
        var end_date = $('#fin').val();

        $.ajax({
            url: 'filtrar.php',
            type: 'post',
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: 'json',
            success: function (response) {
                $('#dataTable tbody').empty();
                if (response.length === 0) {
                    alert("No se encontraron resultados")
                } else{

               

                $.each(response, function (index, item) {
                    var newRow = "<tr>" +
                        "<td>" + item.id_vencimiento + "</td>" +
                        "<td>" + item.placa + "</td>" +
                        "<td>" + item.propietario + "</td>" +
                        "<td>" + item.categoria + "</td>" +
                        "<td>" + item.fecha + "</td>" +
                        "<td>" +
                        "<button type='button' class='btn btn-warning'><i class='fa fa-edit'></i></button>" +
                        "<button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>" +
                        "</td>" +
                        "</tr>";

                    $('#dataTable tbody').append(newRow);
                });
            }
            }
        });
    });
});