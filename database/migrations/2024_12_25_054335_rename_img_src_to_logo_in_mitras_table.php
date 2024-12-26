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
            $table->renameColumn('img_src', 'logo');  // Rename 'img_src' to 'logo'
        });
    }
    
    public function down()
    {
        Schema::table('mitras', function (Blueprint $table) {
            $table->renameColumn('logo', 'img_src');  // Revert back if rolling back the migration
        });
    }
    
};
