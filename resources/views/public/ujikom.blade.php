@extends('public.dashboard')

@section('title', 'Ujikom')

@section('content')
<br>
<div class="container">
    <h1>Ujikom</h1>
    <br>
    <br>
    <form method="GET">
        <label>Nilai 1</label>
        <input type="number" name="nilai1" required>
        <br>
        <br>
        <label>Nilai 2</label>
        <input type="number" name="nilai2" required>
        <br>
        <br>
        <button type="submit">Hitung</button>

        @if (request()->has('nilai1') && request()->has('nilai2'))
            @php
                $nilai1 = (float) request('nilai1');
                $nilai2 = (float) request('nilai2');
                $rata  = ($nilai1 + $nilai2) /2;
            @endphp
            <br>
            <br>
            <p>Rata rata: {{$rata}} </p>
            @if ($rata>70)
                <p>LULUS</p>
            @else
                <p>TIDAK LULUS</p>
            @endif
        @endif
    </form>
</div>
@endsection

