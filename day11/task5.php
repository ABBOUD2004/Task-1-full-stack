<?php
class BankAccount {
    private $balance = 0;
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }
    public function getBalance() {
        echo $this->balance;
    }
}
$account = new BankAccount();
$account->deposit(1000);
$account->withdraw(400);
echo "Current Balance: " . $account->getBalance(); 


