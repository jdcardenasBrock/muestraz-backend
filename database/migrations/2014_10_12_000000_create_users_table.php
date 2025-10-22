<?php

use App\Models\Membership;
use App\Models\MembershipType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status_account', ['inactive', 'pending', 'active', 'suspended'])->default('pending');
            $table->boolean('has_completed_form')->default(false);
            $table->timestamp('subscription_expires_at')->nullable();
            $table->dateTime('date_activate')->nullable();
            $table->boolean('membresia_activa')->default(false)->nullable();
            $table->enum('account_type', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
