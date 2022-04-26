<html>
    <body>
        <h1>Laravel Test</h1>
 
        @foreach($testResults as $series=>$test)
        	<h3>Test {{$series+1}}</h3>
        	@foreach($test as $key=>$value)
            	<p>{{ $key }} - {{ $value}}</p>
            @endforeach
        @endforeach
    </body>
</html>