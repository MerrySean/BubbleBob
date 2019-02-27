<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;

class CreateProductTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('products', function (Blueprint $table) {
            DB::unprepared(
                '
                    CREATE TRIGGER `updatePrice` 
                    AFTER UPDATE ON `products`
                    FOR EACH ROW 
                    insert into product_price_updates 
                    ( 
                        product_price_updates.product_id, 
                        product_price_updates.old_price, 
                        product_price_updates.new_price,
                        product_price_updates.created_at
                    ) 
                    VALUES
                    (
                        OLD.id , 
                        OLD.price , 
                        NEW.price, 
                        NEW.updated_at
                    )
                '
            );
        }); 

        Schema::table('products', function (Blueprint $table) {
            DB::unprepared(
                '
                    CREATE TRIGGER `CreateNewProduct`
                    AFTER INSERT ON `products` 
                    FOR EACH ROW 
                    insert into product_price_updates 
                    ( 
                        product_price_updates.product_id, 
                        product_price_updates.old_price, 
                        product_price_updates.new_price, 
                        product_price_updates.created_at 
                    )
                    VALUES 
                    (
                        NEW.id, 
                        0, 
                        NEW.price, 
                        NEW.created_at 
                    )
                '
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_triggers');
    }
}
