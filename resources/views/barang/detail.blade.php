@extends('template.template')

@section('page-title')
    Detail {{ $data->nama_barang }}
@endsection

@section('content')
    <div class="card mt-2 p-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="card-title h6">{{ $data->nama_barang }}</div>
                <span class="text-muted">{{ $data->merk }}</span>
            </div>
            <div class="">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit {{ $data->nama_tempat }}
                </button>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Yeay!</strong> {{ session('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <hr>
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Nama Barang</td>
                        <td>{{ $data->nama_barang }}</td>
                    </tr>
                    <tr>
                        <td>Merk</td>
                        <td>{{ $data->merk }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Penyimpanan</td>
                        <td>{{ $data->tempat->nama_tempat }}
                            / <span class="text-muted">{{ $data->tempat->kode_ruangan }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>IDR. {{ number_format($data->harga) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('barang.update',$data->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_barang" value="{{$data->nama_barang}}" required class="form-control" id="floatingInput">
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <select name="tempat_id" id="floatingInput" class="form-control" required>
                                    <option value="{{$data->tempat_id}}">-{{$data->tempat->nama_tempat}}-</option>
                                    @foreach ($tempat as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_tempat }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingInput">Tempat Penyimpanan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="text" name="merk" value="{{$data->merk}}" required class="form-control" id="floatingInput">
                                <label for="floatingInput">Merk Barang</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="number" name="harga" value="{{$data->harga}}" required class="form-control" id="floatingInput">
                                <label for="floatingInput">Harga</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
@endsection
