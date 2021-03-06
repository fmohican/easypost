<?php
require_once("function.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST");
header('Content-Type: application/json');
$u_fansub = $sql->real_escape_string(@$_REQUEST["whos"]);
if(true) {
  switch($u_fansub) {
    case "shinobi":
      if($sql->real_escape_string(@$_REQUEST["type"]) == "titles") {
        $data = $common->get_raw_titles($_REQUEST["limit"]);
        echo json_encode(array(
          "title1" => base64_encode($data["title1"]),
          "id1" => base64_encode($data["id1"]),
          "title2" => base64_encode($data["title2"]),
          "id2" => base64_encode($data["id2"]),
          "title3" => base64_encode($data["title3"]),
          "id3" => base64_encode($data["id3"]),
          "title4" => base64_encode($data["title4"]),
          "id4" => base64_encode($data["id4"]),
          "title5" => base64_encode($data["title5"]),
          "id5" => base64_encode($data["id5"])));
      }
      elseif($sql->real_escape_string(@$_REQUEST["type"]) == "post_data") {
        $data = $common->get_raw_logs($sql->real_escape_string(@$_REQUEST["ids"]));
        echo json_encode(array(
          "title" => base64_encode($data["title"]),
          "post_data" => $data["sh"],
          "post_tags" => base64_encode($common->get_tags($data["title"]))));
      }
      else
        exit();
    break;
    case "wiensubs":
      if($sql->real_escape_string(@$_REQUEST["type"]) == "titles") {
        $data = $common->get_raw_titles($_REQUEST["limit"]);
        echo json_encode(array(
          "title1" => base64_encode($data["title1"]),
          "id1" => base64_encode($data["id1"]),
          "title2" => base64_encode($data["title2"]),
          "id2" => base64_encode($data["id2"]),
          "title3" => base64_encode($data["title3"]),
          "id3" => base64_encode($data["id3"]),
          "title4" => base64_encode($data["title4"]),
          "id4" => base64_encode($data["id4"]),
          "title5" => base64_encode($data["title5"]),
          "id5" => base64_encode($data["id5"])));
      }
      elseif($sql->real_escape_string(@$_REQUEST["type"]) == "post_data") {
        $data = $common->get_raw_logs($sql->real_escape_string(@$_REQUEST["ids"]));
        echo json_encode(array(
          "title" => base64_encode($data["title"]),
          "post_data" => $data["ws"],
          "post_tags" => base64_encode($common->get_tags($data["title"]))));
      }
      else
        exit();
    break;
    default:
      die("Access Denied");
    break;
  }
}
else
  die("Access its restricted to this resource, please use the key");