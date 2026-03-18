<?php

            $name_app_doc1 = 'Latest Income Tax Return';
            $doc_status = 'For Review';
            $date =  date("d/m/Y") ; 
            $no_doc = '5';
            $doc_app_ind = '0';

            $query = $connection->prepare("INSERT INTO lumber_app_doc_erow(uniqid_lapp,name_app_doc,doc_type_name,lumber_app_id,doc_status,date_applied,Number_of_doc,doc_app_ind)
            VALUES(:uniqid_lapp,:name_app_doc,:doc_type_name,:lumber_app_id,:doc_status,:date_applied,:Number_of_doc,:doc_app_ind)");
            $query->bindParam("uniqid_lapp", $uniqid_lap, PDO::PARAM_STR);
            $query->bindParam("name_app_doc", $new_img_name5, PDO::PARAM_STR);
            $query->bindParam("doc_type_name", $name_app_doc1, PDO::PARAM_STR);
            $query->bindParam("lumber_app_id", $idkeylumber, PDO::PARAM_STR);
            $query->bindParam("doc_status", $doc_status, PDO::PARAM_STR);
            $query->bindParam("date_applied", $date, PDO::PARAM_STR);
            $query->bindParam("Number_of_doc", $no_doc, PDO::PARAM_STR);
            $query->bindParam("doc_app_ind", $doc_app_ind, PDO::PARAM_STR);
            

            // $query->bindParam("application_form", $new_img_name, PDO::PARAM_STR);
            // $query->bindParam("lumber_supply_contract", $new_img_name2, PDO::PARAM_STR);
            // $query->bindParam("mayor_permit", $new_img_name3, PDO::PARAM_STR);
            // $query->bindParam("annual_bus_plan", $new_img_name4, PDO::PARAM_STR);
            // $query->bindParam("latest_income_tax", $new_img_name5, PDO::PARAM_STR);
            // $query->bindParam("proof_ownership", $new_img_name6, PDO::PARAM_STR);


            // $query->bindParam("inspection_val_id", $id, PDO::PARAM_STR);
            // $query->bindParam("validation_info_id", $id, PDO::PARAM_STR);
            
            
            // $query->bindParam("validator_id", $id, PDO::PARAM_STR);
            $result = $query->execute();

?>