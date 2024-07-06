<?php

declare(strict_types=1);

class Currency
{
    private const CB_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";

    public function exchange(float $uzs, string $currencyName): float
    {
        $currencies = $this->customCurrencies();
        if (isset($currencies[$currencyName])) {
            $usd = $currencies[$currencyName];
            return $uzs / $usd;
        }
        return 0.0;
    }

    private function getCurrencyInfo(): array
    {
        try {
            $currencyInfo = file_get_contents(self::CB_URL);
            if ($currencyInfo === false) {
                throw new Exception("Unable to fetch currency data.");
            }
            return json_decode($currencyInfo, true);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function customCurrencies(): array
    {
        $currencies = $this->getCurrencyInfo();
        $orderedCurrencies = [];
        foreach ($currencies as $currency) {
            $orderedCurrencies[$currency['Ccy']] = (float)$currency['Rate'];
        }
        return $orderedCurrencies;
    }
}
?>
