<?php

namespace App\Domain\Wallet;

final class WalletRepository
{
    public function getFreeDerivationIndex(BlockchainType $blockchain,): int
    {
        // tbd request db count of wallets
        return rand(0, 1000);
    }
}
