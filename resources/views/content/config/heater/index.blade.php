@extends('layout.admin')

@section('title', 'Config Heater | Smart Chikinot')

@section('page','Config Heater')

@section('content')
<div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Pengaturan Heater</h6>
        </div>
        <div class="card-title">
<div class="container">
<div class="card mb-4">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('heater.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mode">Mode</label>
            <select name="mode" id="mode" class="form-control">
                <option value="manual" {{ $heaterSettings["mode"] == "manual" ? "selected" : '' }}>Manual</option>
                <option value="automatic" {{ $heaterSettings['mode'] == 'automatic' ? 'selected' : '' }}>Automatic</option>
            </select>
        </div>
        <div class="form-group">
            <label for="temperature_threshold">Batas Suhu (°C)</label>
            <input type="number" name="temperature_threshold" id="temperature_threshold" class="form-control" value="{{ $heaterSettings['temperature_threshold'] }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection