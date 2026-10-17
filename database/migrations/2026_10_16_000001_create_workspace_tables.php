<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->unique()->constrained()->cascadeOnDelete();
            $table->string('location')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('template')->default('modern');
            $table->boolean('is_published')->default(false);
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('skills');
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('category')->default('Other');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('tech')->nullable();
            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained()->cascadeOnDelete();
            $table->string('school');
            $table->string('degree');
            $table->string('years')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });

        // Keep the new tables private to Supabase's public web API.
        foreach (['skills', 'projects', 'education'] as $name) {
            DB::statement("ALTER TABLE {$name} ENABLE ROW LEVEL SECURITY");
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('education');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('skills');

        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn(['location', 'photo_url', 'template', 'is_published']);
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->text('skills')->nullable();
        });
    }
};