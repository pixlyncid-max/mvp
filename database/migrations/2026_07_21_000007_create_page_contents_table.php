<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page');    // home | layanan | tentang | tim | kontak
            $table->string('section'); // hero | about | stats | cta | etc
            $table->string('key');     // eyebrow | headline | subheadline | btn_primary | etc
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text | textarea | html
            $table->string('label');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['page', 'section', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
