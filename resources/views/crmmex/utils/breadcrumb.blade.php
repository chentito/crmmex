
<ol class="breadcrumb rounded-0 {{$estilo}} shadow">
    @foreach( $elementos AS $elemento )
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ucfirst($elemento)}}</a></li>
    @endforeach
</ol>
