<?php

$hour = rand(1,23);

if ($hour >= 5 && $hour < 9) {
    echo "Breakfast time! The animals should eat: Bananas, Apples, and Oats.";
} elseif ($hour >= 12 && $hour < 2) {
    echo "Lunch time! The animals should eat: Fish, Chicken, and Vegetables.";
} elseif ($hour >= 7 && $hour < 9) {
    echo "Dinner time! The animals should eat: Steak, Carrots, and Broccoli.";
} else {
    echo "It's not feeding time right now. The animals are not being fed.";
}
?>

