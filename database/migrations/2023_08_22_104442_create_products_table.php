<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('libelle');
            $table->string('quantite');
            $table->timestamps();
        });

        Schema::table('sorties', function(Blueprint $table) 
        {
            $table->foreignIdFor(Product::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::table('sorties', function(Blueprint $table) 
        {
            $table->dropForeignIdFor(Product::class);
        });
    }
};
