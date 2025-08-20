@extends('template.template')

@section('page-title')
    Halaman Barang
@endsection

@section('content')
    <div class="card mt-2 p-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="card-title h6">Halaman data</div>
            </div>
            <div class="">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
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
            <table class="table table-hover table-striped">
                <thead>
                    <th>Nama Barang</th>
                    <th>Tempat Penyimpanan</th>
                    <th>Merk</th>
                    <th>Pilihan</th>
                </thead>
                @if ($data->isEmpty())
                    <tbody>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-warning fade show mt-2" role="alert">
                                    <strong>Ops.</strong> Data barang belum dibuat.
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @else
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->tempat->nama_tempat }}</td>
                                <td>{{ $item->merk }}</td>
                                <td>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('barang.detail', $item->id) }}" class="btn btn-info">detail</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin mau dihapus?')">hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('barang.store')}}" method="post">
                    @csrf
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
                                <input type="text" name="nama_barang" required class="form-control" id="floatingInput">
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <select name="tempat_id" id="floatingInput" class="form-control" required>
                                    <option value="">-Pilih tempat penyimpanan-</option>
                                    @foreach ($tempat as $item)
                                        <option value="{{$item->id}}">{{ $item->nama_tempat }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingInput">Tempat Penyimpanan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="text" name="merk" required class="form-control" id="floatingInput">
                                <label for="floatingInput">Merk Barang</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="number" name="harga" required class="form-control" id="floatingInput">
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
