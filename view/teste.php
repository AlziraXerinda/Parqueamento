<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parqueamento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css" />

    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

    <input type="text" placeholder="Marca" id="brand">
    <input type="text" placeholder="Modelo" id="model">
    <input type="text" placeholder="Motor" id="motor">
    <input type="text" placeholder="Ano" id="year">
    <input type="text" placeholder="Kilometragem" id="mileage">
    <input type="text" placeholder="Preço" id="price">

    <button t id="save">Save</button>


    <script type="text/javascript">
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block ";
            } else {
                mybutton.style.display = "none ";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        // Get all dropdowns on the page that aren't hoverable.
        const dropdowns = document.querySelectorAll(
            ".dropdown:not(.is-hoverable)"
        );

        if (dropdowns.length > 0) {
            // For each dropdown, add event handler to open on click.
            dropdowns.forEach(function(el) {
                el.addEventListener("click", function(e) {
                    e.stopPropagation();
                    el.classList.toggle("is-active");
                });
            });

            // If user clicks outside dropdown, close it.
            document.addEventListener("click", function(e) {
                closeDropdowns();
            });
        }

        /*
         * Close dropdowns by removing `is-active` class.
         */
        function closeDropdowns() {
            dropdowns.forEach(function(el) {
                el.classList.remove("is-active");
            });
        }

        // Close dropdowns if ESC pressed
        document.addEventListener("keydown", function(event) {
            let e = event || window.event;
            if (e.key === "Esc" || e.key === "Escape") {
                closeDropdowns();
            }
        });

        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#save").on("click", function() {
                var brand = $("#brand").val();
                var model = $("#model").val();
                var motor = $("#motor").val();
                var year = $("#year").val();
                var mileage = $("#mileage").val();
                var price = $("#price").val();

                if (brand == "" || model == "") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Por favor, preencha todos campos",
                        showConfirmButton: false,
                        timer: 1500,
                    });

                    event.preventDefault();
                } else {
                    alert(mileage || brand)
                    $.ajax({
                        method: 'POST',
                        url: "/parqueamento/view/controller/insert.php",
                        data: {
                            "brand": brand,
                            "model": model,
                            "motor": motor,
                            "year": year,
                            "mileage": mileage,
                            "price": price
                        },
                    }).done(function(rs) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Viatura adicionada com sucessso",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        alert(data)
                        $("#brand").val("");
                        $("#model").val("");
                        $("#motor").val("");
                        $("#year").val("");
                        $("#mileage").val("");
                        $("#price").val("");
                    });
                }
            });
        });
    </script>


</body>

</html>



