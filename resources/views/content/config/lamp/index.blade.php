@extends('layout.admin')

@section('title', 'Config Lamp | Smart Chikinot')

@section('page', 'Config Lamp')

@section('content')
<div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Pengaturan Lampu</h6>
        </div>
        <div class="card-title">
<div class="container">
<div class="card mb-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('lamp.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="device_id">ID Perangkat</label>
            <input type="number" name="device_id" id="device_id" class="form-control" value="{{ $lampSettings['device_id'] }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="on" {{ $lampSettings['status'] == 'on' ? 'selected' : '' }}>On</option>
                <option value="off" {{ $lampSettings['status'] == 'off' ? 'selected' : '' }}>Off</option>
            </select>
        </div>
        <div class="form-group">
            <label for="off_time">Waktu Lampu Mati</label>
            <input type="time" name="off_time" id="off_time" class="form-control" value="{{ $lampSettings['off_time'] }}">
        </div>
        <div class="form-group">
            <label for="on_time">Waktu Lampu Nyala</label>
            <input type="time" name="on_time" id="on_time" class="form-control" value="{{ $lampSettings['on_time'] }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection