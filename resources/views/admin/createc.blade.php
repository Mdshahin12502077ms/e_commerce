<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @if(isset($cat_name))
     <h1>{{$cat_name}}</h1>
    
  @endif
    <form action="{{url('/add_cat')}}" method="POST">
      @csrf
    <label>Category Name</label><br><br>
    <input type="text" placeholder="Enter Category" name="cat_name"><br><br>
    <input type="submit" name="add_cat" value="Add">
    </form>
</body>
</html>