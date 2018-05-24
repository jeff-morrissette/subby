<ul class="nav nav-sidebar">
    <li class="{{ Request::is('dashboard/substitute_teacher') ? 'active' : ''}}">
        <a href="{{route('substitute_teacher')}}">Dashboard
            @if (Request::is('dashboard/substitute_teacher'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/substitute_teacher/subdays*') ? 'active' : ''}}">
        <a href="{{route('view_subdays-substitute_teacher')}}">Substitute Days
            @if (Request::is('dashboard/substitute_teacher/subdays*'))
                <span class="sr-only">(current)</span>
            @endif
        </a>
    </li>
    <li class="{{ Request::is('dashboard/substitute_teacher/vacation*') ? 'active' : ''}}">
    	<a href="{{route('view_vacationdays-substitute_teacher')}}">Vacation Days
            @if (Request::is('dashboard/substitute_teacher/vacation*'))
                <span class="sr-only">(current)</span>
            @endif
    	</a>
    </li>
</ul>