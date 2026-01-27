<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER upd_id_project AFTER INSERT ON projects FOR EACH ROW
                UPDATE ids SET ids.nextid = ids.nextid + 1 WHERE TABLES = "PROJECTS"
        ');
    }

    /**
     * Reverse the migrations.
     */
        public function down(): void
    {
        DB::unprepared('DROP TRIGGER upd_id_project');
    }
};
