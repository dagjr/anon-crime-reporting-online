<center><h1 style="font-family: 'Abril Fatface';font-size: 50px;">	&nbsp;	&nbsp;	&nbsp;	&nbsp;Inbox</h1>
<ul style="list-style-type: none;"><?php
require_once '../includes/dbconnect.php';
        $result1 = mysqli_query($conn, "SELECT t1.* FROM `chatlogs` t1 JOIN (SELECT *, MAX(`date_sent`) date_sent2 FROM chatlogs GROUP BY reportID) t2 ON t1.reportID = t2.reportID AND t1.date_sent = t2.date_sent2 GROUP BY reportID ORDER BY t1.date_sent DESC");

        $_SESSION['isAdmin'] = true;

        while ($extract = mysqli_fetch_array($result1))
        {


          echo "<li><button id='chats". $extract['reportID'] ."' value='". $extract['reportID'] . "' style='border:none;border-radius:10px; margin-bottom:20px;min-height:70px;font-family:Georgia, serif;padding:0;text-decoration:none;max-width:180px;min-width:180px;overflow: auto;'>";

          $formattedTime = "<sup style='color:gray;font-size:50%;'>" . $extract['date_sent'] . "</sup>";
          if ($extract['isRead'] == 0 AND $extract['isAdmin'] == 0){
            echo "<b>";
            echo  $extract['reportID'] . " : " . $extract['message'] . " ".  $formattedTime . "<br /><hr>";
            echo "</b>";
          } else {
             echo  $extract['reportID'] . " : " . $extract['message'] . " ".  $formattedTime . "<br /><hr>";
          }
          echo "</button></li>";


          ?>
          <script type="text/javascript">
            var myInterval;
          $('#chats' + '<?php echo $extract["reportID"]; ?>').on('click', function(){

              clearInterval(myInterval);

              id = '<?php echo $extract['reportID']; ?>';
              myInterval = setInterval(function(){
              $("#chatlogs").load('../chat/logs.php?id='+ '<?php echo $extract['reportID']; ?>');
              updateScroll();
              }, 2000);

              $.ajax({
               type: "POST",
               url: '../chat/read.php',
               data:{reportID:<?php echo $extract['reportID']; ?>}

             });



            });
          </script>
            <?php
        }
        ?></ul></center>
