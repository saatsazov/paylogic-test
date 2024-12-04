<?php

namespace App\Domain\Wallet;

use Illuminate\Support\Facades\Log;
use Throwable;

final class TatumApiWalletImplementation implements CreateWalletInterface
{
    public function __construct(
        private string $apiKey,
        private WalletRepository $repo,
    ) {}

    public function createWallet(BlockchainType $blockchain, string $mnemonic): int
    {
        /**  
         * todo: it might sense to consider some mutex locking. 
         * In case we call this method two times in parallel we would try to create two wallet with the same derivation_index
         */

        $availableDerivationIndex = $this->repo->getFreeDerivationIndex($blockchain);

        Log::info("Prepare call tatum api", [
            'mnemonic' => $mnemonic,
            'derivation_index' => $availableDerivationIndex,
            'blockchain' => $blockchain->value,
        ]);
        try {
            // todo: api call to tatum
            // todo: save result to db
            $walletId = rand(0, 123);
            return $walletId;
        } catch (Throwable $e) {
            // todo: could some additional logic. AuthException, SubscriptionExpiration etc.
            Log::error("error during exception", [
                'error' => $e,
            ]);
            throw new WalletCreationException("something went wrong");
        } finally {
            // todo: release of locking
        }
    }
}
