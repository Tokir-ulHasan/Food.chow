<?php
require('stripe-php/init.php');
$pk="pk_test_51HSH3nGQNPpqXUagCLon2jQT1kLUvYJBAAiRtUPCRgE3a0LPuVj6CAJT7RmZ5d762xzejOe5qbNTaLS1kZLbqaEp00KwlXWnh3";
$sk="sk_test_51HSH3nGQNPpqXUagG70EzTiCbi2dfaXWxlhY5F9BYtMXCmP7hIxEPnFjTy6vURpFI39KgkGmaAWiWpXF4tX4rH6m001XuiIIoI";

\Stripe\Stripe::setApikey($sk);
?>