@section('content')
    <h1>Hello World</h1>

    <h2>Products from BigCommerce:</h2>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
@endsection