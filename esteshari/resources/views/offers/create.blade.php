<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Add your offer

<form method="POST" action="{{route('offers.store')}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Offer Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Offer Price</label>
        <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Offer Details</label>
        <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="Enter Details">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
