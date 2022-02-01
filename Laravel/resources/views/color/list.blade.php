@isset($color)
<ul>
    @foreach($color as $color)
        <li>{{$color->name}} ({{$color->hex}})</li>
        
</ul>