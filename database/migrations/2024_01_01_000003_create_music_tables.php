<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->string('cover')->nullable();
            $table->integer('release_year');
            $table->timestamps();
        });

        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('album_id')->constrained()->onDelete('cascade');
            $table->integer('track_number');
            $table->integer('duration');
            $table->string('file_path')->nullable();
            $table->integer('play_count')->default(0);
            $table->timestamps();
        });

        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cover')->nullable();
            $table->timestamps();
        });

        Schema::create('playlist_song', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('song_id')->constrained()->onDelete('cascade');
            $table->integer('position');
            $table->timestamps();
        });

        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'artist_id']);
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('song_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'song_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('follows');
        Schema::dropIfExists('playlist_song');
        Schema::dropIfExists('playlists');
        Schema::dropIfExists('songs');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('artists');
    }
};
