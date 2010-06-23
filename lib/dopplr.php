<?php

class Dopplr {
  const DOPPLR_BASEURL = "https://www.dopplr.com/api";

  function __construct($token) {
    $this->token = $token;
  }
  
  function status() {
    $traveller_info = $this->traveller_info();
    return $traveller_info->traveller->status;
  }
  
  function name() {
    $traveller_info = $this->traveller_info();
    return $traveller_info->traveller->name;
  }

  function local_time() {
    $traveller_info = $this->traveller_info();
    $city_info = $this->city_info($traveller_info->traveller->current_city->geoname_id);
    $date = date_parse($city_info->city->localtime);
    return date('g:i a', strtotime($date['hour'].":".$date['minute']));
  }

  function timezone() {
    $traveller_info = $this->traveller_info();
    $city_info = $this->city_info($traveller_info->traveller->current_city->geoname_id);
    return $city_info->city->timezone . ', U.T.C. Offset: '. $city_info->city->utcoffset;
  }

  function travel_today() {
    $traveller_info = $this->traveller_info();
    return $traveller_info->traveller->travel_today;
  }
  
  function at_home() {
    $traveller_info = $this->traveller_info();
    return $traveller_info->traveller->home_city->geoname_id == $traveller_info->traveller->current_city->geoname_id;
  }
  
  private function traveller_info() {
    $params = array(
      'format' => 'js',
      'token' => $this->token
    );
    return $this->curl_url('traveller_info', $params);
  }

  private function city_info($geoname_id) {
    $params = array(
      'format' => 'js',
      'token' => $this->token,
      'geoname_id' => $geoname_id
    );
    return $this->curl_url('city_info', $params);
  }
  
  private function curl_url($resource, $params) {
    $query = http_build_query($params);

    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, self::DOPPLR_BASEURL . "/$resource?" . $query);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($c);
    $info = curl_getinfo($c);
    curl_close($c);

    return json_decode($output);
  }
  
}

?>
