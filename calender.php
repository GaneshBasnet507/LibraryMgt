<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .today {
            background-color: #4CAF50;
            color: white;
        }

        .event {
            background-color: #ff9800;
            color: white;
        }
    </style>
</head>
<body>
    
    <?php
    
        // Get the current month and year
        $currentMonth = date('n');
        $currentYear = date('Y');

        // Get the number of days in the current month
        $numDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        // Get the first day of the current month
        $firstDay = date('w', strtotime("{$currentYear}-{$currentMonth}-01"));

        // Create an array of events (example)
        /*$events = array(
            5 => 'Meeting',
            15 => 'Birthday',
            25 => 'Appointment'
        );*/

        // Output the calendar
        echo "<h1>Calendar - {$currentMonth}/{$currentYear}</h1>";
        echo "<table>";
        echo "<tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>";

        // Create empty cells for the days before the first day of the month
        echo "<tr>";
        for ($i = 0; $i < $firstDay; $i++) {
            echo "<td></td>";
        }

        // Fill in the days of the month
        $dayCount = 1;
        for ($i = $firstDay; $i < 7; $i++) {
            $cellClass = '';
            if ($dayCount == date('j') && $currentMonth == date('n') && $currentYear == date('Y')) {
                $cellClass = 'today';
            }
            if (isset($events[$dayCount])) {
                $cellClass = 'event';
            }

            echo "<td class='{$cellClass}'>{$dayCount}</td>";
            $dayCount++;
        }
        echo "</tr>";

        while ($dayCount <= $numDays) {
            echo "<tr>";
            for ($i = 0; $i < 7 && $dayCount <= $numDays; $i++) {
                $cellClass = '';
                if ($dayCount == date('j') && $currentMonth == date('n') && $currentYear == date('Y')) {
                    $cellClass = 'today';
                }
                if (isset($events[$dayCount])) {
                    $cellClass = 'event';
                }

                echo "<td class='{$cellClass}'>{$dayCount}</td>";
                $dayCount++;
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>