<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    protected $fillable = ['title', 'album_id', 'track_number', 'duration', 'file_path', 'play_count'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song')
            ->withPivot('position');
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
