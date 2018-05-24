<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/school_division_administrator') ? 'active' : ''}}">
        <a href="{{route('school_division_administrator')}}">Dashboard 
            @if (Request::is('dashboard/school_division_administrator'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_division_administrator/schools*') ? 'active' : ''}}">
        <a href="{{route('view-schools-school_division_administrator')}}">Schools
            @if (Request::is('dashboard/school_division_administrator/schools*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_division_administrator/school_administrators*') ? 'active' : ''}}">
        <a href="{{route('view_school_administrators-school_division_administrator')}}">School Administrators
            @if (Request::is('dashboard/school_division_administrator/school_administrators*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_division_administrator/principal*') ? 'active' : '' }}">
        <a href="{{route('view_principals-school_division_administrator')}}">Principals
             @if (Request::is('dashboard/school_division_administrator/principal*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_division_administrator/teacher*') ? 'active' : '' }}">
        <a href="{{route('view_teachers-school_division_administrator')}}">Teachers
            @if (Request::is('dashboard/school_division_administrator/teacher*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_division_administrator/substitute_teachers*') ? 'active' : '' }}">
        <a href="{{route('view_substitute_teachers-school_division_administrator')}}">Substitute Teachers
             @if (Request::is('dashboard/school_division_administrator/substitute_teachers*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
</ul>