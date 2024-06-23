@extends('mahasiswa.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Add New Data</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('mahasiswa.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="nama" 
                class="form-control @error('nama') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Kelas:</strong></label>
            <textarea 
                class="form-control @error('kelas') is-invalid @enderror" 
                style="height:150px" 
                name="kelas" 
                id="inputDetail" 
                placeholder="Kelas"></textarea>
            @error('kelas')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection