<!doctype html> 
<html> 
<head> 
    <title>DataTables and Codeigniter</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!--data table--> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css" /> 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-colvis-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.js"></script> 
    <!--/.data table--> 
    <style> 
        body { 
            padding: 15px; 
        } 
    </style> 
</head> 
<body> 
    <div class="row" style="margin-bottom: 10px"> 
        <div class="col-md-4"> 
            <h2 style="margin-top:0px">Client Profile List</h2> 
        </div> 
        <div class="col-md-4 text-center"> 
            <div style="margin-top: 4px" id="message"> 
                <?php // echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> 
            </div> 
        </div> 
        <div class="col-md-4 text-right"> 
            <?php //echo anchor(site_url('Client_Profile/create'), 'Create', 'class="btn btn-primary"'); ?> 
        </div> 
    </div> 
    <table class="table table-bordered table-striped" id="mytable"> 
        <thead> 
            <tr> 
                <th width="80px">No</th> 
                <th>Fecha</th> 
                <th>Tipo</th> 
                <th>Descripción</th> 
                <th>cantidad</th> 
                <th>precio</th> 
                <th>total parcial</th> 
                <th>pago</th> 
                <th>saldo</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php 
			$start = 0; 
			var_dump($clients_data);
            foreach ($clients_data as $client_data) 
            { 

                ?> 
                <tr> 
                    <td> 
                        <?php echo ++$start ?> 
                    </td> 
                    <td> 
                        <?php echo $client_data->nombre ?> 
                    </td> 
                    <td> 
                        <?php echo $client_data->CedulaIdentidadl ?> 
                    </td> 
                    <td style="text-align:center" width="200px"> 
                        <?php  
            //echo anchor(site_url('Client_Profile/read/'.$Client_Profile->id),'Read');  
            echo ' | ';  
            //echo anchor(site_url('Client_Profile/update/'.$Client_Profile->id),'Update');  
            echo ' | ';  
            //echo anchor(site_url('Client_Profile/delete/'.$Client_Profile->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');  
            ?> 
                    </td> 
                </tr> 
                <?php 
            } 
            ?> 
        </tbody> 
    </table> 
    <script type="text/javascript"> 
        $(document).ready(function() { 
            $("#mytable").dataTable(); 
        }); 
    </script> 
</body> 
</html>