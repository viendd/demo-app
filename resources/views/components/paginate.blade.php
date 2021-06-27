@if($totalPage > 1)
    <div class="pagination">
        <ul>
            @for($i = 1; $i <= $totalPage; $i++)
                <li onclick="loadPage('{{$route}}', '{{$i}}')" class="{{$currentPage == $i ? 'active' : ''}}"><a>{{$i}}</a></li>
            @endfor
        </ul>
    </div>
@endif
<script>
    function loadPage(route, page){
        window.location = route+'?page='+page
    }
</script>
<style>
    .pagination{
        float: right;
    }
    .pagination ul{
        display: flex;
    }
    .pagination ul li{
        text-decoration: none;
        list-style-type: none;
        width: 30px;
        height: 30px;
        text-align: center;
        margin-right: 10px;
        background-color: gainsboro;
        padding-top: 5px;
        cursor: pointer;
    }
    .pagination li.active {
        background-color: black !important;
        color: white;
    }
</style>
