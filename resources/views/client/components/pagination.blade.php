@if($totalPage > 1)
    <div class="ps-pagination">
        <ul class="pagination">
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            @for($i = 1; $i <= $totalPage; $i++)
                <li class="{{$currentPage == $i ? 'active' : ''}}"><a onclick="redirectUrl('page','{{$i}}')">{{$i}}</a></li>

            @endfor
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
@endif
