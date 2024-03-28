<input type="hidden" name="_method" value="DELETE">
@if(\Helper::hakAkses($title,'Update'))
  <a href="{{route($url.'.edit', $id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pen"> </i>Edit</a>
@endif

@if(\Helper::hakAkses($title,'Delete'))
<button type="submit" class="btn btn-sm btn-danger" onclick="return hapus()"><i class="fa fa-trash"></i> Hapus</button>
@endif