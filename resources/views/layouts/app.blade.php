<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Music App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1db954 0%, #191414 100%);
            min-height: 100vh;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }
        .sidebar {
            background: #000;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #b3b3b3;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background: #282828;
        }
        .album-cover {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
        }
        .song-item {
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
            cursor: pointer;
        }
        .song-item:hover {
            background: rgba(255,255,255,0.1);
        }
        .player-bar {
            background: #181818;
            border-top: 1px solid #282828;
            padding: 15px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        .progress-bar {
            background: #1db954;
        }
        .artist-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
    @livewireStyles
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h4 class="text-white mb-4">
                    <i class="fas fa-music"></i> MusicApp
                </h4>
                <a href="#" class="active"><i class="fas fa-home"></i> Inicio</a>
                <a href="#"><i class="fas fa-search"></i> Buscar</a>
                <a href="#"><i class="fas fa-book"></i> Tu Biblioteca</a>
                <hr class="bg-secondary">
                <a href="#"><i class="fas fa-plus-square"></i> Crear Playlist</a>
                <a href="#"><i class="fas fa-heart"></i> Canciones liked</a>
            </div>
            <div class="col-md-10 p-4" style="padding-bottom: 100px;">
                @yield('content')
            </div>
        </div>
    </div>

    @if($currentSong)
    <div class="player-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="d-flex align-items-center">
                        <img src="{{ $currentSong['album']['cover'] ?? 'https://via.placeholder.com/60' }}" 
                             class="me-3" style="width: 56px; height: 56px; border-radius: 4px;">
                        <div>
                            <strong>{{ $currentSong['title'] }}</strong><br>
                            <small class="text-muted">{{ $currentSong['album']['artist']['name'] }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <button class="btn btn-link text-white" wire:click="togglePlay">
                            <i class="fas fa-{{ $isPlaying ? 'pause' : 'play' }} fa-2x"></i>
                        </button>
                        <div class="mt-2">
                            <input type="range" class="form-range" min="0" max="{{ $duration }}" 
                                   wire:model="currentTime" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <i class="fas fa-volume-up text-white"></i>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    @livewireScripts
</body>
</html>
