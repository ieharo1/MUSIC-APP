<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Playlist;

class MusicPlayer extends Component
{
    public $search = '';
    public $currentSong = null;
    public $isPlaying = false;
    public $currentTime = 0;
    public $duration = 180;
    public $artists = [];
    public $albums = [];
    public $songs = [];
    public $playlists = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->artists = Artist::with('albums')->get()->toArray();
        $this->albums = Album::with('artist', 'songs')->get()->toArray();
        $this->songs = Song::with('album.artist')->get()->toArray();
        $this->playlists = Playlist::with('songs')->get()->toArray();
    }

    public function playSong($songId)
    {
        $this->currentSong = Song::with('album.artist')->find($songId);
        $this->isPlaying = true;
        $this->currentTime = 0;
        $this->duration = $this->currentSong->duration ?? 180;
        
        $this->currentSong->increment('play_count');
    }

    public function togglePlay()
    {
        $this->isPlaying = !$this->isPlaying;
    }

    public function render()
    {
        $popularSongs = Song::with('album.artist')
            ->orderBy('play_count', 'desc')
            ->limit(10)
            ->get();

        $popularArtists = Artist::withCount('followers')
            ->orderBy('followers_count', 'desc')
            ->limit(10)
            ->get();

        return view('livewire.music-player', [
            'popularSongs' => $popularSongs,
            'popularArtists' => $popularArtists,
        ]);
    }
}
