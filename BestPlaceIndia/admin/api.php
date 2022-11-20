<?php

include 'config.php';
include 'function.php';
 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'];


    switch ($action) {


  


        case 'addplaces':
            $place_name = $_POST['place_name'];
            $place_desc = $_POST['place_desc'];
            $location = $_POST['location'];
            $address = $_POST['address'];
            $opentime = $_POST['opentime'];
            $heights = $_POST['heights'];
            $floors = $_POST['floors'];
            $Alt_names = $_POST['Alt_names'];
            $architect=$_POST['architect'];
            $contractor=$_POST['contractor'];

             $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            

            $sqlconcession = "INSERT INTO  master_places (place_name,place_desc,location,address,opentime,heights,floors,Alt_names,architect,contractor,image) VALUES
(:place_name,:place_desc,:location,:address,:opentime,:heights,:floors,:Alt_names,:architect,:contractor,:file)";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':place_name', $place_name, PDO::PARAM_STR);
            $query->bindParam(':place_desc', $place_desc, PDO::PARAM_STR);
            $query->bindParam(':location', $location, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':opentime',$opentime,PDO::PARAM_STR);
            $query->bindParam(':heights', $heights, PDO::PARAM_STR);
            $query->bindParam(':floors', $floors, PDO::PARAM_STR);
            $query->bindParam(':Alt_names', $Alt_names, PDO::PARAM_STR);
             $query->bindParam(':architect', $architect, PDO::PARAM_STR);
             $query->bindParam(':contractor', $contractor, PDO::PARAM_STR);
             $query->bindParam(':file', $file, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Added";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Added";
                echo sendResponse($code, $msg);
            }

            break;



            case 'updateplaces':
            $id = $_POST['id'];
            $place_name = $_POST['place_name'];
            $place_desc = $_POST['place_desc'];
            $location = $_POST['location'];
            $address = $_POST['address'];
            $opentime = $_POST['opentime'];
            $heights = $_POST['heights'];
            $floors = $_POST['floors'];
            $Alt_names = $_POST['Alt_names'];
            $architect=$_POST['architect'];
            $contractor=$_POST['contractor'];
            $lastimg=$_POST['lastimg'];



            $size = $_FILES['image']['size'];

            if ($size > 0) {
                $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);

            }

            else
            {

                $file=$lastimg;
            }




           
            $sqlconcession = "UPDATE  master_places Set place_name=:place_name,place_desc=:place_desc,location=:location,address=:address,opentime=:opentime,heights=:heights,floors=:floors,Alt_names=:Alt_names,architect=:architect,contractor=:contractor,image=:file WHERE  id=:id";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->bindParam(':place_name', $place_name, PDO::PARAM_STR);
            $query->bindParam(':place_desc', $place_desc, PDO::PARAM_STR);
            ;
            $query->bindParam(':location', $location, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':opentime', $opentime, PDO::PARAM_STR);
            $query->bindParam(':heights',$heights,PDO::PARAM_STR);
         
            $query->bindParam(':floors',$floors,PDO::PARAM_STR);
            $query->bindParam(':Alt_names',$Alt_names,PDO::PARAM_STR);
            $query->bindParam(':architect',$architect,PDO::PARAM_STR);
            $query->bindParam(':contractor',$contractor,PDO::PARAM_STR);
            $query->bindParam(':file',$file,PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Updated";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Updated";
                echo sendResponse($code, $msg);
            }
            break;

 







        case 'addgallery':
            $place_name = $_POST['place_name']; 

             $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            

            $sqlconcession = "INSERT INTO  image_gallery (name,image) VALUES ('$place_name','$file')";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':place_name', $place_name, PDO::PARAM_STR); 
             $query->bindParam(':file', $file, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Added";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Added";
                echo sendResponse($code, $msg);
            }

            break;



            case 'updategallery':
            $id = $_POST['id'];
            $place_name = $_POST['place_name']; 
            $lastimg=$_POST['lastimg'];



            $size = $_FILES['image']['size'];

            if ($size > 0) {
                $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);

            }

            else
            {

                $file=$lastimg;
            }




           
            $sqlconcession = "UPDATE  image_gallery Set name=:place_name,image=:file WHERE  id=:id";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->bindParam(':place_name', $place_name, PDO::PARAM_STR);
            $query->bindParam(':file',$file,PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Updated";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Updated";
                echo sendResponse($code, $msg);
            }
            break;

 






        case 'addbanner': 

             $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            

            $sqlconcession = "INSERT INTO  master_banner (image) VALUES ('$file')";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':place_name', $place_name, PDO::PARAM_STR); 
             $query->bindParam(':file', $file, PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Added";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Added";
                echo sendResponse($code, $msg);
            }

            break;



            case 'updatebanner':
            $id = $_POST['id'];  
            $lastimg=$_POST['lastimg'];



            $size = $_FILES['image']['size'];

            if ($size > 0) {
                $size12 = $_FILES['image']['name'];
            $folderPath = "images/";
            $fileName =$size12;
            $file = $folderPath . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $file);

            }

            else
            {

                $file=$lastimg;
            }




           
            $sqlconcession = "UPDATE  master_banner Set image=:file WHERE  id=:id";

            $query = $pdo->prepare($sqlconcession);
            $query->bindParam(':id', $id, PDO::PARAM_STR); 
            $query->bindParam(':file',$file,PDO::PARAM_STR);
            $result = $query->execute();

            if ($result) {
                $code = true;
                $msg = "Updated";
                echo sendResponse($code, $msg);
            } else {
                $code = false;
                $msg = "Not Updated";
                echo sendResponse($code, $msg);
            }
            break;





 

    }

} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'];
    switch ($action) {

   
        case 'allbanner':
            $sql = "SELECT master_banner.*,@rownum:=@rownum+1 srno FROM master_banner ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deletebanner':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM mastre_banner  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getbanner':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM mastre_banner  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;




             case 'allplaces':
            $sql = "SELECT master_places.*,@rownum:=@rownum+1 srno FROM master_places ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteplaces':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM master_places  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getplaces':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM master_places  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;








             case 'allgallery':
            $sql = "SELECT image_gallery.*,master_places.place_name,@rownum:=@rownum+1 srno FROM image_gallery INNER JOIN master_places ON master_places.id=image_gallery.name,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deletegallery':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM image_gallery  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getgallery':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM image_gallery  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;











            //////////////////////////////////////// Master User ///////////////////////////////////////////////


             case 'alluser':
            $sql = "SELECT Master_user.*,@rownum:=@rownum+1 srno FROM Master_user ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteuser':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM Master_user  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getuser':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM Master_user  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;




             case 'allworkorder':
            $sql = "SELECT master_work_order.*,@rownum:=@rownum+1 srno FROM master_work_order ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteworkorder':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM master_work_order  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getworkorder':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM master_work_order  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;










             case 'allsite':
             $WorkOrderId=$_GET['WorkOrderId'];
              $sql = "SELECT master_site_details.*,master_work_order.WorkOrderNo,master_work_order.WorkName,master_work_order.Head,@rownum:=@rownum+1 srno FROM master_site_details INNER JOIN master_work_order ON master_work_order.id=master_site_details.WorkOrderId, (SELECT @rownum:=0) r WHERE master_site_details.WorkOrderId=$WorkOrderId ";
            $query = $pdo->prepare($sql);
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deletesite':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM master_site_details  WHERE id =:id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getsite':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM master_site_details  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;





             case 'allSupplier':
            $sql = "SELECT supplier_master.*,@rownum:=@rownum+1 srno FROM supplier_master ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteSupplier':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM supplier_master  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getSupplier':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM supplier_master  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;







             case 'allMachine':
            $sql = "SELECT machine_master.*,@rownum:=@rownum+1 srno FROM machine_master ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteMachine':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM machine_master  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getMachine':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM machine_master  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;





             case 'allVehicleDueDates':
            $sql = "SELECT master_vehicle_due_dates.*,@rownum:=@rownum+1 srno FROM master_vehicle_due_dates ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteVehicleDueDates':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM master_vehicle_due_dates  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getVehicleDueDates':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM master_vehicle_due_dates  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;




            
             case 'allRABill':
            $sql = "SELECT master_rabill.*,@rownum:=@rownum+1 srno FROM master_rabill ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteRABill':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM master_rabill  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getRABill':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM master_rabill  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;



             case 'allDieselEntry':
            $sql = "SELECT diesel_entry.*,master_vehicle_due_dates.VehicleNo,supplier_master.Name,@rownum:=@rownum+1 srno FROM diesel_entry INNER JOIN master_vehicle_due_dates ON master_vehicle_due_dates.id=diesel_entry.VehicleNo INNER JOIN supplier_master ON supplier_master.id=diesel_entry.Supplier ,(SELECT @rownum:=0) r ";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


     
 

        case 'deleteDieselEntry':
          
            $id = $_GET['id'];
          echo  $sql = "DELETE FROM diesel_entry  WHERE id =$id";
          $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);
            echo json_encode($data);
            break;


        case 'getDieselEntry':
            # code...
            $id = $_GET['id'];
            $sql = "SELECT * FROM diesel_entry  WHERE id =:id";
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetch(PDO::FETCH_OBJ);


            echo json_encode($data);
            break;




             case 'getSupplierForDiesel':
            $sql = "SELECT * FROM supplier_master";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;


            case 'getVehicleForDiesel':
            $sql = "SELECT * FROM master_vehicle_due_dates";
            $query = $pdo->prepare($sql);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            $results = ["sEcho" => 1,

                "iTotalRecords" => count($data),

                "iTotalDisplayRecords" => count($data),
                "sql" => $sql,
                "aaData" => $data];

            echo json_encode($data);
            break;

 
    }
}

 
function redirect($url)
{
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}


?>
