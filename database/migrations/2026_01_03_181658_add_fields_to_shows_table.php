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
    Schema::table('shows', function (Blueprint $table) {
        $table->string('title');
        $table->text('description')->nullable();
        $table->date('date');
        $table->time('time');
        $table->integer('capacity');
        $table->integer('available_seats');
        $table->decimal('price_domestic', 10, 2);
        $table->decimal('price_foreign', 10, 2);
        $table->string('image')->nullable();
        $table->boolean('is_active')->default(true);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shows', function (Blueprint $table) {
            //
        });
    }
};
