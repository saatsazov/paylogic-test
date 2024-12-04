<?php

namespace App\Domain\Wallet;

interface CreateWalletInterface
{
    /**
     * @throws WalletCreationException
     */
    function createWallet(BlockchainType $blockchain, string $mnemonic): int;
}
