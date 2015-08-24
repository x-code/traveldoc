<?php
require 'vendor/autoload.php';
use Adkarta\Traveldoc\TraveldocClient;
$config = [
    "username" => "****",
    "password" => "****",
    "client_name" => "****",
    "configuration_name" => "****"
];
$client = new TraveldocClient($config);
$GetSession = new stdClass();
$GetSession->UserName = "****";
$GetSession->Password= "****";
$GetSession->ClientName = "****";
$GetSession->ConfigurationName = "****";



try {
    $SessionGUID = $client->GetSession($GetSession);
    //echo $SessionGUID;
    $CheckPassengerRequest->SessionGUID = $SessionGUID;
    $CheckPassengerRequest->Passenger->PassengerGUID = "00000000-0000-0000-0000-000000000000";
    $CheckPassengerRequest->Passenger->AirlinePAXReference = true;
    $CheckPassengerRequest->Passenger->Description = true;
    $CheckPassengerRequest->Passenger->PNR = $_REQUEST["PNR"];
    $CheckPassengerRequest->Passenger->Age = $_REQUEST["Age"];
    $CheckPassengerRequest->Passenger->CountryOfResidence = $_REQUEST["CountryOfResidence"];
    $CheckPassengerRequest->Passenger->PassengerResult = "None";
    $CheckPassengerRequest->Passenger->Documents->Document->DocumentGUID = "00000000-0000-0000-0000-000000000000";
    $CheckPassengerRequest->Passenger->Documents->Document->PassengerGUID = "00000000-0000-0000-0000-000000000000";
    $CheckPassengerRequest->Passenger->Documents->Document->DocumentTypeID = 1;
    $CheckPassengerRequest->Passenger->Documents->Document->DocumentFormat = $_REQUEST["DocumentFormat"];
    $CheckPassengerRequest->Passenger->Documents->Document->IssuingCountry = $_REQUEST["IssuingCountry"];
    $CheckPassengerRequest->Passenger->Documents->Document->DocumentNumber = $_REQUEST["DocumentNumber"];
    $CheckPassengerRequest->Passenger->Documents->Document->FirstName = $_REQUEST["FirstName"];
    $CheckPassengerRequest->Passenger->Documents->Document->LastName = $_REQUEST["LastName"];
    $CheckPassengerRequest->Passenger->Documents->Document->Gender = $_REQUEST["Gender"];
    $CheckPassengerRequest->Passenger->Documents->Document->Nationality = $_REQUEST["Nationality"];
    $CheckPassengerRequest->Passenger->Documents->Document->DateOfBirth = $_REQUEST["DateOfBirth"];
    $CheckPassengerRequest->Passenger->Documents->Document->ExpiryDate = $_REQUEST["ExpiryDate"];
    $CheckPassengerRequest->Passenger->Documents->Document->MRZ = true;
    $CheckPassengerRequest->Passenger->Segments->Segment->SegmentGUID = "00000000-0000-0000-0000-000000000000";
    $CheckPassengerRequest->Passenger->Segments->Segment->PassengerGUID = "00000000-0000-0000-0000-000000000000";
    $CheckPassengerRequest->Passenger->Segments->Segment->SegmentOrdinal = "1";
    $CheckPassengerRequest->Passenger->Segments->Segment->CarrierCode = $_REQUEST["CarrierCode"];
    $CheckPassengerRequest->Passenger->Segments->Segment->FlightNumber = $_REQUEST["FlightNumber"];
    $CheckPassengerRequest->Passenger->Segments->Segment->DepartureAirport = $_REQUEST["DepartureAirport"];
    $CheckPassengerRequest->Passenger->Segments->Segment->DepartureCountry = $_REQUEST["DepartureCountry"];
    $CheckPassengerRequest->Passenger->Segments->Segment->DepartureDateTime = $_REQUEST["DepartureDateTime"];
    $CheckPassengerRequest->Passenger->Segments->Segment->ArrivalAirport = $_REQUEST["ArrivalAirport"];
    $CheckPassengerRequest->Passenger->Segments->Segment->ArrivalCountry = $_REQUEST["ArrivalCountry"];
    $CheckPassengerRequest->Passenger->Segments->Segment->ArrivalDateTime = $_REQUEST["ArrivalDateTime"];
    $CheckPassengerRequest->Passenger->Segments->Segment->Transit = false;
    $CheckPassengerRequest->Passenger->Segments->Segment->PassengerAge = true;
    $CheckPassengerRequest->Passenger->Level1Messages = true;
    $CheckPassengerRequest->Passenger->Level2Messages = true;
    
    $outCheck = $client->checkPassenger($CheckPassengerRequest);
    //echo json_encode($CheckPassengerRequest);
    //echo json_encode($outCheck);
    print_r($outCheck);
    


    } catch (SoapFault $fault) {
        echo json_encode($fault);
    }

?>