<?php

use App\Models\Article;
use App\Models\Link;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_link', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Article::class)->index()->constrained();
            $table->foreignIdFor(Link::class)->index()->constrained();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_link');
    }
};
