<div id="sideNavRef" class="side-nav-open">
    <!-- dashboard  -->

    <a href="{{url('/dashboard')}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>


    <!-- profile  -->

    <a href="{{ route('profile.user') }}" class="side-bar-item">
        <i class="bi bi-person-circle"></i>
        <span class="side-bar-item-caption">Profile</span>
    </a>

    <!-- user  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-person"></i>
            <span class="side-bar-item-caption">User</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{ route('user.view') }}">
                <i class="bi bi-dash-circle"></i>
                <span>All Users</span>
            </a> <br>
            <a href="{{ route('add.user') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Add User</span>
            </a>
        </div>
    </div>
    <hr>

    {{-- Shift --}}

    <a href="{{ route('view.shift') }}" class="side-bar-item">
        <i class="bi bi-person-circle"></i>
        <span class="side-bar-item-caption">Shift</span>
    </a>

    <!-- Categorys  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-person-video3"></i>
            <span class="side-bar-item-caption">Categorys</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/employer-category')}}">
                <i class="bi bi-dash-circle"></i>
                <span>Employer Category</span>
            </a> <br>
            <a href="{{ url('dashboard/project-category') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Project Category</span>
            </a>
        </div>
    </div>


    <!-- Employers  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-people"></i>
            <span class="side-bar-item-caption">Employers</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/employer')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Employer</span>
            </a> <br>
            <a href="{{ url('dashboard/employer/create') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Add New Employer</span>
            </a>
        </div>
    </div>

    <!-- Client  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-person-video3"></i>
            <span class="side-bar-item-caption">Client</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/client')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Client</span>
            </a> <br>
            <a href="{{ url('dashboard/client/create') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Add Client</span>
            </a>
        </div>
    </div>

    <!-- package  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-bag"></i>
            <span class="side-bar-item-caption">Package</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/package')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Pakages</span>
            </a> <br>
            <a href="{{url('dashboard/package/create')}}">
                <i class="bi bi-dash-circle"></i>
                <span>Add Pakages</span>
            </a>
        </div>
    </div>

    <!-- member  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-people"></i>
            <span class="side-bar-item-caption">Member</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/member')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Member</span>
            </a> <br>
            <a href="{{url('dashboard/member/create')}}">
                <i class="bi bi-dash-circle"></i>
                <span>Add Member</span>
            </a> <br>
            <a href="{{route('old.member')}}">
                <i class="bi bi-dash-circle"></i>
                <span>Old Member</span>
            </a>
        </div>
    </div>

    <!-- health Checkup   -->

    <div class="mainmenu">
        <a href="{{url('dashboard/health-status')}}" class="side-bar-item" id="firstmenu">
            <i class="bi bi-heart-pulse"></i>
            <span class="side-bar-item-caption">Health Checkup </span>
        </a>
    </div>

    <!-- make payment  -->

    <div class="mainmenu">
        <a href="payment.html" class="side-bar-item" id="firstmenu">
            <i class="bi bi-currency-dollar"></i>
            <span class="side-bar-item-caption">Make Payment </span>
        </a>
    </div>

    <!-- transaction  -->

    <div class="mainmenu">
        <a href="transaction.html" class="side-bar-item" id="firstmenu">
            <i class="bi bi-receipt"></i>
            <span class="side-bar-item-caption">Transaction </span>
        </a>
    </div>

    <!-- report  -->

    <div class="mainmenu">
        <a href="report.html" class="side-bar-item" id="firstmenu">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span class="side-bar-item-caption">Report </span>
        </a>
    </div>

    <!-- setting  -->

    <div class="mainmenu">
        <a href="setting.html" class="side-bar-item" id="firstmenu">
            <i class="bi bi-gear-fill"></i>
            <span class="side-bar-item-caption">Settings </span>
        </a>
    </div>
</div>

<script>
    document.querySelectorAll('.mainmenu').forEach((item) => {
        item.querySelector('.side-bar-item').addEventListener('click', (e) => {
            const subMenu = item.querySelector('.sub-menu')
            if (subMenu.style.display === "none") {
                subMenu.style.display = "block"
            } else {
                subMenu.style.display = "none"
            }
        })
    })
</script>
