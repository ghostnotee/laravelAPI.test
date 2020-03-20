{{ $name }} <br>
Product id: {{ $id }}, Type: {{ $r_type }}
<div class="container">
    @if ($id==1)
    1 numaralı ürün gösterilmektedir.
    @elseif($id==2)
    2 Numaralı ürün gösterilmektedir.
    @else
    Diğer bir ürün gösterilmektedir.
    @endif
</div>
<div class="container">
    @for ( $i=0; $i<10; $i++ )
    döngü değeri {{$i}} <br>
    @endfor
</div>

<div>
    @foreach($categories as $category)
    {{ $category }} <br>
    @endforeach
</div>

{{-- deneme --}}
