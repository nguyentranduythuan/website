<?php 
function echoContainerNav($data, $level = 0)
{
    if(count($data) > 0)
    {
        $i = 0;
        foreach($data as $dt)
        {
            $class_tag = "";
            $tClass = "";
            if($i == 0)
            {
               $class_tag = "start";
            }
            else if($i == count($data)-1)
            {
               $class_tag = "last";
            }
            if(count($dt['sub']) > 0)
            {
                if($dt['parent_id'] == 0)
                {
                    foreach($dt['sub'] as $tmp)
                    {
                        if(CONTROLLER == $tmp['model'] && !empty($tmp['model']))
                        {
                            $tClass = "active ";   
                        }
                    }
                }
            }
            else
            {
                if($dt['parent_id'] == 0)
                {
                    if(CONTROLLER == $dt['model'] && !empty($dt['model']))
                    {
                        $tClass = "active";   
                    }
                }
            }
            
            if($dt['link'] != '#')
            {
                $link = url('/cms/'.$dt['link']);
            }
            else
            {
                $link = 'javascript:;';
            }

            $class_icon = array("icon-home", "icon-basket", "icon-rocket", "icon-settings", "icon-puzzle","icon-wallet", "icon-tag", "icon-pencil", "icon-handbag", "icon-paper-plane");

            echo '<li class="'.$class_tag.' '.$tClass.'">';
            echo '<a href="'.$link.'">';
            echo '<i class="'.$class_icon[($i > (count($class_icon)-1) ? (count($class_icon)-1) : $i) ].'"></i>';
            if($level == 0)
            {
               echo '<span class="title">'.$dt['name'].'</span>';
            }
            else
            {
               echo $dt['name'];
            }
            if($tClass == "active")
            {
               echo '<span class="selected"></span>';
            }
            else
            {
               if(count($dt['sub']) > 0)
               {
                   echo '<span class="arrow"></span>';
               }
            }
            echo '</a>';
   
            if(count($dt['sub']) > 0)
            {
                echo '<ul class="sub-menu" >';
                echoContainerNav($dt['sub'], ($level + 1));
                echo "</ul>";
            }
            echo "</li>"; 
            $i++;      
        }   
    }
}
echoContainerNav($data);
?>