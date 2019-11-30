<h1>Hello Laravel</h1>
{{-- comment trong blade --}}
Tên bạn là: <span style="color:red;font-weight: bold">{{$hotenTrongView}}</span>

<ul>
    @foreach($dataLoai as $item)
    <li>{{$item->l_ten}} - {{ $item->l_trangThai == 2 ? 'Khả dụng' : 'Khóa'}}</li>
    @endforeach
</ul>