<?php

Schema::create('team_user', function (Blueprint $table) {
    $table->foreignId('team_id')->constrained()->cascadeOnDelete();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->primary(['team_id', 'user_id']);
});
