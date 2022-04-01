<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title',255);

            $table->integer('parent_id')
                ->nullable()
                ->default(null)
                ->index();

            $table->enum('status', [
                'on',
                'off',
            ]);

            $table->timestamp('created_at')
                ->useCurrent();

            $table->timestamp('updated_at')
                ->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))
                ->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
