<?php

namespace Database\Factories;

use App\Enums\CustomerTypeEnum;
use App\Enums\DocumentTypeEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerModel>
 */
class CustomerModelFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerDocumentType = fake()->randomElement(DocumentTypeEnum::cases())->value;

        if ($customerDocumentType == DocumentTypeEnum::CPF->value) {
            $customerType = CustomerTypeEnum::COMMON->value;
            $customerDocumentNumber = fake()->unique()->numerify('###########');
        } else {
            $customerType = CustomerTypeEnum::MERCHANT->value;
            $customerDocumentNumber = fake()->unique()->numerify('##############');
        }
        
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'document' => $customerDocumentNumber,
            'document_type' => $customerDocumentType,
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'password' => static::$password ??= Hash::make('password'),
            'customer_type' => $customerType
        ];
    }
}
