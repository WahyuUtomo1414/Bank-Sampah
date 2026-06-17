@extends('layouts.public')

@section('title', 'Kontak | Bank Sampah')

@section('content')
    <x-contact.hero :hero="$hero" />
    
    <x-contact.info-social :contactInfo="$contactInfo" :socials="$socials" />
    
    <x-services.cta />
@endsection
