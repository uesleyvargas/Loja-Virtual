<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(17, 24, 39); /* Dark blue navy tone */
            color: #fff; /* White text */
        }
       .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #282828; /* Darker background for container */
            border: 1px solid #444; /* Dark gray border */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Darker shadow */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
       .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
       .logo {
            font-size: 24px;
            font-weight: bold;
        }
       .nav {
            display: flex;
        }
       .nav a {
            display: inline-block;
            margin-right: 20px;
            text-decoration: none;
            color: #fff; /* White link color */
        }
       .nav a:hover {
            color: #ccc; /* Lighter gray on hover */
        }
       .categories {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #222; /* Slightly lighter background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
       .category {
            border: 1px solid #444; /* Dark gray border */
            padding: 10px;
            text-align: center;
            cursor: pointer;
            background-color: #383838; /* Darker background for categories */
            border-radius: 5px; /* Rounded corners for categories */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
       .category:hover {
            background-color: #444; /* Darker gray on hover */
        }
       .new-category {
            border: 2px solid #444; /* Thicker border for new categories */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Different hover effect for new categories */
        }
       .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
       .product {
            width: 48%; /* Adjusted width for better layout */
            border: 1px solid #444; /* Dark gray border */
            padding: 10px;
            margin-bottom: 20px;
            background-color: #383838; /* Darker background for products */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
       .product-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .type-products{
            background-color: #383838;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .type-products h3{
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .type-products .categories{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .type-products .categories a{
            margin: 5px;
            padding: 10px 15px;
            background-color: #444;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }
        .type-products .categories a:hover{
            background-color: #555;
        }
        .type-products .categories a.new-category{
            border: 2px solid #444;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    
        <div class="header">
            <div class="logo">
            <img src="resources/img/logo.jpg">
                 Shopify Sales
            </div>
            <div class="nav">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </div>
        </div>
        <!-- Filtro por tipo de produto -->
        <div class="type-products">
            <h3>Tipos de Produtos</h3>
            <div class="categories">
                @foreach ($types as $type)
                    <a href="{{ route('filterProduct', $type->id) }}" class="category {{ $type->new? 'new-category' : '' }} bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-2 rounded-lg transition mr-2 text-m">{{ $type->name }}</a>
                @endforeach
            </div>
        </div>
        <!-- Produtos -->
        <div>
            <h3 class="text-2xl text-center font-semibold my-4">Lista de Produtos</h3>

            <div class="products">
                @foreach ($products as $product)
                    <div class="product">
                        <!-- Coluna da Imagem -->
                        <div class="grid grid-cols-2">
                            

                            <!-- Coluna das informações -->
                            <div class="ml-2">
                                <h4 class="font-semibold text-xl mb-2">{{ $product->name }}</h4>
                                <p class="text-gray-700 mb-4"> <b>Descrição:</b> {{ $product->description }}</p>
                                <p class="text-gray-800 font-semibold">Em estoque: {{ $product->quantity }} un</p>
                                <p class="text-gray-800 font-semibold">Preço: R$
                                    {{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    
</body>
</html>