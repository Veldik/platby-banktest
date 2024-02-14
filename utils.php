<?php
function parseRecord(float $amount, string $note, string $variableSymbol, string $specificSymbol, string $constantSymbol): array
{
    return [
        'moveDate' => [
            'date' => (new DateTime())->format('Y-m-d H:i:s.u'),
            'timezone_type' => 1,
            'timezone' => '+02:00'
        ],
        'volume' => $amount,
        'amount' => $amount,
        'toAccount' => '287021377',
        'bankCode' => '0300',
        'constantSymbol' => $constantSymbol,
        'variableSymbol' => $variableSymbol,
        'specificSymbol' => $specificSymbol,
        'note' => $note,
        'type' => 'Okamžitá příchozí platba',
        'whoDone' => '',
        'nameAccountTo' => 'Test',
        'bankName' => 'TestBank, a.s.',
        'currency' => 'CZK',
        'messageTo' => $note,
        'instructionId' => 61542590651,
        'advancedInformation' => '',
        'moveId' => 76217081591,
        'comment' => 'Test',
        'bic' => '',
        'payerReference' => ''
    ];
}