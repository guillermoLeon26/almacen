<form method="GET" action="{{url('admin/inventario/productos/imagenes')}}/{{$id}}" style="display: inline;">
  {{ csrf_field() }}
  <button type="submit" class="btn btn-success">
    Imagenes
  </button>
</form>