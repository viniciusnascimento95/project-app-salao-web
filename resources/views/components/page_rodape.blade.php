<div class="">
Total de Registros: <strong>{{ $modelo->total() }}</strong>
<br><br>
{{ $modelo->appends(request()->query())->links() }}
</div>
