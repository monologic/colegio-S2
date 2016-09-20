<ul class="nav">
    <li class="">
        <a id="notas">
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

<div id="field" data-field-id="{{Auth::user()->dni.'|'.Auth::user()->url}}" ></div>
<script>
// Asumning you are using JQuery
$( document ).ready(function() {

    var fieldId = $('#field').data("field-id");
    f = fieldId.split("|");
    var encodedData = window.btoa(f[0]);

    $("#notas").attr("href", f[1] + "?est=" + encodedData);
    console.log(fieldId);
});


</script>