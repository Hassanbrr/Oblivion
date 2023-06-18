<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>CREATE</h1>
      <form action="/create" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="imagefile" required/>
      <input type="text" name="title" placeholder="title" required/>
      <input type="text" name="description" placeholder="description" required/>
     

      </select>
      <input type="submit" value="Create">
  </form>
</body>

</html>
