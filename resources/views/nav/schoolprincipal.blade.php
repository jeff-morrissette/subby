<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/school_principal') ? 'active' : ''}}">
        <a href="{{route('school_principal')}}">Dashboard
            @if (Request::is('dashboard/school_principal'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_principal/teachers*') ? 'active' : ''}}">
        <a href="{{route('view_school_teachers-school_principal')}}">Teachers
            @if (Request::is('dashboard/school_principal/teachers*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_principal/substitute_teachers*') ? 'active' : ''}}">
    	<a href="{{route('view_substitute_teachers-school_principal')}}">Contact Substitute Teacher 
            @if (Request::is('dashboard/school_principal/substitute_teachers*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
    <li class="{{ Request::is('dashboard/school_principal/subdays*') ? 'active' : ''}}">
    	<a href="{{route('view_subdays-school_principal')}}">Assigned Substitute Days
            @if (Request::is('dashboard/school_principal/subdays*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
</ul>