<?php
$day = 'Sunday';
switch ($day) {
    case 'Monday':
        echo "It's the start of the work week";
        break;
    case 'Tuesday':
        echo 'Getting into the swing of things';
        break;
    case 'Wednesday':
        echo 'Mid-week blues or hump day success?';
        break;
    case 'Thursday':
        echo 'Almost there! One more day to the weekend';
        break;
    case 'Friday':
        echo 'Happy Friday! The weekend is here';
        break;
    case 'Saturday':
        echo 'The weekend is here';
        break;
    case 'Sunday':
        echo 'Enjoy the weekend';
        break;
    default:
        echo 'Invalid day';
        break;
}
