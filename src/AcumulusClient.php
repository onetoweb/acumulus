<?php

namespace Onetoweb\Acumulus;

use Onetoweb\Acumulus\BaseClient;

/**
 * Acumulus Client.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * 
 * @link https://www.siel.nl/acumulus/API/
 */
class AcumulusClient extends BaseClient
{
    /**
     * @link https://www.siel.nl/acumulus/API/Accounts/Manage_Account/
     *
     * @param array $data
     *
     * @return array|null
     */
    public function manageAccount(array $data): ?array
    {
        return $this->request('/acumulus/stable/accounts/account_manage.php', $data);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Accounts/List_Accounts/
     *
     * @return array|null
     */
    public function getAccounts(): ?array
    {
        return $this->request('/acumulus/stable/picklists/picklist_accounts.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Accounts/List_Account_Types/
     *
     * @return array|null
     */
    public function getAccountTypes(): ?array
    {
        return $this->request('/acumulus/stable/picklists/picklist_accounttypes.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Contacts/Get_Contact_Details/
     *
     * @param int $contactId
     *
     * @return array|null
     */
    public function getContact(int $contactId): ?array
    {
        return $this->request('/acumulus/stable/contacts/contact_get.php', [
            'contactid' => $contactId
        ]);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Contacts/Invoices_Incoming/
     *
     * @param int $contactId
     *
     * @return array|null
     */
    public function getContactInvoicesIncoming(int $contactId): ?array
    {
        return $this->request('/acumulus/stable/contacts/contact_invoices_incoming.php', [
            'contactid' => $contactId
        ]);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Contacts/Invoices_Outgoing/
     *
     * @param int $contactId
     *
     * @return array|null
     */
    public function getContactInvoicesOutgoing(int $contactId): ?array
    {
        return $this->request('/acumulus/stable/contacts/contact_invoices_outgoing.php', [
            'contactid' => $contactId
        ]);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Contacts/List_Contacts/
     *
     * @return array|null
     */
    public function getContacts(): ?array
    {
        return $this->request('/acumulus/stable/contacts/contacts_list.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Picklists/Contact_Types/
     *
     * @return array|null
     */
    public function getContactTypes(): ?array
    {
        return $this->request('/acumulus/stable/picklists/picklist_contacttypes.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Entry/List_Recent_Entries/
     *
     * @return array|null
     */
    public function getRecentEntries(): ?array
    {
        return $this->request('/acumulus/stable/entry/entries_list_recent.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Invoicing/Get_Next_Number/
     *
     * @return int|null
     */
    public function getNextInvoiceNumber(): ?int
    {
        return $this->request('/acumulus/stable/invoices/invoice_get_next_number.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Invoicing/Invoice_Templates/
     *
     * @return array|null
     */
    public function getInvoiceTemplates(): ?array
    {
        return $this->request('/acumulus/stable/picklists/picklist_invoicetemplates.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Invoicing/Add_Invoice/
     *
     * @return array|null
     */
    public function addInvoice(array $data): ?array
    {
        return $this->request('/acumulus/stable/invoices/invoice_add.php', $data);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Misc/About/
     *
     * @return array|null
     */
    public function getAbout(): ?array
    {
        return $this->request('/acumulus/stable/general/general_about.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Misc/My_Acumulus/
     * 
     * @return array|null
     */
    public function getMyAcumulus(): ?array
    {
        return $this->request('/acumulus/stable/general/my_acumulus.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Misc/System_Message/
     *
     * @return array|null
     */
    public function getSystemMessage(): ?array
    {
        return $this->request('/acumulus/stable/general/general_systemmessage.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Reports/Account_Balances/
     *
     * @param int $year = null
     *
     * @return array|null
     */
    public function getAccountbalances(int $year = null): ?array
    {
        $data = [];
        if ($year) {
            $data['year'] = $year;
        }
        
        return $this->request('/acumulus/stable/reports/report_accountbalances.php', $data);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Reports/EU_eCommerce_Threshold/
     *
     * @param int $year = null
     *
     * @return array|null
     */
    public function getEuEcommerceThreshold(int $year = null): ?array
    {
        $data = [];
        if ($year) {
            $data['year'] = $year;
        }
        
        return $this->request('/acumulus/stable/reports/report_threshold_eu_ecommerce.php', $data);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Reports/Profit_Per_Month/
     *
     * @param int $year = null
     *
     * @return array|null
     */
    public function getProfitPerMonth(int $year = null): ?array
    {
        $data = [];
        if ($year) {
            $data['year'] = $year;
        }
        
        return $this->request('/acumulus/stable/reports/report_profit_per_month.php', $data);
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Trips/List_Trips/
     *
     * @return array|null
     */
    public function getTrips(): ?array
    {
        return $this->request('/acumulus/stable/picklists/picklist_trips.php');
    }
    
    /**
     * @link https://www.siel.nl/acumulus/API/Reports/Trip_Compensations/
     *
     * @param int $year = null
     *
     * @return array|null
     */
    public function getTripCompensations(int $year = null): ?array
    {
        $data = [];
        if ($year) {
            $data['year'] = $year;
        }
        
        return $this->request('/acumulus/stable/reports/report_tripcompensations.php', $data);
    }
}