<?php

namespace App\Domain\ValueObjects;

use Exception;

class FederalId
{
    private string $federalId;

    public function __construct(string $federalId)
    {
        $cleanedFederalId = $this->cleanFederalId($federalId);
        if (!$this->validateFederalId($cleanedFederalId)) {
            throw new Exception("CPF inválido");
        }
        $this->federalId = $cleanedFederalId;
    }

    private function validateFederalId($cleanedFederalId)
    {
        if (strlen($cleanedFederalId) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cleanedFederalId)) {
            return false;
        }

        $baseFederalId = substr($cleanedFederalId, 0, 9);
        list($d1, $d2) = $this->calculateDigit($baseFederalId);
        return ($d1 == $cleanedFederalId[9] && $d2 == $cleanedFederalId[10]);
    }

    private function cleanFederalId($federalId)
    {
        return preg_replace('/[.-]/', '', $federalId);
    }

    private function calculateDigit($baseFederalId)
    {
        $total = 0;

        for ($i = 0; $i < 9; $i++) {
            $total += (int)$baseFederalId[$i] * (10 - $i);
        }

        $remainder = $total % 11;
        $firstDigit = ($remainder < 2) ? 0 : 11 - $remainder;
        $total = 0;

        for ($i = 0; $i < 9; $i++) {
            $total += (int)$baseFederalId[$i] * (11 - $i);
        }

        $total += $firstDigit * 2;
        $remainder = $total % 11;
        $secondDigit = ($remainder < 2) ? 0 : 11 - $remainder;

        return [$firstDigit, $secondDigit];
    }


    public function __toString()
    {
        return $this->federalId;
    }
}
