<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
  
    <div class="container d-flex justify-content-center pt-4">
        <div class="col-md-9">
            <h2 class="text-center mb-3">Add Remove input fields</h2>
            <form action="/post" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $index=>$error)
                                <li>{{ ++$index.' '. $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                
                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mark</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="inputs[0][name]" class="form-control" placeholder="Enter Name"></td>
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                        <td><input type="email" name="inputs[0][email]" class="form-control" placeholder="Enter Email"></td>
                        <td><input type="number" name="inputs[0][mark]" class="form-control" placeholder="Enter Mark"></td>
                        <td><button type="button" class="btn btn-primary" name="add" id="add" >Add More</button></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary col-md-2">Submit</button>
            </form>
        </div>
    </div>

    <script>
        var i = 0;
        $('#add').click(function(){
            ++i;
            $('#table').append(
                `<tr id = "dismis">
                    <td><input type="text" name="inputs[`+i+`][name]" class="form-control" placeholder="Enter Name"></td>
                    <td><input type="email" name="inputs[`+i+`][email]" class="form-control" placeholder="Enter Email"></td>
                    <td><input type="number" name="inputs[`+i+`][mark]" class="form-control" placeholder="Enter Mark"></td>
                    <td><button type="button" class="btn btn-danger remove-table-row" >Remove</button></td>
                </tr>`);
        });

        $(document).on('click','.remove-table-row', function(){
            $(this).parents('#dismis').remove();
        })
    </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>