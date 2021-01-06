<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Picinside\Taxrelations;
use Elasticsearch\ClientBuilder;
use App\CustomerAttribute;
use App\Customer;

class SearchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:index {leadID=-1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Binjuhor index data for Elasticsearch';

     /**
     * Index document name.
     *
     * @var string
     */
     protected $indexDocument    = 'getaco';

    /**
     * Document type.
     *
     * @var string
     */
    protected $documentType     = 'customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $leadID = $this->argument('leadID');
        if ( $leadID == -1 ) {
            return $this->bulk();
        }
        return $this->index();
    }

    /**
     * Index Customer data from customer table.
     *
     * @param integer $id
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function index()
    {
        $leadID = $this->argument('leadID');
        $customer = Customer::find($leadID);
        if ( $customer ) {
            $client = ClientBuilder::create()->build();
            $params = [
                'index' => $this->indexDocument,
                'type'  => $this->documentType,
                'id'    => $customer->id_customer,
                'body'  => [
                    "customer_name"   => $customer->customer_name,
                    "id_form"         => $customer->id_form,
                    "customer_email"  => $customer->customer_email,
                    "customer_phone"  => $customer->customer_phone,
                    "from_url"        => $customer->from_url,
                    "id_company"      => $customer->id_company,
                    "customer_status" => $customer->customer_status,
                    "tags"            => $customer->CustomerTag,
                    "segments"         => $customer->segment,
                    "type"            => $customer->type,
                    "attribute"       => $customer->attribute,
                    "created_at"      => $customer->created_at,
                    "updated_at"      => $customer->updated_at
                ]
            ];
            $responses = $client->index($params);
            return $this->info('Customer with ID '. $leadID  . ' index successfull.');
        }
        return $this->info('Customer with ID '. $leadID  . ' does not exits.');
    }

    /**
     * Bulk data to elasticsearch
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function bulk()
    {
        $allCustomer = Customer::where('customer_status', 1)
        ->where('delete',0)
        ->get();
        $client   = ClientBuilder::create()->build();
        
        foreach ($allCustomer as $key => $customer) {
            $params['body'][] = [
                'index' => [
                    '_index' => $this->indexDocument,
                    '_type'  => $this->documentType,
                    '_id'    => $customer->id_customer,
                ]
            ];
            $params['body'][] = [
                "customer_name"   => $customer->customer_name,
                "id_form"         => $customer->id_form,
                "customer_email"  => $customer->customer_email,
                "customer_phone"  => $customer->customer_phone,
                "from_url"        => $customer->from_url,
                "id_company"      => $customer->id_company,
                "customer_status" => $customer->customer_status,
                "tags"            => $customer->CustomerTag,
                "segments"        => $customer->segment,
                "type"            => $customer->type,
                "attribute"       => $customer->attribute,
                "created_at"      => $customer->created_at,
                "updated_at"      => $customer->updated_at
            ];
            if ($key % 1000 == 0) {
                $responses = $client->bulk($params);
                $params = ['body' => []];
                unset($responses);
            }
        }
        if (!empty($params['body'])) {
            $responses = $client->bulk($params);
        }
        return $this->info($allCustomer->count()  . ' customers were index successfully.');
    }
}
