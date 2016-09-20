<ul class="nav">
    <li class="">
        <a href="{{ url('app/notas') }}">
            <i class="pe-7s-graph"></i>
            <p>Calificaciones</p>
        </a>
    </li>
    <li>
        <a href="{{ url('app/archivos') }}">
            <i class="pe-7s-notebook"></i>
            <p>Biblioteca</p>
        </a>
    </li>
    <li>
        <a href="{{ url('app/actividades') }}">
            <i class="pe-7s-bicycle"></i>
            <p>Actividades</p>
        </a>
    </li>
    <li class="out-salir" style="display: none">
        <a  href="{{ url('logout') }}">
            <i class="pe-7s-back-2"></i>
            <p>Salir</p>
        </a>
    </li> 
</ul>