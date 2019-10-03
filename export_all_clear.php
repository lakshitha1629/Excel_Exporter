<?php 
  require_once ('connect.php');
  $output = "";
  
if(isset($_POST['export1'])){ 
    
    $query = "SELECT * FROM `downsites_2019_10_01` WHERE `user_clear_date` IS NULL";
  
    $result = mysqli_query($con, $query);
   if(mysqli_num_rows($result) > 0)
   {
     // idDownSites`, `wender`, `type`, `date`, `site_name`, `region`, `subregion`, `mainregion`, 
              // `fault_occurred_time`, `fault_report_time`, `reported_by`, `reported_to`, `fault_clr_by`, 
              // `fault_clr_time`, `category`, `sub_category`, `reason_for_fault`, `updated_by`, `tm_report_by`,
              //  `tr_comment`, `tr_comment_by`, `reg_cmt_usr`, `reg_comment`, `status`, `corrective_action`, 
              //  `attend_person`, `attend`, `comment`, `location_infor`, `user_clear_date`
             
    $output .= "
     <table class='table' bordered='1'>  
     <tr> 
     <th>idDownSites</th> 
     <th>wender</th> 
     <th>type</th> 
     <th>date</th> 
     <th>site_name</th> 
     <th>region</th> 
     <th>subregion</th> 
     <th>mainregion</th> 
     <th>fault_occurred_time</th> 
     <th>fault_report_time</th> 
     <th>reported_by</th> 
     <th>reported_to</th> 
     <th>fault_clr_by</th> 
     <th>fault_clr_time</th> 
     <th>category</th> 
     <th>sub_category</th> 
     <th>reason_for_fault</th> 
     <th>updated_by</th> 
     <th>tm_report_by</th>
     <th>tr_comment</th>  
     <th>tr_comment_by</th>
     <th>reg_cmt_usr</th>
     <th>reg_comment</th>
     <th>status</th>
     <th>corrective_action</th>
     <th>attend_person</th>
     <th>attend</th>
     <th>comment</th>
     <th>location_infor</th>
     <th>user_clear_date</th>

     </tr>
    ";
    while($row = mysqli_fetch_array($result))
    {
                  $output .= "<tr> 
                 
                                <td>".$row['idDownSites']."</td> 
                                <td>".$row['wender']."</td> 
                                <td>".$row['type']."</td> 
                                <td>".$row['date']."</td> 
                                <td>".$row['site_name']."</td> 
                                <td>".$row['region']."</td> 
                                <td>".$row['subregion']."</td> 
                                <td>".$row['mainregion']."</td> 
                                <td>".$row['fault_occurred_time']."</td> 
                                <td>".$row['fault_report_time']."</td> 
                                <td>".$row['reported_by']."</td> 
                                <td>".$row['reported_to']."</td> 
                                <td>".$row['fault_clr_by']."</td> 
                                <td>".$row['fault_clr_time']."</td> 
                                <td>".$row['category']."</td> 
                                <td>".$row['sub_category']."</td> 
                                <td>".$row['reason_for_fault']."</td> 
                                <td>".$row['updated_by']."</td> 
                                <td>".$row['tm_report_by']."</td> 
                                <td>".$row['tr_comment']."</td> 
                                <td>".$row['tr_comment_by']."</td> 
                                <td>".$row['reg_cmt_usr']."</td> 
                                <td>".$row['reg_comment']."</td> 
                                <td>".$row['status']."</td> 
                                <td>".$row['corrective_action']."</td> 
                                <td>".$row['attend_person']."</td> 
                                <td>".$row['attend']."</td> 
                                <td>".$row['comment']."</td> 
                                <td>".$row['location_infor']."</td> 
                                <td>".$row['user_clear_date']."</td> 
                                </tr>";
    }
    $output .= "</table>";
    header('Content-Type: application/xls'); 
    header('Content-Disposition: attachment; filename=Mobitel_Site_Outage_Report.xls');
    echo $output;
   }else{
     echo "Enter the correct date range";
   }
  }
  ?>