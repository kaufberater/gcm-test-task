@if( isset( $info ) && !empty( $info ) )
    <p><h5>Starting generator...</h5></p>
    @foreach( $info as $item )
        @if( isset( $item['original'] ) && isset( $item['converted'] ) )
            <p>{{ $item['original'] }} -> {{ $item['converted'] }}</p>
        @endif
    @endforeach
@endif