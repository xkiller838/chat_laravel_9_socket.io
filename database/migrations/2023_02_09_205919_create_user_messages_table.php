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
        Schema::create('user_messages', function (Blueprint $table) {
            $table->id();
            //message_id: es una columna de tipo unsigned integer que almacena el ID del mensaje al que se refiere este registro.
            $table->unsignedInteger('message_id');
            //sender_id: es una columna de tipo unsigned integer que almacena el ID del usuario que envió el mensaje.
            $table->unsignedInteger('sender_id');
            //receiver_id: es una columna de tipo unsigned integer que almacena el ID del usuario que recibió el mensaje.
            $table->unsignedInteger('receiver_id');
            //type: es una columna de tipo tiny integer con un valor predeterminado de 0 que indica si el mensaje es un mensaje de grupo o un mensaje personal.
            $table->tinyInteger('type')->default(0)->comment('1:group message, 0:personal message');
            //seen_status: es una columna de tipo tiny integer con un valor predeterminado de 0 que indica si el mensaje ha sido visto por el destinatario.
            $table->tinyInteger('seen_status')->default(0)->comment('1:seen');
            //deliver_status: es una columna de tipo tiny integer con un valor predeterminado de 0 que indica si el mensaje ha sido entregado al destinatario.
            $table->tinyInteger('deliver_status')->default(0)->comment('1:delivered');

            $table->unsignedInteger('message_group_id')->nullable();
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
        Schema::dropIfExists('user_messages');
    }
};
