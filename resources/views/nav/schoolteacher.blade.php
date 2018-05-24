<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/school_teacher') ? 'active' : ''}}">
        <a href="{{route('school_teacher')}}">Dashboard
            @if (Request::is('dashboard/school_teacher'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/school_teacher/substitute_teachers*') ? 'active' : ''}}">
    	<a href="{{route('view_substitute_teachers-school_teacher')}}">Contact Substitute Teacher 
            @if (Request::is('dashboard/school_teacher/substitute_teachers*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
    <li class="{{ Request::is('dashboard/school_teacher/subdays*') ? 'active' : ''}}">
    	<a href="{{route('view_subdays-school_teacher')}}">Assigned Substitute Days
            @if (Request::is('dashboard/school_teacher/subdays*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
</ul>