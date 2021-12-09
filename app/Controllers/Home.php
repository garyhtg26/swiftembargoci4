<?php

namespace App\Controllers;
use App\Models\PostModel;
class Home extends BaseController
{
    
    public function index()
    {
        
        $data = array(
            'WS_USERNAME' => getenv('WS_USERNAME'),
            'WS_PASSWORD' => getenv('WS_PASSWORD')
        );
        return view('input', $data);
    }
    public function store()
    {
        //load helper form and URL
        helper(['form', 'url']);
         
        //define validation
        $validation = $this->validate([
            'id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan id.'
                ]
            ],
         
        ]);

        if(!$validation) {

            //render view with error validation message
            return view('input', [
                'validation' => $this->validator
            ]);

        } else {

            //model initialize
            $postModel = new PostModel();
            
            //insert data into database
            $postModel->insert([
                'REQUEST_ID'   => $this->request->getPost('REQUEST_ID'),
                'ISSUING_BANK' => $this->request->getPost('ISSUING_BANK'),
                'ADVISING_BANK' => $this->request->getPost('ADVISING_BANK'),
                'APPLICANT' => $this->request->getPost('APPLICANT'),
                'BENEFICIARY' => $this->request->getPost('BENEFICIARY'),
                'PORT_OF_LOADING' => $this->request->getPost('PORT_OF_LOADING'),
                'PORT_OF_DISCHARGE' => $this->request->getPost('PORT_OF_DISCHARGE'),
                'PLACE_OF_TAKING_IN_CHARGE' => $this->request->getPost('PLACE_OF_TAKING_IN_CHARGE'),
                'PLACE_OF_DESTINATION' => $this->request->getPost('PLACE_OF_DESTINATION'),
                'DESCRIPTION_OF_GOOODS' => $this->request->getPost('DESCRIPTION_OF_GOOODS'),
                'COUNTRY_OF_ORIGIN' => $this->request->getPost('COUNTRY_OF_ORIGIN'),
                'SHIPPER' => $this->request->getPost('SHIPPER'),
                'NOTIFY_PARTY' => $this->request->getPost('NOTIFY_PARTY'),
                'CONSIGNEE'=> $this->request->getPost('CONSIGNEE'),
                'VESSEL_PRE_CARRIAGE'=> $this->request->getPost('VESSEL_PRE_CARRIAGE'),
                'VESSEL_MAIN_VESSEL'=> $this->request->getPost('VESSEL_MAIN_VESSEL'),
                'CARRIER'=> $this->request->getPost('CARRIER'),
                'MASTER'=> $this->request->getPost('MASTER'),
                'CHARTERER'=> $this->request->getPost('CHARTERER'),
                'OWNER'=> $this->request->getPost('OWNER'),
                'AGENT_OF_CARRIER'=> $this->request->getPost('AGENT_OF_CARRIER'),
                'DELIVERY_AGENT_IN_TRANSPORT_DOC'=> $this->request->getPost('DELIVERY_AGENT_IN_TRANSPORT_DOC'),
                'SHIPPING_COMPANY'=> $this->request->getPost('SHIPPING_COMPANY'),
                'INSURANCE_COMPANY'=> $this->request->getPost('INSURANCE_COMPANY'),
                'AGENT_OF_INSURANCE_COMPANY'=> $this->request->getPost('AGENT_OF_INSURANCE_COMPANY'),
                'SETTLING_AGENT_OF_INSURANCE'=> $this->request->getPost('SETTLING_AGENT_OF_INSURANCE'),
                'ISSUER_OF_CERT_OF_ANALYSIS'=> $this->request->getPost('ISSUER_OF_CERT_OF_ANALYSIS'),
                'ISSUER_OF_PACKING_LIST'=> $this->request->getPost('ISSUER_OF_PACKING_LIST'),
                'ISSUER_OF_HEALTH_CERTIFICATE'=> $this->request->getPost('ISSUER_OF_HEALTH_CERTIFICATE'),
                'MANUFACTURER'=> $this->request->getPost('MANUFACTURER'),
                'OTHERS'=> $this->request->getPost('OTHERS'),
                'XML_SOAP_REQ'=> $this->request->getPost('XML_SOAP_REQ'),
                'XML_SOAP_RSP'=> $this->request->getPost('XML_SOAP_RSP'),
                'STATUS'=> $this->request->getPost('STATUS'),
                'CREATED_TIMESTAMP'=> $this->request->getPost('CREATED_TIMESTAMP'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Disimpan');
            // $wsdl   = "http://api.notificationmessaging.com/NMSOAP/NotificationService?wsdl"; 
            // $client = new \SoapClient($wsdl, array(  'soap_version' => SOAP_1_1,
            //                                          'trace' => true,
            //                                       )); 
            // try {
            //     $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".$this->request->getPost('id')."\n:51D:".$this->request->getPost('issuebank')."\n:57D:".$this->request->getPost('advisingbank')."\n:50:".$this->request->getPost('applicant')."\n:59:".$this->request->getPost('beneficiary')."\n:44E:".$this->request->getPost('portofloading')."\n:44F:".$this->request->getPost('portofdischarge')."\n:44A:".$this->request->getPost('placeoftaking')."\n:44B:".$this->request->getPost('placeofdestination')."\n:45A:".$this->request->getPost('descriptionofgoods')."\n:53A:".$this->request->getPost('countryoforigin')."\n:45A:".$this->request->getPost('shipper')."\n:45A:".$this->request->getPost('notifyparty')."\n:45A:".$this->request->getPost('consignee')."\n:47A:".$this->request->getPost('precarriage')."\n:47A:".$this->request->getPost('mainvessel')."\n:47A:".$this->request->getPost('carrier')."\n:47A:".$this->request->getPost('master')."\n:47A:".$this->request->getPost('charterer')."\n:47A:".$this->request->getPost('owner')."\n:47A:".$this->request->getPost('agentofcarrier')."\n:47A:".$this->request->getPost('deliveryagent')."\n:47A:".$this->request->getPost('shipingcompany')."\n:46A:".$this->request->getPost('insuracecompany')."\n:46A:".$this->request->getPost('agentofinsurance')."\n:46A:".$this->request->getPost('settlingagent')."\n:46A:".$this->request->getPost('issuerofcert')."\n:45A:".$this->request->getPost('issuerofpacking')."\n:45A:".$this->request->getPost('issuerofhealth')."\n:45A:".$this->request->getPost('manufacturer')."\n:46A:".$this->request->getPost('other')."\n-}";
            //     $string = <<<XML
            //                 <soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v3="http://v3.server.transaction.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
            //                 <soapenv:Header/>
            //                 <soapenv:Body>
            //                 <v3:scoreTransaction soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
            //                 <loginData xsi:type="urn:LoginData" xmlns:urn="urn:commons.webservice.embargo.tonbeller.com">
            //                 <pass xsi:type="xsd:string">gwg</pass>
            //                 <userName xsi:type="xsd:string">demo</userName>
            //                 </loginData>
            //                 <params xsi:type="urn:TransactionScoringContext03" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
            //                 <additionalParameter xsi:type="tran:ArrayOf_tns2_AdditionalData" soapenc:arrayType="urn:AdditionalData[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
            //                 <inOut xsi:type="xsd:string">in</inOut>
            //                 <instance xsi:type="xsd:string">1</instance>
            //                 <paymentSystem xsi:type="xsd:string">System1</paymentSystem>
            //                 <searchMode xsi:type="xsd:string">verbose</searchMode>
            //                 <trxFormat xsi:type="xsd:string">mt</trxFormat>
            //                 </params>
            //                 <data xsi:type="urn:TransactionData" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
            //                 <requestId xsi:type="xsd:string">...</requestId>
            //                 <textData xsi:type="xsd:string">...</textData>
            //                 <transactionIds xsi:type="tran:ArrayOf_xsd_string" soapenc:arrayType="xsd:string[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
            //                 <xmlData xsi:type="xsd:base64Binary">cid:482434121934</xmlData>
            //                 </data>
            //                 </v3:scoreTransaction>
            //                 </soapenv:Body>
            //                 </soapenv:Envelope>
            //                 XML;
            //     $xml = simplexml_load_string($string);
            //     $args = array(new \SoapVar($xml, XSD_ANYXML));    
            //     $res  = $client->__soapCall('sendObject', $args);
            //     return $res;
            // } catch (\SoapFault $e) {
            //     echo "Error: {$e}";
            // }
            // echo "<hr>Last Request";
            // echo "<pre>", htmlspecialchars($client->__getLastRequest()), "</pre>";

            $swift = "{1:F01EFGBGRAAAXXX3121734186}{2:I700ABNAKRSEXXXXN}{4:\n:20:".$this->request->getPost('REQUEST_ID')."\n:51D:".$this->request->getPost('ISSUING_BANK')."\n:57D:".$this->request->getPost('ADVISING_BANK')."\n:50:".$this->request->getPost('APPLICANT')."\n:59:".$this->request->getPost('BENEFICIARY')."\n:44E:".$this->request->getPost('PORT_OF_LOADING')."\n:44F:".$this->request->getPost('PORT_OF_DISCHARGE')."\n:44A:".$this->request->getPost('PLACE_OF_TAKING_IN_CHARGE')."\n:44B:".$this->request->getPost('PLACE_OF_DESTINATION')."\n:45A:".$this->request->getPost('DESCRIPTION_OF_GOOODS')."\n:53A:".$this->request->getPost('COUNTRY_OF_ORIGIN')."\n:45A:".$this->request->getPost('SHIPPER')."\n:45A:".$this->request->getPost('NOTIFY_PARTY')."\n:45A:".$this->request->getPost('CONSIGNEE')."\n:47A:".$this->request->getPost('VESSEL_PRE_CARRIAGE')."\n:47A:".$this->request->getPost('VESSEL_MAIN_VESSEL')."\n:47A:".$this->request->getPost('CARRIER')."\n:47A:".$this->request->getPost('MASTER')."\n:47A:".$this->request->getPost('CHARTERER')."\n:47A:".$this->request->getPost('OWNER')."\n:47A:".$this->request->getPost('AGENT_OF_CARRIER')."\n:47A:".$this->request->getPost('DELIVERY_AGENT_IN_TRANSPORT_DOC')."\n:47A:".$this->request->getPost('SHIPPING_COMPANY')."\n:46A:".$this->request->getPost('INSURANCE_COMPANY')."\n:46A:".$this->request->getPost('AGENT_OF_INSURANCE_COMPANY')."\n:46A:".$this->request->getPost('SETTLING_AGENT_OF_INSURANCE')."\n:46A:".$this->request->getPost('ISSUER_OF_CERT_OF_ANALYSIS')."\n:45A:".$this->request->getPost('ISSUER_OF_PACKING_LIST')."\n:45A:".$this->request->getPost('ISSUER_OF_HEALTH_CERTIFICATE')."\n:45A:".$this->request->getPost('MANUFACTURER')."\n:46A:".$this->request->getPost('OTHERS')."\n-}";
                $string = <<<XML
                            <soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v3="http://v3.server.transaction.webservice.embargo.tonbeller.com" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
                            <soapenv:Header/>
                            <soapenv:Body>
                            <v3:scoreTransaction soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
                            <loginData xsi:type="urn:LoginData" xmlns:urn="urn:commons.webservice.embargo.tonbeller.com">
                            <pass xsi:type="xsd:string">gwg</pass>
                            <userName xsi:type="xsd:string">demo</userName>
                            </loginData>
                            <params xsi:type="urn:TransactionScoringContext03" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                            <additionalParameter xsi:type="tran:ArrayOf_tns2_AdditionalData" soapenc:arrayType="urn:AdditionalData[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <inOut xsi:type="xsd:string">in</inOut>
                            <instance xsi:type="xsd:string">1</instance>
                            <paymentSystem xsi:type="xsd:string">System1</paymentSystem>
                            <searchMode xsi:type="xsd:string">verbose</searchMode>
                            <trxFormat xsi:type="xsd:string">mt</trxFormat>
                            </params>
                            <data xsi:type="urn:TransactionData" xmlns:urn="urn:server.transaction.webservice.embargo.tonbeller.com">
                            <requestId xsi:type="xsd:string">...</requestId>
                            <textData xsi:type="xsd:string">...</textData>
                            <transactionIds xsi:type="tran:ArrayOf_xsd_string" soapenc:arrayType="xsd:string[]" xmlns:tran="http://localhost:8080/embargo/services/TransactionScoring03"/>
                            <xmlData xsi:type="xsd:base64Binary">cid:482434121934</xmlData>
                            </data>
                            </v3:scoreTransaction>
                            </soapenv:Body>
                            </soapenv:Envelope>
                            XML;
                $xml = simplexml_load_string($string);

            $requestIds = $xml->xpath('//requestId');
            foreach ($requestIds as $requestId) $requestId[0] = $this->request->getPost('id');
            $textDatas = $xml->xpath('//textData');
            foreach ($textDatas as $textData) $textData[0] = $swift;
            
            $userNames = $xml->xpath('//userName');
            foreach ($userNames as $userName) $userName[0] = getenv('WS_USERNAME');
            $passs = $xml->xpath('//pass');
            foreach ($passs as $pass) $pass[0] = getenv('WS_PASSWORD');

            $final = $xml->asXML();

            // Create the SoapClient instance
            // $url         = "http://localhost:8080/embargo/services/TransactionScoring03";
            // $soapclient     = new \SoapClient($url, array("trace" => 1, "exception" => 0));
            // $response =$soapclient->scoreTransaction($final);
            // if($response->scoreTransactionResult->Status == "Success")
            // {
            //     echo "SOAP Sent!";
            // }
            session()->set('swift', $swift);
            session()->set('final', $final);
            return redirect()->to(base_url('output/'.$this->request->getPost('id')));
        }
    }
    public function view($id)
    {
        /**
        * model initialize
        */
        $postModel = new PostModel();

        $data = array(
            'post' => $postModel->find($id)
        );
        if (session()->has('swift')) {
			$data['swift'] = session('swift');
            $data['final'] = session('final');
		}
        return view('output', $data);
    }
}
