<?php

namespace app\Forms;

use App\Forms\Contracts\RocketShipContract;

class RocketShip implements RocketShipContract
{

    public function blastOff()
    {

        return 'Houston, we have ignition';

    }

}