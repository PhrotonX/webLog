<title>
    @hasSection ('title')
        @yield('title') - WebLog
    @else
        Test Page
    @endif
</title>


<p>Test page</p>
<p>Id number: {{$id ?? "Error"}}</p>
@unless($id > 17)
    <p>{{$id}} cannot be less than 18.</p>
@endunless
@if(($id % 2) == 0)
    <p>{{$id}} is an even number.</p>
@else
    <p>{{$id}} is an odd number.</p>
@endif
<br>

{{-- @for($i = ($id - 10); $i > 0; $i--)
    <p>{{$i}}</p>

@endfor --}}

@while($id > 10)
{{$id--}}
@endwhile