<?php

require_once __DIR__ . '/classes/Account.php';
require_once __DIR__ . '/classes/Customer.php';
require_once __DIR__ . '/header.php';





$accounts = [
    new Account("21002760", "Savings Account", 15000),
    new Account("21002861", "Checking Account", -2500),
    new Account("21002962", "Payroll Account", 8200),
    new Account("21003063", "Time Deposit", 50000)
];


$customer = new Customer("Nicole", "Sibal", $accounts);
?>


<h1>NAME: <?php echo $customer->getFullName(); ?></h1>
<h2>Account Summary</h2>


<table>
  <tr>
    <th>Account Number</th>
    <th>Account Type</th>
    <th>Balance</th>
  </tr>


  <?php foreach ($customer->getAccounts() as $account): ?>
    <tr>
      <td><?php echo $account->getAccountNumber(); ?></td>
      <td><?php echo $account->getAccountType(); ?></td>

      <?php if ($account->getBalance() >= 0): ?>
        <td>₱<?php echo number_format($account->getBalance(), 2); ?></td>
      <?php else: ?>
        <td class="overdrawn">₱<?php echo number_format($account->getBalance(), 2); ?></td>
      <?php endif; ?>
    </tr>
  <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>

