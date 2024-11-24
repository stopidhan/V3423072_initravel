<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailpembelis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('pakets')->onDelete('cascade');
            $table->foreignId('pembeli_id')->constrained('pembelis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpembelis');
    }
};
