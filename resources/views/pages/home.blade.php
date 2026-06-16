@extends('layouts.app')

@section('title', 'Bank Sampah | Solusi Pengelolaan Sampah Komunitas')

@section('content')
    <x-home.hero :hero="$hero" />
    <x-home.stats :stats="$stats" />
    <x-home.services :services="$services" />
    <x-home.workflow :workflow="$workflow" />
    <x-home.waste-types :featuredWaste="$featuredWaste" />
    <x-home.articles :articles="$articles" />
    <x-home.faq :faqs="$faqs" />
    <x-home.cta />
@endsection
