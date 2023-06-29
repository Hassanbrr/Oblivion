<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <form action="/update/{{ $singers->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1>Edit</h1>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1"></label>
                        <input value="{{ $singers->title }}" name="title" type="text" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">

                        <textarea name="description" class="form-control">{{ $singers->description }}</textarea>
                    </div>
                    <div class="mb-3 form-control">
                        <label for="exampleInputEmail1" class="form-control">chose the image</label>
                        <input name="imagefile" type="file" class="form-control" id="exampleCheck1">
                        <p><img src="{{ url('/uploads/' . $singers->image) }}"width="100px" height="100px"></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
