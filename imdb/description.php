<?php

      if(isset($_REQUEST['q']))
      {
        $see= $_REQUEST['q'] ;
      
        $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://mdblist.p.rapidapi.com/?i=$see",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
          "X-RapidAPI-Host: mdblist.p.rapidapi.com",
          "X-RapidAPI-Key: fbe13bafd3msh1ddcc290bd6e8c7p111007jsn42ea98533ab1"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      $result=json_decode($response,true);

        $info=" <b> MOVIE NAME : </b> ".$result['title']."<br/><br/>";
        $info.="<b> REALEASED YEAR AND DATE :  </b>".$result['released']."<br/><br/>";
        $info.="<b> DESCRIPTION :  </b> ".$result['description']."<br/><br/>";
        $info.="<b> DURATION :  </b> ".$result['runtime']."<br/><br/>";
        $info.="<b> TYPE :  </b> ".$result['type']."<br/><br/>";
        $info.="<b> SOURCE :  </b> ".$result['ratings']['0']['source']."<br/><br/>";
        $info.="<b> RATING  :  </b> ".$result['ratings']['0']['value']."<br/><br/>";
        $info.="<b> SCORE :  </b> ".$result['ratings']['0']['score']."<br/><br/>";
        $info.="<b> VOTES :  </b> ".$result['ratings']['0']['votes']."<br/><br/>";
      
      }

   
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=
        Edu+NSW+ACT+Foundation&family=Noto+Serif:ital@1&family=Oswald:wght@300&family
        =Roboto+Condensed:ital@1&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="des.css">
  </head>
      <body>
        <div class="main">
            <img  src="<?php echo $result ['poster'] ?>" alt="">
              <?Php
                  if($info)
                  {
                    ?>
                  <div class="inner2"> <?php  echo $info; ?> </div>
                    <?php
                  }
              ?>

        </div>
    </body>
</html>