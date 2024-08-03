<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Classes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">All Classes</h2>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">Class Name</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Time_From</th>
              <th scope="col">Time_To</th>
              <th scope="col">Is_Fulled</th>
              <th scope="col">Edit</th>
              <th scope="col">Details</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($classes as $class)
            <tr>
              <td scope="row">{{$class['classname']}}</td>
              <td>{{$class['price']}}</td>
              <td>{{Str::Limit($class['description'], 20, '...')}}</td>
              <td>{{ date('H:i', strtotime($class['time_From']))}}</td>
              <td>{{ date('H:i', strtotime($class['time_From']))}}</td>
              <td>@if($class['is_fulled']==1) yes @else no @endif</td>
              <td><a href="{{route('class_edit', $class['id'])}}">Edit</a></td>
              <td><a href="{{route('class_show', $class['id'])}}">Details</a></td>
              <!-- <td><a href="{{route('class_destroy', $class['id'])}}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td> -->
              <td>
                  <form action= "{{route('class_destroy', $class['id'])}}" method="POST">
                     @csrf
               @method('delete')
           <input type="hidden" name="id" value="{{ $class->id }}" >
             <input type="submit" value="delete" 
             ></td>
             </form>
            </td>
            </tr>
            <tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
