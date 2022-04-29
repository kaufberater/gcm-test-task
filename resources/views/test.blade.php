<body>
    <head>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> 
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet"> 
    </head>

   <div class="container">
    <h2>Gustavo Nakahara GCM Test</h1>
    <h3>Random Generators:</h2>

    @for ($i = 1; $i <= count($data); $i++)
        <div class="box">
            <p>Generator #{{ $i }}:</p>
            @foreach($data[$i] as $key => $value) 
            <p> {{ $key }} -> {{ $value }}</p>
            @endforeach
        </div>

    @endfor
   </div>
</body>