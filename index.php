<?php

$text = isset($_POST["text"]) ? $_POST["text"] : "";

$quotes = array(
    "the worlds not going to wait because you're too tired!",
    "the early kipp gets the worm!",
    "the right man in the wrong place can make all the difference in the world. So, wake up, Mister Kipp. Wake up and... smell the ashes..."
);

$message = "";

if ($text === "") {
    $message = "Try your hand at waking up Tim Kipp!  It's easy! Just type `/timtime [number]` to guess a number between 1 and 10. If you've guessed correctly, we'll send Tim a message to wake him up! For example, `/timtime 5` to guess the number 5. Good luck!";
} else {
    $num = (int)$text;

    if ($num <= 0 || $num > 10) {
        $message = "Hmm. That's not a number between 1 and 10. If you aren't going to play by the rules, neither will I.";
    } else {
        $picked = rand(1, 10);

        if($picked === $num) {
            $message = "You guessed $num, and I guessed $num!  Sorry @madpotatokipp, but it's time for you to wake up! Remember, " . $quotes[rand() % count($quotes)];
        } else {
            $message = "Dang! It looks like _he who should not be mentioned_ gets to sleep. I guessed $picked and you guessed $num";
        }
    }
}

$response = array(
    "response_type" => "in_channel",
    "link_names" => 1,
    "text" => $message
);

header('Content-Type: application/json');

echo json_encode($response);
