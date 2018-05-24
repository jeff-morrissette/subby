<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/school_administrator') ? 'active' : ''}}">
        <a href="{{route('school_administrator')}}">Dashboard
            @if (Request::is('dashboard/school_administrator'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_administrator/teachers*') ? 'active' : ''}}">
        <a href="{{route('view_school_teachers-school_administrator')}}">Teachers
            @if (Request::is('dashboard/school_administrator/teachers*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_administrator/substitute_teachers*') ? 'active' : ''}}">
    	<a href="{{route('view_substitute_teachers-school_administrator')}}">Contact Substitute Teacher 
            @if (Request::is('dashboard/school_administrator/substitute_teachers*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
    <li class="{{ Request::is('dashboard/school_administrator/subdays*') ? 'active' : ''}}">
    	<a href="{{route('view_subdays-school_administrator')}}">Assigned Substitute Days
            @if (Request::is('dashboard/school_administrator/subdays*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
</ul>