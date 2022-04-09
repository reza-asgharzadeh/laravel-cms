<?php

namespace App\Http;
use Browser;

class DatabaseSessionHandler extends \Illuminate\Session\DatabaseSessionHandler implements \SessionHandlerInterface
{
    protected function getDefaultPayload($data): array
    {
        if (Browser::isMobile()){
            $platform = "Mobile";
        } elseif (Browser::isTablet()){
            $platform = "Tablet";
        } elseif (Browser::isDesktop()) {
            $platform = "Desktop";
        } elseif (Browser::isBot()){
            $platform = "Bot";
        } else {
            $platform = "Unknown";
        }

        $payload = parent::getDefaultPayload($data);
        return array_merge($payload,[
           'browser' => Browser::browserName(),
           'platform' => $platform,
           'device' => Browser::deviceFamily() ." ". Browser::deviceModel(),
           'os' => Browser::platformName(),
        ]);
    }
}
