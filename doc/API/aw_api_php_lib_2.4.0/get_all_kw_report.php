<?php

error_reporting(E_STRICT | E_ALL);

require_once '/src/Google/Api/Ads/AdWords/Lib/AdWordsUser.php';
require_once '/src/Google/Api/Ads/AdWords/Util/ReportUtils.php';

// Report date
// $report_date = date('Y-m-d');
// $report_date = '2013-23-09';

$report_date = date('d-m-Y', strtotime('yesterday'));

echo "Getting report for $report_date\n";
get_all_client_reports($report_date);

// define all the function
function get_all_client_reports($report_date){
        $data_dir = "./data/$report_date";
        if(!file_exists($data_dir)){
                if(!mkdir($data_dir)){
                        echo "\n Failed to create dir $report_date...";
                        exit();
                }else{
                        echo "\n dir $report_date create under data";
                }
        }
        
        $client_zumy_1 = "359981207885-qsdivmtq2h4oqc54l6oijaitji3ukgar.apps.googleusercontent.com";
        $client_zumy_2 = "359981207885-qsdivmtq2h4oqc54l6oijaitji3ukgar.apps.googleusercontent.com";
        $client_zumy_3 = "359981207885-qsdivmtq2h4oqc54l6oijaitji3ukgar.apps.googleusercontent.com";
        
        $client_arr = array($client_zumy_1, $client_zumy_2, $client_zumy_3);
        foreach ($client_arr as $value){
                $pos = strpos($value, "@");
                $client = substr($value, 0, $pos);
                
                get_kw_report_for_client("359981207885-qsdivmtq2h4oqc54l6oijaitji3ukgar.apps.googleusercontent.com", $client, $report_date);
        }
}

// get report per client
function get_kw_report_for_client($client_id, $client, $report_date){
        
        $user = new AdWordsUser();
        $user->SetClientId($client_id); // select the client with clientID
        
        $reportDefinitionService = $user->GetReportDefinitionService("v201302");
        
        // Create Selector
        $selector = new Selector();
        $selector->fields = array(
                "Date","CampaignId","CampaignName","CampaignStatus","AdGroupId","AdGroupName",
                "AdNetworkType1", "Id", "KeywordText", "KeywordMatchType", "DestinationUrl","IsNegative", "Impressions",
                "Clicks", "Cost","Conversions"
        );
        $selector->dateRange("20130910","20131028");
        
        
        // Create report definition
        $reportDefinition = new ReportDefinition();
        $reportDefinition->reportName = "Keywords performance report #" . time();
        $reportDefinition->dateRangeType = "YESTERDAY";
//      $reportDefinition->dateRangeType = "CUSTOM_DATE";
        $reportDefinition->reportType = "KEYWORDS_PERFORMANCE_REPORT";
        $reportDefinition->downloadFormat = "CSV";
        $reportDefinition->selector = $selector;
        
        // Create operations
        $operation = new ReportDefinitionOperation();
        $operation->operand = $reportDefinition;
        $operation->operator = "ADD";
        
        $operation = array($operation);
        
        // Add report definition
        $result = $reportDefinitionService->mutate($operation);
        
        $fileName = "kw_perf_" . $client . ".txt";
        
        $path = dirname(__FILE__) . "/data/" . $report_date ."/" . $fileName;
        
        // Delete existing file
        if(file_exists($path)){
                unlink($path);
        }
        
        // Display report definitions
        if($result != null){
                foreach ($result as $reportDefinition){
                        // Get the Report in $csv Get the result Array
                        $csv = ReportUtils::DownloadReport($reportDefinition->id, $path, $user);
                        $rows = explode("\n", $csv);
                        for($i=2; $i<count($rows)-1; $i++){
                                $array[] = explode(",", $rows[$i]);
                        }
                }
                
                echo "\n Report done for $client";
        }
        
}