@extends('../mahasiswa/layouts/master1')

@section('container')

<div class="">
    <div class="p-5">
        @if (session()->has('tambahError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tambahError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Ajukan Jadwal Bimbingan!</h1>
        </div>
        <form action="/mahasiswa-bimbingan-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <select name="id_penelitian" class="form-control text-center">
                    <option value="">- Pilih Penelitian -</option>
                    @foreach ($penelitian as $item)
                        <option value="{{ $item->ID_PENELITIAN }}">{{ $item->JUDUL_TA }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-user text-center" id="exampleFirstName"
                        placeholder="Tanggal Bimbingan" name="tanggal">
            </div>
            <div class="form-group">
                <input class="form-control" type="file" id="laporan_ta" name="laporan_ta">
              </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <a href="/mahasiswa-bimbingan" class="btn btn-danger btn-user btn-block">
                        Batal
                    </a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                        Tambah
                    </button>
                </div>
            </div>
            <hr>
        </form>
    </div>
</div>

@endsection    
