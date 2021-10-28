<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Parqueamento</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css" />
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="title-h1 d-flex row">
    <div class="col-6">
      <img src="./imgs/fxlogo2.png" />
    </div>
    <div class="col-6 text-end align-self-end">
      <h5 class="title is-4 text-secondary">Best imported cars</h5>
    </div>
  </div>
  <!-- ------Vehicle Registration Form------- -->
  <div class="main-form">
    <div class="col-12">
      <div class="box">
        <strong class="car-reg">Car Registration Form</strong>

        <div class="row mt-3">
          <div class="field col-6">
            <label class="label">Brand</label>
            <div class="control">
              <div class="select w-100">
                <select class="w-100" id="brand" type="text">
                  <option value="">Select a brand car</option>
                  <option value="Audi">Audi</option>
                  <option value="BMW">BMW</option>
                  <option value="Chevrolet">Chevrolet</option>
                  <option value="Hyundai">Hyundai</option>
                  <option value="Honda">Honda</option>
                  <option value="Jeep">Jeep</option>
                  <option value="Kia">Kia</option>
                  <option value="Toyota">Toyota</option>
                  <option value="Volvo">Volvo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="field col-6">
            <label class="label">Model</label>
            <div class="control">
              <input class="input" type="text" placeholder="Model" id="model" />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="field col-6">
            <label class="label">Motor</label>
            <div class="control">
              <input class="input" type="text" placeholder="Motor" id="motor" />
            </div>
          </div>

          <div class="field col-6">
            <label class="label">Manufacture year</label>
            <div class="control">
              <input class="input" type="text" placeholder="Manufacture year" id="year" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="field col-6">
            <label class="label">Mileage</label>
            <div class="control">
              <input class="input" type="text" placeholder="Mileage" id="mileage" />
            </div>
          </div>

          <div class="field col-6">
            <label class="label">Price</label>
            <div class="control">
              <input class="input" type="text" placeholder="Price" id="price" />
            </div>
          </div>
        </div>

        <div class="text-end d-flex-end">
          <button class="button is-link " id="delete">
          <span class="iconify-inline" data-icon="ant-design:delete-filled" style="color: white;" data-width="27" data-height="27"></span>
          </button>
          <button class="button is-link ms-3" id="saveChanges">
          <span class="iconify-inline" data-icon="dashicons:update-alt" style="color: white;" data-width="27" data-height="27"></span>
          </button>
          <button class="button is-link ms-3" id="save">
            <span class="iconify-inline me-1" data-icon="fad:save" style="color: white" data-width="27" data-height="27"></span>
            <span>Save</span>
          </button>

        </div>
      </div>
    </div>
    <!-- --------------------------------------------------- -->
  </div>
  <div class="col-12 mt-3 box table-cars">
    <div class="flex-row-reverse d-flex">
      <span  class="iconify-inline mt-3 " data-icon="cil:search" style="color: #3f51b5" data-width="32" data-height="32"></span>

      
      <div class="control me-2 w-25">
        <input class="input" type="text" id="searching" onkeyup="myFunction()" placeholder="Search for car brand" />
      </div>
    </div>
    <table class="table table-main vehicles" id="myTable">
      <thead>
        <tr>
          <th><abbr title="Código do Carro">ID</abbr></th>
          <th><abbr title="Marca">Brand</abbr></th>
          <th><abbr title="Modelo">Model</abbr></th>
          <th><abbr title="Tipo de motor">Motor</abbr></th>
          <th><abbr title="Ano de fabrico">Manufacture year</abbr></th>
          <th><abbr title="Kilometragem">Mileage</abbr></th>
          <th><abbr title="Preço">Price (MZN)</abbr></th>
          <th><abbr title="Mais">Actions</abbr></th>
        </tr>
      </thead>

      <tbody id="myTableData">
      </tbody>
    </table>

    <table class="table align-self-end">
      <tfoot>
        <tr class="total is-link">
          <th>Total: <strong id="total">0</strong>  vehicles</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="iconify-inline" data-icon="bytesize:chevron-top" style="color: white" data-width="25" data-height="25"></span>
  </button>

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
   $.ajax({
              method: 'GET',
              url: "/parqueamento/view/controller/getVehicles.php",
              
            }).done(function(rs) {

              
              $("#brand").val("");
            $("#model").val("");
            $("#motor").val("");
            $("#year").val("");
            $("#mileage").val("");
            $("#price").val("");

              var data = JSON.parse(rs);

    var myDiv = document.getElementById("total");
  myDiv.innerHTML = data.length;
  
    var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );

            }

            $(".editCar").click(function() {

              document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              
              });

            })

  </script>
  <script type="text/javascript">
  var myDiv = document.getElementById("total");
  
    var selectedCar;
    $(function() {


      /* ----------------------Save Vehicle-------------------- */
      $("#save").on("click", function() {
        var brand = $("#brand").val();
        var model = $("#model").val();
        var motor = $("#motor").val();
        var year = $("#year").val();
        var mileage = $("#mileage").val();
        var price = $("#price").val();

        if (brand == "" || model == "" || motor == "" || year == "" || mileage == "" || price == "") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Por favor, preencha todos campos!",
            showConfirmButton: false,
            timer: 1500,
          });

          event.preventDefault();
        } else {

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
            var data = JSON.parse(rs);
            myDiv.innerHTML = data.length;
            console.log(data);

            Swal.fire({
              position: "center",
              icon: "success",
              title: "Viatura adicionada com sucessso",
              showConfirmButton: false,
              timer: 1500,
            });

            $("#brand").val("");
            $("#model").val("");
            $("#motor").val("");
            $("#year").val("");
            $("#mileage").val("");
            $("#price").val("");

            var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );
            }

            //Selecionar-----------------------
            $(".editCar").click(function() {

              document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              



            });



          });
        }
      });

      /* ----------------------Update Vehicle-------------------- */

      $("#saveChanges").on('click', function() {

        var brand = $("#brand").val();
        var model = $("#model").val();
        var motor = $("#motor").val();
        var year = $("#year").val();
        var mileage = $("#mileage").val();
        var price = $("#price").val();



        if (brand == "" || model == "" || motor == "" || year == "" || mileage == "" || price == "") {

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
            url: "/parqueamento/view/controller/update.php",
            data: {
              "brand": brand,
              "model": model,
              "motor": motor,
              "year": year,
              "mileage": mileage,
              "price": price,
              "id": selectedCar
            },

          }).done(function(rs) {

            var data = JSON.parse(rs);
            myDiv.innerHTML = data.length;
            console.log(data);

            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Viatura acctualizada com sucessso',
              showConfirmButton: false,
              timer: 1500
            })

            $("#brand").val("");
            $("#model").val("");
            $("#motor").val("");
            $("#year").val("");
            $("#mileage").val("");
            $("#price").val("");

            var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );

            }
            //Selecionar-----------------------
            $(".editCar").click(function() {

              document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
              topFunction();
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              
              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              

              selectedCar = $id;
              

            });
          })

        }
      })



      /* ----------------------Delete Vehicle-------------------- */

      $("#delete").on('click', function() {

        $.ajax({
          method: 'POST',
          url: "/parqueamento/view/controller/delete.php",
          data: {
            "id": selectedCar
          },

        }).done(function(rs) {

          // var result =data; 
          var data = JSON.parse(rs);
          myDiv.innerHTML = data.length;

          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Viatura eliminada com sucesso!',
            showConfirmButton: false,
            timer: 1500
          })

          $("#brand").val("");
          $("#model").val("");
          $("#motor").val("");
          $("#year").val("");
          $("#mileage").val("");
          $("#price").val("");

          var carros = $('#myTable tbody');
          carros.empty();

          for (var i = 0; i < data.length; i++) {

            var id = data[i].id;
            var brand = data[i].brand;
            var model = data[i].model;
            var motor = data[i].motor;
            var year = data[i].year;
            var mileage = data[i].mileage;
            var price = data[i].price;

            carros.append('<tr><td class="id">' + id +
              '</td><td class="brand">' + brand +
              '</td><td class="model">' + model +
              '</td><td class="motor">' + motor +
              '</td><td class="year">' + year +
              '</td><td class="mileage">' + mileage +
              '</td><td class="price">' + price +
              '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
            );
          }

          /* ----------------------Select Vehicle-------------------- */
          $(".editCar").click(function() {

            document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              

            });
        })
      })
      //Actualizar--------------------------------------------------------------------------------------------
      $("#searching").keyup(function() {

var searched = $("#searching").val();
console.log(searched)
  $.ajax({
    method: 'POST',
    url: "/parqueamento/view/controller/search.php",
    data: {
      "brand": searched
    },

  }).done(function(rs) {

    // var result =data; 
    var data = JSON.parse(rs);
    myDiv.innerHTML = data.length;
    console.log(data);    //-----------------------------------------------
    var carros = $('#myTable tbody');
            carros.empty();

            for (var i = 0; i < data.length; i++) {

              var id = data[i].id;
              var brand = data[i].brand;
              var model = data[i].model;
              var motor = data[i].motor;
              var year = data[i].year;
              var mileage = data[i].mileage;
              var price = data[i].price;

              carros.append('<tr><td class="id">' + id +
                '</td><td class="brand">' + brand +
                '</td><td class="model">' + model +
                '</td><td class="motor">' + motor +
                '</td><td class="year">' + year +
                '</td><td class="mileage">' + mileage +
                '</td><td class="price">' + price +
                '</td><td><button type="button" class="editCar btn btn-sm text-white" data-toggle="modal" data-target="#editModal">' + '<span class="iconify-inline editCar" data-icon="ci:edit" style="color: gray;" data-width="24" data-height="24"></span>' + '</button>' + '</td></tr>'
              );

            }

            $(".editCar").click(function() {

              document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
              var $row = $(this).closest("tr"); // Find the row
              var $id = $row.find(".id").text(); // Find the text
              var $brand = $row.find(".brand").text(); // Find the text
              var $model = $row.find(".model").text(); // Find the text
              var $motor = $row.find(".motor").text(); // Find the text
              var $year = $row.find(".year").text(); // Find the text
              var $mileage = $row.find(".mileage").text(); // Find the text
              var $price = $row.find(".price").text(); // Find the text

              $('#brand').val($brand);
              $('#model').val($model);
              $('#motor').val($motor);
              $('#year').val($year);
              $('#mileage').val($mileage);
              $('#price').val($price);
              // Let's test it out

              selectedCar = $id;
              

    })

 

  })
})
    
//----fim actualizar
    });
  </script>
</body>

</html>