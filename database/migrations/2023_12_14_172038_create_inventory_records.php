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
        Schema::create('inventory_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->date('date')->nullable()->default(now());
            $table->enum('type', ['IN', 'OUT'])->nullable();
            $table->integer('in_qty')->default(0);
            $table->integer('out_qty')->default(0);
            $table->string('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_records');
    }
};
