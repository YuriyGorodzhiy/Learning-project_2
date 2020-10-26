<?php

namespace Nordic\Core;

class Telegram
{
    public function sendMessage($chat_id, $text)
    {
        file_get_contents("https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html");
    }

    public function sendPhoto($chat_id, $photo)
    {
        file_get_contents("https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendPhoto?chat_id=$chat_id&photo=$photo");
    }

    public function sendLocation($chat_id, $latitude, $longitude)
    {
        file_get_contents("https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendLocation?chat_id=$chat_id&latitude=$latitude&longitude=$longitude");
    }
}