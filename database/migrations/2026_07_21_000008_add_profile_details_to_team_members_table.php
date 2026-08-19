<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->text('bio')->nullable()->after('specialty');
            $table->json('education')->nullable()->after('expertise');
            $table->json('experience')->nullable()->after('education');
            $table->json('achievements')->nullable()->after('experience');
            $table->string('email')->nullable()->after('photo_url');
            $table->string('phone')->nullable()->after('email');
            $table->string('linkedin')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'bio',
                'education',
                'experience',
                'achievements',
                'email',
                'phone',
                'linkedin',
            ]);
        });
    }
};
