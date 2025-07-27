<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('template_id')->nullable()->constrained('templates')->onDelete('set null');
            $table->foreignId('message_template_id')->nullable()->constrained('message_templates')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mail_provider_id')->constrained('mail_providers')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
