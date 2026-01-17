<?php
include "../model/reportmodel.php";

$totalIncome = getTotalIncome($conn);
$incomeByMethod = getIncomeByMethod($conn);
$dailyIncome = getDailyIncome($conn);
$monthlyIncome = getMonthlyIncome($conn);
$yearlyIncome = getYearlyIncome($conn);
$paymentStatus = getPaymentStatusSummary($conn);
$bookingSummary = getBookingSummary($conn);
?>
