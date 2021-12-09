<?php 
date_default_timezone_set('Asia/Jakarta');
$date = date('m/d/Y h:i:s a', time());
 ?>
<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trade Screening</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../public/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-darker flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Questionnaire Trade Screening</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('/'); ?> ">
                  <span data-feather="file"></span>
                  Trade Screening<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/history'); ?> ">
                  <span data-feather="file-text"></span>
                  History
                </a>
              </li>
             
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Input Form Screening</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="fas fa-download mr-1"></i>Download</button>
                
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> -->
          </div>

        <div class=" mt-4 mb-4" >
        <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>
        <form  method="POST" action="<?php echo base_url('home/store') ?>">
        <div class="form-group row">
            <span class="col-form-label pl-3">1.</span>
            <label for="" class="col-sm-4 col-form-label">Documentary Credit Number/Letter of Credit Number/Request ID</label>
            <div class="input-group col-sm-7">
                <div class="input-group-prepend" style="height: 38px;">
                    <div class="input-group-text">
                        <input onchange="toggleCheckbox(this)" type="checkbox" aria-label="Checkbox for following text input"> <span class="ml-2" style="color: grey;font-size: smaller;font-weight: 400;">auto generate</span>
                    </div>
                </div>
                <input type="text" class="form-control" id="noid" name="REQUEST_ID" placeholder="" >
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">2.</span>
            <label for="" class="col-sm-4 col-form-label">Issuing Bank/Presenting Bank</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUING_BANK" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">3.</span>
            <label for="" class="col-sm-4 col-form-label">Advising Bank/Nego Bank/Remitting Bank</label>
            <div class="col-sm-7">
            <input type="text" name="ADVISING_BANK" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">4.</span>
            <label for="" class="col-sm-4 col-form-label">Applicant/Drawee/Buyer</label>
            <div class="col-sm-7">
            <input type="text" name="APPLICANT" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">5.</span>
            <label for="" class="col-sm-4 col-form-label">Beneficiary/Drawer/Seller</label>
            <div class="col-sm-7">
            <input type="text" name="BENEFICIARY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">6.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Loading</label>
            <div class="col-sm-7">
            <input type="text" name="PORT_OF_LOADING" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">7.</span>
            <label for="" class="col-sm-4 col-form-label">Port of Discharge</label>
            <div class="col-sm-7">
            <input type="text" name="PORT_OF_DISCHARGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">8.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Taking in Charge</label>
            <div class="col-sm-7">
            <input type="text" name="PLACE_OF_TAKING_IN_CHARGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-3">9.</span>
            <label for="" class="col-sm-4 col-form-label">Place of Destination</label>
            <div class="col-sm-7">
            <input type="text" name="PLACE_OF_DESTINATION" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">10.</span>
            <label for="" class="col-sm-4 col-form-label">Description of Goods</label>
            <div class="col-sm-7">
            <input type="text" name="DESCRIPTION_OF_GOOODS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">11.</span>
            <div class="col-sm-4">Country of Origin</div>
            <div class="col-sm-7">
            <select name="COUNTRY_OF_ORIGIN" class="form-control" id="exampleFormControlSelect1">
            <option value="ID">Indonesia (ID)</option>
            <option value="MY">Malaysia (MY)</option>
            <option value="US">United States (US)</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">12.</span>
            <label for="" class="col-sm-4 col-form-label">Shipper</label>
            <div class="col-sm-7">
            <input name="SHIPPER" type="text" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">13.</span>
            <label for="" class="col-sm-4 col-form-label">Notify Party</label>
            <div class="col-sm-7">
            <input type="text" name="NOTIFY_PARTY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">14.</span>
            <label for="" class="col-sm-4 col-form-label">Consignee</label>
            <div class="col-sm-7">
            <input type="text" name="CONSIGNEE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">15.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - Pre Carriage</label>
            <div class="col-sm-7">
            <input type="text" name="VESSEL_PRE_CARRIAGE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">16.</span>
            <label for="" class="col-sm-4 col-form-label">Vessel - Main Vessel</label>
            <div class="col-sm-7">
            <input type="text" name="VESSEL_MAIN_VESSEL" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">17.</span>
            <label for="" class="col-sm-4 col-form-label">Carrier</label>
            <div class="col-sm-7">
            <input type="text" name="CARRIER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">18.</span>
            <label for="" class="col-sm-4 col-form-label">Master</label>
            <div class="col-sm-7">
            <input type="text" name="MASTER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">19.</span>
            <label for="" class="col-sm-4 col-form-label">Charterer</label>
            <div class="col-sm-7">
            <input type="text" name="CHARTERER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">20.</span>
            <label for="" class="col-sm-4 col-form-label">Owner</label>
            <div class="col-sm-7">
            <input type="text" name="OWNER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">21.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Carrier/Master/Charterer/Owner</label>
            <div class="col-sm-7">
            <input type="text" name="AGENT_OF_CARRIER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">22.</span>
            <label for="" class="col-sm-4 col-form-label">Delivery Agent in Transport Document</label>
            <div class="col-sm-7">
            <input type="text" name="DELIVERY_AGENT_IN_TRANSPORT_DOC" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">23.</span>
            <label for="" class="col-sm-4 col-form-label">Shipping Company</label>
            <div class="col-sm-7">
            <input type="text" name="SHIPPING_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">24.</span>
            <label for="" class="col-sm-4 col-form-label">Insurance Company</label>
            <div class="col-sm-7">
            <input type="text" name="INSURANCE_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">25.</span>
            <label for="" class="col-sm-4 col-form-label">Agent of Insurance Company</label>
            <div class="col-sm-7">
            <input type="text" name="AGENT_OF_INSURANCE_COMPANY" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">26.</span>
            <label for="" class="col-sm-4 col-form-label">Settling Agent of Insurance</label>
            <div class="col-sm-7">
            <input type="text" name="SETTLING_AGENT_OF_INSURANCE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">27.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Cert of Analysis/Certificate of Origin</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_CERT_OF_ANALYSIS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">28.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Packing List</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_PACKING_LIST" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">29.</span>
            <label for="" class="col-sm-4 col-form-label">Issuer of Health Certificate/Other Certificate</label>
            <div class="col-sm-7">
            <input type="text" name="ISSUER_OF_HEALTH_CERTIFICATE" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">30.</span>
            <label for="" class="col-sm-4 col-form-label">Manufacturer</label>
            <div class="col-sm-7">
            <input type="text" name="MANUFACTURER" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">31.</span>
            <label for="" class="col-sm-4 col-form-label">Others</label>
            <div class="col-sm-7">
            <input type="text" name="OTHERS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">32.</span>
            <label for="" class="col-sm-4 col-form-label">Xml Soap Req</label>
            <div class="col-sm-7">
            <input type="text" name="XML_SOAP_REQ" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">33.</span>
            <label for="" class="col-sm-4 col-form-label">Xml Soap RSP</label>
            <div class="col-sm-7">
            <input type="text" name="XML_SOAP_RSP" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">34.</span>
            <label for="" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-7">
            <input type="text" name="STATUS" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">35.</span>
            <label for="" class="col-sm-4 col-form-label">User ID</label>
            <div class="col-sm-7">
            <input type="text" name="USER_ID" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <span class="col-form-label pl-2">36.</span>
            <label for="" class="col-sm-4 col-form-label">Created Timestamp</label>
            <div class="col-sm-7">
            <input type="text" value="<?php echo (isset($date)) ? $date: ''?>" name="CREATED_TIMESTAMP" class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col text-center">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
        </form>
        </div>
        </div> 
          
        </main>
      </div>
    </div>
    <!-- Footer -->
<footer class="page-footer font-small bg-darker ">

<!-- Copyright -->
<div style="color: white;" class="footer-copyright text-center py-3">© 2021 Copyright:
  <a href="https://idxpartners.com/"> Id/x partners</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    <script>
      function toggleCheckbox(element)
 {
    if (element.checked) {
      $('#noid').prop('readonly', true);
    }
    else if (!element.checked){
      $('#noid').removeProp('readonly');
      $('#noid').prop('readonly', false);

    }
 }
    </script>
  </body>
</html>
