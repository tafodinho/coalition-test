<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 100px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <form action="{{route('store')}}" method="post">
                {{ csrf_token() }}
              <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="productName" placeholder="Enter product name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Quantity in stock</label>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity in stock">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
              </div>

              <button class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="container flex-center">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Quantity in stock</th>
                  <th scope="col">Price</th>
                  <th scope="col">Date and Time created</th>
                  <th scope="col">Total Value Number</th>
                </tr>
              </thead>
              <tbody id="table-body">
                @foreach ($products as $product)
                    <tr>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->quantity_in_stock}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->created_at}}</td>
                      <td>{{$product->quantity_in_stock * $product->price}}</td>
                    </tr>
                @endforeach
                <div id="man"></div>
              </tbody>
            </table>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                // 2) Listen for the submission of the form.
                //console.log("formData");
                $("form").submit(function(event) {

                    // 3) Prevent an entire page load (or reload).
                    event.preventDefault();

                    // 4) Grab the information from the form needed for the Ajax request.
                    var formAction = $(this).attr('action'); // e.g. '/somethings'
                    var formMethod = $(this).attr('method'); // e.g. 'post'
                    var formData   = $(this).serializeArray() // grabs the form data and makes your params nicely structured!
                    console.log(formData);
                    $("#table-body").append("<tr><td>"+formData[0].value+"</td><td>"+formData[1].value+"</td><td>"+formData[2]value+"</td><td></td><td>"+formData[2].value * formData[1].value+"</td></tr>");
                    // 5) Make the Ajax request, which will hit the 'create' action in the 'somethings' controller
                    $.ajax({
                      url:  formAction,
                      type: formMethod,
                      data: formData,
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  }).done(function(response){
                      $("#man").load("<div>akjsdfkasf</div>")
                  });
                });
            });
        </script>

    </body>
</html>
