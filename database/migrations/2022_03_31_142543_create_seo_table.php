<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {

            $table->id();
            $table->string('seo_slug');
            $table->string('seo_title',200);
            $table->string('seo_h1',200);
            $table->integer('language_id')->default(1);

            $table->unsignedInteger('page_id')
                ->nullable()
                ->unique()
                ->index();

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('seo');
    }
}
