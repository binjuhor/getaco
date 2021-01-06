<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;
use App\Customer;
class LeadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leads:generate {companyID=-1}';
    
    /**
     * Lead number generate for company.
     *
     * @var integer
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    protected $leadNumber = 5000;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Binjuhor generate 2000 leads for a company.';

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
        $companyID = $this->argument('companyID');
        $company = Company::find( $companyID );
        if (!$company) {
            return $this->info('Company does not exits');
        }
        return $this->generateLead( $companyID );
    }

    /**
     * Generate 2000 Leads with Company ID
     *
     * @param integer $companyID
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function generateLead( int $companyID )
    {
        $faker = \Faker\Factory::create();
        $leads = [];
        try {
            for ($i=0; $i < $this->leadNumber; $i++) { 
                $leads[$i]['customer_name'] = $faker->title.' '.$faker->firstName;
                $leads[$i]['id_form'] = 0;
                $leads[$i]['customer_email'] = $faker->email;
                $leads[$i]['customer_phone'] = $faker->e164PhoneNumber;
                $leads[$i]['id_company'] = $companyID;
                $leads[$i]['customer_status'] = 1;
                $leads[$i]['from_url'] = '';
                $leads[$i]['sort_order'] = 0;
                $leads[$i]['dynamic_field'] = '';
                $leads[$i]['created_at'] = $faker->dateTime;
                $leads[$i]['updated_at'] = $faker->dateTime;
            }
            Customer::insert($leads);
            $this->info($this->leadNumber  . ' leads created success');
        } catch (Exception $e) {
            $this->error('Error ' . $e . ' when create users.');
        }
    }
}
