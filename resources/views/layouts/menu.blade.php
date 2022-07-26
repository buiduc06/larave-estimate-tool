


<li class="nav-item">
    <a href="{{ route('layouts.index') }}"
       class="nav-link {{ Request::is('layouts*') ? 'active' : '' }}">
        <p>Layouts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('templates.index') }}"
       class="nav-link {{ Request::is('templates*') ? 'active' : '' }}">
        <p>Templates</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('estimations.index') }}"
       class="nav-link {{ Request::is('estimations*') ? 'active' : '' }}">
        <p>Estimations</p>
    </a>
</li>


