<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Products</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin: auto;
      margin-top: 50px;
    }

    th, td {
      padding: 10px;
      border: none; /* Removed borders for clean look */
      text-align: left;
    }

    th {
      background-color: #f0f0f0;
      font-weight: bold;
    }

    .success {
      color: green;
      margin-bottom: 1rem;
    }

    a,
    form {
      display: inline-block;
      margin-right: 5px;
    }

    input[type="text"], input[type="submit"] {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }
    input[type="submit"] {
      background-color: #333;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Products</h1>
  @if (session()->has('success'))
    <div class="success">
      {{ session('success') }}
    </div>
  @endif
  <table cellspacing="0">  <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->qty}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        <td>
        <form action="{{ route('product.edit', ['product' => $product]) }}" method="get">
            @csrf
            @method('update')
            <input type="submit" value="Update">
        </form>
        </td>
        <td>
          <form action="{{ route('product.destroy', ['product' => $product]) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  <div>
    <form action="{{ route('product.create')}}" method="get">
        <input type="submit" value="Create a Product">
    </form>
  </div>
</body>
</html>
