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
        Schema::table('cafes', function (Blueprint $table) {
            if (! Schema::hasColumn('cafes', 'address')) {
                $table->string('address')->nullable()->after('location');
            }
            if (! Schema::hasColumn('cafes', 'opening_hours')) {
                $table->string('opening_hours')->nullable()->after('rating');
            }
            if (! Schema::hasColumn('cafes', 'facilities')) {
                $table->text('facilities')->nullable()->after('opening_hours');
            }
        });

        Schema::table('menus', function (Blueprint $table) {
            if (! Schema::hasColumn('menus', 'category')) {
                $table->string('category')->nullable()->after('price');
            }
            if (! Schema::hasColumn('menus', 'image')) {
                $table->string('image')->nullable()->after('category');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cafes', function (Blueprint $table) {
            $columns = array_filter(['address', 'opening_hours', 'facilities'], fn ($col) => Schema::hasColumn('cafes', $col));
            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });

        Schema::table('menus', function (Blueprint $table) {
            $columns = array_filter(['category', 'image'], fn ($col) => Schema::hasColumn('menus', $col));
            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
