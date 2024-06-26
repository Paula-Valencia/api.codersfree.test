<?php
use App\Models\Post;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('slug');
            $table->String('extract');
            $table->String('body');
            
            $table->enum('status',[Post::BOORADOR,post::PUBLICADO])->default(Post::BOORADOR)->nullable();
            //Atributos foraneos
            $table->unsignedBigInteger('category_id');
            //referenciando la tabla categorias    
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            //Atributos foraneos
            $table->unsignedBigInteger('user_id')->nullable();
            //referenciando la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            
             

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
