@extends('layouts.public')

@section('title', 'Tentang Kami | Bank Sampah')

@section('content')
    <x-about.hero :hero="$hero" />
    
    <x-about.story :story="$story" />
    
    <x-about.vision-mission :visionMission="$visionMission" />
    
    <x-about.locations :locations="$locations" />
    
    <x-services.cta />
@endsection
