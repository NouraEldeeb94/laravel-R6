<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit product</title>
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
        <h2 class="fw-bold fs-2 mb-5 pb-2">edit Product</h2>
        <form action="{{route('product_update', $product->id)}}" method="post" enctype="multipart/form-data" class="px-md-5">
          @csrf
          @method('put')
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">product_name:</label>
            <div class="col-md-10">
              <input type="text" placeholder="english" class="form-control py-2"  name="title" value="{{old('title', $product->title)}}"/>
              @error('title')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Price:</label>
            <div class="col-md-10">
              <input type="number" step="0.1" placeholder="Enter price" class="form-control py-2" name="price" value="{{old('price', $product->price)}}"/>
              @error('price')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">Description:</label>
            <div class="col-md-10">
              <textarea  id="" cols="30" rows="5" class="form-control py-2" name="description">{{old('description', $product->description)}}
              </textarea>
              @error('description')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
            </div>
          </div>
          <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Time:</label
              >
              <div class="col-md-10">
                <label for="" class="form-label">From <input type="time" class="form-control" name="time_from" value="{{ date('H:i', strtotime($product['time_From'])) }}"  ></label>
                <label for="" class="form-label">To <input type="time" class="form-control" name="time_to" value="{{ date('H:i', strtotime($product['time_From'])) }}" ></label>
              </div>
            </div>
          <div class="form-group mb-3 row">
            <label for="" class="form-label col-md-2 fw-bold text-md-end">published:</label>
            <div class="col-md-10">
              <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" @checked(old('published',$product->is_fulled))/>
            </div>
          </div>
          <hr>
            <div class="form-group mb-3 row">
              <label for="" class="form-label col-md-2 fw-bold text-md-end"
                >Image:</label
              >
              <div class="col-md-10">
                <input
                  type="file"
                  class="form-control"
                  style="padding: 0.7rem;" name="image" value="{{$product->image}}"
                />
              </div>
              @error('image')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
               <img src="{{asset('assets/images/' .$product->image)}}"
                alt="" class="card-img">
            </div>
          <div class="text-md-end">
            <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
              Edit class
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>