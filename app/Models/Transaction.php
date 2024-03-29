<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App\Models
 *
 * @property string id
 * @property string type_id - тип операции
 * @property string user_id
 * @property string rate_id - тарифный план, если это депозитная транзакция.
 * @property string deposit_id
 * @property string wallet_id
 * @property string payment_system_id
 * @property float amount
 * @property float main_currency_amount
 * @property string source - кошелек реферала пользователя, если это партнерская транзакция.
 * @property string result - ответ платежной системы.
 * @property string batch_id - ИД операции в платежной системе.
 * @property bool approved
 * @property float commission
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Transaction extends Model
{
    use Uuids;

    /** @var bool $incrementing */
    public $incrementing = false;

    /** @var array $fillable */
    protected $fillable = [
        'type_id',
        'user_id',
        'currency_id',
        'rate_id',
        'deposit_id',
        'wallet_id',
        'payment_system_id',
        'amount',
        'main_currency_amount',
        'source',
        'result',
        'batch_id',
        'approved',
        'commission',
        'created_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate()
    {
        return $this->belongsTo(Rate::class, 'rate_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deposit()
    {
        return $this->belongsTo(Deposit::class, 'deposit_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentSystem()
    {
        return $this->belongsTo(PaymentSystem::class, 'payment_system_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(TransactionType::class, 'type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @param $value
     * @return float
     * @throws \Exception
     */
    public function getAmountAttribute($value)
    {
        if (null == $this->currency_id) {
            return $value;
        }

        return currencyPrecision($this->currency_id, $value);
    }

    /**
     * @param $wallet
     * @param $amount
     * @return mixed
     */
    public static function enter($wallet, $amount)
    {
        $type = TransactionType::getByName('enter');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => $type->commission,
            'user_id' => $wallet->user->id,
            'currency_id' => $wallet->currency->id,
            'wallet_id' => $wallet->id,
            'payment_system_id' => $wallet->paymentSystem->id,
            'amount' => $amount,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param Wallet $wallet
     * @param float $amount
     * @return Transaction|null
     * @throws \Exception
     */
    public static function withdraw(Wallet $wallet, float $amount)
    {
        $amount         = (float) abs($amount);
        /** @var TransactionType $type */
        $type           = TransactionType::getByName('withdraw');
        /** @var User $user */
        $user           = $wallet->user()->first();
        /** @var Currency $currency */
        $currency       = $wallet->currency()->first();
        /** @var PaymentSystem $paymentSystem */
        $paymentSystem  = $wallet->paymentSystem()->first();

        if (null === $type || null === $user || null === $currency || null === $paymentSystem) {
            return null;
        }

        $commission           = $type->commission;
        $amountWithCommission = $amount / ((100 - $commission) * 0.01);

        $psMinimumWithdrawArray = @json_decode($paymentSystem->minimum_withdraw, true);
        $psMinimumWithdraw      = isset($psMinimumWithdrawArray[$currency->code])
            ? $psMinimumWithdrawArray[$currency->code]
            : 0;

        if ($amount+$commission < $psMinimumWithdraw) {
            throw new \Exception(__('Minimum withdraw amount is ').$psMinimumWithdraw.$currency->symbol);
        }

        /** @var Transaction $transaction */
        $transaction = self::create([
            'type_id'           => $type->id,
            'commission'        => $type->commission,
            'user_id'           => $user->id,
            'currency_id'       => $currency->id,
            'wallet_id'         => $wallet->id,
            'payment_system_id' => $paymentSystem->id,
            'amount'            => $amountWithCommission,
            'approved'          => false,
        ]);

        $wallet->update([
            'balance' => $wallet->balance - $amountWithCommission
        ]);

        return $transaction->save()
            ? $transaction
            : null;
    }

    /**
     * @param $wallet
     * @param $amount
     * @return null
     */
    public static function bonus($wallet, $amount)
    {
        $type = TransactionType::getByName('bonus');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => $type->commission,
            'user_id' => $wallet->user->id,
            'currency_id' => $wallet->currency->id,
            'wallet_id' => $wallet->id,
            'payment_system_id' => $wallet->paymentSystem->id,
            'amount' => $amount,
            'approved' => true,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param $wallet
     * @param $amount
     * @param $referral
     * @return null
     */
    public static function partner($wallet, $amount, $referral)
    {
        $type = TransactionType::getByName('partner');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => 0,
            'user_id' => $wallet->user->id,
            'currency_id' => $wallet->currency->id,
            'wallet_id' => $wallet->id,
            'payment_system_id' => $wallet->paymentSystem->id,
            'amount' => $amount,
            'source' => $referral->id,
            'approved' => true,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param $wallet
     * @param $amount
     * @param null $referral
     * @return null
     */
    public static function dividend($wallet, $amount, $referral = null)
    {
        $type = TransactionType::getByName('dividend');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => 0,
            'user_id' => $wallet->user->id,
            'currency_id' => $wallet->currency->id,
            'wallet_id' => $wallet->id,
            'payment_system_id' => $wallet->paymentSystem->id,
            'amount' => $amount,
            'source' => null !== $referral
                ? $referral->id
                : null,
            'approved' => true,
        ]);

        $referralName = null !== $referral ? $referral->name : '';
        $referralId   = null !== $referral ? $referral->id : '';

        return $transaction->save() ? $transaction : null;

    }

    /**
     * @param $deposit
     * @return null
     */
    public static function createDeposit($deposit)
    {
        $type = TransactionType::getByName('create_dep');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => 0,
            'user_id' => $deposit->user->id,
            'currency_id' => $deposit->currency->id,
            'rate_id' => $deposit->rate->id,
            'deposit_id' => $deposit->id,
            'wallet_id' => $deposit->wallet->id,
            'payment_system_id' => $deposit->paymentSystem->id,
            'amount' => $deposit->invested,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param $deposit
     * @param $amount
     * @return null
     */
    public static function closeDeposit($deposit, $amount)
    {
        $type = TransactionType::getByName('close_dep');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => 0,
            'user_id' => $deposit->user->id,
            'currency_id' => $deposit->currency->id,
            'rate_id' => $deposit->rate->id,
            'deposit_id' => $deposit->id,
            'wallet_id' => $deposit->wallet->id,
            'payment_system_id' => $deposit->paymentSystem->id,
            'amount' => $amount,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param $wallet
     * @param $amount
     * @return null
     */
    public static function penalty($wallet, $amount)
    {
        $type = TransactionType::getByName('penalty');
        $transaction = self::create([
            'type_id' => $type->id,
            'commission' => 0,
            'user_id' => $wallet->user_id,
            'currency_id' => $wallet->currency->id,
            'rate_id' => null,
            'deposit_id' => null,
            'wallet_id' => $wallet->id,
            'payment_system_id' => $wallet->paymentSystem->id,
            'amount' => $amount,
        ]);
        return $transaction->save() ? $transaction : null;
    }

    /**
     * @param string $type
     * @param string $role
     * @return array
     * @throws \Exception
     */
    public static function transactionBalances(string $type, string $role = ''): array
    {
        $type = TransactionType::getByName($type);

        if ($role) {
            $transactions = User::role($role)->join('transactions', function ($join) use ($type) {
                $join->on('users.id', '=', 'transactions.user_id')
                    ->where('transactions.approved', true)->where('transactions.type_id', $type->id);
            })->join('currencies', 'currencies.id', '=',
                'transactions.currency_id')->select('currencies.code', 'transactions.amount')->get();
        } else {
            $transactions = Currency::join('transactions', function ($join) use ($type) {
                $join->on('currencies.id', '=', 'transactions.currency_id')
                    ->where('transactions.approved', true)->where('transactions.type_id', $type->id);
            })->select('currencies.code', 'transactions.amount')->get();
        }

        $balances = Currency::balances();

        foreach ($transactions as $item) {
            $balances[$item->code] = key_exists($item->code, $balances)
                ? $balances[$item->code] + $item->amount
                : $item->amount;
        }

        return $balances;

    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function commissionBalances(): array
    {
        $balances = [];
        $bonus = Transaction::transactionBalances('bonus');
        $enter = Transaction::transactionBalances('enter');
        $withdraw = Transaction::transactionBalances('withdraw');

        foreach (Currency::all() as $currency) {
            $balances[$currency->code] = $bonus[$currency->code] * TransactionType::getByName('bonus')->commission * 0.01 + $enter[$currency->code] * TransactionType::getByName('enter')->commission * 0.01 + $withdraw[$currency->code] * TransactionType::getByName('withdraw')->commission * 0.01;
        }
        return $balances;
    }

    /**
     * @return bool
     */
    public function isApproved()
    {
        return $this->approved == 1;
    }
}
