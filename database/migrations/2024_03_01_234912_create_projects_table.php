<?php

use App\Models\Customer;
use App\Models\ProjectCategory;
use App\Models\Service;
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
        Schema::disableForeignKeyConstraints();

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('thumbnail');
            $table->json('images');
            $table->foreignIdFor(Customer::class, 'customer_id');
            $table->foreignIdFor(ProjectCategory::class, 'project_category_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
