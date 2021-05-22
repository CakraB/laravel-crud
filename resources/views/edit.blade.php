<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{url('/upload/'.$image->id.'/update')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="">Title</label>
        <input type="text" name="title" value="{{$image->title}}"><br>

        <label for="">Description</label>
        <input type="text" name="description" value="{{$image->description}}"><br>

        <label for="">Image</label>
        <input type="file" name="image"><br>
        <img style="height:200px;" src="{{asset('storage/images/'.$image->image)}}" alt="">
        <input type="submit" value="submit">
    </form>
    </table>
</body>
</html>
