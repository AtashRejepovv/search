
<nav class="navbar  navbar-expand-md navbar-dark bg-navbar text-gold">
    <i class="fa fa-list-ul fa-2x" id="menu-toggle"></i>

    <button tabindex="-1" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-gold"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">
            <li class="nav-item active">
                <a tabindex="-1" class="nav-link" href="#">
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  text-gold" tabindex="-1" href="#"><i class="fa fa-user"></i>
                    @if(isset(auth()->user()->role))
                    {{ auth()->user()->role->name }}: {{ auth()->user()->last_name }} {{ auth()->user()->first_name }}
                    @else
                       Myhman
                    @endif
                </a>
            </li>
            <li>
                <span class="nav-link text-gold display-5" id="MyClockDisplay" onload="showTime()"></span>
            </li>
        </ul>
    </div>
</nav>

<!-- digital watch -->
<script>
    function showTime(){
        var date = new Date();

        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59


        if(h == 0){
            h = 12;
        }

        if(h > 12){
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);
    }
    showTime();
</script>