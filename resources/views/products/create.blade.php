<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 2rem;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: auto;
      margin-top: 50px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
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
<body>
    <h1>Create a Product</h1>
    <form method="post" action="{{route('product.store')}}">
        @csrf {{-- Purpose: Protects your application from Cross-Site Request Forgery (CSRF) attacks. --}}
        @method('post') {{-- Purpose: Overrides the form's default HTTP method (usually GET) to a POST request. --}}
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>

        <div>
            <label for="">Quantity</label>
            <input type="text" name="qty" placeholder="Quantity">
        </div>

        <div>
            <label for="">Price</label>
            <input type="text" name="price" placeholder="Price">
        </div>

        <div>
            <label for="">Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" value="Save a new Product">
        </div>

    </form>
</body>
</html>
