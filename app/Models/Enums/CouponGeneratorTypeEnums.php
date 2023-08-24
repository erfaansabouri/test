<?php

namespace App\Models\Enums;
abstract class CouponGeneratorTypeEnums
{
    const Register = 'register';
    const Birthday = 'birthday';
    const Forgetfulness = 'forgetfulness';
    const PurchasesCount = 'purchases-count';
    const PurchaseAmount = 'purchase-amount';
}
