<?php

namespace App\Domain\Wallet\Http;

use App\Domain\Wallet\BlockchainType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $mnemonic
 */
final class CreateWalletRequest extends FormRequest
{
    public readonly BlockchainType $blockchain;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->blockchain = BlockchainType::from($this->input('blockchain'));
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mnemonic' => 'required|string|max:255',
            'blockchain' => ['required', Rule::enum(BlockchainType::class)],
        ];
    }
}
