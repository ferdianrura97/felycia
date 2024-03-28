<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form style="width: 100%;" method="GET">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                              <label for="from" class="form-control-label">Dari Tanggal : </label>
                              <input type="date" name="from" class="form-control" value={{ (@$_GET['from']) ?? date("Y-m-01") }}>
                            </div>
                            <div class="col-md-3">
                              <label for="to" class="form-control-label">Sampai Tanggal : </label>
                              <input type="date" name="to" class="form-control" value={{ (@$_GET['to']) ?? date("Y-m-t") }}>
                            </div>
                            <div class="col-md-3">
                                <label for="pelanggan" class="form-control-label">Pilih Pelanggan : </label>
                                <select name="pelanggan" class="form-control select2" data-toggle="select">
                                  <option value="">Semua Pelanggan</option>
                                  @foreach ($pelanggans as $pelanggan)
                                  <option value="{{ $pelanggan->id }}" @if($pelanggan->id == @$_GET['pelanggan']) selected @endif >{{ $pelanggan->nama_pelanggan }} - {{ $pelanggan->nomor_pelanggan }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button class="btn btn-info btn-sm" type="submit">Tampil</button>
                            <a href="{{ url()->current() }}" class="btn btn-info btn-sm">Refresh</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>