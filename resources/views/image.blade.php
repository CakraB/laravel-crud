<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{url('/upload/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="">@lang('message.title')</label>
        <input type="text" name="title" placeholder="Input Your Title"><br>
        @error('title')
            <span>
                <strong>{{$message}}</strong>
            </span>
        @enderror
        <br>
        <label for="">{{__('message.description')}}</label>
        <input type="text" name="description" placeholder="Input Your Description"><br>
        @error('description')
            <span>
                <strong>{{$message}}</strong>
            </span>
        @enderror
        <br>
        <label for="">{{__('message.image')}}</label>
        <input type="file" name="image"><br>
        @error('image')
            <span>
                <strong>{{$message}}</strong>
            </span>
        @enderror
        <br>
        <input type="submit" value="submit">
    </form>
    <table border=1>
        <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
            <tr>
                <td>{{$image->title}}</td>
                <td>{{$image->description}}</td>
                <td><img style="height:200px;" src="{{'storage/images/'.$image->image}}" alt=""></td>
            <td><a href="{{url('/upload/'.$image->id.'/edit')}}">Edit</a> | <a href="{{url('/upload/'.$image->id.'/delete')}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
