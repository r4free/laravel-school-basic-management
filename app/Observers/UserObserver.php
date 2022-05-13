<?php

namespace App\Observers;

class UserObserver
{
    public function creating($model)
    {
        $model->password = bcrypt($model->password);
    }
}
