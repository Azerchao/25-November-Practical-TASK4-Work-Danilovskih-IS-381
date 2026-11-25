<?php
spl_autoload_register(function (string $class): void {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

$employees = [
    new Manager('Анна Петрова', 90000),
    new Manager('Олег Сидоров', 1500),          // премия 20% = 300 < MIN_BONUS -> 500
    new Developer('Игорь Смирнов', 120000, 5),
    new Developer('Мария Козлова', 80000, 2),
    new Developer('Павел Новиков', 2000, 0),    // премия 300 < MIN_BONUS -> 500
];

$total = 0.0;
foreach ($employees as $employee) {
    echo $employee->getInfo() . PHP_EOL;
    $total += $employee->getTotalPay();
}

echo 'Общая сумма выплат (оклад + премия): ' . number_format($total, 2, '.', ' ') . ' руб.' . PHP_EOL;
echo 'Количество сотрудников: ' . Employee::getEmployeeCount() . PHP_EOL;
