<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FillUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $array = [
          [
            "name" => "artem",
            "email" => "artem@kkk.ru",
            "password" => Hash::make("artem"),
          ],
          [
            "name" => "ivan",
            "email" => "ivan@kkk.ru",
            "password" => Hash::make("ivan"),
          ],
          [
            "name" => "gamaz",
            "email" => "gamaz@kkk.ru",
            "password" => Hash::make("gamaz"),
          ],
          [
            "name" => "biba",
            "email" => "biba@kkk.ru",
            "password" => Hash::make("biba"),
          ],
          [
            "name" => "stas",
            "email" => "stas@kkk.ru",
            "password" => Hash::make("stas"),
          ],
        ];

        DB::table("users")->insert($array);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("users")->where("id", ">", "0")->delete();
    }
}
