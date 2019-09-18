<?php
            $queryyy="SELECT * FROM student Where id='$unid'";
            $resulttt = mysqli_query($sql, $queryyy);
            $rowww = mysqli_fetch_array($resulttt);
            $uniqqu = $rowww['sid'];    
            $query123 = "SELECT * FROM result WHERE sid='$uniqqu'";  
            $result123 = mysqli_query($sql, $query123);
            $row123 = mysqli_fetch_array($result123);
            $eng2_t=round($row123["englishb"]+$row123["english_se"]+$row123["english_n"]+$row123["english_p"],2);
            $hindi2_t=round(($row123["hindib"])+($row123["hindi_se"])+($row123["hindi_n"])+($row123["hindi_p"]),2);
            $maths2_t=round(($row123["mathsb"])+($row123["maths_se"])+($row123["maths_n"])+($row123["maths_p"]),2);
            $science2_t=round(($row123["scienceb"])+($row123["science_se"])+($row123["science_n"])+($row123["science_p"]),2);
            $sst2_t=round(($row123["sstb"])+($row123["sst_se"])+($row123["sst_n"])+($row123["sst_p"]),2);
            $it2_t=round(($row123["itb"])+($row123["it_se"])+($row123["it_n"])+($row123["it_p"]),2);
            
            
            $eng3_t=round($row123["englishi"]+$row123["englishft"],2);
            $hindi3_t=round($row123["hindii"]+$row123["hindift"],2);
            $maths3_t=round($row123["mathsi"]+$row123["mathsft"],2);
            $science3_t=round($row123["sciencei"]+$row123["scienceft"],2);
            $sst3_t=round($row123["ssti"]+$row123["sstft"],2);
            $it3_t=round($row123["iti"]+$row123["itft"],2);
            
            
            $upp = "UPDATE result SET englishi='".$eng2_t."', hindii='".$hindi2_t."', mathsi='".$maths2_t."',sciencei='".$science2_t."',ssti='".$sst2_t."',iti='".$it2_t."' , englishf='".$eng3_t."', hindif='".$hindi3_t."', mathsf='".$maths3_t."',sciencef='".$science3_t."',sstf='".$sst3_t."',itf='".$it3_t."'  WHERE  sid = '".$uniqqu."';";
                    
            $qqqq=mysqli_query($sql,$upp);       
?>
                
                
            
            
            
            