<script type="text/javascript">
    var selecionado;
    $(function() {
        $("#save").on('click', function() {


            var marca = $("#marca").val();
            var modelo = $("#modelo").val();
            var ano = $("#ano").val();
            var preco = $("#preco").val();



            if (marca == '' || modelo == '' || ano == '' || preco == '') {

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Por favor, preencha todos campos',
                    showConfirmButton: false,
                    timer: 1500
                })

                event.preventDefault();

            } else {



                $.ajax({
                    method: 'POST',
                    url: "/googlemotors/view/controller/carroDAO.php",
                    data: {
                        "marca": marca,
                        "modelo": modelo,
                        "ano": ano,
                        "preco": preco
                    },

                }).done(function(rs) {

                    // var result =data; 
                    var data = JSON.parse(rs);
                    console.log(data);




                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Carro adicionado com sucessso',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#marca').val('');
                    $('#modelo').val('');
                    $('#ano').val('');
                    $('#preco').val('');

                    //------------------------------------------------


                    //$('#searchResults').show();

                    var carros = $('#carros tbody');
                    carros.empty();

                    for (var i = 0; i < data.length; i++) {

                        var id = data[i].cid;
                        var marca = data[i].marca;
                        var modelo = data[i].modelo;
                        var ano = data[i].ano;
                        var preco = data[i].preco;


                        carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                            '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                            '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



                    }

                    //Selecionar-----------------------
                    $(".btSelecionar").click(function() {
                        var $row = $(this).closest("tr"); // Find the row
                        var $cid = $row.find(".cid").text(); // Find the text
                        var $marca = $row.find(".marca").text(); // Find the text
                        var $modelo = $row.find(".modelo").text(); // Find the text
                        var $ano = $row.find(".ano").text(); // Find the text
                        var $preco = $row.find(".preco").text(); // Find the text

                        $('#marca').val($marca);
                        $('#modelo').val($modelo);
                        $('#ano').val($ano);
                        $('#preco').val($preco);
                        // Let's test it out
                        selecionado = $cid;
                        alert(selecionado);



                    });








                })
            }

        })



        //Apagar---------------------------------------------------------------------------------------------

        $("#delete").on('click', function() {

            $.ajax({
                method: 'POST',
                url: "/googlemotors/view/controller/delete.php",
                data: {
                    "cid": selecionado
                },

            }).done(function(rs) {

                // var result =data; 
                var data = JSON.parse(rs);
                alert("entreieee");




                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Carro eliminado',
                    showConfirmButton: false,
                    timer: 1500
                })

                $('#marca').val('');
                $('#modelo').val('');
                $('#ano').val('');
                $('#preco').val('');


                //------------------------------------------------




                var carros = $('#carros tbody');
                carros.empty();

                for (var i = 0; i < data.length; i++) {

                    var id = data[i].cid;
                    var marca = data[i].marca;
                    var modelo = data[i].modelo;
                    var ano = data[i].ano;
                    var preco = data[i].preco;


                    carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                        '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                        '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



                }

                //selecionar-----------------------
                $(".btSelecionar").click(function() {
                    var $row = $(this).closest("tr"); // Find the row
                    var $cid = $row.find(".cid").text(); // Find the text
                    var $marca = $row.find(".marca").text(); // Find the text
                    var $modelo = $row.find(".modelo").text(); // Find the text
                    var $ano = $row.find(".ano").text(); // Find the text
                    var $preco = $row.find(".preco").text(); // Find the text

                    $('#marca').val($marca);
                    $('#modelo').val($modelo);
                    $('#ano').val($ano);
                    $('#preco').val($preco);
                    // Let's test it out
                    selecionado = $cid;
                    alert(selecionado);



                });








            })





        })
        //----fim apagar


        //Actualizar---------------------------------------------------------------------------------------------

        $("#update").on('click', function() {

            var marca = $("#marca").val();
            var modelo = $("#modelo").val();
            var ano = $("#ano").val();
            var preco = $("#preco").val();



            if (marca == '' || modelo == '' || ano == '' || preco == '') {

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Por favor, preencha todos campos',
                    showConfirmButton: false,
                    timer: 1500
                })

                event.preventDefault();

            } else {



                $.ajax({
                    method: 'POST',
                    url: "/googlemotors/view/controller/update.php",
                    data: {
                        "marca": marca,
                        "modelo": modelo,
                        "ano": ano,
                        "preco": preco,
                        "cid": selecionado
                    },

                }).done(function(rs) {

                    // var result =data; 
                    var data = JSON.parse(rs);
                    console.log(data);




                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Carro acctualizado com sucessso',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#marca').val('');
                    $('#modelo').val('');
                    $('#ano').val('');
                    $('#preco').val('');

                    //------------------------------------------------




                    var carros = $('#carros tbody');
                    carros.empty();

                    for (var i = 0; i < data.length; i++) {

                        var id = data[i].cid;
                        var marca = data[i].marca;
                        var modelo = data[i].modelo;
                        var ano = data[i].ano;
                        var preco = data[i].preco;


                        carros.append('<tr><td class="cid">' + id + '</td><td class="marca">' + marca + '</td><td class="modelo">' + modelo +
                            '</td><td class="ano">' + ano + '</td><td class="preco">' + preco + '</td>' +
                            '<td><button type="button" class="btSelecionar btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#editModal">' + 'selecionar' + '</button>' + '</td></tr>');



                    }

                    //selecionar-----------------------
                    $(".btSelecionar").click(function() {
                        var $row = $(this).closest("tr"); // Find the row
                        var $cid = $row.find(".cid").text(); // Find the text
                        var $marca = $row.find(".marca").text(); // Find the text
                        var $modelo = $row.find(".modelo").text(); // Find the text
                        var $ano = $row.find(".ano").text(); // Find the text
                        var $preco = $row.find(".preco").text(); // Find the text

                        $('#marca').val($marca);
                        $('#modelo').val($modelo);
                        $('#ano').val($ano);
                        $('#preco').val($preco);
                        // Let's test it out
                        selecionado = $cid;
                        alert(selecionado);



                    });








                })

            }



        })
        //----fim apagar



    })
</script>