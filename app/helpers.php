<?php

use App\Models\User;

function me()
{
    return request()->attributes->get('user');
}