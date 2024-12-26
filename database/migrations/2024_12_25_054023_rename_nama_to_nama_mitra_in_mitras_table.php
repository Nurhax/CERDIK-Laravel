<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('mitras', function (Blueprint $table) {
        $table->renameColumn('nama', 'namaMitra');  // Rename 'nama' to 'namaMitra'
    });
}

public function down()
{
    Schema::table('mitras', function (Blueprint $table) {
        $table->renameColumn('namaMitra', 'nama');  // Revert back if rolling back the migration
    });
}

};
