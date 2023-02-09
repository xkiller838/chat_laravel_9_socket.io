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
        Schema::create('messages', function (Blueprint $table) {
            //Esta línea crea una columna id con un tipo de datos 
            $table->uuid('id')->primary(); 
            //Esta línea crea una columna parent_id con un tipo de datos unsigned integer y permite que su valor sea NULL. 
            //La columna parent_id puede ser usada para establecer una relación padre-hijo entre mensajes en el sistema de chat.
            $table->unsignedInteger('parent_id')->nullable();
            // Esta línea crea una columna message con un tipo de datos longText. Esta columna almacenará el contenido del mensaje en el sistema de chat.
            $table->longText('message');
            // Esta línea crea una columna type con un tipo de datos tinyInteger y establece su valor por defecto en 1. La columna type indica el tipo de mensaje: si es un mensaje de texto (1) o si es un archivo (2). 
            //El método comment agrega un comentario a la columna para describir su significado.
            $table->tinyInteger('type')->default(1)->comment('1:message, 2:file');
            // Esta línea crea una columna status con un tipo de datos tinyInteger y establece su valor por defecto en 1. 
            //La columna status puede ser usada para controlar el estado de un mensaje en el sistema de chat, por ejemplo, si está activo (1) o inactivo (0).
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
