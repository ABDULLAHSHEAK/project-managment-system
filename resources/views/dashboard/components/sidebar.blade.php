<div id="sideNavRef" class="side-nav-open">
    <!-- dashboard  -->

    <a href="{{url('/dashboard')}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>

@if (auth()->user()->user_type === 'admin')

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

    <!-- Categorys  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
         <i class="bi bi-bookmarks-fill"></i>
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

    <!-- Project  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-diagram-3-fill"></i>
            <span class="side-bar-item-caption">Project</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/project')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Project</span>
            </a> <br>
            <a href="{{ url('dashboard/project/create') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Add Project</span>
            </a><br>
            <a href="{{ url('dashboard/note') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Note</span>
            </a><br>
            <a href="{{ url('dashboard/task') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Task</span>
            </a> <br>
            <a href="{{ url('dashboard/collection') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Collection</span>
            </a>
        </div>
    </div>

 <!-- Expense  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-cash-coin"></i>
            <span class="side-bar-item-caption">Expense</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{url('dashboard/expense-category')}}">
                <i class="bi bi-dash-circle"></i>
                <span>Expense Category</span>
            </a> <br>
            <a href="{{ url('dashboard/expense') }}">
                <i class="bi bi-dash-circle"></i>
                <span>All Expense</span>
            </a>
        </div>
    </div>
@else
     <!-- Project  -->

    <div class="mainmenu">
        <a href="javascript:void(0)" class="side-bar-item" id="firstmenu">
            <i class="bi bi-diagram-3-fill"></i>
            <span class="side-bar-item-caption">Project</span>
            <i class="bi bi-arrow-right-short sub-icone"></i>
        </a>
        <div class="sub-menu" id="submenu" style="display: none;">
            <a href="{{route('project.view')}}">
                <i class="bi bi-dash-circle"></i>
                <span>All Project</span>
            </a>
        </div>
    </div>

@endif


    <!-- report  -->

    {{-- <div class="mainmenu">
        <a href="#" class="side-bar-item" id="firstmenu">
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span class="side-bar-item-caption">Report </span>
        </a>
    </div> --}}

    <!-- setting  -->

    {{-- <div class="mainmenu">
        <a href="#" class="side-bar-item" id="firstmenu">
            <i class="bi bi-gear-fill"></i>
            <span class="side-bar-item-caption">Settings </span>
        </a>
    </div> --}}
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
