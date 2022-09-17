<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Jyga </div>
    <div class="list-group">
        @can('admin')
            <a href="{{ route('dashboard') }}" tabindex="-1" title="Baş sahypa" class="list-group-item list-group-item-action bg-light">Baş sahypa<i class="fa fa-tachometer-alt float-right"></i></a>
        @endcan
        @can('admin')
            <a href="{{ route('users') }}" tabindex="-1" title="Ulanyjylar" class="list-group-item list-group-item-action bg-light">Ulanyjylar <i class="fa fa-address-card float-right"></i></a>
        @endcan
            <a href="{{ route('numbers') }}" tabindex="-1" title="Belgiler" class="list-group-item list-group-item-action bg-light">Belgiler <i class="fa fa-phone float-right"></i></a>
        {{--<a href="{{ route('settings') }}" tabindex="-1" title="Sazlamalar" class="list-group-item list-group-item-action bg-light">Sazlamalar <i class="fa fa-tools float-right"></i></a>--}}
        {{--@can('admin')--}}
            {{--<a href="{{ route('logs') }}" tabindex="-1" title="Loglar" class="list-group-item list-group-item-action bg-light">Loglar <i class="fa fa-search-location float-right"></i></a>--}}
        {{--@endcan--}}
            <a class="list-group-item list-group-item-action bg-light" href="{{route('logout')}}" onclick="return logout(event);">
            Çykmak<i class="fa fa-door-open float-right"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
<script type="text/javascript">
    function logout(event){
        event.preventDefault();
        var check = confirm("Siz hakykatdanam çykmagy isleýärsiňizmi?");
        if(check){
            document.getElementById('logout-form').submit();
        }
    }
</script>