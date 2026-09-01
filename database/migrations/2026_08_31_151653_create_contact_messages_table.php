<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table already exists in database.
        // This migration is kept as completed without recreating the table.
    }

    public function down(): void
    {
        // Do not delete the existing contact_messages table.
    }
};