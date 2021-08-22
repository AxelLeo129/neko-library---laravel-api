<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('template')->truncate();
        DB::table('categorias')->truncate();
        DB::table('subcategorias')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(TemplateSeed::class);
        $this->call(CategoriaSeed::class);
        $this->call(SubcategoriaSeed::class);
    }
}
