<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cupras', function (Blueprint $table) {
            $table->string('pdf')->nullable(); // Ajoute une colonne pour stocker le chemin du fichier PDF
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cupras', function (Blueprint $table) {
            $table->dropColumn('pdf');
        });
    }
};
