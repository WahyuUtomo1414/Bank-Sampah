@extends('layouts.public')

@section('title', 'Layanan | Bank Sampah')

@section('content')
    <x-services.hero :hero="$hero" />
    
    <x-services.list :services="$services" />
    
    <x-services.admin-highlight :adminFeatures="$adminFeatures" />
    
    <x-services.waste-categories :acceptedWaste="$acceptedWaste" />
    
    <x-services.cta />
@endsection
