@extends('layouts.app')

@section('title', 'Music App')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-text bg-dark text-white border-0">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" class="form-control bg-dark text-white border-0" 
                   placeholder="Buscar canciones, artistas, álbumes..." wire:model="search">
        </div>
    </div>
</div>

<h3 class="text-white mb-3"><i class="fas fa-fire"></i> Populares</h3>
<div class="row mb-4">
    @foreach($popularSongs as $song)
    <div class="col-md-3 mb-3">
        <div class="card h-100" style="cursor: pointer;" wire:click="playSong({{ $song->id }})">
            <img src="{{ $song->album->cover ?? 'https://via.placeholder.com/300' }}" 
                 class="card-img-top album-cover" alt="{{ $song->title }}">
            <div class="card-body">
                <h6 class="card-title">{{ $song->title }}</h6>
                <p class="card-text text-muted">{{ $song->album->artist->name }}</p>
                <small class="text-muted">
                    <i class="fas fa-play"></i> {{ $song->play_count }} reproducciones
                </small>
            </div>
        </div>
    </div>
    @endforeach
</div>

<h3 class="text-white mb-3"><i class="fas fa-users"></i> Artistas Populares</h3>
<div class="row mb-4">
    @foreach($popularArtists as $artist)
    <div class="col-md-2 mb-3">
        <div class="text-center">
            <img src="{{ $artist->image ?? 'https://via.placeholder.com/150' }}" 
                 class="artist-avatar mb-2" alt="{{ $artist->name }}">
            <h6 class="text-white">{{ $artist->name }}</h6>
            <small class="text-muted">{{ $artist->followers_count }} seguidores</small>
        </div>
    </div>
    @endforeach
</div>

<h3 class="text-white mb-3"><i class="fas fa-compact-disc"></i> Álbumes Recientes</h3>
<div class="row">
    @foreach($albums as $album)
    <div class="col-md-2 mb-3">
        <div class="card h-100">
            <img src="{{ $album['cover'] ?? 'https://via.placeholder.com/300' }}" 
                 class="card-img-top album-cover" alt="{{ $album['title'] }}">
            <div class="card-body">
                <h6 class="card-title">{{ $album['title'] }}</h6>
                <p class="card-text text-muted">{{ $album['artist']['name'] ?? '' }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
