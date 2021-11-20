@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Data Pengguna</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('penggunas.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="10px" class="text-center">No</th>
            <th width="30px" class="text-center">Nama</th>
            <th width="60px" class="text-center">Alamat</th>
            <th width="30px" class="text-center">No Hp</th>
            <th width="50px"class="text-center">Aksi</th>
        </tr>
        @foreach ($pengguna as $pengguna)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pengguna->nama }}</td>
            <td>{{ $pengguna->alamat }}</td>
            <td>{{ $pengguna->no_hp }}</td>
            <td class="text-center">
                <form action="{{ route('penggunas.destroy',$pengguna->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('penggunas.show',$pengguna->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('penggunas.edit',$pengguna->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
