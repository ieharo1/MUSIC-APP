<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\User;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $artists = [
            ['name' => 'The Beatles', 'bio' => 'Banda británica de rock', 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Queen', 'bio' => 'Banda británica de rock', 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Michael Jackson', 'bio' => 'El rey del pop', 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Led Zeppelin', 'bio' => 'Banda de rock duro', 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Pink Floyd', 'bio' => 'Banda de rock progresivo', 'image' => 'https://via.placeholder.com/150'],
        ];

        foreach ($artists as $artistData) {
            $artist = Artist::create($artistData);
            
            $album = Album::create([
                'title' => $artist->name . ' Greatest Hits',
                'artist_id' => $artist->id,
                'cover' => 'https://via.placeholder.com/300',
                'release_year' => rand(1970, 2023),
            ]);

            for ($i = 1; $i <= 10; $i++) {
                Song::create([
                    'title' => 'Song ' . $i,
                    'album_id' => $album->id,
                    'track_number' => $i,
                    'duration' => rand(180, 360),
                    'play_count' => rand(100, 10000),
                ]);
            }
        }

        if ($user = User::first()) {
            $playlist = Playlist::create([
                'name' => 'Mis Favoritas',
                'user_id' => $user->id,
            ]);
        }
    }
}
