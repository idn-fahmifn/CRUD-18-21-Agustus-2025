@extends('template.template')

@section('page-title')
    Detail {{ $data->nama_tempat }}
@endsection

@section('content')
    <div class="card mt-2 p-4">
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="card-title h6">{{ $data->nama_tempat }}</div>
                <span class="text-muted">{{ $data->kode_ruangan }}</span>
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
            <table class="table table-hover table-striped">
                <thead>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Harga</th>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                        {{-- menjalankan jika ada barang pada tempat ini --}}
                        <tr>
                            <td>
                                <a href="{{ route('barang.detail', $item->id) }}" class="text-primary btn">
                                    {{ $item->nama_barang }}</a>
                            </td>
                            <td>{{ $item->merk }}</td>
                            <td>IDR. {{ number_format($item->harga) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data barang belum ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tempat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('tempat.update', $data->id) }}" method="post">
                    @csrf\
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
                                <input type="text" name="nama_tempat" value="{{ $data->nama_tempat }}" required
                                    class="form-control" id="floatingInput">
                                <label for="floatingInput">Nama Tempat</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="text" name="kode_ruangan" value="{{ $data->kode_ruangan }}" required
                                    class="form-control" id="floatingInput">
                                <label for="floatingInput">Kode Ruangan</label>
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
