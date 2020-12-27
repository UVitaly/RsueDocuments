<?php require "com/page.php" ?>

<script src="js/script.js"></script>

<div class="container-fluid d-f" style="padding: 0px;">
    <div class="nav-bar">
        <h2>Документы</h2>
            <ul id="list_docs">
            <?php
            $path='./Docs';
            $files = scandir($path);      
            mb_internal_encoding("UTF-8");
            $i=0;
            foreach($files as $file)
            {           
                if(!is_dir($path . $file))
                {

                    $info=pathinfo($file);;
                    echo "<li>"."<input  class='cb_bs' id='cb_bs$i'  value='0'  type='checkbox' >"."<p>".iconv('windows-1251', 'utf-8',$info[filename])."</p>"."</li>";
                }
                $i++;
            }
            $i=0;
            ?>       
        </ul>
    </div>
    <div class="docsWrapper" id="docsWrapper">
    </div>
    <script>
        let selectedli;
        document.getElementById("list_docs").onclick = function(event) {
        let target = event.target; // где был клик?
        if (target.tagName != 'INPUT')
        {
            return; // не на TD? тогда не интересует
        }
        else
        {
            var dw = document.getElementById("docsWrapper");
            if(target.value=="0")
            {                   
                var doc_iframe = document.createElement("iframe");
                doc_iframe.width="100%";
                doc_iframe.height="1000px";
                doc_iframe.src="<?=$path?>" + "/" + target.parentNode.lastChild.innerHTML+"."+"<?=$info[extension]?>";    
                doc_iframe.id="if_"+target.id;           
                dw.appendChild(doc_iframe);
                target.value="1";
            } 
            else
            {
                for(let i=0; i<dw.childNodes.length;i++)
                {
                    if((dw.childNodes[i].id)==("if_"+target.id))
                    {
                         dw.childNodes[i].remove();
                    }
                }
                target.value="0";
            }
        }       
    }               
    </script>
</div>
