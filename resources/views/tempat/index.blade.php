@extends('template.template')

@section('page-title')
    Halaman Tempat
@endsection

@section('content')
    <div class="container">
        <div class="card mt-4 p-4">
            <div class="card-title h5">Judul Halaman</div>
            <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni, enim.</span>
        </div>
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
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
