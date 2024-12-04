<?php

namespace App\Domain\Wallet\Http;

use App\Domain\Wallet\CreateWalletInterface;
use App\Http\Controllers\Controller;

/**
 * @tags Wallets
 */
final class CreateWalletAction extends Controller
{
    public function __invoke(
        CreateWalletRequest $request,
        CreateWalletInterface $walletCreator,
    ) {
        $walletId = $walletCreator->createWallet($request->blockchain, $request->mnemonic);
        return [
            'success' => true,
            'wallet_id' => $walletId,
        ];
    }
}
