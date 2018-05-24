<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/super_administrator') ? 'active' : ''}}">
        <a href="{{route('super_administrator')}}">Roles and Permissions
            @if (Request::is('dashboard/super_administrator'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/school_divisions*') ? 'active' : '' }}">
        <a href="{{route('view_school_divisions-super_administrator')}}">School Divisions
             @if (Request::is('dashboard/super_administrator/school_divisions*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/school_division_administrators*') ? 'active' : '' }}">
        <a href="{{route('view_school_division_administrator-super_administrator')}}">School Division Administrators
             @if (Request::is('dashboard/super_administrator/school_division_administrators*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/schools*') ? 'active' : '' }}">
        <a href="{{route('view_schools-super_administrator')}}">Schools
             @if (Request::is('dashboard/super_administrator/schools*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/school_administrators*') ? 'active' : '' }}">
        <a href="{{route('view_school_administrators-super_administrator')}}">School Administrators
             @if (Request::is('dashboard/super_administrator/school_administrators*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/principals*') ? 'active' : '' }}">
        <a href="{{route('view_principals-super_administrator')}}">Principals
             @if (Request::is('dashboard/super_administrator/principals*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/teachers*') ? 'active' : '' }}">
        <a href="{{route('view_teachers-super_administrator')}}">Teachers
            @if (Request::is('dashboard/super_administrator/teachers*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/super_administrator/substitute_teachers*') ? 'active' : '' }}">
        <a href="{{route('view_substitute_teachers-super_administrator')}}">Substitute Teachers
             @if (Request::is('dashboard/super_administrator/substitute_teachers*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
</ul>