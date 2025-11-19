<?php

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
        Schema::create('productions', function (Blueprint $table) {
            $table->id('production_id');
            $table->date('production_date');
            $table->string('production_process');
            $table->integer('bags_of_paddy');
            $table->decimal('paddy_weight', 10,2)
            ->comment('Weight of paddy in kilograms');
            $table->string('raw_materials_used');
            $table->decimal('raw_materials_weight', 10, 2)
            ->comment('Weight of raw materials in kilograms');
            $table->text('info')
            ->comment('Detailed information if any');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
