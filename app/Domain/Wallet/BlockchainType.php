<?php

namespace App\Domain\Wallet;

enum BlockchainType: string
{
    case BTC = "BTC";
    case ETH = "ETH";
}
