<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->text('descriptions');

            $table->unsignedInteger('cat_id')
                ->nullable()
                ->index();

            $table->foreign('cat_id')
                ->references('id')
                ->on('categories')
                ->onDelete('SET NULL');

            $table->enum('status', [
                'on',
                'off',
                'draft',
                'deleted'
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
        Schema::dropIfExists('pages');
    }
}
