<?php

require 'vendor/autoload.php';

use Onetoweb\Acumulus\AcumulusClient;

// credentials
$contractCode = 42;
$username = 'username';
$password = 'password';
$testMode = true; // (optional default: false)
$emailOnError = 'info@example.com'; // (optional)
$emailOnWarning = 'info@example.com'; // (optional)

// get client
$client = new AcumulusClient($contractCode, $username, $password, $testMode, $emailOnError, $emailOnWarning);

// add invoice
$invoice = $client->addInvoice([
    'customer' => [
        'companyname1' => 'Company B.V.',
        'invoice' => [
            'description' => 'test invoice',
            'line' => [
                [
                    'product' => 'product 1',
                    'quantity' => 1,
                    'unitprice' => 1.25,
                    'vatrate' => 21,
                ], [
                    'product' => 'product 2',
                    'quantity' => 2,
                    'unitprice' => 1.5,
                    'vatrate' => 9,
                ]
            ]
        ],
    ],
]);

// get invoice url
$token = '';
$invoiceUrl = AcumulusClient::getInvoiceUrl($token);

// get contact
$contactId = 42;
$contact = $client->getContact($contactId);

// get contact invoices incoming
$contactId = 42;
$invoicesIncoming = $client->getContactInvoicesIncoming($contactId);

// get contact invoices outgoing
$contactId = 42;
$invoicesOutgoing = $client->getContactInvoicesOutgoing($contactId);

// get contacts
$contacts = $client->getContacts();

// get contact types
$contactTypes = $client->getContactTypes();

// create / update account (use accountid to update existing account)
$account = $client->manageAccount([
    'account' => 'ACC',
    'accountdescription' => 'Account',
    'accountstatus' => 1,
]);

// get accounts
$accounts = $client->getAccounts();

// get account types
$accountTypes = $client->getAccountTypes();

// get recent entries
$recentEntries = $client->getRecentEntries();

// get invoice templates
$invoiceTemplates = $client->getInvoiceTemplates();

// next invoice number
$nextInvoiceNumber = $client->getNextInvoiceNumber();

// get about
$about = $client->getAbout();

// get my acumulus
$myAcumulus = $client->getMyAcumulus();

// get system message
$systemMessage = $client->getSystemMessage();

// get accountbalances
$year = 2020;
$accountbalances = $client->getAccountbalances($year);

// get eu e-commerce threshold
$year = 2021;
$euEcommerceThreshold = $client->getEuEcommerceThreshold($year);

// get profit per month
$year = 2020;
$profitPerMonth = $client->getProfitPerMonth($year);

// get trips
$trips = $client->getTrips();

// get trip compensations
$year = 2020;
$tripCompensations = $client->getTripCompensations($year);
